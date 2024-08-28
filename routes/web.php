<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLocationController;
use App\Http\Controllers\Voyager\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('getUserLocation', [UserLocationController::class, 'index'])->name('userLocation.index');
Route::get('/userLocation', [UserLocationController::class, 'userLocation'])->name('userLocation');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('acceptOrder/{id}', [OrderController::class, 'acceptOrder'])->name('acceptOrder');
});




// PWA Routes

Route::get('/', function () {
    return view('Login');
});

Route::post('/login',[App\Http\Controllers\PWA\AuthController::class, 'login'])->name('login');
Route::get('/logout',[App\Http\Controllers\PWA\AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'Auth'], function () {
Route::get('/register',[App\Http\Controllers\StatusController::class, 'register'])->name('StatusController.register');
Route::get('/profile',[App\Http\Controllers\StatusController::class, 'profile'])->name('StatusController.profile');

Route::get('/emergencyStatus',[App\Http\Controllers\PWA\EmergencyStatusController::class, 'getEmergencyStatus'])->name('index');
Route::get('/statusDetails/{statusID}',[App\Http\Controllers\PWA\EmergencyStatusController::class, 'getEmergencyStatusDetails'])->name('statusDetails');
Route::get('/instructions/{emergency_status_id}',[App\Http\Controllers\PWA\EmergencyStatusController::class, 'getEmergencyStatusInstructions'])->name('getEmergencyStatusInstructions');


Route::get('/patient',[App\Http\Controllers\StatusController::class, 'register_patient'])->name('StatusController.register_patient');

Route::get('/answers',[App\Http\Controllers\StatusController::class, 'update'])->name('StatusController.update');;
Route::get('/answers1',[App\Http\Controllers\StatusController::class, 'update1'])->name('StatusController.update1');;

Route::get('/generate',[App\Http\Controllers\StatusController::class, 'create']);
Route::get('/emergencynumbers',[App\Http\Controllers\StatusController::class, 'emergencyNumbers'])->name('StatusController.emergencyNumbers');
Route::get('/contact',[App\Http\Controllers\StatusController::class, 'contact'])->name('StatusController.contact');
Route::get('/about',[App\Http\Controllers\StatusController::class, 'about'])->name('StatusController.about');

});

