<?php


namespace App\Libraries\Utilities;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TrackerUtility
{
    public static function getThisWeekVisitorsCount()
    {
        $begin = Carbon::now()->startOfWeek();
        $end = Carbon::now()->endOfWeek();

        return count(self::runScript($begin, $end));

    }

    public static function getThisMonthVisitorsCount()
    {
        $begin = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        return count(self::runScript($begin, $end));

    }

    public static function getTodayVisitorsCount()
    {
        $begin = Carbon::now()->startOfDay();
        $end = Carbon::now()->endOfDay();
        return count(self::runScript($begin, $end));
    }

    public static function getAllVisitorsCount()
    {
        return count(self::runScript());
    }

    public static function runScript($begin = null, $end = null)
    {
        if ($begin == null && $end == null) {
            return DB::table('tracker_sessions')
                ->where('is_robot', '=', 0)
                ->get();
        } elseif ($begin != null && $end != null) {
            return DB::table('tracker_sessions')
                ->whereRaw("created_at between '$begin' and '$end'")
                ->where('is_robot', '=', 0)
                ->get();
        } else {
            return null;
        }
    }

}