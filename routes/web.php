<?php

use App\Http\Controllers\TasksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [TasksController::class, 'all'])->middleware('auth')->name('welcome');

Route::get('/task', [TasksController::class, 'index'])->middleware('auth')->name('task');
Route::post('/task', [TasksController::class, 'store'])->middleware('auth')->name('task');
Route::get('/task/{id}', [TasksController::class, 'show'])->middleware('auth')->name('task-show');
Route::patch('/task/{id}', [TasksController::class, 'update'])->middleware('auth')->name('task-update');
Route::post('/task/{id}', [TasksController::class, 'delete'])->middleware('auth')->name('task-delete');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login-post');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register-post');