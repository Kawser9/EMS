<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\DepartmentController;
use App\Http\Controllers\backend\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/admin-login',[DashboardController::class,'adminLogin'])->name('admin.login');
Route::post('/admin-do-login',[DashboardController::class,'adminDoLogin'])->name('admin.do.login');

Route::group(['prefix'=>'admin','middleware'=>'admin'], function(){

    Route::get('/logout',[DashboardController::class,'logout'])->name('admin.logout');

    Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');



    Route::get('/employee-list',[EmployeeController::class,'index'])->name('employee.list');
    Route::get('/employee-create',[EmployeeController::class,'create'])->name('employee.create');
    Route::post('/employee-store',[EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee-edit/{id}',[EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employee-update/{id}',[EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/employee-delete/{id}',[EmployeeController::class, 'delete'])->name('employee.delete');

    Route::get('/department-list',[DepartmentController::class, 'index'])->name('department.list');
    Route::get('/department-create',[DepartmentController::class, 'create'])->name('department.create');
    Route::post('/department-store',[DepartmentController::class, 'store'])->name('department.store');
    Route::get('/department-edit/{id}',[DepartmentController::class, 'edit'])->name('department.edit');
    Route::put('/department-update/{id}',[DepartmentController::class, 'update'])->name('department.update');
    Route::get('/department-delete/{id}',[DepartmentController::class, 'delete'])->name('department.delete');
});
