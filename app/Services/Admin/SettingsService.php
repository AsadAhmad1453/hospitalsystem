<?php

namespace App\Services\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SettingsService
{
    /**
     * Get all settings with defaults
     */
    public function getAllSettings()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        
        $defaults = $this->getDefaultSettings();
        
        return array_merge($defaults, $settings);
    }

    /**
     * Save settings by form type
     */
    public function saveSettings(Request $request)
    {
        $formType = $request->input('form_type', 'general');
        
        switch ($formType) {
            case 'general':
                return $this->saveGeneralSettings($request);
            case 'notifications':
                return $this->saveNotificationSettings($request);
            case 'email':
                return $this->saveEmailSettings($request);
            case 'security':
                return $this->saveSecuritySettings($request);
            default:
                throw new \InvalidArgumentException('Invalid form type');
        }
    }

    /**
     * Save general settings
     */
    private function saveGeneralSettings(Request $request)
    {
        $settings = [
            'hospital_name' => $request->hospital_name,
            'hospital_code' => $request->hospital_code,
            'timezone' => $request->timezone,
            'date_format' => $request->date_format,
            'currency' => $request->currency,
            'language' => $request->language,
            'hospital_address' => $request->hospital_address,
            'hospital_phone' => $request->hospital_phone,
            'hospital_email' => $request->hospital_email,
        ];
        
        $this->updateSettings($settings);
        return true;
    }

    /**
     * Save notification settings
     */
    private function saveNotificationSettings(Request $request)
    {
        $settings = [
            'email_new_patient' => $request->has('email_new_patient'),
            'email_appointment' => $request->has('email_appointment'),
            'email_lab_results' => $request->has('email_lab_results'),
            'email_payment' => $request->has('email_payment'),
            'sms_urgent' => $request->has('sms_urgent'),
            'sms_appointment' => $request->has('sms_appointment'),
            'system_maintenance' => $request->has('system_maintenance'),
            'system_errors' => $request->has('system_errors'),
        ];
        
        $this->updateSettings($settings);
        return true;
    }

    /**
     * Save email settings
     */
    private function saveEmailSettings(Request $request)
    {
        $settings = [
            'mail_driver' => $request->mail_driver,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_password' => $request->mail_password,
            'mail_encryption' => $request->mail_encryption,
            'mail_from_address' => $request->mail_from_address,
            'mail_from_name' => $request->mail_from_name,
        ];
        
        $this->updateSettings($settings);
        return true;
    }

    /**
     * Save security settings
     */
    private function saveSecuritySettings(Request $request)
    {
        $settings = [
            'session_timeout' => $request->session_timeout,
            'max_login_attempts' => $request->max_login_attempts,
            'password_min_length' => $request->password_min_length,
            'require_2fa' => $request->require_2fa,
            'force_password_change' => $request->has('force_password_change'),
            'log_activity' => $request->has('log_activity'),
        ];
        
        $this->updateSettings($settings);
        return true;
    }

    /**
     * Update settings in database
     */
    private function updateSettings(array $settings)
    {
        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'updated_at' => now()]
            );
        }
    }

    /**
     * Get default settings
     */
    private function getDefaultSettings()
    {
        return [
            'hospital_name' => 'Shafayaat Hospital',
            'hospital_code' => 'SH001',
            'timezone' => 'UTC',
            'date_format' => 'Y-m-d',
            'currency' => 'USD',
            'language' => 'en',
            'hospital_address' => '',
            'hospital_phone' => '',
            'hospital_email' => '',
            'email_new_patient' => true,
            'email_appointment' => true,
            'email_lab_results' => true,
            'email_payment' => false,
            'sms_urgent' => true,
            'sms_appointment' => false,
            'system_maintenance' => true,
            'system_errors' => true,
            'mail_driver' => 'smtp',
            'mail_host' => 'smtp.gmail.com',
            'mail_port' => '587',
            'mail_username' => '',
            'mail_password' => '',
            'mail_encryption' => 'tls',
            'mail_from_address' => '',
            'mail_from_name' => 'Shafayaat Hospital',
            'session_timeout' => '120',
            'max_login_attempts' => '5',
            'password_min_length' => '8',
            'require_2fa' => '0',
            'force_password_change' => false,
            'log_activity' => true,
        ];
    }

    /**
     * Test email configuration
     */
    public function testEmail()
    {
        try {
            Mail::raw('This is a test email from Shafayaat Hospital System.', function ($message) {
                $message->to(auth()->user()->email)
                        ->subject('Test Email - Shafayaat Hospital');
            });
            
            return true;
        } catch (\Exception $e) {
            Log::error('Test email error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Create database backup
     */
    public function createBackup()
    {
        try {
            $timestamp = Carbon::now()->format('Y_m_d_H_i_s');
            $backupName = "backup_{$timestamp}.sql";
            
            $backupPath = storage_path('app/backups');
            if (!file_exists($backupPath)) {
                mkdir($backupPath, 0755, true);
            }
            
            $database = config('database.connections.mysql.database');
            $username = config('database.connections.mysql.username');
            $password = config('database.connections.mysql.password');
            $host = config('database.connections.mysql.host');
            $port = config('database.connections.mysql.port');
            
            $command = "mysqldump -h {$host} -P {$port} -u {$username} -p{$password} {$database} > " . $backupPath . "/" . $backupName;
            
            exec($command, $output, $returnCode);
            
            if ($returnCode === 0) {
                return true;
            } else {
                throw new \Exception('mysqldump command failed');
            }
        } catch (\Exception $e) {
            Log::error('Backup creation error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Clear application cache
     */
    public function clearCache()
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('view:clear');
            Artisan::call('route:clear');
            
            return true;
        } catch (\Exception $e) {
            Log::error('Cache clear error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Optimize database
     */
    public function optimizeDatabase()
    {
        try {
            DB::statement('OPTIMIZE TABLE users, patients, medical_records, appointments, blood_invs, xrays, ultrasounds, ctscans, medicines, doses, banks, questions, sections, options, forms, relations');
            
            return true;
        } catch (\Exception $e) {
            Log::error('Database optimization error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get available backups
     */
    public function getBackups()
    {
        try {
            $backupPath = storage_path('app/backups');
            $backups = [];
            
            if (is_dir($backupPath)) {
                $files = glob($backupPath . '/*.sql');
                foreach ($files as $file) {
                    $backups[] = [
                        'name' => basename($file),
                        'date' => date('M d, Y', filemtime($file)),
                        'size' => $this->formatBytes(filesize($file))
                    ];
                }
            }
            
            return $backups;
        } catch (\Exception $e) {
            Log::error('Get backups error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Format bytes to human readable format
     */
    private function formatBytes($size, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        for ($i = 0; $size > 1024 && $i < count($units) - 1; $i++) {
            $size /= 1024;
        }
        return round($size, $precision) . ' ' . $units[$i];
    }
}
