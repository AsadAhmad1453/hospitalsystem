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
Route::prefix('admin')->middleware(['auth', 'role:0'])->group(function () {
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

Route::prefix('user')->middleware(['auth', 'role:1'])->group(function () { 
    Route::get('/', [UserController::class, 'index'])->name('user-dashboard');
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/', [CustomerDashboardController::class, 'index'])->name('customer-dashboard');
});