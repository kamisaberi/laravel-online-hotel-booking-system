<?php


namespace App\Libraries\Utilities;


class PathUtility
{
    public static function normalizePath($path)
    {
        if (stripos($path, '/public/') === false) {
            $path1 = substr_replace($path, '/public', strlen(url('/')), 0);
        } else {
            $path1 = str_replace('/public/', '/', $path);
        }
        return $path1;
    }

}