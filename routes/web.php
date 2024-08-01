<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource("desig", DesignationController::class);
Route::get('/auth-status', function () {
    return response()->json(['authenticated' => auth()->check()]);
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource("dept", DepartmentController::class);
    Route::resource("desig", DesignationController::class); 
    Route::resource("emp", EmployeeController::class);
});


