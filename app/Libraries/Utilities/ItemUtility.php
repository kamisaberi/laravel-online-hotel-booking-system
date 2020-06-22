<?php


namespace App\Libraries\Utilities;


use App\Libraries\Utilities\DatabaseUtilities\TableUtility;
use App\Rules\CheckLanguage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Route;

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

    public static function getPropertiesForInput($route, $parameters, $id = 0)
    {

        $t = $parameters['type'];
        $parameters = [];
        $parameters['type'] = $t;

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

        if ($id != 0) {
            $exs_data = DB::table(Str::plural($parameters['type']))->where('id', '=', $id)->get();
            foreach ($groups as &$group) {
                foreach ($items as &$item) {
                    foreach ($exs_data as $datum) {
                        if (isset($datum->{$item->field})) {
                            $item->value = $datum->{$item->field};
                        }
                    }
                }
            }
        }

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

    public static function getPermissions($type)
    {
        $permissions = [];
        $permissions['index'] = "items.index" . ":" . $type;
        $permissions['show'] = "items.show" . ":" . $type;
        $permissions['create'] = "items.create" . ":" . $type;
        $permissions['store'] = "items.store" . ":" . $type;
        $permissions['update'] = "items.update" . ":" . $type;
        $permissions['edit'] = "items.edit" . ":" . $type;
        $permissions['change'] = "items.change" . ":" . $type;
        $permissions['destroy'] = "items.destroy" . ":" . $type;
        $permissions['properties.store'] = "items.properties.store" . ":" . $type;
        $permissions['settings.edit'] = "items.settings" . ":" . $type;

        return $permissions;

    }

    public static function getUrls($type, $id = 0, $route_name = "current", $route_parameters = null)
    {

        if ($route_name == "current") {
            $actions = ItemUtility::getItemActions(Route::currentRouteName(), Route::current()->parameters());
        } else {
            $actions = ItemUtility::getItemActions($route_name, $route_parameters);
        }

        $urls = [];
        $urls['index'] = route("items.index", ['type' => $type]);
        if (!is_null($actions) && in_array('create', $actions)) {
            $urls['create'] = route("items.create", ['type' => $type]);
        }

        $urls['store'] = route("items.store", ['type' => $type]);
        $urls['update'] = route("items.update", ['type' => $type, 'id' => $id]);
        $urls['change'] = route("items.change", ['type' => $type]);

        if (!is_null($actions) && in_array('destroy', $actions)) {
            $urls['destroy'] = route("items.destroy", ['type' => $type]);
        }

        $urls['properties.store'] = route("items.properties.store", ['type' => $type]);
        $urls['settings.edit'] = route("items.settings.edit", ['type' => $type]);

        if ($id == 0) {
            $urls['form_action'] = $urls['store'];
        } else {
            $urls['form_action'] = $urls['update'];
        }


        return $urls;

    }


    public static function getItemsValidationRules($route = "current", $parameters = null)
    {

        if ($route == "current") {
            $route = DB::table('routes')
                ->where('name', '=', Route::currentRouteName())
                ->where('parameters', '=', json_encode(Route::current()->parameters))->get();
        } else {
            $route = DB::table('routes')
                ->where('name', '=', $route)
                ->where('parameters', '=', json_encode($parameters))->get();
        }


        if (count($route) == 0 || count($route) >= 2) {
            return [];
        }

        $groups = DB::table('validation_groups')
            ->join('validation_group_items', 'validation_group_items.group', '=', 'validation_groups.id')
            ->join('validation_items', 'validation_items.id', '=', 'validation_group_items.item')
            ->where('validation_groups.route', '=', $route[0]->id)
            ->get(['validation_items.*']);

        $rules = [];
        foreach ($groups as $prop) {
            if ($prop->rules != '') {
                $final_arr = [];
                $arr = explode('|', $prop->rules);
                foreach ($arr as $ar) {
                    if ($ar == 'app_unique') {
//                        $final_arr [] = new AppUnique($base_type, $id, $prop->id);
                    } elseif (TextUtility::startsWith($ar, 'check_language')) {
                        $final_arr [] = new CheckLanguage(['fa', 'en', 'ar'], 'fa');
                    } elseif (TextUtility::startsWith($ar, 'required_for_login')) {

                    } else {
                        $final_arr [] = $ar;
                    }
                }

                $rules[$prop->field] = $final_arr;
            }
        }
        return $rules;

    }


    public static function getRequiredComponents($groups)
    {
        $components = [];
        foreach ($groups as $group) {
            foreach ($group->properties as $property) {

                if ($property->rules['type'] == "select-image" and !isset($components['files']['images'])) {
                    $components['files']['images'] = DB::table('images')->get(['id', 'title', 'path']);
                } elseif ($property->rules['type'] == "select-video" and !isset($components['files']['videos'])) {
                    $components['files']['videos'] = DB::table('videos')->get(['id', 'title', 'path']);
                } elseif ($property->rules['type'] == "select-flash" and !isset($components['files']['flashes'])) {
                    $components['files']['flashes'] = DB::table('flashes')->get(['id', 'title', 'path']);
                }
            }
        }
        return $components;
    }


}
