<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function calculateDays($start_date, $end_date)
    {
        $startDate = Carbon::parse($start_date);
        $endDate = Carbon::parse($end_date);
        return $startDate->diffInDays($endDate) + 1;
    }
}
