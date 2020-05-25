<?php


namespace App\Libraries\Utilities;


use DateTime;
use Morilog\Jalali\jDateTime;
use Mpdf\Form;
use stdClass;

class DateUtility
{

    public static function validateDate($date, $isJalali = false, $format = 'Y-m-d')
    {
        try {
            if (!$isJalali) {
                $d = DateTime::createFromFormat($format, $date);
                return $d && $d->format($format) === $date;

            } else {

                $dd = explode('/', $date);
                $d = jDateTime::isValidateJalaliDate($dd[0], $dd[1], $dd[2]);
                return $d;
            }

        } catch (\Exception $e) {
            return null;
        }
    }

    public static function toJalali($date = null, $format = "Y-m-d")
    {
        if ($date == null) {
            $gdts = explode('-', date($format));
        } else {
            $gdts = explode('-', $date);
        }

        if (count($gdts) != 3)
            return null;

        $jdts = jDateTime::toJalali($gdts[0], $gdts[1], $gdts[2]);

        return "{$jdts[0]}/" . ($jdts[1] < 10 ? "0{$jdts[1]}" : $jdts[1]) . "/" . ($jdts[2] < 10 ? "0{$jdts[2]}" : $jdts[2]);
    }

    public static function toJalaliUsingTimestamp($timestap, $format = "Y-m-d")
    {

        $st = date($format, $timestap);
        $gy = date("Y", $timestap);
        $gm = date("m", $timestap);
        $gd = date("d", $timestap);
        $jdts = jDateTime::toJalali($gy, $gm, $gd);
        return "{$jdts[0]}/" . ($jdts[1] < 10 ? "0{$jdts[1]}" : $jdts[1]) . "/" . ($jdts[2] < 10 ? "0{$jdts[2]}" : $jdts[2]);

    }

    public static function toGregorianUsingTimestamp($timestamp, $format = "Y-m-d")
    {
        return date($format, $timestamp);
    }


    public static function toGregorian($date, $format = "Y/m/d")
    {
        $jdts = explode('/', $date);

        if (count($jdts) != 3)
            return null;

        $jdts = jDateTime::toGregorian($jdts[0], $jdts[1], $jdts[2]);

        return "{$jdts[0]}-" . ($jdts[1] < 10 ? "0{$jdts[1]}" : $jdts[1]) . "-" . ($jdts[2] < 10 ? "0{$jdts[2]}" : $jdts[2]);
    }


}