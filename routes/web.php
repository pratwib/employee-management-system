<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    
    Route::post('/employees', [EmployeeController::class, 'create'])->name('employees.add');
    Route::get('/employees', [EmployeeController::class, 'showAll'])->name('employees');
    Route::post('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.edit');
    Route::delete('/employees/{id}', [EmployeeController::class, 'delete'])->name('employees.delete');

    Route::post('/departments', [DepartmentController::class, 'create'])->name('departments.add');
    Route::get('/departments', [DepartmentController::class, 'showAll'])->name('departments');
    Route::post('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.edit');
    Route::delete('/departments/{id}', [DepartmentController::class, 'delete'])->name('departments.delete');
 });
