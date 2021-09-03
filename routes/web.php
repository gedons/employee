<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\ChangePasswordController;
use App\Http\Controllers\dashboard\CountryController;
use App\Http\Controllers\dashboard\StateController;
use App\Http\Controllers\dashboard\CityController;
use App\Http\Controllers\dashboard\DepartmentController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Home Routes
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.index');


//user management (Resource route)
Route::resource('users', UserController::class);

//chanage user password
Route::post('users/{user}/change-password', [ChangePasswordController::class, 'changePassword'])->name('users.changePassword');


//system management (Resource route)
Route::resource('countries', CountryController::class);
Route::resource('states', StateController::class);
Route::resource('cities', CityController::class);
Route::resource('departments', DepartmentController::class);

//employee management
Route::get('{any}', function() {
    return view('dashboard.employees.index');
})->where('any', '.*');

