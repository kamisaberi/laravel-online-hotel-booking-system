<?php


namespace App\Libraries\Utilities;


class GuiUtility
{

    public static function convertColumnsToBt($rules)
    {
        $bt_rules = [
            's' => 'col-sm',
            'm' => 'col-md',
            'l' => 'col-lg',
            'x' => 'col-xl',
        ];

        foreach ($rules as $k => $v) {
            if ($k == 'width') {
                $wdths = explode(' ', $v);
                $new = '';
                foreach ($wdths as $wdth) {

                    $cl = $bt_rules [substr($wdth, 0, 1)];
                    $wd = substr($wdth, 1);
                    if (strlen(trim($wd)) == 0) {
                        $new .= "$cl ";
                    } else {
                        $new .= "$cl-$wd ";
                    }
                }
                $rules[$k] = $new;
            }
        }

        return $rules;
    }

}