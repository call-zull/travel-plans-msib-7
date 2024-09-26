<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelPlanController;
use App\Http\Controllers\BudgetPlanController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// jk tidak di temukan / error hendling
Route::fallback(function () {
    return view('layouts.404');
});
Auth::routes();
Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('travel-plans', TravelPlanController::class);
Route::resource('travel-plans.budget-plans', BudgetPlanController::class);

Route::get('/log-viewer', function () {
    return redirect('/log-viewer');
})->name('log-viewer');