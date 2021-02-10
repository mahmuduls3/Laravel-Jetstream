<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Customer\CustomerController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:Admin', 'as' => 'admin.'], function(){
        Route::resource('adminPanel', AdminController::class);
    });
    Route::group(['middleware' => 'role:Employee', 'as' => 'employee.'], function(){
        Route::resource('employeePanel', EmployeeController::class);
    });
    Route::group(['middleware' => 'role:Customer', 'as' => 'customer.'], function(){
        Route::resource('customerPanel', CustomerController::class);
    });
});

