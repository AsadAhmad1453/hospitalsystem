<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Models\Patient;
use App\Models\Form;
use App\Models\Service;
use App\Models\Medicine;
use App\Models\BloodInv;
use App\Models\Xray;
use App\Models\Ultrasound;
use App\Models\Ctscan;
use App\Models\Dose;
use App\Models\Bank;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Support\Facades\Cache;

class DashboardService
{
    /**
     * Get dashboard statistics
     */
    public function getDashboardStatistics()
    {
        return Cache::remember('dashboard_stats', 300, function () {
            return [
                'users' => $this->getUserStatistics(),
                'patients' => $this->getPatientStatistics(),
                'services' => $this->getServiceStatistics(),
                'forms' => $this->getFormStatistics(),
                'medical' => $this->getMedicalStatistics(),
                'recent_activity' => $this->getRecentActivity(),
            ];
        });
    }

    /**
     * Get real-time statistics
     */
    public function getRealTimeStatistics()
    {
        return [
            'totalPatients' => Patient::count(),
            'totalUsers' => User::count(),
            'totalServices' => Service::count(),
            'totalForms' => Form::count(),
            'recentPatients' => Patient::where('created_at', '>=', now()->subDays(7))->count(),
            'recentUsers' => User::where('created_at', '>=', now()->subDays(7))->count(),
            'doctorsCount' => User::role('doctors')->count(),
            'nursesCount' => User::role('nurse')->count(),
            'completedTests' => BloodInv::where('status', 'completed')->count(),
            'pendingTests' => BloodInv::where('status', 'pending')->count(),
            'abnormalResults' => BloodInv::where('status', 'abnormal')->count(),
        ];
    }

    /**
     * Get user statistics
     */
    private function getUserStatistics()
    {
        return [
            'total' => User::count(),
            'doctors' => User::role('doctors')->count(),
            'nurses' => User::role('nurse')->count(),
            'data_collectors' => User::role('data collector')->count(),
            'recent' => User::where('created_at', '>=', now()->subDays(7))->count(),
        ];
    }

    /**
     * Get patient statistics
     */
    private function getPatientStatistics()
    {
        return [
            'total' => Patient::count(),
            'recent' => Patient::where('created_at', '>=', now()->subDays(7))->count(),
            'male' => Patient::where('sex', 'male')->count(),
            'female' => Patient::where('sex', 'female')->count(),
            'active' => Patient::where('patient_status', '1')->count(),
            'inactive' => Patient::where('patient_status', '0')->count(),
        ];
    }

    /**
     * Get service statistics
     */
    private function getServiceStatistics()
    {
        return [
            'total' => Service::count(),
            'recent' => Service::where('created_at', '>=', now()->subDays(7))->count(),
        ];
    }

    /**
     * Get form statistics
     */
    private function getFormStatistics()
    {
        return [
            'total' => Form::count(),
            'questions' => Question::count(),
            'sections' => Section::count(),
        ];
    }

    /**
     * Get medical statistics
     */
    private function getMedicalStatistics()
    {
        return [
            'medicines' => Medicine::count(),
            'blood_tests' => BloodInv::count(),
            'xrays' => Xray::count(),
            'ultrasounds' => Ultrasound::count(),
            'ctscans' => Ctscan::count(),
            'doses' => Dose::count(),
            'banks' => Bank::count(),
        ];
    }

    /**
     * Get recent activity
     */
    private function getRecentActivity()
    {
        return [
            'recent_patients' => Patient::with(['user'])
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get(),
            'recent_users' => User::with(['roles'])
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get(),
        ];
    }

    /**
     * Get chart data for analytics
     */
    public function getChartData()
    {
        return Cache::remember('chart_data', 600, function () {
            return [
                'patients_by_month' => $this->getPatientsByMonth(),
                'users_by_role' => $this->getUsersByRole(),
                'medical_tests' => $this->getMedicalTestsData(),
            ];
        });
    }

    /**
     * Get patients by month for chart
     */
    private function getPatientsByMonth()
    {
        return Patient::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();
    }

    /**
     * Get users by role for chart
     */
    private function getUsersByRole()
    {
        return [
            'doctors' => User::role('doctors')->count(),
            'nurses' => User::role('nurse')->count(),
            'data_collectors' => User::role('data collector')->count(),
        ];
    }

    /**
     * Get medical tests data for chart
     */
    private function getMedicalTestsData()
    {
        return [
            'blood_tests' => BloodInv::count(),
            'xrays' => Xray::count(),
            'ultrasounds' => Ultrasound::count(),
            'ctscans' => Ctscan::count(),
        ];
    }

    /**
     * Clear dashboard cache
     */
    public function clearCache()
    {
        Cache::forget('dashboard_stats');
        Cache::forget('chart_data');
    }
}
