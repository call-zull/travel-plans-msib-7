<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Http\Requests\TravelPlanRequest;
use App\Models\TravelPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TravelPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $userId = auth()->id();
        $params = request()->query();

        $travelPlans = TravelPlan::with('budgetPlans')
            ->withSum('budgetPlans', 'total')
            ->whereUserId($userId)
            ->filter($params)
            ->paginate(10);

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
        $data['day'] = DateHelper::calculateDays($data['start_date'], $data['end_date']);

        TravelPlan::create($data);

        notyf('Travel plan created successfully!');
        return to_route('travel-plans.index');
    }

    public function show(TravelPlan $travelPlan)
    {
        return view('travel-plans.show', compact('travelPlan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TravelPlan $travelPlan)
    {
        $item = $travelPlan;

        return view('travel-plans.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TravelPlanRequest $request, TravelPlan $travelPlan)
    {
        $data = $request->validated();

        $data['day'] = DateHelper::calculateDays($data['start_date'], $data['end_date']);

        $travelPlan->update($data);

        notyf('Travel plan updated successfully!');
        return to_route('travel-plans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelPlan $travelPlan)
    {
        try {
            $travelPlan->delete();

            return response()->json([
                'message' => 'Travel plan deleted successfully!'
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'message' => 'Failed to delete travel plan, cuz it has budget plans',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
