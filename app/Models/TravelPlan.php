<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan',
        'category',
        'start_date',
        'end_date',
    ];

    // Cast date fields to Carbon instances
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'category' => 'string',
    ];

    public function budgetPlans()
    {
        return $this->hasMany(BudgetPlan::class);
    }

    public static function categories()
    {
        return [
            'Event' => 'Event',
            'Holiday' => 'Holiday',
        ];
    }
}