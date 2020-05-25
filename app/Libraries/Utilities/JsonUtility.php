<?php


namespace App\Libraries\Utilities;


class JsonUtility
{


    public static function searchRecursive($items, $key, $value, $t_key = 'title')
    {
        $to_return = [];
        foreach ($items as $item) {

//            echo $item[$key] . "<br>";
            if (isset($item[$key]) && $item[$key] == $value) {
                if (isset($item[$t_key])) {
                    return [$value => $item[$t_key]];
                }
            }

            if (isset($item['children'])) {
//                dd($item['children']);
                $t = self::searchRecursive($item['children'], $key, $value, $t_key);
                if (count($t) > 0)
                    return $t;
//                $to_return[] = self::searchRecursive($item['children'], $key, $value, $t_key);
            }
        }
//        print_r($to_return);
//        echo "<br>";
//        echo "<br>";
//        echo "<br>";
//        if (count($to_return)) {
        return $to_return;
//        }
    }

}