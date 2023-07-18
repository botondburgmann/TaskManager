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
Route::post('/saveItem', [TaskManagerController::class, 'store'])->middleware('auth');

// Update Task As Completed
Route::get('/completeItem/{id}', [TaskManagerController::class, 'complete'])->middleware('auth');

// Filter Completed Tasks
Route::get('/filterComplete', [TaskManagerController::class, 'filterComplete'])->middleware('auth');

// Filter Pending Tasks
Route::get('/filterPending', [TaskManagerController::class, 'filterPending'])->middleware('auth');

// Show All Tasks
Route::get('/showAll', [TaskManagerController::class, 'index'])->middleware('auth');

// Show Edit Form
Route::get('/editItem/{listItem}', [TaskManagerController::class, 'edit'])->middleware('auth');

// Update Task
Route::put('/saveItem/{listItem}', [TaskManagerController::class, 'update'])->middleware('auth');

// Show Registration Form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

// Register User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenicate', [UserController::class, 'authenicate']);
