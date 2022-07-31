<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;

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
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');
Route::post('me', 'AuthController@me');

// Container routes
Route::get('index-container/{user_id}', 'ContainerController@index');
Route::get('show-container/{container_id}', 'ContainerController@show');
Route::post('store-container', 'ContainerController@store');
Route::put('update-container/{container_id}', 'ContainerController@update');
Route::delete('delete-container/{container_id}', 'ContainerController@delete');
Route::delete('delete-device-container/{container_id}/{device_id}', 'ContainerController@deleteDeviceController');

// Device routes
Route::get('index-device/{user_id}','DeviceController@index');
Route::get('show-device/{device_id}','DeviceController@show');
Route::post('store-device','DeviceController@store');
Route::put('update-device/{device_id}','DeviceController@update');
Route::delete('delete-device/{device_id}','DeviceController@delete');

// User routes
Route::get('index-user/{user_id}', 'UserController@index');
Route::get('show-user/{user_id}', 'UserController@show');
Route::post('store-user', 'UserController@store');
Route::put('update-user/{user_id}', 'UserController@update');
Route::delete('delete-user/{user_id}', 'UserController@delete');
