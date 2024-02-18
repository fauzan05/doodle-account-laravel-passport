<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function() {
    Route::post('/todos', [TodoController::class, 'store']);
    Route::get('/todos', [TodoController::class, 'index']);
    Route::get('/categories', [CategoryController::class, 'index']);
    
    Route::get('/developer', [DeveloperController::class, 'index']);
});


