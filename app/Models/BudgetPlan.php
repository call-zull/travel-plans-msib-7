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
        'total',
    ];

    public function scopeFilter($query, $params)
    {
        // search for budget item
        $query->when(@$params['search'], function ($query, $search) {
            $query->where('item', 'LIKE', "%{$search}%");
        });
    }

    // Define relationship with TravelPlan
    public function travelPlan()
    {
        return $this->belongsTo(TravelPlan::class);
    }
}
