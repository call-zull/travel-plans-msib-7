<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelPlanController;
use App\Http\Controllers\BudgetPlanController;

Auth::routes();
Route::get('/', function () {
    return redirect('/travel-plans');
});

Route::get('/home', [TravelPlanController::class, 'index'])->name('home');
// Route::get('/home', [TravelPlanController::class, 'index'])->name('home');


Route::resource('travel-plans', TravelPlanController::class);
Route::resource('budget-plans', BudgetPlanController::class);