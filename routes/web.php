<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OauthController;
use Illuminate\Support\Facades\Route;

//
//
//
// Routing with ItemController
Route::get('/', [ItemController::class, 'home'])->name('home');

// Rounte login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'goLogin'])->name('login.go');

// Rounte register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'goRegister'])->name('register.go');

// Rounte forgot
Route::get('/forgot', [AuthController::class, 'forgot'])->name('forgot');
Route::post('/forgot', [AuthController::class, 'goForgot'])->name('forgot.go');

// Route logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route searching
Route::get('/searching', [ItemController::class, 'searching'])->name('items.searching');

// Route Add Data
Route::get('/add/{target}', [ItemController::class, 'add'])->name('items.add');
Route::put('/save', [ItemController::class, 'save'])->name('items.save');

// Route Update Data
Route::get('/edit/{id}/{target}', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/update/{id}', [ItemController::class, 'update'])->name('items.update');

// Route Delete Data
Route::get('/delete/{id}/{target}', [ItemController::class, 'delete'])->name('items.delete');
Route::delete('/destroy/{id}', [ItemController::class, 'destroy'])->name('items.destroy');

// GOOGLE AUTH ROUTE
Route::get('/google', [OauthController::class, 'redirectToGoogle'])->name('google');
Route::get('/google/callback', [OauthController::class, 'handleGoogleCallback'])->name('google.callback');

// GITHUB AUTH ROUTE
Route::get('/github', [OauthController::class, 'redirectToGithub'])->name('github');
Route::get('/github/callback', [OauthController::class, 'handleGithubCallback'])->name('github.callback');