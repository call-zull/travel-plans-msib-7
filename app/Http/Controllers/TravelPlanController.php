<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelPlanRequest;
use App\Models\BudgetPlan;
use App\Models\TravelPlan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class TravelPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $userId = auth()->id();
        $query = TravelPlan::with('budgetPlans')
            ->whereUserId($userId);

        $params = request()->query();
        $travelPlans = $query->filter($params)->withSum('budgetPlans', 'total')->paginate(10);

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
        $data['day'] = TravelPlan::calculateDays($data['start_date'], $data['end_date']);

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

        $data['day'] = TravelPlan::calculateDays($data['start_date'], $data['end_date']);

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
            notyf('Travel plan deleted successfully!');
            return to_route('travel-plans.index');
        } catch (\Exception $e) {
            Log::error($e);
            notyf()->addError('Failed to delete travel plan, cuz it has budget plans');
            return back();
        }
    }

    // public function show($id)
    // {
    //     $userId = auth()->id();

    //     // Check if the passed $id is numeric (for showing specific travel plan) or not (for searching by plan name)
    //     if (is_numeric($id)) {
    //         $travelPlan = TravelPlan::where('user_id', $userId)->findOrFail($id);
    //         return view('travel-plans.show', compact('travelPlan'));
    //     } else {
    //         $search = $id;
    //         $travelPlans = TravelPlan::with('budgetPlans')
    //             ->where('user_id', $userId)
    //             ->where('plan', 'like', '%' . $search . '%')
    //             ->withSum('budgetPlans', 'total')
    //             ->paginate(10);

    //         return view('travel-plans.index', compact('travelPlans'));
    //     }
    // }


    //     public function search(Request $request)
    //     {
    //         $search = $request->get('search');
    //         $travelPlans = TravelPlan::with('budgetPlans')
    //             ->where(function ($query) use ($search) {
    //                 $query->where('plan', 'like', '%' . $search . '%');
    //             })
    //             ->paginate(10);
    //         return view('travel-plans.index', compact('travelPlans'));
    //     }
}
