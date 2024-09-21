<?php

namespace App\Models;

use App\Enums\TravelCategoryEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'user_id',
        'day',
    ];

    // Cast date fields to Carbon instances
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'category' => 'string',
    ];

    // protected $appends = ['day'];

    // public function day(): Attribute
    // {
    //     $startDate = Carbon::parse($this->start_date);
    //     $endDate = Carbon::parse($this->end_date);
    //     $day = $startDate->diffInDays($endDate) + 1;

    //     return Attribute::make(fn() => $day);
    // }

    protected function formattedDate(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->formatDateRange($this->start_date, $this->end_date)
        );
    }

    private function formatDateRange($startDate, $endDate)
    {
        if ($startDate->format('M Y') == $endDate->format('M Y')) {
            return $startDate->format('d') . ' - ' . $endDate->format('d M Y');
        }

        return $startDate->format('d M Y') . ' - ' . $endDate->format('d M Y');
    }

    public function scopeFilter($query, $params)
    {
        // search for budget item
        $query->when(@$params['plan'] ?? @$params['category'], function ($query, $search) {
            $query->where('plan', 'LIKE', "%{$search}%")
            ->orwhere('category', 'LIKE', "%{$search}%");
        });
    }

    public static function calculateDays($start_date, $end_date)
    {
        $startDate = Carbon::parse($start_date);
        $endDate = Carbon::parse($end_date);
        return $startDate->diffInDays($endDate) + 1;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function budgetPlans()
    {
        return $this->hasMany(BudgetPlan::class);
    }

    public function categoryDescription(): Attribute
    {
        return Attribute::make(fn() => $this->category ? TravelCategoryEnum::getDescription((int) $this->category) : null);
    }
}