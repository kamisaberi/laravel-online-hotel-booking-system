<?php


namespace App\Libraries\Utilities\CodeUtilities;


use ReflectionClass;

class ClassUtility
{
    public static function getClassMethods($class)
    {
        try {
            $c = new ReflectionClass($class);


        } catch (\ReflectionException $e) {
            return null;
        }
    }

}