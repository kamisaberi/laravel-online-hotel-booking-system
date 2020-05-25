<?php


namespace App\Libraries\Utilities;


class TextUtility
{
    public static function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    public static function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }
        return (substr($haystack, -$length) === $needle);
    }

    public static function isJsonText($text)
    {
        if ((self::startsWith($text, '{') && self::endsWith($text, '}'))
            || (self::startsWith($text, '[') && self::endsWith($text, ']'))
        ) {
            return true;
        }
        return false;
    }

    public static function removeInvalidChars($value)
    {
        $value = nl2br($value);
        $search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
        $replace = array("\\\\", "\\0", "\\n", "\\r", "\'", '\"', "\\Z");
        return str_replace($search, $replace, $value);
    }


    public static function convertInvalidCharsForPrint($value)
    {
        $value = nl2br($value);
        $search = array('\\\"', '\/', '"\"', '\""', '\"', '\\r', '\\n', '\\r\\n', '\r\n');
        $replace = array('"', '/', '"', '"', '"', '\r', '\n', '\r\n', '<br>');
        return str_replace($search, $replace, $value);
    }

}