<?php

namespace App\Http\Controllers;

use App\Models\BudgetPlan;
use App\Models\TravelPlan;
use Illuminate\Http\Request;

class BudgetPlanController extends Controller
{
    public function index(TravelPlan $travelPlan)
    {
        $budgetPlans = BudgetPlan::where('travel_plan_id', $travelPlan->id)->get();

        foreach ($budgetPlans as $budgetPlan) {
            $budgetPlan->total = $budgetPlan->price * $budgetPlan->quantity;
        }

        return view('budget_plans.index', compact('travelPlan', 'budgetPlans'));
    }


    public function create(TravelPlan $travelPlan)
    {
        return view('budget_plans.create', compact('travelPlan'));
    }


    public function store(Request $request, TravelPlan $travelPlan)
    {
        $data = $request->validate([
            'item' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $travelPlan->budgetPlans()->create($data);

        notyf('Budget item created successfully!');
        return to_route('travel-plans.budget-plans.index', $travelPlan->id);
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

    public function destroy(TravelPlan $travelPlan, BudgetPlan $budgetPlan)
    {
        $budgetPlan->delete();

        notyf('Budget item deleted successfully!');
        return redirect()->route('travel-plans.budget-plans.index', $travelPlan);
    }
}
