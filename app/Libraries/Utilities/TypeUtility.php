<?php


namespace App\Libraries\Utilities;


class TypeUtility
{

    public static function parseTriggers($str_trigger)
    {
        $triggers = [];
        if ($str_trigger != '') {
            $trgrs = explode('|', $str_trigger);
            foreach ($trgrs as $trgr) {

                $trigger = [];
                //conditions:change[situation=7,9]=>commands:days[start-date:end-date]->object>inactive-days
                $f_arr = explode('=>', $trgr);
                if (count($f_arr) == 2) {

                    //conditions
                    $condition = [];
                    $str_cndtn = $f_arr[0];

                    $event = explode('[', $str_cndtn)[0];
                    $condition['event'] = $event;

                    preg_match_all("/\[(.*?)]/", $str_cndtn, $matches);

                    $args = [];
                    foreach ($matches[1] as $a) {
                        $args[explode('=', $a)[0]] = explode('=', $a)[1];
                    }
                    $condition['args'] = $args;
                    $trigger['condition'] = $condition;

                    //commands
                    $commands = [];
                    $str_cmmnd = $f_arr[1];

                    $str_mthd = explode('->', $str_cmmnd)[0];
                    $str_trgt = explode('->', $str_cmmnd)[1];

                    $method = explode('[', $str_mthd)[0];
                    $commands['method'] = $method;

                    preg_match_all("/\[(.*?)]/", $str_mthd, $matches);
                    $commands['args'] = $matches[1];
                    $commands['target'] = $str_trgt;
                    $trigger['commands'] = $commands;
                }
                $triggers[] = $trigger;
            }

            return $triggers;
        }

        return $str_trigger;
    }


    public static function parseSchedules($str_schedules)
    {

        $schedules = [];
        if ($str_schedules != '') {

            $schedule = [];
            $schdls = explode('|||', $str_schedules);
            foreach ($schdls as $schdl) {
                $tmps = explode('->', $schdl);
                $conds = explode('=>', $tmps[0])[1];
                $actns = explode('=>', $tmps[1])[1];
                $schedule['conditions'] =explode('&&',$conds) ;
                $schedule['actions'] = explode('&&',$actns) ;

                $schedules [] = $schedule;
            }

            return $schedules;
        }

        return $str_schedules;

    }

}