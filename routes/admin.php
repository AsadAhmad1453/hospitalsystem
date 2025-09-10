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
        Route::get('/', 'index')->name('admin-dashboard');
        Route::get('/manage-profile', 'profile')->name('manage-profile');
        Route::post('/update-profile', 'updateProfile')->name('update-profile');
    });

    Route::controller(StaffController::class)->group(function () {
        Route::post('/roles/bulk-update-permissions', 'bulkUpdatePermissions')->name('roles.bulkUpdatePermissions');
        Route::get('/staff', 'index')->name('staff');
        Route::post('/save-staff', 'savestaff')->name('save-staff');
    });

    Route::controller(UsersController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::post('/save-user', 'saveuser')->name('save-user');
        Route::get('/del-user/{id}', 'deluser')->name('del-user');
        Route::get('/roles-table/{id}', 'rolestable')->name('roles-table');
    });

    Route::controller(PatientController::class)->group(function () {
        Route::get('/patients', 'index')->name('patients');
        Route::get('/patient-info/{id}', 'patientInfo')->name('patient-info');
        Route::get('/del-patient/{id}', 'delPatient')->name('del-patient');
        Route::get('/del-all', 'delAll')->name('del-all');
    });

    Route::controller(QuestionsController::class)->group(function () {
        Route::get('/question-sections', 'index')->name('question-sections');
        Route::post('/save-section', 'saveSection')->name('save-section');
        Route::get('/delete-section/{id}', 'deleteSection')->name('del-section');
        Route::get('/questions', 'question')->name('questions');
        Route::get('/question-add', 'addQuestion')->name('question-add');
        Route::post('/save-question', 'saveQuestion')->name('save-question');
        Route::get('/delete-question/{id}', 'deleteQuestion')->name('del-question');
        Route::post('/update-question-order', 'updateQuestionOrder')->name('update-question-order');
        Route::get('/del-all-questions', 'delAllQuestions')->name('del-all-questions');
    });

    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permissions', 'index')->name('permissions');
        Route::post('/permissions', 'store')->name('save-permission');
        Route::get('/permissions/{permission}', 'destroy')->name('del-perm');
    });

    Route::controller(ServiceController::class)->group(function () {
        Route::get('/services', 'index')->name('services');
        Route::get('/add-service', 'addService')->name('add-service');
        Route::get('/edit-service/{id}', 'editService')->name('edit-service');
        Route::post('/update-service', 'updateService')->name('update-service');
        Route::post('/save-service', 'saveService')->name('save-service');
        Route::get('/delete-service/{id}', 'deleteService')->name('del-service');
        Route::get('/delete-all-services', 'deleteAllServices')->name('del-all-services');
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
        Route::get('/medicines', 'index')->name('medicines');
        Route::post('/save-medic', 'saveMedic')->name('save-medic');
        Route::get('/delete-medic/{id}', 'deleteMedic')->name('del-medic');
    });

    Route::controller(DoseController::class)->group(function () {
        Route::get('/dosage', 'index')->name('dosage');
        Route::post('/save-dose', 'saveDose')->name('save-dose');
        Route::get('/delete-dose/{id}', 'deleteDose')->name('del-dose');
    });

    Route::controller(BloodInvController::class)->group(function () {
        Route::get('/blood-investigation', 'index')->name('blood-investigation');
        Route::post('/save-blood-inv', 'saveBloodInv')->name('save-blood-inv');
        Route::get('/delete-blood-inv/{id}', 'deleteBloodInv')->name('del-blood-inv');
    });

    Route::controller(XrayController::class)->group(function () {
        Route::get('/x-rays', 'index')->name('xrays');
        Route::post('/save-xray', 'saveXray')->name('save-xray');
        Route::get('/delete-xray/{id}', 'deleteXray')->name('del-xray');
    });

    Route::controller(UltrasoundController::class)->group(function () {
        Route::get('/ultrasounds', 'index')->name('uss');
        Route::post('/save-ultrasound', 'saveUltrasound')->name('save-us');
        Route::get('/delete-ultrasound/{id}', 'deleteUltrasound')->name('del-us');
    });
    Route::controller(CtscanController::class)->group(function () {
        Route::get('/ct-scans', 'index')->name('ctscans');
        Route::post('/save-ctscan', 'save')->name('save-ctscan');
        Route::get('/delete-ctscan/{id}', 'delete')->name('del-ctscan');
    });

});
