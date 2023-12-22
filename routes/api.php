<?php

use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\EmployeeSalaries;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('/employee', EmployeeController::class);
Route::apiResource('/employee_salaries', EmployeeSalaries::class);
Route::apiResource('/customers', CustomerController::class);
Route::apiResource('/products', ProductsController::class);