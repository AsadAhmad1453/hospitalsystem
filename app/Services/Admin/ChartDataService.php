<?php

namespace App\Services\Admin;

use App\Models\Patient;
use App\Models\User;
use App\Models\Service;
use App\Models\BloodInv;
use App\Models\Xray;
use App\Models\Ultrasound;
use App\Models\Ctscan;
use App\Models\Medicine;
use App\Models\Bank;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartDataService
{
    /**
     * Get patient statistics for dashboard chart
     */
    public function getPatientStatistics($period = '7days')
    {
        $endDate = Carbon::now();
        $startDate = $this->getStartDate($period, $endDate);
        
        // Get daily patient registrations
        $dailyPatients = Patient::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        
        // Get daily discharged patients (assuming you have a status field)
        $dailyDischarged = Patient::whereBetween('updated_at', [$startDate, $endDate])
            ->where('status', 'discharged')
            ->selectRaw('DATE(updated_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        
        // Fill missing dates with 0
        $labels = [];
        $newPatientsData = [];
        $dischargedData = [];
        
        $current = $startDate->copy();
        while ($current->lte($endDate)) {
            $dateStr = $current->format('Y-m-d');
            $labels[] = $current->format('M d');
            
            $newPatientsData[] = $dailyPatients->where('date', $dateStr)->first()->count ?? 0;
            $dischargedData[] = $dailyDischarged->where('date', $dateStr)->first()->count ?? 0;
            
            $current->addDay();
        }
        
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'New Patients',
                    'data' => $newPatientsData,
                    'borderColor' => 'rgb(75, 192, 192)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'tension' => 0.1
                ],
                [
                    'label' => 'Discharged Patients',
                    'data' => $dischargedData,
                    'borderColor' => 'rgb(255, 99, 132)',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'tension' => 0.1
                ]
            ]
        ];
    }

    /**
     * Get user statistics by role
     */
    public function getUserStatisticsByRole()
    {
        $doctors = User::role('doctors')->count();
        $nurses = User::role('nurse')->count();
        $dataCollectors = User::role('data collector')->count();
        
        return [
            'labels' => ['Doctors', 'Nurses', 'Data Collectors'],
            'datasets' => [
                [
                    'label' => 'Users by Role',
                    'data' => [$doctors, $nurses, $dataCollectors],
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 205, 86, 0.8)'
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 205, 86, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];
    }

    /**
     * Get medical tests statistics
     */
    public function getMedicalTestsStatistics()
    {
        $bloodTests = BloodInv::count();
        $xrays = Xray::count();
        $ultrasounds = Ultrasound::count();
        $ctscans = Ctscan::count();
        
        return [
            'labels' => ['Blood Tests', 'X-Rays', 'Ultrasounds', 'CT Scans'],
            'datasets' => [
                [
                    'label' => 'Medical Tests',
                    'data' => [$bloodTests, $xrays, $ultrasounds, $ctscans],
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 205, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)'
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];
    }

    /**
     * Get monthly statistics
     */
    public function getMonthlyStatistics($year = null)
    {
        $year = $year ?? Carbon::now()->year;
        
        $monthlyPatients = Patient::whereYear('created_at', $year)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();
        
        $monthlyUsers = User::whereYear('created_at', $year)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();
        
        $labels = [];
        $patientsData = [];
        $usersData = [];
        
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::createFromDate($year, $i, 1)->format('M');
            $patientsData[] = $monthlyPatients[$i] ?? 0;
            $usersData[] = $monthlyUsers[$i] ?? 0;
        }
        
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Patients',
                    'data' => $patientsData,
                    'borderColor' => 'rgb(75, 192, 192)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'tension' => 0.1
                ],
                [
                    'label' => 'Users',
                    'data' => $usersData,
                    'borderColor' => 'rgb(255, 99, 132)',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'tension' => 0.1
                ]
            ]
        ];
    }

    /**
     * Get blood test results statistics
     */
    public function getBloodTestResultsStatistics()
    {
        $normal = BloodInv::where('is_abnormal', false)->count();
        $abnormal = BloodInv::where('is_abnormal', true)->count();
        $pending = BloodInv::where('status', 'pending')->count();
        
        return [
            'labels' => ['Normal', 'Abnormal', 'Pending'],
            'datasets' => [
                [
                    'label' => 'Blood Test Results',
                    'data' => [$normal, $abnormal, $pending],
                    'backgroundColor' => [
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(255, 205, 86, 0.8)'
                    ],
                    'borderColor' => [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 205, 86, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];
    }

    /**
     * Get service revenue statistics
     */
    public function getServiceRevenueStatistics($period = '7days')
    {
        $endDate = Carbon::now();
        $startDate = $this->getStartDate($period, $endDate);
        
        $dailyRevenue = Service::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, SUM(amount) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        
        $labels = [];
        $revenueData = [];
        
        $current = $startDate->copy();
        while ($current->lte($endDate)) {
            $dateStr = $current->format('Y-m-d');
            $labels[] = $current->format('M d');
            
            $revenueData[] = $dailyRevenue->where('date', $dateStr)->first()->total ?? 0;
            
            $current->addDay();
        }
        
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Daily Revenue',
                    'data' => $revenueData,
                    'borderColor' => 'rgb(54, 162, 235)',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'tension' => 0.1
                ]
            ]
        ];
    }

    /**
     * Get start date based on period
     */
    private function getStartDate($period, $endDate)
    {
        switch ($period) {
            case '7days':
                return $endDate->copy()->subDays(7);
            case '30days':
                return $endDate->copy()->subDays(30);
            case '3months':
                return $endDate->copy()->subMonths(3);
            case '6months':
                return $endDate->copy()->subMonths(6);
            case '1year':
                return $endDate->copy()->subYear();
            default:
                return $endDate->copy()->subDays(7);
        }
    }
}
