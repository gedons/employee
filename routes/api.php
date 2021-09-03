<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeDataController;
use App\Http\Controllers\Api\EmployeeController;

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
 
//route to get out data for our create form
route::get('/employees/countries', [EmployeeDataController::class, 'countries']);
route::get('/employees/{country}/states', [EmployeeDataController::class, 'states']);
route::get('/employees/departments', [EmployeeDataController::class, 'departments']);
route::get('/employees/{state}/cities', [EmployeeDataController::class, 'cities']);

//route for crud operations (resource routes)
route::get('/employees', [EmployeeController::class, 'index']);
route::post('/employees', [EmployeeController::class, 'store']);
route::get('/employees/{employee}', [EmployeeController::class, 'show']);
route::put('/employees/{employee}', [EmployeeController::class, 'update']);
route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);