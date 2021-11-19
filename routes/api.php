<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterOfAppointmentController;
use App\Http\Controllers\AdminConroller;

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

Route::get('/free-appointments', [RegisterOfAppointmentController::class, 'showAllFreeAppointment']);
Route::post('/register-on-appointment', [RegisterOfAppointmentController::class, 'RegisterOnAppointment']);
Route::post('/register-on-first-appointment', [RegisterOfAppointmentController::class, 'RegisterOnFirstAppointment']);
Route::post('/resign', [RegisterOfAppointmentController::class, 'resignAppointment']);

Route::prefix('admin')->middleware(['AuthorizationToken'])->group(function(){
    Route::get('/busy-appointments', [AdminConroller::class, 'showAllBusyAppointment']);
    Route::get('/all-appointments', [AdminConroller::class, 'showAllAppointment']);
    Route::post('/add-new-appointment', [AdminConroller::class, 'addNewAppointment']);
    Route::post('/del-appointment', [AdminConroller::class, 'delAppointment']);
});


