<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelPlanController;
use App\Http\Controllers\BudgetPlanController;

Auth::routes();
Route::get('/', function () {
    return redirect('/travel-plans');
});

// Route::resource('home', TravelPlanController::class);
// Route::get('/home', [TravelPlanController::class, 'index'])->name('home');


Route::resource('travel-plans', TravelPlanController::class);
Route::resource('travel-plans.budget-plans', BudgetPlanController::class);
