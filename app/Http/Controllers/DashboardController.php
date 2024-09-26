<?php

namespace App\Http\Controllers;

use App\Models\TravelPlan;
use App\Models\BudgetPlan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Dapatkan user ID yang sedang login
        $userId = auth()->id();

        // Hitung jumlah travel plan dan budget plan berdasarkan user ID
        $totalTravelPlans = TravelPlan::where('user_id', $userId)->count();
        $totalBudgetPlans = BudgetPlan::whereHas('travelPlan', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        // Kirim data ke view
        return view('dashboard', compact('totalTravelPlans', 'totalBudgetPlans'));
    }
}