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

<<<<<<< HEAD
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Login routes
Route::post('auth/login', '\App\Http\Controllers\AuthController@login');

// Container routes
Route::get('index-container/{user_id}', '\App\Http\Controllers\ContainerController@index');
Route::get('show-container/{container_id}', '\App\Http\Controllers\ContainerController@show');
Route::post('store-container', '\App\Http\Controllers\ContainerController@store');
Route::put('update-container/{container_id}', '\App\Http\Controllers\ContainerController@update');
Route::delete('delete-container/{container_id}', '\App\Http\Controllers\ContainerController@delete');
Route::delete('delete-device-container/{container_id}/{device_id}', '\App\Http\Controllers\ContainerController@deleteDeviceController');

// Device routes
Route::get('index-device/{user_id}','\App\Http\Controllers\DeviceController@index');
Route::get('show-device/{device_id}','\App\Http\Controllers\DeviceController@show');
Route::post('store-device','\App\Http\Controllers\DeviceController@store');
Route::put('update-device/{device_id}','\App\Http\Controllers\DeviceController@update');
Route::delete('delete-device/{device_id}','\App\Http\Controllers\DeviceController@delete');

// User routes
Route::get('index-user/{user_id}', '\App\Http\Controllers\UserController@index');
Route::get('show-user/{user_id}', '\App\Http\Controllers\UserController@show');
Route::post('store-user', '\App\Http\Controllers\UserController@store');
Route::put('update-user/{user_id}', '\App\Http\Controllers\UserController@update');
Route::delete('delete-user/{user_id}', '\App\Http\Controllers\UserController@delete');
=======
// Route::apiResource('');

>>>>>>> 5484456e46ee74e931d8a5ced005cb3fae1bd66c
