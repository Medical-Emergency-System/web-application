<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\EmergencyStatusController;
use App\Http\Controllers\Voyager\OrderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



//Emergency Status APIs
Route :: get('/getEmergencyStatus',  [EmergencyStatusController :: class, 'getEmergencyStatus']);
Route :: get('/getEmergencyStatusInstructions/{emergency_status_id}',  [EmergencyStatusController :: class, 'getEmergencyStatusInstructions']);
Route :: post('/getInstructionChilds',  [EmergencyStatusController :: class, 'getInstructionChilds']);


//Profile APIs

Route :: get('/getProfileInfo/{patient_id}',  [ProfileController :: class, 'getProfileInfo']);
Route :: post('/updateProfileInfo/{patient_id}',  [ProfileController :: class, 'updateProfileInfo']);


Route::post('sendOrder', [OrderController::class, 'sendOrder'])->name('sendOrder');





