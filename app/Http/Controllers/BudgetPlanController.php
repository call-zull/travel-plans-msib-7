<?php

namespace App\Http\Controllers;

use App\Models\BudgetPlan;
use App\Models\TravelPlan;
use Illuminate\Http\Request;

class BudgetPlanController extends Controller
{
    public function index(Request $request)
    {
        $travel_plan_id = $request->input('travel_plan_id');

        $budgetPlans = BudgetPlan::where('travel_plan_id', $travel_plan_id)->get();

        foreach ($budgetPlans as $budgetPlan) {
            $budgetPlan->total = $budgetPlan->price * $budgetPlan->quantity;
        }

        return view('budget_plans.index', compact('budgetPlans', 'travel_plan_id'));
    }


    public function create(Request $request)
    {
        $travel_plan_id = $request->input('travel_plan_id');

        return view('budget_plans.create', compact('travel_plan_id'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'travel_plan_id' => 'required|exists:travel_plans,id',
        ]);

        BudgetPlan::create([
            'item' => $request->item,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'travel_plan_id' => $request->travel_plan_id,
        ]);

        return redirect()->route('budget-plans.index', ['travel_plan_id' => $request->travel_plan_id])
            ->with('status', 'Budget item created successfully!');
    }


    public function edit($id)
    {
        $budgetPlan = BudgetPlan::findOrFail($id);
        return view('budget_plans.edit', compact('budgetPlan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $budgetPlan = BudgetPlan::findOrFail($id);
        $budgetPlan->update([
            'item' => $request->item,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'total' => $request->price * $request->quantity, // Optionally update total
        ]);

        return redirect()->route('budget-plans.index', ['travel_plan_id' => $budgetPlan->travel_plan_id])
            ->with('status', 'Budget item updated successfully!');
    }

    public function destroy($id)
    {
        $budgetPlan = BudgetPlan::findOrFail($id);
        $budgetPlan->delete();

        return redirect()->route('budget-plans.index', ['travel_plan_id' => $budgetPlan->travel_plan_id])
            ->with('status', 'Budget item deleted successfully!');
    }

    
}