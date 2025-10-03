<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminDashboardController,
    StaffController,
    UsersController,
    PatientController,
    PermissionController,
    ServiceController,
    QuestionsController,
    RoleController,
    RelationController,
    BankController,
    FormController,
    MedicController,
    DoseController,
    BloodInvController,
    XrayController,
    UltrasoundController,
    CtscanController
};
use App\Http\Controllers\Auth\LoginController;


// Place all your admin routes here.
Route::get('/admin/login', [LoginController::class, 'adminLoginForm'])->name('admin-login');
Route::post('/admin/authenticating',[LoginController::class, 'login'])->name('admin.login');

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::controller(AdminDashboardController::class)->group(function () {
        // Route::get('/', 'indexNew')->name('admin-dashboard'); 
        // Route::get('/old-dashboard', 'index')->name('admin-old-dashboard'); // Keep old dashboard accessible
        // Route::get('/manage-profile', 'profileNew')->name('manage-profile'); // Redirect to new profile
        // Route::post('/update-profile', 'updateProfileNew')->name('update-profile');
        // New admin panel routes
        Route::get('/admin-new/dashboard', 'indexNew')->name('admin-new.dashboard');
        Route::get('/admin-new/profile', 'profileNew')->name('admin-new.profile');
        Route::post('/admin-new/update-profile', 'updateProfileNew')->name('admin-new.update-profile');
        Route::post('/admin-new/change-password', 'changePassword')->name('admin-new.change-password');
        Route::post('/admin-new/upload-profile-image', 'uploadProfileImage')->name('admin-new.upload-profile-image');
    });

    Route::controller(StaffController::class)->group(function () {
        Route::post('/roles/bulk-update-permissions', 'bulkUpdatePermissions')->name('roles.bulkUpdatePermissions');
        Route::get('/staff', 'index')->name('staff');
        Route::post('/save-staff', 'savestaff')->name('save-staff');
    });

    Route::controller(UsersController::class)->group(function () {
        // Route::get('/users', 'index')->name('users');
        // Route::post('/save-user', 'saveuser')->name('save-user');
        // Route::get('/del-user/{id}', 'deluser')->name('del-user');
        // Route::get('/roles-table/{id}', 'rolestable')->name('roles-table');
        // New admin panel routes
        Route::get('/admin-new/users', 'indexNew')->name('admin-new.users');
        Route::get('/admin-new/users/add', 'addUserNew')->name('admin-new.add-user');
        Route::post('/admin-new/save-user', 'saveuserNew')->name('admin-new.save-user');
        Route::get('/admin-new/users/{id}', 'showNew')->name('admin-new.users.show');
        Route::put('/admin-new/users/{id}', 'updateNew')->name('admin-new.users.update');
        Route::get('/admin-new/del-user/{id}', 'deluserNew')->name('admin-new.del-user');
        Route::get('/admin-new/roles-table/{id}', 'rolestableNew')->name('admin-new.roles-table');
    });

    Route::controller(PatientController::class)->group(function () {
        // Route::get('/patients', 'index')->name('patients');
        // Route::get('/patient-info/{id}', 'patientInfo')->name('patient-info');
        // Route::get('/del-patient/{id}', 'delPatient')->name('del-patient');
        // Route::get('/del-all', 'delAll')->name('del-all');
        // New admin panel routes
        Route::get('/admin-new/patients', 'indexNew')->name('admin-new.patients');
        Route::get('/admin-new/patient-info/{id}', 'patientInfoNew')->name('admin-new.patient-info');
        Route::get('/admin-new/patient-full-report/{id}', 'patientFullReport')->name('admin-new.patient-full-report');
        Route::get('/admin-new/del-patient/{id}', 'delPatientNew')->name('admin-new.del-patient');
        Route::get('/admin-new/del-all', 'delAllNew')->name('admin-new.del-all');
    });

    // Route::controller(QuestionsController::class)->group(function () {
    //     Route::get('/question-sections', 'index')->name('question-sections');
    //     Route::post('/save-section', 'saveSection')->name('save-section');
    //     Route::get('/delete-section/{id}', 'deleteSection')->name('del-section');
    //     Route::get('/questions', 'question')->name('questions');
    //     Route::get('/question-add', 'addQuestion')->name('question-add');
    //     Route::post('/save-question', 'saveQuestion')->name('save-question');
    //     Route::get('/delete-question/{id}', 'deleteQuestion')->name('del-question');
    //     Route::post('/update-question-order', 'updateQuestionOrder')->name('update-question-order');
    //     Route::get('/del-all-questions', 'delAllQuestions')->name('del-all-questions');
    // });

    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permissions', 'index')->name('permissions');
        Route::post('/permissions', 'store')->name('save-permission');
        Route::get('/permissions/{permission}', 'destroy')->name('del-perm');
    });

    Route::controller(ServiceController::class)->group(function () {
        // New admin panel routes
        Route::get('/admin-new/services', 'indexNew')->name('admin-new.services');
        Route::post('/admin-new/save-service', 'saveServiceNew')->name('admin-new.save-service');
        Route::post('/admin-new/update-service', 'updateServiceNew')->name('admin-new.update-service');
        Route::get('/admin-new/delete-service/{id}', 'deleteServiceNew')->name('admin-new.del-service');
    });

    Route::controller(RelationController::class)->group(function () {
        Route::get('/question-relations', 'index')->name('relations');
        Route::post('/save-question-relations', 'saveQuestionRelations')->name('save-question-relations');
    });

    Route::controller(BankController::class)->group(function () {
        Route::get('/banks', 'index')->name('banks');
        Route::post('/save-bank', 'saveBank')->name('save-bank');
        Route::get('/delete-bank/{id}', 'deleteBank')->name('del-bank');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/roles', 'index')->name('roles');
        Route::post('/save-role', 'saveRole')->name('save-role');
        Route::get('/delete-role/{id}', 'deleteRole')->name('del-role');
    });

    Route::controller(FormController::class)->group(function () {
        Route::get('/forms', 'index')->name('forms');
        Route::post('/save-form', 'saveForm')->name('save-form');
        Route::get('/delete-form/{id}', 'deleteForm')->name('del-form');
    });

    Route::controller(MedicController::class)->group(function () {
        // Route::get('/medicines', 'index')->name('medicines');
        // Route::post('/save-medic', 'saveMedic')->name('save-medic');
        // Route::get('/delete-medic/{id}', 'deleteMedic')->name('del-medic');
        // New admin panel routes
        Route::get('/admin-new/medicines', 'indexNew')->name('admin-new.medicines');
        Route::get('/admin-new/medicines/add', 'addMedicineNew')->name('admin-new.add-medicine');
        Route::post('/admin-new/save-medic', 'saveMedicNew')->name('admin-new.save-medic');
        Route::get('/admin-new/delete-medic/{id}', 'deleteMedicNew')->name('admin-new.del-medic');
    });

    Route::controller(DoseController::class)->group(function () {
        Route::get('/dosage', 'index')->name('dosage');
        Route::post('/save-dose', 'saveDose')->name('save-dose');
        Route::get('/delete-dose/{id}', 'deleteDose')->name('del-dose');
    });

    Route::controller(BloodInvController::class)->group(function () {
        // Route::get('/blood-investigation', 'index')->name('blood-investigation');
        // Route::post('/save-blood-inv', 'saveBloodInv')->name('save-blood-inv');
        // Route::get('/delete-blood-inv/{id}', 'deleteBloodInv')->name('del-blood-inv');
        // New admin panel routes
        Route::get('/admin-new/blood-investigation', 'indexNew')->name('admin-new.blood-investigation');
        Route::get('/admin-new/blood-investigation/add', 'addBloodTestNew')->name('admin-new.add-blood-test');
        Route::post('/admin-new/save-blood-inv', 'saveBloodInvNew')->name('admin-new.save-blood-inv');
        Route::get('/admin-new/delete-blood-inv/{id}', 'deleteBloodInvNew')->name('admin-new.del-blood-inv');
    });

    Route::controller(XrayController::class)->group(function () {
        // Route::get('/x-rays', 'index')->name('xrays');
        // Route::post('/save-xray', 'saveXray')->name('save-xray');
        // Route::get('/delete-xray/{id}', 'deleteXray')->name('del-xray');
        // New admin panel routes
        Route::get('/admin-new/x-rays', 'indexNew')->name('admin-new.xrays');
        Route::post('/admin-new/save-xray', 'saveXrayNew')->name('admin-new.save-xray');
        Route::get('/admin-new/delete-xray/{id}', 'deleteXrayNew')->name('admin-new.del-xray');
    });

    Route::controller(UltrasoundController::class)->group(function () {
        // Route::get('/ultrasounds', 'index')->name('uss');
        // Route::post('/save-ultrasound', 'saveUltrasound')->name('save-us');
        // Route::get('/delete-ultrasound/{id}', 'deleteUltrasound')->name('del-us');
        // New admin panel routes
        Route::get('/admin-new/ultrasounds', 'indexNew')->name('admin-new.uss');
        Route::post('/admin-new/save-ultrasound', 'saveUltrasoundNew')->name('admin-new.save-us');
        Route::get('/admin-new/delete-ultrasound/{id}', 'deleteUltrasoundNew')->name('admin-new.del-us');
    });

    Route::controller(DoseController::class)->group(function () {
        // Route::get('/dosage', 'index')->name('dosage');
        // Route::post('/save-dose', 'saveDose')->name('save-dose');
        // Route::get('/delete-dose/{id}', 'deleteDose')->name('del-dose');
        // New admin panel routes
        Route::get('/admin-new/dosage', 'indexNew')->name('admin-new.dosage');
        Route::post('/admin-new/save-dose', 'saveDoseNew')->name('admin-new.save-dose');
        Route::get('/admin-new/delete-dose/{id}', 'deleteDoseNew')->name('admin-new.del-dose');
    });

    Route::controller(BankController::class)->group(function () {
        // Route::get('/banks', 'index')->name('banks');
        // Route::post('/save-bank', 'saveBank')->name('save-bank');
        // Route::get('/delete-bank/{id}', 'deleteBank')->name('del-bank');
        // New admin panel routes
        Route::get('/admin-new/banks', 'indexNew')->name('admin-new.banks');
        Route::post('/admin-new/save-bank', 'saveBankNew')->name('admin-new.save-bank');
        Route::get('/admin-new/delete-bank/{id}', 'deleteBankNew')->name('admin-new.del-bank');
    });

    Route::controller(CtscanController::class)->group(function () {
        // Route::get('/ct-scans', 'index')->name('ctscans');
        // Route::post('/save-ctscan', 'save')->name('save-ctscan');
        // Route::get('/delete-ctscan/{id}', 'delete')->name('del-ctscan');
        // New admin panel routes
        Route::get('/admin-new/ct-scans', 'indexNew')->name('admin-new.ctscans');
        Route::post('/admin-new/save-ctscan', 'saveNew')->name('admin-new.save-ctscan');
        Route::get('/admin-new/delete-ctscan/{id}', 'deleteNew')->name('admin-new.del-ctscan');
    });

    // Additional new admin panel routes
    Route::controller(FormController::class)->group(function () {
        Route::get('/admin-new/forms', 'indexNew')->name('admin-new.forms');
        Route::post('/admin-new/save-form', 'saveFormNew')->name('admin-new.save-form');
        Route::get('/admin-new/delete-form/{id}', 'deleteFormNew')->name('admin-new.del-form');
    });

    Route::controller(QuestionsController::class)->group(function () {
        Route::get('/admin-new/questions', 'questionNew')->name('admin-new.questions');
        Route::get('/admin-new/questions/add', 'addQuestionNew')->name('admin-new.add-question');
        Route::post('/admin-new/save-question', 'saveQuestionNew')->name('admin-new.save-question');
        Route::get('/admin-new/delete-question/{id}', 'deleteQuestionNew')->name('admin-new.del-question');
        Route::get('/admin-new/question-sections', 'indexNew')->name('admin-new.question-sections');
        Route::post('/admin-new/save-section', 'saveSectionNew')->name('admin-new.save-section');
        Route::get('/admin-new/delete-section/{id}', 'deleteSection')->name('admin-new.del-section');
    });

    Route::controller(RelationController::class)->group(function () {
        Route::get('/admin-new/relations', 'indexNew')->name('admin-new.relations');
        Route::get('/admin-new/relations/add', 'addRelationNew')->name('admin-new.add-relation');
        Route::post('/admin-new/save-question-relations', 'saveQuestionRelationsNew')->name('admin-new.save-question-relations');
        Route::get('/admin-new/get-question-options/{id}', 'getQuestionOptions')->name('admin-new.get-question-options');
        Route::get('/admin-new/get-question-relations/{id}', 'getQuestionRelations')->name('admin-new.get-question-relations');
        Route::delete('/admin-new/delete-all-relations/{id}', 'deleteAllRelations')->name('admin-new.delete-all-relations');
    });

    Route::controller(StaffController::class)->group(function () {
        Route::get('/admin-new/staff', 'indexNew')->name('admin-new.staff');
        Route::get('/admin-new/staff/select-role/{id}', 'selectRoleNew')->name('admin-new.select-role');
        Route::get('/admin-new/roles/{id}', 'getRole')->name('admin-new.get-role');
        Route::put('/admin-new/roles/{id}', 'updateRoleNew')->name('admin-new.update-role');
        Route::delete('/admin-new/roles/{id}', 'deleteRoleNew')->name('admin-new.delete-role');
        Route::get('/admin-new/users/{id}/permissions', 'getUserPermissions')->name('admin-new.get-user-permissions');
        Route::post('/admin-new/save-staff', 'savestaffNew')->name('admin-new.save-staff');
        Route::post('/admin-new/assign-permissions/{id}', 'assignPermissionsNew')->name('admin-new.assign-permissions');
        Route::post('/admin-new/assign-role-to-user', 'assignRoleToUserNew')->name('admin-new.assign-role-to-user');
        Route::post('/admin-new/remove-role-from-user', 'removeRoleFromUserNew')->name('admin-new.remove-role-from-user');
    });



    // Settings Routes
    Route::get('/admin-new/settings', 'App\Http\Controllers\Admin\SettingsController@index')->name('admin-new.settings');
    Route::post('/admin/settings/save', 'App\Http\Controllers\Admin\SettingsController@saveSettings')->name('admin.settings.save');
    Route::post('/admin/settings/test-email', 'App\Http\Controllers\Admin\SettingsController@testEmail')->name('admin.settings.test-email');
    Route::post('/admin/settings/create-backup', 'App\Http\Controllers\Admin\SettingsController@createBackup')->name('admin.settings.create-backup');
    Route::post('/admin/settings/clear-cache', 'App\Http\Controllers\Admin\SettingsController@clearCache')->name('admin.settings.clear-cache');
    Route::post('/admin/settings/optimize-database', 'App\Http\Controllers\Admin\SettingsController@optimizeDatabase')->name('admin.settings.optimize-database');
    Route::get('/admin/settings/backups', 'App\Http\Controllers\Admin\SettingsController@getBackups')->name('admin.settings.backups');
    Route::get('/admin/settings/download-backup/{filename}', 'App\Http\Controllers\Admin\SettingsController@downloadBackup')->name('admin.settings.download-backup');

    // Test Charts Route
    Route::get('/admin-new/test-charts', function() {
        return view('admin-new.test-charts');
    })->name('admin-new.test-charts');

    // Chart Data API Routes
    Route::prefix('admin-new/api')->group(function () {
        Route::get('/patient-statistics', [App\Http\Controllers\Admin\ChartDataController::class, 'getPatientStatistics'])->name('admin-new.api.patient-statistics');
        Route::get('/patient-trends', [App\Http\Controllers\Admin\ChartDataController::class, 'getPatientTrends'])->name('admin-new.api.patient-trends');
        Route::get('/revenue-breakdown', [App\Http\Controllers\Admin\ChartDataController::class, 'getRevenueBreakdown'])->name('admin-new.api.revenue-breakdown');
        Route::get('/patient-demographics', [App\Http\Controllers\Admin\ChartDataController::class, 'getPatientDemographics'])->name('admin-new.api.patient-demographics');
        Route::get('/department-performance', [App\Http\Controllers\Admin\ChartDataController::class, 'getDepartmentPerformance'])->name('admin-new.api.department-performance');
        Route::get('/real-time-stats', [App\Http\Controllers\Admin\ChartDataController::class, 'getRealTimeStats'])->name('admin-new.api.real-time-stats');
    });

});
