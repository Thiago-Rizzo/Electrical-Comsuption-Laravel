<?php

use App\Http\Controllers\ContainerController;
use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\UserController;

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

// Login routes
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [UserController::class, 'store']);

Route::group(['middleware' => ['apiJWT']], function () { // precisa estar Logado
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    // Container routes
    Route::apiResource('container', ContainerController::class);
    // Route::get('show-container/{id}', [ContainerController::class, 'show']);
    // Route::post('store-container', [ContainerController::class, 'store']);
    // Route::put('update-container/{id}', [ContainerController::class, 'update']);
    // Route::delete('delete-container/{id}', [ContainerController::class, 'destroy']);
    Route::delete('delete-container-device/{container_id}/{device_id}', [ContainerController::class, 'deleteDeviceContainer']);

    // Device routes
    Route::apiResource('device', DeviceController::class);
    // Route::get('show-device/{id}', [DeviceController::class, 'show']);
    // Route::post('store-device', [DeviceController::class, 'store']);
    // Route::put('update-device/{id}', [DeviceController::class, 'update']);
    // Route::delete('delete-device/{id}', [DeviceController::class, 'destroy']);

    // User routes
    Route::get('show-user', [UserController::class, 'show']);
    Route::put('update-user', [UserController::class, 'update']);
    Route::delete('delete-user', [UserController::class, 'destroy']);
});
