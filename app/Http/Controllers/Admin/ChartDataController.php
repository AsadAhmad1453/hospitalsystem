<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ChartDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChartDataController extends Controller
{
    protected $chartDataService;

    public function __construct(ChartDataService $chartDataService)
    {
        $this->chartDataService = $chartDataService;
    }

    /**
     * Get patient statistics for dashboard chart
     */
    public function getPatientStatistics(Request $request)
    {
        try {
            $period = $request->get('period', '7days');
            $data = $this->chartDataService->getPatientStatistics($period);
            
            return response()->json($data);
        } catch (\Exception $e) {
            Log::error('Patient statistics error: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching patient statistics'], 500);
        }
    }

    /**
     * Get user statistics by role
     */
    public function getUserStatisticsByRole()
    {
        try {
            $data = $this->chartDataService->getUserStatisticsByRole();
            return response()->json($data);
        } catch (\Exception $e) {
            Log::error('User statistics error: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching user statistics'], 500);
        }
    }

    /**
     * Get medical tests statistics
     */
    public function getMedicalTestsStatistics()
    {
        try {
            $data = $this->chartDataService->getMedicalTestsStatistics();
            return response()->json($data);
        } catch (\Exception $e) {
            Log::error('Medical tests statistics error: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching medical tests statistics'], 500);
        }
    }

    /**
     * Get monthly statistics
     */
    public function getMonthlyStatistics(Request $request)
    {
        try {
            $year = $request->get('year', null);
            $data = $this->chartDataService->getMonthlyStatistics($year);
            
            return response()->json($data);
        } catch (\Exception $e) {
            Log::error('Monthly statistics error: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching monthly statistics'], 500);
        }
    }

    /**
     * Get blood test results statistics
     */
    public function getBloodTestResultsStatistics()
    {
        try {
            $data = $this->chartDataService->getBloodTestResultsStatistics();
            return response()->json($data);
        } catch (\Exception $e) {
            Log::error('Blood test results statistics error: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching blood test results statistics'], 500);
        }
    }

    /**
     * Get service revenue statistics
     */
    public function getServiceRevenueStatistics(Request $request)
    {
        try {
            $period = $request->get('period', '7days');
            $data = $this->chartDataService->getServiceRevenueStatistics($period);
            
            return response()->json($data);
        } catch (\Exception $e) {
            Log::error('Service revenue statistics error: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching service revenue statistics'], 500);
        }
    }
}