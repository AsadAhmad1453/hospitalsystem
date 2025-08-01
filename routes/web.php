<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\User\WeatherController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\User\PatientEntryController;
use App\Http\Controllers\Admin\QuestionsController;
use App\Http\Controllers\User\DataCollectorController;
use App\Http\Controllers\User\DoctorController;
use App\Http\Controllers\User\AIChatController;
use Illuminate\Support\Facades\Artisan;
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
    Route::get('/patient-info/{id}', [App\Http\Controllers\Admin\PatientController::class, 'patientInfo'])->name('patient-info');
    Route::get('/question-sections', [QuestionsController::class, 'index'])->name('question-sections');
    Route::post('/save-section', [QuestionsController::class, 'saveSection'])->name('save-section');
    Route::get('/delete-section/{id}', [QuestionsController::class, 'deleteSection'])->name('del-section');

    Route::get('/questions', [QuestionsController::class, 'question'])->name('questions');
    Route::get('/question-add', [QuestionsController::class, 'addQuestion'])->name('question-add');
    Route::post('/save-question', [QuestionsController::class, 'saveQuestion'])->name('save-question');
    Route::get('/delete-question/{id}', [QuestionsController::class, 'deleteQuestion'])->name('del-question');
    Route::post('/update-question-order', [QuestionsController::class, 'updateQuestionOrder'])->name('update-question-order');
    Route::get('/del-all-questions', [QuestionsController::class, 'delAllQuestions'])->name('del-all-questions');


    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('save-permission');
    Route::get('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('del-perm');
    Route::post('/save-staff', [StaffController::class, 'savestaff'])->name('save-staff');
    Route::post('/save-user', [UsersController::class, 'saveuser'])->name('save-user');
    Route::get('/del-user/{id}', [UsersController::class, 'deluser'])->name('del-user');
    Route::get('/del-patient/{id}', [PatientController::class, 'delPatient'])->name('del-patient');
    Route::get('/del-all', [PatientController::class, 'delAll'])->name('del-all');

    Route::get('/roles-table/{id}', [UsersController::class, 'rolestable'])->name('roles-table');
    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    Route::post('/save-service', [ServiceController::class, 'saveService'])->name('save-service');
    Route::get('/delete-service/{id}', [ServiceController::class, 'deleteService'])->name('del-service');

    Route::get('/question-relations', [App\Http\Controllers\Admin\RelationController::class, 'index'])->name('relations');
    Route::post('/save-question-relations', [App\Http\Controllers\Admin\RelationController::class, 'saveQuestionRelations'])->name('save-question-relations');


    Route::get('/banks', [App\Http\Controllers\Admin\BankController::class, 'index'])->name('banks');
    Route::post('/save-bank', [App\Http\Controllers\Admin\BankController::class, 'saveBank'])->name('save-bank');
    Route::get('/delete-bank/{id}', [App\Http\Controllers\Admin\BankController::class, 'deleteBank'])->name('del-bank');

    Route::get('/roles', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('roles');
    Route::post('/save-role', [App\Http\Controllers\Admin\RoleController::class, 'saveRole'])->name('save-role');
    Route::get('/delete-role/{id}', [App\Http\Controllers\Admin\RoleController::class, 'deleteRole'])->name('del-role');

    Route::get('/forms', [App\Http\Controllers\Admin\FormController::class, 'index'])->name('forms');
    Route::post('/save-form', [App\Http\Controllers\Admin\FormController::class, 'saveForm'])->name('save-form');
    Route::get('/delete-form/{id}', [App\Http\Controllers\Admin\FormController::class, 'deleteForm'])->name('del-form');

    Route::get('/medicines', [App\Http\Controllers\Admin\MedicController::class, 'index'])->name('medicines');
    Route::post('/save-medic', [App\Http\Controllers\Admin\MedicController::class, 'saveMedic'])->name('save-medic');
    Route::get('/delete-medic/{id}', [App\Http\Controllers\Admin\MedicController::class, 'deleteMedic'])->name('del-medic');

    Route::get('/dosage', [App\Http\Controllers\Admin\DoseController::class, 'index'])->name('dosage');
    Route::post('/save-dose', [App\Http\Controllers\Admin\DoseController::class, 'saveDose'])->name('save-dose');
    Route::get('/delete-dose/{id}', [App\Http\Controllers\Admin\DoseController::class, 'deleteDose'])->name('del-dose');

    Route::get('/blood-investigation', [App\Http\Controllers\Admin\BloodInvController::class, 'index'])->name('blood-investigation');
    Route::post('/save-blood-inv', [App\Http\Controllers\Admin\BloodInvController::class, 'saveBloodInv'])->name('save-blood-inv');
    Route::get('/delete-blood-inv/{id}', [App\Http\Controllers\Admin\BloodInvController::class, 'deleteBloodInv'])->name('del-blood-inv');

    Route::get('/x-rays', [App\Http\Controllers\Admin\XrayController::class, 'index'])->name('xrays');
    Route::post('/save-xray', [App\Http\Controllers\Admin\XrayController::class, 'saveXray'])->name('save-xray');
    Route::get('/delete-xray/{id}', [App\Http\Controllers\Admin\XrayController::class, 'deleteXray'])->name('del-xray');

    Route::get('/ultrasounds', [App\Http\Controllers\Admin\UltrasoundController::class, 'index'])->name('uss');
    Route::post('/save-ultrasound', [App\Http\Controllers\Admin\UltrasoundController::class, 'saveUltrasound'])->name('save-us');
    Route::get('/delete-ultrasound/{id}', [App\Http\Controllers\Admin\UltrasoundController::class, 'deleteUltrasound'])->name('del-us');

    Route::get('/ct-scans', [App\Http\Controllers\Admin\CtscanController::class, 'index'])->name('ctscans');
    Route::post('/save-ctscan', [App\Http\Controllers\Admin\CtscanController::class, 'save'])->name('save-ctscan');
    Route::get('/delete-ctscan/{id}', [App\Http\Controllers\Admin\CtscanController::class, 'delete'])->name('del-ctscan');
});

Route::get('/', [App\Http\Controllers\User\LoginController::class, 'showLoginForm'])->name('staff-login');
Route::post('/staff/login',[App\Http\Controllers\User\LoginController::class, 'login'])->name('staff.login');
Route::post('/staff-logout', [App\Http\Controllers\User\LoginController::class, 'logout'])->name('staff-logout');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return 'Application cache, config, route, and view cleared!';
});
Route::prefix('user')->middleware(['auth','is_user'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user-dashboard');
    Route::get('/patient-entry', [App\Http\Controllers\User\PatientEntryController::class, 'index'])->name('patient-entry');
    Route::get('/past-patients', [App\Http\Controllers\User\PastPatientsController::class, 'index'])->name('past-patients');
    Route::post('/save-patient', [App\Http\Controllers\User\PatientEntryController::class, 'savepatient'])->name('save-patient');
    Route::get('/add-patient', [App\Http\Controllers\User\PatientEntryController::class, 'addPatient'])->name('patient-add');
    Route::get('/edit-patient/{id}', [App\Http\Controllers\User\PatientEntryController::class, 'editPatient'])->name('patient-edit');
    Route::post('/update-patient/{id}', [App\Http\Controllers\User\PatientEntryController::class, 'updatePatient'])->name('update-patient');
    Route::get('/view-patient/{id}', [App\Http\Controllers\User\PatientEntryController::class, 'viewPatient'])->name('patient-view');
    Route::get('/delete-patient/{id}', [App\Http\Controllers\User\PatientEntryController::class, 'deletePatient'])->name('patient-delete');
    Route::get('patient-status-toggle', [App\Http\Controllers\User\PatientEntryController::class, 'patientStatusToggle'])->name('patient-status-toggle');
    Route::get('/patient-invoice/{id}', [App\Http\Controllers\User\PatientEntryController::class, 'invoice'])->name('patient-invoice');
    Route::post('/made-payment/{id}', [App\Http\Controllers\User\PatientEntryController::class, 'payed'])->name('made-payment');
    Route::post('/patient/decline/{id}', [PatientEntryController::class, 'paydecline'])->name('pay-decline');
    Route::get('/del-patient/{id}', [App\Http\Controllers\User\PatientEntryController::class, 'roundStatus'])->name('round-status-update');
    Route::get('/reset-token', [App\Http\Controllers\User\PatientEntryController::class, 'delAllRounds'])->name('del-all-rounds');
    Route::get('del-user-patient/{id}', [UserController::class, 'delPatient'])->name('del-user-patient');

    Route::get('/biomarker', [App\Http\Controllers\User\BioMarkerController::class, 'index'])->name('biomarker');
    Route::get('/add-biomarker/{id}', [App\Http\Controllers\User\BioMarkerController::class, 'addBiomarker'])->name('biomarker-add');
    Route::post('/save-test-reports', [App\Http\Controllers\User\BioMarkerController::class, 'savetestreports'])->name('save-test-reports');
    Route::get('/view-patient/{id}', [App\Http\Controllers\User\BioMarkerController::class, 'viewPatient'])->name('view-patient');

    Route::get('/doctor-form', [App\Http\Controllers\User\DoctorController::class, 'index'])->name('doctor-form');
    Route::get('/doctor-add/{id}', [App\Http\Controllers\User\DoctorController::class, 'addDoctor'])->name('doctor-add');
    Route::post('/save-doctor-reports', [App\Http\Controllers\User\DoctorController::class, 'savedoctorreports'])->name('save-doctor-reports');
    Route::get('/patient-prescription/{id}', [DoctorController::class, 'prescription'])->name('patient-prescription');
    Route::post('/appointment-request/{id}', [DoctorController::class, 'reqApp'])->name('request-appointment');
    Route::post('/appointment-update/{id}', [DoctorController::class, 'updateApp'])->name('update-appointment');
    Route::get('/appointment-requests', [DoctorController::class, 'appos'])->name('appointments');
    Route::get('/del-appointment/{id}', [DoctorController::class, 'delApp'])->name('del-appointment');
    Route::get('/save-appointment/{id}', [DoctorController::class, 'saveApp'])->name('save-appointment');
    Route::get('/examine-patients', [App\Http\Controllers\User\DoctorController::class, 'examinePatients'])->name('examine-patients');
    Route::get('/examine-patient/{id}', [App\Http\Controllers\User\DoctorController::class, 'examinePatient'])->name('examine-specific-patient');


    Route::get('/patients/{id}', [DataCollectorController::class, 'patients'])->name('patients-data-table');
    Route::get('/data-collector/{id}/{patientId}', [DataCollectorController::class, 'showCollectorForm'])->name('data-collector');
    Route::post('/data-collector/submit/{form_id}', [DataCollectorController::class, 'submitAnswers'])->name('save-data-collector');
    Route::post('/upload-voice', [DataCollectorController::class, 'uploadVoice'])->name('upload-voice');



    Route::post('/ai/ask', [AIChatController::class, 'ask']);

});
