<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PatientController;
use App\Http\Controllers\User\PatientEntryController;
use App\Http\Controllers\User\PatientReportController;
use App\Http\Controllers\User\PatientInvoiceController;
use App\Http\Controllers\User\PatientPrescriptionController;
use App\Http\Controllers\User\PatientHistoryController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\User\WeatherController;
use App\Http\Controllers\User\PastPatientsController;
use App\Http\Controllers\User\BioMarkerController;
use App\Http\Controllers\User\DataCollectorController;
use App\Http\Controllers\User\DoctorController;
use App\Http\Controllers\User\AIChatController;
use App\Http\Controllers\Website\HomePageController;
use App\Http\Controllers\Website\OpenDataCollectorController;
use App\Http\Controllers\LMS\RegisterController;
use App\Http\Controllers\Patient\PatientLoginController;
use App\Http\Controllers\Patient\PatientHomeController;
use App\Http\Controllers\Patient\PrescriptionController;
use App\Http\Controllers\Patient\AppointmentController;
use App\Http\Controllers\Patient\SleepController;
use App\Http\Controllers\Patient\LabOrderController;
use App\Http\Controllers\Patient\ElearningController;
use App\Http\Controllers\Patient\MedRepsController;
use App\Http\Controllers\Patient\BioEntryController;
use App\Http\Controllers\Patient\FitnessController;
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
// website routes

Route::get('/patient/login', [PatientLoginController::class, 'index'])->name('patient-login');
Route::post('/patient/login-post', [PatientLoginController::class, 'login'])->name('patient.login');

Route::prefix('patient')->middleware(['auth','is_patient'])->group(function () {
    Route::get('/dashboard', [PatientHomeController::class, 'index'])->name('patient-dashboard');
    Route::get('/prescription', [PrescriptionController::class, 'index'])->name('prescription');
    Route::get('/appointment-booking', [AppointmentController::class, 'index'])->name('appointment');
    Route::get('/sleep-tracker', [SleepController::class, 'index'])->name('sleep');
    Route::get('/lab-orders', [LabOrderController::class, 'index'])->name('lab-orders');
    Route::get('/elearning', [ElearningController::class, 'index'])->name('elearning');
    Route::get('/medreps', [MedRepsController::class, 'index'])->name('medreps');
    Route::get('/bio-entry', [BioEntryController::class, 'index'])->name('bio-entry');
    Route::get('/fitness', [FitnessController::class, 'index'])->name('fitness');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register-student');
});


Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/about-us', [HomePageController::class, 'about'])->name('about');
Route::get('/services', [HomePageController::class, 'services'])->name('web-services');
Route::get('/service-detail/{id}', [HomePageController::class, 'serviceDetail'])->name('service-detail');
Route::post('/save-web-req', [PatientEntryController::class, 'saveWebReq'])->name('save-web-req');
Route::get('/contact-us', [HomePageController::class, 'contact'])->name('contact');
Route::post('/query-submit', [HomePageController::class, 'querySubmit'])->name('query-submit');


Route::controller(OpenDataCollectorController::class)->group(function () {
    Route::get('/add-patient', 'addPatient')->name('open-patients');
    Route::post('/save-patient', 'savePatient')->name('save-open-patient');
    Route::get('/forms/{patient_id}', 'dataCollectorForms')->name('dc-forms');
    Route::get('/data-collector/{form_id}/{patient_id}', 'showCollectorForm')->name('open-data-collector');
    Route::post('/data-collector/submit/{form_id}', 'submitAnswers')->name('save-open-data-collector');
});

// portal routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('staff-login');
Route::post('/staff/login',[LoginController::class, 'login'])->name('staff.login');
Route::post('/staff-logout', [LoginController::class, 'logout'])->name('staff-logout');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return 'Application cache, config, route, and view cleared!';
});


Route::prefix('user')->middleware(['auth','is_user'])->group(function () {

    Route::controller(PatientEntryController::class)->group(function () {
        Route::get('/patient-entry', 'index')->name('patient-entry');
        Route::post('/save-patient', 'savepatient')->name('save-patient');
        Route::get('/add-patient', 'addPatient')->name('patient-add');
        Route::get('/edit-patient/{id}', 'editPatient')->name('patient-edit');
        Route::post('/update-patient/{id}', 'updatePatient')->name('update-patient');
        Route::get('/view-patient/{id}', 'viewPatient')->name('patient-view');
        Route::get('/delete-patient/{id}', 'deletePatient')->name('patient-delete');
        Route::get('/patient-invoice/{id}', 'invoice')->name('patient-invoice');
        Route::post('/made-payment/{id}', 'payed')->name('made-payment');
        Route::post('/patient/decline/{id}', 'paydecline')->name('pay-decline');
        Route::get('/del-patient/{id}', 'roundStatus')->name('round-status-update');
        Route::get('/past-patients', 'pastpatients')->name('past-patients');
        Route::get('/reset-token', 'delAllRounds')->name('del-all-rounds');
        Route::get('/web-reqs', 'webreqs')->name('web-reqs');
        Route::get('/app-reg', 'appReg')->name('app-reg');
        Route::get('/register-patient/{patient_id}', 'regPat')->name('register-patient');
    });

    Route::get('del-user-patient/{id}', [UserController::class, 'delPatient'])->name('del-user-patient');

    Route::controller(BioMarkerController::class)->group(function () {
        Route::get('/biomarker', 'index')->name('biomarker');
        Route::get('/add-biomarker/{id}', 'addBiomarker')->name('biomarker-add');
        Route::post('/save-test-reports', 'savetestreports')->name('save-test-reports');
        Route::get('/view-patient/{id}', 'viewPatient')->name('view-patient');
    });

    Route::controller(DoctorController::class)->group(function () {
        Route::get('/doctor-form', 'index')->name('doctor-form');
        Route::get('/doctor-add/{id}', 'addDoctor')->name('doctor-add');
        Route::post('/save-doctor-reports', 'savedoctorreports')->name('save-doctor-reports');
        Route::get('/patient-prescription/{id}', 'prescription')->name('patient-prescription');
        Route::post('/appointment-request/{id}', 'reqApp')->name('request-appointment');
        Route::post('/appointment-update/{id}', 'updateApp')->name('update-appointment');
        Route::get('/appointment-requests', 'appos')->name('appointments');
        Route::get('/del-appointment/{id}', 'delApp')->name('del-appointment');
        Route::get('/save-appointment/{id}', 'saveApp')->name('save-appointment');
        Route::get('/examine-patients', 'examinePatients')->name('examine-patients');
        Route::get('/examine-patient/{id}', 'examinePatient')->name('examine-specific-patient');
    });

    Route::controller(DataCollectorController::class)->group(function () {
        Route::get('/patients/{id}', 'patients')->name('patients-data-table');
        Route::get('/data-collector/{id}/{patientId}', 'showCollectorForm')->name('data-collector');
        Route::post('/data-collector/submit/{form_id}', 'submitAnswers')->name('save-data-collector');
        Route::post('/upload-voice', 'uploadVoice')->name('upload-voice');
    });

    Route::get('/dashboard', [UserController::class, 'index'])->name('user-dashboard');
    Route::post('/ai/ask', [AIChatController::class, 'ask']);
});
