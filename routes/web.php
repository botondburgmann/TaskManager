<?php

use App\Http\Controllers\TaskManagerController;
use App\Http\Controllers\UserController;
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

Route::get('/', [TaskManagerController::class, 'index']);

// Store Task To Database
Route::post('/saveItem', [TaskManagerController::class, 'store']);

// Update Task As Completed
Route::get('/completeItem/{id}', [TaskManagerController::class, 'complete']);

// Filter Completed Tasks
Route::get('/filterComplete', [TaskManagerController::class, 'filterComplete']);

// Filter Pending Tasks
Route::get('/filterPending', [TaskManagerController::class, 'filterPending']);

// Show All Tasks
Route::get('/showAll', [TaskManagerController::class, 'index']);

// Show Registration Form
Route::get('/register', [UserController::class, 'register']);

// Register User
Route::post('/users', [UserController::class, 'store']);
