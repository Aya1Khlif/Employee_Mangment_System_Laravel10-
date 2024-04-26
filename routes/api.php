<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("register",[AuthController::class , "register"]);
Route::post("login",[AuthController::class , "login"]);
Route::get('protected-endpoint', [AuthController::class, 'protectedEndpoint'])->middleware('auth.jwt');
// Routes for Departments resource
Route::resource('departments', DepartmentController::class);

// Routes for Employees resource
Route::resource('employees', EmployeeController::class);

// Additional routes for Projects resource
Route::resource('projects', ProjectController::class);
