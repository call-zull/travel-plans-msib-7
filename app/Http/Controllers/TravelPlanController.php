<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelPlanRequest;
use App\Models\BudgetPlan;
use App\Models\TravelPlan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TravelPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $travelPlans = TravelPlan::with('budgetPlans')
            // ->withSum('budgetPlans as total_budget', 'total')
        // ->paginate(10);
        $userId = auth()->id();
        $travelPlans = TravelPlan::with('budgetPlans')
            ->where('user_id', $userId)
            ->withSum('budgetPlans', 'total') // Filter by logged-in user
            ->paginate(10);

        // foreach ($travelPlans as $plan) {
        //     $plan->total_budget = $plan->budgetPlans->sum(function ($budgetPlan) {
        //         return $budgetPlan->price * $budgetPlan->quantity;
        //     });
        // }
        // foreach ($travelPlans as $plan) {
        //     $plan->total_budget = $plan->budgetPlans->sum(function ($budgetPlan) {
        //         return $budgetPlan->total;
        //     });
        // }

        return view('travel-plans.index', compact('travelPlans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('travel-plans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TravelPlanRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        $startDate = Carbon::parse($data['start_date']);
        $endDate = Carbon::parse($data['end_date']);
        $data['day'] = $startDate->diffInDays($endDate) + 1;

        TravelPlan::create($data);

        notyf('Travel plan created successfully!');
        return to_route('travel-plans.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TravelPlan $travelPlan)
    {
        return view('travel-plans.edit', compact('travelPlan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TravelPlanRequest $request, TravelPlan $travelPlan)
    {
        $data = $request->validated();
        $startDate = Carbon::parse($data['start_date']);
        $endDate = Carbon::parse($data['end_date']);
        $data['day'] = $startDate->diffInDays($endDate) + 1;
        $travelPlan->update($data);

        notyf('Travel plan updated successfully!');
        return to_route('travel-plans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelPlan $travelPlan)
    {
        $travelPlan->delete();

        notyf('Travel plan deleted successfully!');
        return to_route('travel-plans.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $travelPlans = TravelPlan::with('budgetPlans')
            ->where(function ($query) use ($search) {
                $query->where('plan', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        return view('travel-plans.index', compact('travelPlans'));
    }
}