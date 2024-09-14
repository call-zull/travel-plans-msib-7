<?php

namespace App\Http\Controllers;

use App\Models\BudgetPlan;
use App\Models\TravelPlan;
use Illuminate\Http\Request;

class BudgetPlanController extends Controller
{
    public function index(TravelPlan $travelPlan)
    {
        $budgetPlans = $travelPlan->budgetPlans;
        $totalBudget = $budgetPlans->sum('total');
        return view('budget_plans.index', compact('budgetPlans', 'travelPlan', 'totalBudget'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'travel_plan_id' => 'required|exists:travel_plans,id',
            'item' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'total' => 'required|numeric',
        ]);

        BudgetPlan::create($request->all());

        return redirect()->route('budget-plans.index');
    }
}