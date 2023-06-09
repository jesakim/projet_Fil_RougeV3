<?php

use App\Http\Controllers\ActController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Comptabilitécontroller;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\OnlinereservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// profile routes
Route::controller(ResetPasswordController::class)->group(function () {
    Route::post('/resetpassword','resetPassword')->name('resetpassword');
    Route::get('/resetpassword','showResetPassword')->name('showresetpassword');
    Route::post('/enternewpassword','saveNewPassword')->name('savenewpassword');
    Route::get('/enternewpassword','showSaveNewPassword')->name('showsavenewpassword');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/signin','Signin')->name('Signin');
    Route::get('/signin','showSignIn')->name('showsignin');
});


Route::middleware(['logout','auth'])->group( function() {

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/profile',[UserController::class,'index'])->name('profile');
Route::put('/profile/{user}/changepass',[UserController::class,'changePassword'])->name('profile.changepassword');
Route::put('/profile/{user}/changeinfo',[UserController::class,'changeInfo'])->name('profile.changeinfo');
Route::resource('patients',PatientController::class);
Route::put('patients/{patient}/confirm',[PatientController::class,'comfirmPatient'])->name('comfirmpatient');
Route::resource('drugs',DrugController::class);
Route::resource('rendez-vous',ReservationController::class);
// Route::put('reservations/{reservation}',[ReservationController::class,'didcome'])->name('reservations.didcome');
Route::post('ordonnances/{ordonnanceId}',[OrdonnanceController::class,'downloadPdf'])->name('ordonnances.downloadPdf');
Route::get('ordonnances/{ordonnanceId}',[OrdonnanceController::class,'downloadPdf'])->name('ordonnances.downloadPdf');
Route::resource('services',ServiceController::class);
Route::resource('ordonnances',OrdonnanceController::class);
Route::resource('invoice',InvoiceController::class);
Route::resource('rendez-vous-enligne',OnlinereservationController::class);
Route::resource('Comptabilité',Comptabilitécontroller::class);
Route::resource('Acts',ActController::class);
Route::resource('payments',PaymentController::class);
Route::resource('note',NoteController::class);

Route::middleware(['isSuperAdmin'])->group( function() {
    Route::resource('assistant',AssistantController::class);
    Route::put('/assistant/activate/{user}',[AssistantController::class,'activate'])->name('assistant.activate');
});

// logout route
Route::get('/logout', [LogoutController::class,'logout'])->name('logout');

});


Route::post('/resfromlanding',[PatientController::class,'resFromLanding'])->name('resfromlanding');

// Route::get('/pdf/{ordonnance}',[OrdonnanceController::class,'downloadPdf'])->name('ordonnances.downloadPdf');
