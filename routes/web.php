<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
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
Route::post('/signin',[UserController::class,'Signin'])->name('Signin');
Route::get('/signin',[UserController::class,'showSignIn'])->name('showsignin');


Route::middleware(['auth'])->group( function() {

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::resource('patients',PatientController::class);
Route::resource('drugs',DrugController::class);
Route::resource('reservations',ReservationController::class);
Route::put('reservations/{reservation}',[ReservationController::class,'didcome'])->name('reservations.didcome');
Route::post('ordonnances/{ordonnance}',[OrdonnanceController::class,'downloadPdf'])->name('ordonnances.downloadPdf');
Route::resource('services',ServiceController::class);
Route::resource('ordonnances',OrdonnanceController::class);
Route::resource('invoice',InvoiceController::class);
Route::controller(UserController::class)->group(function () {
    Route::get('/logout', 'logout')->name('logout');
});
});
