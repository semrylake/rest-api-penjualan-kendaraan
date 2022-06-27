<?php

use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
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

Route::controller(MotorController::class)->group(function () {
    Route::get('/motor', 'index')->name('index_Motor');
    Route::post('/storeMotor', 'store')->name('store_Motor');
    Route::get('/motor/{mesin}', 'detail')->name('detail_Motor');
    Route::put('/updateMotor/{id}', 'update')->name('update_Motor');
    Route::delete('/deleteMotor/{id}', 'destroy')->name('destroy_Motor');
});

Route::controller(MobilController::class)->group(function () {
    Route::get('/mobil', 'index')->name('index_mobil');
    Route::post('/storemobil', 'store')->name('store_mobil');
    Route::get('/mobil/{mesin}', 'detail')->name('detail_mobil');
    Route::put('/updatemobil/{id}', 'update')->name('update_mobil');
    Route::delete('/deletemobil/{id}', 'destroy')->name('destroy_mobil');
});
