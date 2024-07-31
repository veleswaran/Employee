<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("dept",DepartmentController::class);
Route::resource("desig",DesignationController::class);
Route::resource("emp",EmployeeController::class);