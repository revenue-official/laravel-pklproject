<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [AppController::class, 'app'])->name('app');
Route::fallback(fn() => view('404'))->name('notfound');

Route::get('/home', [HomeController::class, 'proCard'])->name('app');