<?php

namespace App\Http\Controllers;

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
        $travelPlans = TravelPlan::with('budgetPlans')->get();
        foreach ($travelPlans as $plan) {
            $startDate = Carbon::parse($plan->start_date);
            $endDate = Carbon::parse($plan->end_date);

            $plan->day = $startDate->diffInDays($endDate) + 1;

            if ($startDate->format('M Y') == $endDate->format('M Y')) {
                $plan->formatted_date = $startDate->format('d') . ' - ' . $endDate->format('d M Y');
            } else {
                $plan->formatted_date = $startDate->format('d M Y') . ' - ' . $endDate->format('d M Y');
            }

            $plan->total_budget = $plan->budgetPlans->sum(function ($budgetPlan) {
                return $budgetPlan->price * $budgetPlan->quantity;
            });
        }


        return view('home', compact('travelPlans'));
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
    public function store(Request $request)
    {
        $request->validate([
            'plan' => 'required|string|max:255',
            'category' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
        $day = $startDate->diffInDays($endDate) + 1;

        TravelPlan::create([
            'plan' => $request->plan,
            'category' => $request->category,
            'day' => $day,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('travel-plans.index')->with('status', 'Travel plan created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $travelPlan = TravelPlan::findOrFail($id);
        return view('travel-plans.edit', compact('travelPlan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'plan' => 'required|string|max:255',
            'category' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $travelPlan = TravelPlan::findOrFail($id);

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
        $day = $startDate->diffInDays($endDate) + 1;

        $travelPlan->update([
            'plan' => $request->plan,
            'category' => $request->category,
            'day' => $day,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('travel-plans.index')->with('status', 'Travel plan updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $travelPlan = TravelPlan::findOrFail($id);
        $travelPlan->delete();

        return redirect()->route('travel-plans.index')->with('status', 'Travel plan deleted successfully!');
    }
}