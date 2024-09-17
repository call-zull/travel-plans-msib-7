<?php

namespace App\Helpers;

use Carbon\Carbon;

class FormatDate
{
  /**
   * Formatted Date
   */
  public static function format($start_date, $end_date)
  {
    $formatted_date = null;
    $startDate = Carbon::parse($start_date);
    $endDate = Carbon::parse($end_date);

    if ($startDate->format('M Y') == $endDate->format('M Y')) {
      $formatted_date = $startDate->format('d') . ' - ' . $endDate->format('d M Y');
    } else {
      $formatted_date = $startDate->format('d M Y') . ' - ' . $endDate->format('d M Y');
    }

    return $formatted_date;
  }
}
