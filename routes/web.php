<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

// Route::resources('students',StudentsController::class);
Route::resource('students', StudentsController::class)->middleware('auth');
Route::resource('offers', OffersController::class)->middleware('auth');
Route::middleware('guest')->group(function (){
    Route::get('/login', [LoginController::class, 'index'])->name('students.login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('students.login');    
});

Route::get('/logout', [LoginController::class, 'logout'])->name('students.logout')->middleware('auth');
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');    




