<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetPlan extends Model
{
    protected $fillable = [
        'item',
        'price',
        'quantity',
        'travel_plan_id',
    ];

    // Define relationship with TravelPlan
    public function travelPlan()
    {
        return $this->belongsTo(TravelPlan::class);
    }
}