<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Mobile app api
Route::post('/v1/auth/login', [App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('/v1/auth/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
Route::post('/v1/auth/register', [App\Http\Controllers\API\AuthController::class, 'registration']);
Route::get('/v1/auth/request/otp', [App\Http\Controllers\API\AuthController::class, 'getOTP']);
Route::post('/v1/auth/verify', [App\Http\Controllers\API\AuthController::class, 'verifyAccount']);
Route::get('/v1/user', [App\Http\Controllers\API\AuthController::class, 'userData'])->middleware(['auth', 'is_verify_email']);


Route::post('/v1/update/password', [App\Http\Controllers\API\AuthController::class, 'updatePassword']);
Route::post('/v1/update/phonenumber', [App\Http\Controllers\API\AuthController::class, 'updatePhone']);
Route::post('/v1/update/email', [App\Http\Controllers\API\AuthController::class, 'updateEmail']);

Route::get('/v1/vend/history', [App\Http\Controllers\API\MobileController::class, 'vendHistory']);
Route::get('/v1/vending/details', [App\Http\Controllers\API\MobileController::class, 'VendingDetails']);
Route::get('/v1/pay/history', [App\Http\Controllers\API\MobileController::class, 'payHistory']);


Route::get('/v1/transaction', [App\Http\Controllers\API\MobileController::class, 'Transactions']);
Route::get('/v1/notification', [App\Http\Controllers\API\MobileController::class, 'Notification']);


Route::post('/v1/book/visitor', [App\Http\Controllers\API\MobileController::class, 'BookVisit']);
Route::get('/v1/visit/history', [App\Http\Controllers\API\MobileController::class, 'GetVisits']);

Route::post('/v1/submit/request', [App\Http\Controllers\API\MobileController::class, 'SubmitRequest']);
Route::get('/v1/get/request', [App\Http\Controllers\API\MobileController::class, 'GetRequest']);
Route::get('/v1/request/details', [App\Http\Controllers\API\MobileController::class, 'RequestDetails']);


Route::post('/v1/emergency/alert', [App\Http\Controllers\API\MobileController::class, 'emergencyAlert']);
Route::post('/v1/emergency/contact', [App\Http\Controllers\API\MobileController::class, 'postEmergencyContact']);
Route::get('/v1/emergency/contact', [App\Http\Controllers\API\MobileController::class, 'getEmergencyContact']);
Route::post('/v1/emergency/delete', [App\Http\Controllers\API\MobileController::class, 'deleteEmergencyContact']);

Route::post('/v1/book/space', [App\Http\Controllers\API\MobileController::class, 'BookSpace']);
Route::get('/v1/get/bookings', [App\Http\Controllers\API\MobileController::class, 'BookingHistory']);
Route::get('/v1/booking/details', [App\Http\Controllers\API\MobileController::class, 'BookingDetails']);
Route::get('/v1/load/venue', [App\Http\Controllers\API\MobileController::class, 'LoadSpace']);
Route::get('/v1/available/date', [App\Http\Controllers\API\MobileController::class, 'availablespace']);