<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingsController extends Controller
{
    protected $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }

    /**
     * Display settings page
     */
    public function index()
    {
        $settings = $this->settingsService->getAllSettings();
        return view('admin-new.settings.settings', compact('settings'));
    }

    /**
     * Save settings
     */
    public function saveSettings(Request $request)
    {
        try {
            $this->settingsService->saveSettings($request);
            return response()->json(['success' => 'Settings saved successfully']);
        } catch (\Exception $e) {
            Log::error('Settings save error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to save settings'], 500);
        }
    }

    /**
     * Test email configuration
     */
    public function testEmail()
    {
        try {
            $this->settingsService->testEmail();
            return response()->json(['success' => 'Test email sent successfully']);
        } catch (\Exception $e) {
            Log::error('Test email error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to send test email'], 500);
        }
    }

    /**
     * Create database backup
     */
    public function createBackup()
    {
        try {
            $this->settingsService->createBackup();
            return response()->json(['success' => 'Backup created successfully']);
        } catch (\Exception $e) {
            Log::error('Backup creation error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to create backup'], 500);
        }
    }

    /**
     * Clear application cache
     */
    public function clearCache()
    {
        try {
            $this->settingsService->clearCache();
            return response()->json(['success' => 'Cache cleared successfully']);
        } catch (\Exception $e) {
            Log::error('Cache clear error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to clear cache'], 500);
        }
    }

    /**
     * Optimize database
     */
    public function optimizeDatabase()
    {
        try {
            $this->settingsService->optimizeDatabase();
            return response()->json(['success' => 'Database optimized successfully']);
        } catch (\Exception $e) {
            Log::error('Database optimization error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to optimize database'], 500);
        }
    }

    /**
     * Get available backups
     */
    public function getBackups()
    {
        try {
            $backups = $this->settingsService->getBackups();
            return response()->json(['backups' => $backups]);
        } catch (\Exception $e) {
            Log::error('Get backups error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to get backups'], 500);
        }
    }

    /**
     * Download backup file
     */
    public function downloadBackup($filename)
    {
        try {
            $backupPath = storage_path('app/backups/' . $filename);
            
            if (!file_exists($backupPath)) {
                return response()->json(['error' => 'Backup file not found'], 404);
            }
            
            return response()->download($backupPath);
        } catch (\Exception $e) {
            Log::error('Backup download error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to download backup'], 500);
        }
    }
}