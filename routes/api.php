<?php

use App\Http\Controllers\ContainerController;
use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use App\Http\Controllers\FlagController;
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

    Route::apiResource('flags', FlagController::class);

    // Container routes
    Route::apiResource('containers', ContainerController::class);
    Route::delete('container-device/{container_id}/{device_id}', [ContainerController::class, 'deleteContainerDevice']);
    Route::get('container-device/{container_id}', [ContainerController::class, 'getContainerDevice']);
    
    // Device routes
    Route::apiResource('devices', DeviceController::class);

    // User routes
    Route::get('show-user', [UserController::class, 'show']);
    Route::put('update-user', [UserController::class, 'update']);
    Route::put('update-user-v1', [UserController::class, 'update_v1']);
    Route::delete('delete-user', [UserController::class, 'destroy']);
});
