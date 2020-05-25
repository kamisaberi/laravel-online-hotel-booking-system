<?php


namespace App\Libraries\Utilities\DatabaseUtilities;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TableUtility
{
    public static function getTablesName($type)
    {
        $output = [];
        $type = str_replace('-', '_', $type);
        if (Str::lower(Str::plural(trim($type))) == Str::lower(trim($type))) {
            $output['plural'] = trim($type);
            $output['singular'] = Str::singular(trim($type));
        } elseif (Str::lower(Str::singular(trim($type))) == Str::lower(trim($type))) {
            $output['singular'] = trim($type);
            $output['plural'] = Str::plural(trim($type));
        } else {
            return null;
        }
        return $output;
    }

    public static function getTableStructure($table_name)
    {
        $tableColumnInfos = DB::select('SHOW FULL COLUMNS FROM ' . $table_name);
        return $tableColumnInfos;
    }

    public static function getPropertyTableStructure($table_name)
    {
        $tableColumnInfos = DB::table($table_name)->get();
        return $tableColumnInfos;
    }

//    public static function checkTables()
//    {
//        if (\Schema::hasTable(self::$plural)) {
//            self::$item_table = self::$plural;
//            self::$item_table_structure = App\Libraries\Utilities\DatabaseUtilities\TableUtility::getTableStructure(self::$plural);
//        }
//
//        if (\Schema::hasTable(self::$singular . "_properties")) {
//            self::$property_table = self::$singular . "_properties";
//            self::$property_table_structure = App\Libraries\Utilities\DatabaseUtilities\TableUtility::getPropertyTableStructure(self::$property_table);
//        }
//
//        if (\Schema::hasTable(self::$singular . "_assigned_properties")) {
//            self::$assigned_property_table = self::$singular . "_assigned_properties";
//        }
//
//    }

}