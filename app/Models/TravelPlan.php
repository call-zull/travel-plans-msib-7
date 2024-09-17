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
    ];

    // Cast date fields to Carbon instances
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'category' => 'string',
    ];

    protected $appends = ['day'];

    public function day(): Attribute
    {
        $startDate = Carbon::parse($this->start_date);
        $endDate = Carbon::parse($this->end_date);
        $day = $startDate->diffInDays($endDate) + 1;

        return Attribute::make(fn() => $day);
    }

    public function formattedDate(): Attribute
    {
        $formatted_date = null;
        $startDate = Carbon::parse($this->start_date);
        $endDate = Carbon::parse($this->end_date);

        if ($startDate->format('M Y') == $endDate->format('M Y')) {
            $formatted_date = $startDate->format('d') . ' - ' . $endDate->format('d M Y');
        } else {
            $formatted_date = $startDate->format('d M Y') . ' - ' . $endDate->format('d M Y');
        }

        return Attribute::make(fn() => $formatted_date);
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
