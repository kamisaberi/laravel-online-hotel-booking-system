<?php


namespace App\Libraries\Utilities;


use Carbon\Carbon;

class CarbonDateUtility
{
    public static function generateDateRange(Carbon $start_date, Carbon $end_date, $include_end = false)
    {
        $dates = [];
        for ($date = $start_date; $date->lt($end_date); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        if ($include_end)
            $dates[] = $end_date->format('Y-m-d');
        return $dates;
    }


}