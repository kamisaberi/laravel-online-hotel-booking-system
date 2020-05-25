<?php


namespace App\Libraries\Utilities\CodeUtilities;

use App\Libraries\Utilities\BuiltInMethods;
use App\Libraries\Utilities\UserDefinedMethods;
use ReflectionMethod;

class MethodUtility
{
    public static function getMethodArgs($class, $method_name)
    {
        $args = [];
        try {
            $m = new ReflectionMethod($class, $method_name);
            $params = $m->getParameters();
            foreach ($params as $param) {
                $args [] = $param->name;
            }

        } catch (\ReflectionException $e) {
            return null;
        }

        return $args;
    }

    public static function generateMethodArgs($args, $data)
    {

//        dd($args, $data);
        $rets = [];
        foreach ($args as $arg) {
            foreach ($data as $k => $v) {
                if ($arg == $k) {
                    $rets[] = $v;
                    break;
                }
            }
        }
        return $rets;
    }

    public static function launchMethod($function_name, $all_args)
    {
        $builtInMethods = new  BuiltInMethods();
        $userDefinedMethods = new  UserDefinedMethods();

        $expecting_result = null;
        $right_class_have_method = null;
        if (method_exists($builtInMethods, $function_name)) {
            $right_class_have_method = $builtInMethods;
        } elseif (method_exists($userDefinedMethods, $function_name)) {
            $right_class_have_method = $userDefinedMethods;
        }

        if (!is_null($right_class_have_method)) {
            $args = self::getMethodArgs($right_class_have_method, $function_name);
            if (is_null($args)) {
                abort("500");
            } else {
                if (count($args) == 0) {
                    return call_user_func(array($right_class_have_method, $function_name));
                } elseif (count($args) > 0) {
                    $args_to_launch = self::generateMethodArgs($args, $all_args);
                    return call_user_func_array(array($right_class_have_method, $function_name), $args_to_launch);
                }
            }
        }

        return null;
    }

}