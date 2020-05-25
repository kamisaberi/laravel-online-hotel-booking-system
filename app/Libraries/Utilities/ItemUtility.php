<?php


namespace App\Libraries\Utilities;


use App\Libraries\Utilities\DatabaseUtilities\TableUtility;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemUtility
{

    public static function getItems($type, $search = null)
    {

        $item_table_names = TableUtility::getTablesName($type);
        $item_table = null;
        $item_table_structure = null;
        $property_table = null;
        $property_table_structure = null;
        $assigned_property_table = null;

        if (\Schema::hasTable($item_table_names['plural'])) {
            $item_table = $item_table_names['plural'];
            $item_table_structure = TableUtility::getTableStructure($item_table);
        }

        if (\Schema::hasTable($item_table_names['singular'] . "_properties")) {
            $property_table = $item_table_names['singular'] . "_properties";
            $property_table_structure = TableUtility::getPropertyTableStructure($property_table);
        }

        if (\Schema::hasTable($item_table_names['singular'] . "_assigned_properties")) {
            $assigned_property_table = $item_table_names['singular'] . "_assigned_properties";
        }


        $items = [];
        $items = DB::table($item_table)->get();

        foreach ($item_table_structure as $structure) {
            if (trim($structure->Comment) != "") {
                $comment = (array)json_decode($structure->Comment);
                if (isset($comment['relation'])) {
                    $relation = $comment['relation'];
                    $table = $comment['table'];
                    foreach ($items as &$item) {
                        if ($relation == "hasOne") {
                            $rel_val = $item->{$structure->Field};
                            $rel_rcds = DB::table($table)->where('id', '=', $rel_val)->get();
                            $item->{$structure->Field} = $rel_rcds[0];
                        } elseif ($relation == "hasMany") {

                            $f_name = isset($comment['field']) ? $comment['field'] : Str::singular($type);
                            $rel_rcds = DB::table($table)->where($f_name, '=', $item->id)->get();
                            $item->{$structure->Field} = $rel_rcds;

                        } elseif ($relation == "belongsToMany") {
                            $mid_table_name = isset($comment['middle_table']) ? $comment['middle_table'] : $type . "_" . Str::singular($table);
                            $rel_rcds = DB::table($mid_table_name)
                                ->join(Str::plural($table), Str::plural($table) . '.id', '=', $mid_table_name . '.' . Str::singular($table))
                                ->where($mid_table_name . '.' . Str::singular($type), '=', $item->id)
                                ->get();

                            $item->{$structure->Field} = $rel_rcds;
                        } elseif ($relation == 'belongsTo') {

                            $rel_val = $item->{$structure->Field};
                            $rel_rcds = DB::table($table)->where('id', '=', $rel_val)->get();
                            $item->{$structure->Field} = $rel_rcds[0];
                        }
                    }
                }
            }
        }

        if (!is_null($property_table) && !is_null($assigned_property_table)) {
            $properties = DB::table($property_table)->get();
            $assigned_properties = DB::table($assigned_property_table)->get();
            $merged_assigned_properties = DB::table($assigned_property_table)
                ->join($property_table, $assigned_property_table . ".property", '=', $property_table . '.id')
                ->get();

            foreach ($items as &$item) {
                $props = [];
                foreach ($merged_assigned_properties as $merged_assigned_property) {
                    if ($merged_assigned_property->item == $item->id) {
                        $props [] = $merged_assigned_property;
                    }
                }
                $item->properties = $props;
            }
        }

        if (!is_null($search)) {
            $s = ['situation' => ['values' => [1, 5], 'operator' => 'in']];
            foreach ($items as &$item) {
                foreach ($search as $k => $v) {

                }
            }
        }

        return $items;

    }

    public static function getItem($type, $id)
    {
        $items = self::getItems($type);
        foreach ($items as $item) {
            if ($item->id == $id) {
                return $item;
            }
        }
        return null;

    }


    public static function separateReceivedData($type, $received_data)
    {


        $item_table_names = TableUtility::getTablesName($type);
        $item_table = null;
        $item_table_structure = null;
        $property_table = null;
        $property_table_structure = null;
        $assigned_property_table = null;

        if (\Schema::hasTable($item_table_names['plural'])) {
            $item_table = $item_table_names['plural'];
            $item_table_structure = TableUtility::getTableStructure($item_table);
        }

        if (\Schema::hasTable($item_table_names['singular'] . "_properties")) {
            $property_table = $item_table_names['singular'] . "_properties";
            $property_table_structure = TableUtility::getPropertyTableStructure($property_table);
        }

//        if (\Schema::hasTable($item_table_names['singular'] . "_assigned_properties")) {
//            $assigned_property_table = $item_table_names['singular'] . "_assigned_properties";
//        }

        $item_table_data = [];
        $property_table_data = [];
        foreach ($item_table_structure as $key => $value) {
            foreach ($received_data as $k => $v) {
                if ($value->Field == $k) {
                    $item_table_data[$k] = $v;
                    unset($received_data[$k]);
                    unset($item_table_structure[$key]);
                }
            }
        }

        foreach ($item_table_structure as $key => $value) {
            if ($value->Extra == 'auto_increment') {
                unset($item_table_structure[$key]);
                continue;
            }
            if (strstr($value->Type, 'int')) {
                $item_table_data[$value->Field] = 0;
            } elseif (strstr($value->Type, 'varchar') || strstr($value->Type, 'text')) {
                $item_table_data[$value->Field] = "";
            }
            unset($item_table_structure[$key]);
        }

        if (!is_null($property_table_structure)) {
            foreach ($property_table_structure as $key => $value) {
                foreach ($received_data as $k => $v) {
                    if ($value->title == $k) {
                        $property_table_data[$k] = $v;
                        unset($received_data[$k]);
                        unset($property_table_structure [$key]);
                    }
                }
            }
            foreach ($property_table_structure as $key => $value) {

                if ($value->input_type == 'check') {
                    $property_table_data[$value->title] = 0;
                } elseif ($value->input_type == 'text') {
                    $property_table_data[$value->title] = "";
                }
                unset($property_table_structure [$key]);
            }

        }
        return ["item" => $item_table_data, "property" => $property_table_data];
    }


    public static function storeItem($type, $items_data, $id = 0)
    {
        $item_table_names = TableUtility::getTablesName($type);
        $item_table = null;

        if (\Schema::hasTable($item_table_names['plural'])) {
            $item_table = $item_table_names['plural'];
        }

        if (is_null($item_table))
            abort("500");

        if ($id == 0) {
            $id = DB::table($item_table)->insertGetId($items_data);
        } else {
            DB::table($item_table)->where('id', '=', $id)->update($items_data);
        }
        return $id;
    }

    public static function storeProperties($type, $property_data, $id)
    {

        $item_table_names = TableUtility::getTablesName($type);
        $property_table = null;
        $property_table_structure = null;
        $assigned_property_table = null;

        if (\Schema::hasTable($item_table_names['singular'] . "_properties")) {
            $property_table = $item_table_names['singular'] . "_properties";
            $property_table_structure = TableUtility::getPropertyTableStructure($property_table);
        }

        if (\Schema::hasTable($item_table_names['singular'] . "_assigned_properties")) {
            $assigned_property_table = $item_table_names['singular'] . "_assigned_properties";
        }


        $to_add_arrays = [];
        foreach ($property_table_structure as $item) {
            $found = false;
            $prp_value = null;
            foreach ($property_data as $k => $v) {
                if ($k == $item->title) {
                    $found = true;
                    $prp_value = $v;
                    break;
                }
            }
            if ($found) {
                $to_add_array = ['item' => $id, 'property' => $item->id, 'value' => $prp_value];
            } else {
                $to_add_array = ['item' => $id, 'property' => $item->id, 'value' => $item->default_value];
            }
            $to_add_arrays[] = $to_add_array;
        }

        DB::table($assigned_property_table)->where('item', '=', $id)->delete();
        DB::table($assigned_property_table)->insert($to_add_arrays);

    }

    public static function storeData($type, $items_data, $property_data = [], $id = 0)
    {

        $item_table_names = TableUtility::getTablesName($type);
        $item_table = null;
        $item_table_structure = null;
        $property_table = null;
        $property_table_structure = null;
        $assigned_property_table = null;

        if (\Schema::hasTable($item_table_names['singular'] . "_properties")) {
            $property_table = $item_table_names['singular'] . "_properties";
            $property_table_structure = TableUtility::getPropertyTableStructure($property_table);
        }

        $id = self::storeItem($type, $items_data, $id);

        if (!is_null($property_table_structure))
            self::storeProperties($type, $property_data, $id);
    }

    public static function deleteData($type, $id)
    {

        $item_table_names = TableUtility::getTablesName($type);
        $item_table = null;
        $assigned_property_table = null;

        if (\Schema::hasTable($item_table_names['plural'])) {
            $item_table = $item_table_names['plural'];
        }

        if (\Schema::hasTable($item_table_names['singular'] . "_assigned_properties")) {
            $assigned_property_table = $item_table_names['singular'] . "_assigned_properties";
        }

        DB::table($item_table)->where('id', '=', $id)->delete();
        DB::table($assigned_property_table)->where('item', '=', $id)->delete();
    }

    public static function getPropertiesForInput($route, $parameters)
    {
        $route = DB::table('routes')
            ->where('name', '=', $route)
            ->where('parameters', '=', json_encode($parameters))->get();

        if (count($route) == 0 || count($route) >= 2) {
            return null;
        }

        $groups = DB::table('route_filling_group')
            ->join('filling_groups', 'filling_groups.id', '=', 'route_filling_group.group')
            ->where('route_filling_group.route', '=', $route[0]->id)
            ->get(['filling_groups.*']);

        foreach ($groups as &$group) {
            $items = DB::table('filling_items')->where('group', '=', $group->id)->get();
            foreach ($items as &$item) {
                $item->rules = json_decode($item->rules, true);
            }
            $group->properties = $items;
        }

//        dd($groups);
        return $groups;

    }

    public static function getItemActions($route, $parameters)
    {
        $route = DB::table('routes')
            ->where('name', '=', $route)
            ->where('parameters', '=', json_encode($parameters))->get();

        if (count($route) == 0 || count($route) >= 2) {
            return null;
        }

        $actns = DB::table('item_assigned_actions')
            ->join('item_actions', 'item_assigned_actions.action', '=', 'item_actions.id')
            ->where('item_assigned_actions.route', '=', $route[0]->id)
            ->get(['item_actions.*']);

        $actions = [];
        foreach ($actns as $actn) {
            $actions [] = $actn->name;
        }

        return $actions;
    }


}