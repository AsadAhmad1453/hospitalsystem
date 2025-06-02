<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Customer\CustomerDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();
Route::prefix('admin')->middleware(['auth','is_admin'])->group(function () {
    Route::post('/roles/bulk-update-permissions', [StaffController::class, 'bulkUpdatePermissions'])->name('roles.bulkUpdatePermissions');
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/staff', [StaffController::class, 'index'])->name('staff');
    Route::get('/patients', [PatientController::class, 'index'])->name('patients');
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('save-permission');
    Route::get('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('del-perm');
    Route::post('/save-staff', [StaffController::class, 'savestaff'])->name('save-staff');
    Route::post('/save-user', [UsersController::class, 'saveuser'])->name('save-user');
    Route::get('/del-user/{id}', [UsersController::class, 'deluser'])->name('del-user');
    Route::get('/roles-table/{id}', [UsersController::class, 'rolestable'])->name('roles-table');
});

Route::get('/', [App\Http\Controllers\User\LoginController::class, 'showLoginForm'])->name('staff-login');
Route::post('/staff/login',[App\Http\Controllers\User\LoginController::class, 'login'])->name('staff.login');
Route::post('/staff-logout', [App\Http\Controllers\User\LoginController::class, 'logout'])->name('staff-logout');

Route::prefix('user')->middleware(['auth','is_user'])->group(function () { 
    Route::get('/dashboard', [UserController::class, 'index'])->name('user-dashboard');
    Route::get('/patient-entry', [App\Http\Controllers\User\PatientEntryController::class, 'index'])->name('patient-entry');
    Route::post('/save-patient', [App\Http\Controllers\User\PatientEntryController::class, 'savepatient'])->name('save-patient');
    Route::get('/add-patient', [App\Http\Controllers\User\PatientEntryController::class, 'addPatient'])->name('patient-add');
    Route::get('/edit-patient/{id}', [App\Http\Controllers\User\PatientEntryController::class, 'editPatient'])->name('patient-edit');
    Route::post('/update-patient', [App\Http\Controllers\User\PatientEntryController::class, 'updatePatient'])->name('update-patient');
    Route::get('/view-patient/{id}', [App\Http\Controllers\User\PatientEntryController::class, 'viewPatient'])->name('patient-view');
    Route::get('/delete-patient/{id}', [App\Http\Controllers\User\PatientEntryController::class, 'deletePatient'])->name('patient-delete');
    Route::get('patient-status-toggle', [App\Http\Controllers\User\PatientEntryController::class, 'patientStatusToggle'])->name('patient-status-toggle');

    Route::get('/biomarker', [App\Http\Controllers\User\BioMarkerController::class, 'index'])->name('biomarker');
    Route::get('/add-biomarker/{id}', [App\Http\Controllers\User\BioMarkerController::class, 'addBiomarker'])->name('biomarker-add');
    Route::post('/save-test-reports', [App\Http\Controllers\User\BioMarkerController::class, 'savetestreports'])->name('save-test-reports');
    Route::get('/view-patient/{id}', [App\Http\Controllers\User\BioMarkerController::class, 'viewPatient'])->name('view-patient');
   
    Route::get('/doctor-form', [App\Http\Controllers\User\DoctorController::class, 'index'])->name('doctor-form');
    Route::get('/doctor-add/{id}', [App\Http\Controllers\User\DoctorController::class, 'addDoctor'])->name('doctor-add');
    Route::post('/save-doctor-reports', [App\Http\Controllers\User\DoctorController::class, 'savedoctorreports'])->name('save-doctor-reports');
});
