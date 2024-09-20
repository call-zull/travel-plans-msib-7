<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetPlanRequest;
use App\Models\BudgetPlan;
use App\Models\TravelPlan;
use Illuminate\Http\Request;

class BudgetPlanController extends Controller
{
    public function index(Request $request, TravelPlan $travelPlan)
    {
        $params = request()->query();
        $budgetPlans = $travelPlan->budgetPlans()->filter($params)->get();

        return view('budget_plans.index', compact('travelPlan', 'budgetPlans'));
    }

    public function create(TravelPlan $travelPlan)
    {
        return view('budget_plans.create', compact('travelPlan'));
    }

    public function store(BudgetPlanRequest $request, TravelPlan $travelPlan)
    {
        $data = $request->validated();

        $data['total'] = $data['price'] * $data['quantity'];

        $travelPlan->budgetPlans()->create($data);

        notyf('Budget item created successfully!');
        return to_route('travel-plans.budget-plans.index', $travelPlan->id);
    }


    public function edit(TravelPlan $travelPlan, $budgetPlanId)
    {
        $budgetPlan = BudgetPlan::findOrFail($budgetPlanId);
        return view('budget_plans.edit', compact('travelPlan', 'budgetPlan'));
    }

    public function update(BudgetPlanRequest $request, TravelPlan $travelPlan, $budgetPlanId)
    {
        $data = $request->validated();

        $budgetPlan = BudgetPlan::findOrFail($budgetPlanId);
        $budgetPlan->update($data);

        notyf('Travel plan deleted successfully!');
        return redirect()->route('travel-plans.budget-plans.index', $travelPlan->id);
    }

    public function destroy(TravelPlan $travelPlan, BudgetPlan $budgetPlan)
    {
        $budgetPlan->delete();

        notyf('Budget item deleted successfully!');
        return redirect()->route('travel-plans.budget-plans.index', $travelPlan);
    }
}
