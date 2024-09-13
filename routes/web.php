<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login');
// });
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');