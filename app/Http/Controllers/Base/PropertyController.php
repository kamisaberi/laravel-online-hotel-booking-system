<?php

namespace App\Http\Controllers\Base;

use App;
use App\DataProperty;
use App\DataType;
use App\DocumentProperty;
use App\DocumentType;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Data\DataController;
use App\Http\Controllers\Document\DocumentController;
use App\Http\Controllers\Relation\RelationController;
use App\Http\Controllers\User\UserController;
use App\Libraries\Utilities\DateUtility;
use App\Libraries\Utilities\GuiUtility;
use App\Libraries\Utilities\JsonUtility;
use App\Libraries\Utilities\PathUtility;
use App\Libraries\Utilities\TextUtility;
use App\Navigation;
use App\Relation;
use App\RelationProperty;
use App\RelationType;
use App\Rules\AppPropertyUnique;
use App\Rules\AppUnique;
use App\Rules\CheckLanguage;
use App\Template;
use App\Translation;
use App\UserProperty;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Pluralizer;
use Image;
use Morilog\Jalali\jDateTime;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;
use Route;
use stdClass;
use URL;

class PropertyController extends Controller
{

    public static function createValidationRulesForTypeOperations()
    {
        $rules = [
            'title' => 'required',
            'can_have_item' => 'required',
        ];
        return $rules;
    }

    public static function createValidationRulesForPropertyOperations($add_to_group = false, $base_type = '', $type = '')
    {
        if (!$add_to_group) {
            $rules = [
                'title' => 'required',
                'level' => 'required',
                'default_value' => 'required',
                'input_type' => 'required',
            ];

            $locales = config('base.locales');
            foreach ($locales as $locale) {
                $rules ['title-' . $locale] = 'required';
            }

            return $rules;

        } else {

            $rules = [
                'title' => ['required', new AppPropertyUnique($base_type, $type)],
            ];

            $locales = config('base.locales');
            foreach ($locales as $locale) {
                $rules ['title-' . $locale] = 'required';
            }

            return $rules;

        }

    }


    public static function createValidationRules($props, $base_type, $id = 0)
    {

        $rules = [];
        $final_arr = [];
        foreach ($props as $prop) {
            if ($prop->validation_rules != '') {
                $arr = explode('|', $prop->validation_rules);

                foreach ($arr as $ar) {
                    if ($ar == 'app_unique') {
                        $final_arr [] = new AppUnique($base_type, $id, $prop->id);
                    } elseif (TextUtility::startsWith($ar, 'check_language')) {
                        $final_arr [] = new CheckLanguage(['fa', 'en', 'ar'], 'fa');
                    } elseif (TextUtility::startsWith($ar, 'required_for_login')) {

                    } else {
                        $final_arr [] = $ar;
                    }
                }

                $rules[$prop->title] = $final_arr;
            }
        }
        return $rules;
    }


    public static function createProperty(array $arr)
    {
        $std = new stdClass();
        foreach ($arr as $k => $v) {
            $std->{$k} = $v;
        }
        return $std;
    }


//    public static function getMultiImagesForRelatedProperty($object_type, $assigned_propery_id)
//    {
//
//
//        $vs = DB::table('relation_objects')
//            ->where('object_type', '=', $object_type)
//            ->where('object_id', '=', $assigned_propery_id)
//            ->select('relation_objects.relation')
//            ->get();
//
//        $std = [];test
//        foreach ($vs as $v) {
//            $rs = DB::table('relation_objects')
//                ->join('document_assigned_properties', 'document_assigned_properties.document', '=', 'relation_objects.object_id')
//                ->where('relation', '=', $v->relation)
//                ->where('object_type', '=', config('base.object_types.document'))
//                ->where('property', '=', 4)
//                ->select('object_id', 'document_assigned_properties.value as path')
//                ->get();
//            if (count($rs) > 0)
//                $std[] = $rs[0]->path;
//        }
//        return $std;
//    }

//    public static function getMultiImagesForRelatedProperty2($assigned_properties_table_name, $assigned_propery_id)
//    {
//
//        $d = DB::table($assigned_properties_table_name)
//            ->where('id', '=', $assigned_propery_id)
//            ->get();
//
//        $ids = explode(',', $d[0]->value);
//
//        $std = [];
//        foreach ($ids as $id) {
//
//            $pths = DB::table('document_assigned_properties')
//                ->where('document', '=', $id)
//                ->where('property', '=', 4)
//                ->get();
//
//            if (count($pths) > 0)
//                $std[] = $pths [0]->value;
//        }
//        return $std;
//    }


    public static function getPriceForRelatedProperty($object_type, $assigned_propery_id)
    {

        $vs = DB::table('relation_objects')
            ->where('object_type', '=', $object_type)
            ->where('object_id', '=', $assigned_propery_id)
            ->select('relation_objects.relation')
            ->get();
        $std = [];
        foreach ($vs as $v) {
            $rs = DB::table('relation_assigned_properties')
                ->join('relation_properties', 'relation_assigned_properties.property', '=', 'relation_properties.id')
                ->where('relation', '=', $v->relation)
                ->select('relation_properties.title', 'relation_assigned_properties.property', 'relation_assigned_properties.value')
                ->get();

            if (count($rs) > 0)
                $std[] = $rs[0]->value;

        }

        return $std;

    }


    public static function getPrices($type, $id, $dates = [])
    {

        $dt_ty_id = DataType::where('title', '=', $type)->first()->id;

        $pr_id = DataProperty::where('title', '=', 'price')
            ->where('type', '=', $dt_ty_id)
            ->get()[0]->id;

        $pr_vl = DB::table('data_assigned_properties')
            ->where('property', '=', $pr_id)
            ->where('data', '=', $id)
            ->get()[0]->value;

        return self::getPriceForRelatedProperty2($pr_vl, $dates);


    }

    public static function getPriceForRelatedProperty2($assigned_propery_value, $dates = [])
    {
        $rel_ids = explode(',', trim($assigned_propery_value));
        $rels = RelationController::getItems3('price', $rel_ids);

//        dd($rels);
        $prices = [];
        if (count($dates) == 0) {
            $gdate = DateUtility::toJalali(date('Y-m-d'));
            $dates[] = $gdate;
        }

        foreach ($dates as $date) {

            $gdate = DateUtility::toGregorian($date);
            $weekday = date("l", strtotime($gdate));

            foreach ($rels as $rel) {

                if (isset($rel->properties['dates']) && $rel->properties['dates']->value == "*" && trim($rel->properties['price']->value) != '') {
                    $prices[$date][] = $rel->properties['price']->value;
                    break;
                }
            }

            foreach ($rels as $rel) {
                if (isset($rel->properties['dates']) && $rel->properties['dates']->value != "*" && trim($rel->properties['price']->value) != '') {
                    $pr_dates = explode(",", trim($rel->properties['dates']->value));
                    foreach ($pr_dates as $pr_date) {
                        if (strstr($pr_date, ":")) {
                            $st_dt = explode(":", $pr_date)[0];
                            $en_dt = explode(":", $pr_date)[1];
                            if ($date >= $st_dt && $date <= $en_dt) {
                                $prices[$date][] = $rel->properties['price']->value;
                            }
                        } elseif (trim($pr_date) == trim($date)) {
                            $prices[$date][] = $rel->properties['price']->value;
                        } elseif (trim(strtolower($weekday)) == trim(strtolower($pr_date))) {
                            $prices[$date][] = $rel->properties['price']->value;
                        }
                        break;
                    }

                    if (count($prices[$date]) == 2) {
                        break;
                    }
                }
            }

            if (!isset($prices[$date])) {
                $prices[$date][] = 0;
            }
            $prices[$date] = array_reverse($prices[$date]);

        }

        return $prices;
    }

    public
    static function parsePropertyActions($action, $properties = [], $route = "current")
    {
        if ($route == 'current') {
            $route = Route::currentRouteName();
        }

        /*
        routes:services.properties.index
        -->
        conditions=>*->actions=>edit,destroy,translations
        ||
        routes:services.index
        -->
        conditions=>situation:1->actions=>name:change[2|3]&action_style:buttons&where:modal&type:a&icon:ft-eye
        &&
        conditions=>situation:5->actions=>name:change[6|7]&action_style:buttons&where:modal&type:a&icon:ft-eye
        */
        $actions = [];
        if ($action != '' && $action != null) {

            $b_arr = explode('||', $action);
            foreach ($b_arr as $b_ar) {
                $f_arr = explode('-->', $b_ar);
                if (count($f_arr) == 2) {
                    $r_arr = explode(':', $f_arr[0]);
                    if (count($r_arr) == 2) {
                        if (!in_array($route, explode(',', $r_arr[1])) && explode(',', $r_arr[1])[0] != 'all')
                            continue;


                        $r2_arrs = explode('&&', $f_arr[1]);
                        foreach ($r2_arrs as $r2_arr) {

                            $r3_arrs = explode('->', $r2_arr);
                            $conds = explode('=>', $r3_arrs[0])[1];


                            if (trim($conds) == "*") {
                                $actns = explode('=>', $r3_arrs[1])[1];

                                $actns = explode(',', $actns);
                                foreach ($actns as $actn) {
                                    $c_arr = explode('&', $actn);
                                    $t_rules = [];
                                    foreach ($c_arr as $c_ar) {
                                        $d_arr = explode(':', $c_ar);
                                        if (count($d_arr) == 2) {
                                            $t_rules [$d_arr[0]] = $d_arr [1];
                                        } elseif (count($d_arr) == 1) {
                                            $t_rules [$d_arr[0]] = true;
                                        }
                                    }
                                    $actions[] = $t_rules;
                                }

                            } else {

                                $prp = explode(':', $conds)[0];
                                $vlu = explode(':', $conds)[1];

//                                dd($prp, $vlu);

                                $to_add = false;
                                foreach ($properties as $property) {

                                    if ($property->title == $prp && $property->assigned == $vlu) {
//                                        dd($property->assigned);
                                        $to_add = true;
                                        break;
                                    }
                                }

//                                dd($to_add);

                                if ($to_add == true) {

                                    $actns = explode('=>', $r3_arrs[1])[1];
                                    $actns = explode(',', $actns);
                                    foreach ($actns as $actn) {
                                        $c_arr = explode('&', $actn);
                                        $t_rules = [];
                                        foreach ($c_arr as $c_ar) {
                                            $d_arr = explode(':', $c_ar);
                                            if (count($d_arr) == 2) {
                                                $t_rules [$d_arr[0]] = $d_arr [1];
                                            } elseif (count($d_arr) == 1) {
                                                $t_rules [$d_arr[0]] = true;
                                            }
                                        }
                                        $actions[] = $t_rules;
                                    }

                                }
                            }


                        }

                    }
                }
            }

//            dd($actions);
            return $actions;

        }
        return '';

    }

    public static function getItems($properties)
    {

        for ($i = 0; $i < count($properties); $i++) {
            if (isset($properties[$i]->actions)) {
                $properties[$i]->actions = self::parsePropertyActions(trim($properties[$i]->actions));
                $properties[$i]->locales = (array)json_decode($properties[$i]->locales);
            }
        }
        return $properties;
    }


    public static function checkFilters($properties, $assigned_properties, $filters)
    {

        $to_add = true;
        if ($filters != null) {
            foreach ($filters as $k => $v) {
                $filter_prop_id = 0;
                foreach ($properties as $property) {
                    if ($k == $property->title) {
                        $filter_prop_id = $property->id;
                        foreach ($assigned_properties as $assigned_property) {
                            if ($assigned_property->property == $filter_prop_id) {


                                if (is_array($v)) {
                                    if (!in_array($assigned_property->value, $v)) {
                                        $to_add = false;
                                    }
                                } elseif (!is_array($v)) {
                                    if ($assigned_property->value != $v) {
                                        $to_add = false;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $to_add;


    }

    public static function checkFilters2($properties, $assigned_properties, $filters)
    {

//        $f = ['situation' => ['values' => [1, 5], 'operator' => 'in']];
        $to_add = true;
        if ($filters != null) {
            foreach ($filters as $k => $v) {
                $filter_prop_id = 0;
                foreach ($properties as $property) {
                    if ($k == $property->title) {
                        $filter_prop_id = $property->id;


                        $assigned = null;

                        foreach ($assigned_properties as $assigned_property) {
                            if ($assigned_property->property == $filter_prop_id) {

//                                $assigned = null;
                                if (strpos($assigned_property->value, ',')) {
                                    $assigned = explode(',', $assigned_property->value);
                                } else {
                                    $assigned = $assigned_property->value;
                                }

                                $values = null;
                                if (isset($v['values']))
                                    $values = $v['values'];

                                $operator = 'eq';
                                if (isset($v['operator']))
                                    $operator = $v['operator'];

                                switch ($operator) {

                                    case 'in':
//                                        print_r($assigned);
//                                        echo "<br>";
                                        if (is_array($values) && !is_array($assigned)) {
                                            if (!in_array($assigned, $values)) {
                                                $to_add = false;
                                            }
                                        } elseif (!is_array($values) && !is_array($assigned)) {
                                            if (!stripos($values, $assigned)) {
                                                $to_add = false;
                                            }
                                        } elseif (is_array($values) && is_array($assigned)) {
                                            if (count(array_intersect($assigned, $values)) == 0) {
                                                $to_add = false;
                                            }
                                        } else {
                                            $to_add = false;
                                        }
                                        break;

                                    case 'all':
                                        if (!is_array($values) || !is_array($assigned)) {
                                            $to_add = false;
                                        } else {
                                            $result = array_intersect($assigned, $values);
                                            if (count($result) != count($assigned)) {
                                                $to_add = false;
                                            }
                                        }
                                        break;
                                    case 'bt':
                                        if (!is_array($values)) {
                                            $to_add = false;
                                        } elseif (count($values) != 2) {
                                            $to_add = false;
                                        } else {
                                            $start = $values[0];
                                            $end = $values[1];
                                            if (is_numeric($start) && is_numeric($end) && is_numeric($assigned)) {
                                                if (!($assigned >= $start && $assigned <= $end)) {
                                                    $to_add = false;
                                                }
                                            }
                                        }
                                        break;
                                    case 'eq':
                                        if ((is_array($values) && is_array($assigned)) || (!is_array($values) && !is_array($assigned))) {
                                            if ($assigned != $values) {
                                                $to_add = false;
                                            }
                                        } elseif ((!is_array($values) && is_array($assigned)) || (is_array($values) && !is_array($assigned))) {
                                            $to_add = false;
                                        }
                                        break;
                                    case 'neq':
                                        if ((is_array($values) && is_array($assigned)) || (!is_array($values) && !is_array($assigned))) {
                                            if ($assigned == $values) {
                                                $to_add = false;
                                            }
                                        } elseif ((!is_array($values) && is_array($assigned)) || (is_array($values) && !is_array($assigned))) {
                                            $to_add = false;
                                        }
                                        break;
                                    case 'lt':
                                        if (is_array($assigned) || is_array($values)) {
                                            $to_add = false;
                                        } elseif (!is_numeric($assigned) || !is_numeric($values)) {
                                            $to_add = false;
                                        } elseif ($assigned >= $values) {
                                            $to_add = false;
                                        }
                                        break;
                                    case 'lte':
                                        if (is_array($assigned) || is_array($values)) {
                                            $to_add = false;
                                        } elseif (!is_numeric($assigned) || !is_numeric($values)) {
                                            $to_add = false;
                                        } elseif ($assigned > $values) {
                                            $to_add = false;
                                        }
                                        break;
                                    case 'gt':
                                        if (is_array($assigned) || is_array($values)) {
                                            $to_add = false;
                                        } elseif (!is_numeric($assigned) || !is_numeric($values)) {
                                            $to_add = false;
                                        } elseif ($assigned <= $values) {
                                            $to_add = false;
                                        }
                                        break;
                                    case 'gte':
                                        if (is_array($assigned) || is_array($values)) {
                                            $to_add = false;
                                        } elseif (!is_numeric($assigned) || !is_numeric($values)) {
                                            $to_add = false;
                                        } elseif ($assigned < $values) {
                                            $to_add = false;
                                        }
                                        break;

                                }
                            }


                        }

                        if ($assigned == null) {
                            return false;
                        }


                    }
                }
            }
        }

        return $to_add;


    }


    public static function getProperties(
        $properties_table_name,
        $assigned_properties_table_name,
        $assigned_property_values_table_name,
        $properties,
        $property_values,
        $assigned_properties,
        $object_assigned_property_code,
        $filters = null)
    {


        $property_ids = [];
        foreach ($properties as $property) {
            $property_ids [] = $property->id;
        }
//        $property_title_translations = TranslationController::getTranslationsForTable($properties_table_name, 'title', $property_ids, true);

        for ($i = 0; $i < count($properties); $i++) {

            $properties[$i]->validation_rules = self::parseValidationRules($properties[$i]->validation_rules);

            if (isset($properties[$i]->filters)) {
                $properties[$i]->filters = self::parseFilters($properties[$i]->filters);
            }

//            var_dump($properties[$i]->fillation_rules);
//            echo "<br>";
            if (is_null($assigned_properties))
                $properties[$i]->fillation_rules = self::parseFillingRules($properties[$i]->fillation_rules);


            if ($properties[$i]->input_type == 'select-template') {
                $templates = Template::all();
                $values = [];
                $properties[$i]->input_type = 'select';
                foreach ($templates as $template) {

                    $s = new stdClass();
                    $s->title = $template->title;
                    $s->value = $template->title;
                    $values[] = $s;

                }
                $properties[$i]->values = $values;

            } elseif ($properties[$i]->input_type == 'select-navigation') {

                $templates = Navigation::all();
                $values = [];

                $s = new stdClass();
                $s->title = "None";
                $s->value = "None";

                $values [] = $s;
                $properties[$i]->input_type = 'select';
                foreach ($templates as $template) {
                    $s = new stdClass();
                    $s->title = $template->title;
                    $s->value = $template->title;
                    $values[] = $s;
                }
                $properties[$i]->values = $values;

            } elseif (isset($properties[$i]->fillation_rules['datasource']) && $properties[$i]->fillation_rules['datasource'] == 'documents>general') {

                $properties[$i]->datasource = DocumentController::getItems('general');

            } else {

                $values = [];
                foreach ($property_values as $property_value) {
                    if ($properties[$i]->id == $property_value->property) {
                        $values [] = $property_value;
                    }
                }

                if (count($values) > 0)
                    $properties[$i]->values = $values;
            }

//            $properties[$i]->locales = isset($property_title_translations[$properties[$i]->id]) ? $property_title_translations[$properties[$i]->id] : [];
            $properties[$i]->locales = (array)json_decode($properties[$i]->locales);

        }

        if (is_null($assigned_properties))
            return $properties;

        if (!self::checkFilters2($properties, $assigned_properties, $filters))
            return null;


        $assigned_property_ids = [];
        foreach ($assigned_properties as $assigned_property) {
            $assigned_property_ids[] = $assigned_property->id;
        }

//        $assigned_property_value_translations = TranslationController::getTranslationsForTable(
//            $assigned_properties_table_name, 'value', $assigned_property_ids, true);

        $assigned_property_values = DB::table($assigned_property_values_table_name)
            ->whereIn('assigned_property', $assigned_property_ids)
            ->get();

//        dd($assigned_properties);
        for ($i = 0; $i < count($properties); $i++) {

            $properties[$i]->assigned = "";

            if ($properties[$i]->input_type == 'documents:general') {

                $doc_ids = [];
                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $doc_ids = explode(',', $item->value);
                        break;
                    }
                }

                $doc_type_id = DocumentType::where('title', '=', 'general')->get()[0]->id;
                $props = DocumentProperty::where('title', '=', 'path')->where('type', '=', $doc_type_id)->get();

                $rels = DB::table('document_assigned_properties')
                    ->whereIn('document', $doc_ids)
                    ->where('property', '=', $props[0]->id)
                    ->get(['document_assigned_properties.value', 'document_assigned_properties.document']);

                foreach ($rels as $rel) {
                    if (in_array(pathinfo($rel->value, PATHINFO_EXTENSION), config('base.image_extensions'))) {
                        $thumbs = [];
                        $path = pathinfo($rel->value, PATHINFO_DIRNAME);
                        $name = pathinfo($rel->value, PATHINFO_BASENAME);
                        foreach (config('base.image_sizes') as $k => $v) {
                            $thumbs[$k] = $path . "/{$k}/" . $name;
                        }
                        $rel->thumbs = $thumbs;
                    }
                }

                $properties[$i]->assigned = $rels;
            } elseif ($properties[$i]->input_type == 'documents:video') {

                $doc_ids = [];
                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $doc_ids = explode(',', $item->value);
                        break;
                    }
                }

                $doc_type_id = DocumentType::where('title', '=', 'video')->get()[0]->id;
                $props = DocumentProperty::where('title', '=', 'path')->where('type', '=', $doc_type_id)->get();

                $rels = DB::table('document_assigned_properties')
                    ->whereIn('document', $doc_ids)
                    ->where('property', '=', $props[0]->id)
                    ->get(['document_assigned_properties.value', 'document_assigned_properties.document']);

                $properties[$i]->assigned = $rels;


            } elseif ($properties[$i]->input_type == 'documents:swf') {

                $doc_ids = [];
                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $doc_ids = explode(',', $item->value);
                        break;
                    }
                }

                $doc_type_id = DocumentType::where('title', '=', 'swf')->get()[0]->id;
                $props = DocumentProperty::where('title', '=', 'path')->where('type', '=', $doc_type_id)->get();

                $rels = DB::table('document_assigned_properties')
                    ->whereIn('document', $doc_ids)
                    ->where('property', '=', $props[0]->id)
                    ->get(['document_assigned_properties.value', 'document_assigned_properties.document']);

                $properties[$i]->assigned = $rels;

            } elseif ($properties[$i]->input_type == 'nestable') {

                $vals = (array)json_decode($properties[$i]->values, true);
                $assgnds = [];
                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $assgnds = explode(',', $item->value);
                        break;
                    }
                }

                $assigned = [];
                foreach ($assgnds as $assgnd) {
                    $assg = JsonUtility::searchRecursive($vals, 'id', $assgnd);
//                    print_r($assg );
                    if (!is_null($assg))
                        foreach ($assg as $k => $v)
                            $assigned[$k] = $v;
                }
                $properties[$i]->assigned = $assigned;

//                dd($properties[$i]->assigned );
//                $iter = new RecursiveIteratorIterator(new RecursiveArrayIterator($vals), RecursiveIteratorIterator::SELF_FIRST);
//                dd($iter);


            } elseif ($properties[$i]->input_type == 'date') {

                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $dts = [];
                        if (is_numeric($item->value)) {
                            $dts['gr'] = DateUtility::toGregorianUsingTimestamp($item->value / 1000);
                            $dts['ja'] = DateUtility::toJalaliUsingTimestamp($item->value / 1000);
                            $dts['timestamp'] = $item->value;
                        }
                        $properties[$i]->assigned = $dts;
                        break;
                    }
                }

            } elseif ($properties[$i]->input_type == 'file') {

                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $properties[$i]->assigned = $item->value;
                        break;
                    }
                }

                if (in_array(pathinfo($properties[$i]->assigned, PATHINFO_EXTENSION), config('base.image_extensions'))) {
                    $thumbs = [];
                    $path = pathinfo($properties[$i]->assigned, PATHINFO_DIRNAME);
                    $name = pathinfo($properties[$i]->assigned, PATHINFO_BASENAME);
                    foreach (config('base.image_sizes') as $k => $v) {
                        $thumbs[$k] = $path . "/{$k}/" . $name;
                    }
                    $properties[$i]->thumbs = $thumbs;
                }

            } elseif ($properties[$i]->input_type == 'documents:check') {

                $doc_ids = [];
                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $ds_id = $item->id;
                        $doc_ids = explode(',', $item->value);
                        break;
                    }
                }

                $doc_type_id = DocumentType::where('title', '=', 'check')->get()[0]->id;
                $props = DocumentProperty::where('title', '=', 'path')->where('type', '=', $doc_type_id)->get();

                $rels = DB::table('document_assigned_properties')
                    ->whereIn('document', $doc_ids)
                    ->where('property', '=', $props[0]->id)
                    ->get(['document_assigned_properties.value', 'document_assigned_properties.document']);

                if (count($rels) == 1) {
                    $properties[$i]->assigned = $rels[0]->value;
                } else {
                    $properties[$i]->assigned = $rels;
                }

            } elseif ($properties[$i]->input_type == 'users:*') {


                $p_id = 0;
                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $p_id = $item->value;
                        break;
                    }
                }

                $prps = UserController::getDataProperties3(null, $p_id);


                $properties[$i]->assigned = $prps['name']->value;
            } elseif ($properties[$i]->input_type == 'data:room') {

                $p_id = 0;
                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $p_id = $item->value;
                        break;
                    }
                }


                $assg = DataController::getDataProperties3('room', $p_id);
                $assg['id'] = $p_id;
                $properties[$i]->assigned = $assg;
//                dd($p_id);

            } elseif ($properties[$i]->input_type == 'users:customer') {

                $p_id = 0;
                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $p_id = $item->value;
                        break;
                    }
                }

                $properties[$i]->assigned = UserController::getDataProperties3('customer', $p_id);

            } elseif ($properties[$i]->input_type == 'relations:price') {

                $p_id = 0;
                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $p_id = $item->value;
                        break;
                    }
                }

                $properties[$i]->assigned = self::getPriceForRelatedProperty2($p_id);

            } elseif ($properties[$i]->input_type == 'multi-text') {


                $dps_id = 0;
                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $dps_id = $item->id;
                        break;
                    }
                }

                if ($dps_id == 0)
                    continue;


                $ds = [];

                foreach ($assigned_property_values as $assigned_property_value) {
                    if ($assigned_property_value->assigned_property == $dps_id) {
                        $ds[] = $assigned_property_value->value;
                    }
                }

                $properties[$i]->assigned = $ds;

            } elseif ($properties[$i]->input_type == 'array-text') {


                $subs = [];
                foreach ($properties as $property) {
                    if ($property->parent == $properties[$i]->id) {
                        $subs[] = $property;
                    }
                }

                $values = [];
                foreach ($subs as $sub) {

                    $v = [];
                    $v_en = [];
                    $v_ar = [];

                    $svs = DB::table($assigned_properties_table_name)
                        ->where('property', '=', $sub->id)
                        ->get();
                    foreach ($svs as $sv) {

                        if ((TextUtility::startsWith($sv->value, '{') && TextUtility::endsWith($sv->value, '}'))
                            || (TextUtility::startsWith($sv->value, '[') && TextUtility::endsWith($sv->value, ']'))
                        ) {

                            $locs = (array)json_decode($sv->title);
                            $v[] = $locs ['fa'];
                            $v_en[] = $locs ['en'] != null ? $locs ['en'] : "";
                            $v_ar[] = $locs ['ar'] != null ? $locs ['ar'] : "";
                        }

                    }
                    $values[$sub->title] = $v;
                    $values[$sub->title . "-en"] = $v_en;
                    $values[$sub->title . "-ar"] = $v_ar;

                }

                $properties[$i]->assigned = $values;
            } elseif ($properties[$i]->input_type == 'code') {

                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $properties[$i]->assigned = $item->value;
                    }
                }

            } elseif ($properties[$i]->input_type == 'text' ||
                $properties[$i]->input_type == 'textarea' ||
                $properties[$i]->input_type == 'tinymce') {


                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {

                        if ((TextUtility::startsWith($item->value, '{') && TextUtility::endsWith($item->value, '}'))
                            || (TextUtility::startsWith($item->value, '[') && TextUtility::endsWith($item->value, ']'))
                        ) {
                            $vals = (array)json_decode($item->value);
                            if (json_last_error() === JSON_ERROR_NONE) {
                                $properties[$i]->assigned = isset($vals['fa']) ? TextUtility::convertInvalidCharsForPrint($vals['fa']) : '';
                                foreach ($vals as $k => $v) {
                                    if ($k != 'fa') {
                                        $k = 'assigned-' . $k;
//                                        $properties[$i]->{$k} =$v;
                                        $properties[$i]->{$k} = TextUtility::convertInvalidCharsForPrint($v);
                                    }
                                }
                            }
                        } else {
                            $properties[$i]->assigned = $item->value;
                        }
                    }
                }
//                if ($properties[$i]->input_type == 'tinymce') {
//                    dd($properties[$i]->assigned);
//                }


            } else {

                foreach ($assigned_properties as $item) {
                    if ($item->property == $properties[$i]->id) {
                        $properties[$i]->assigned = $item->value;
                        break;
                    }
                }

            }
        }


        for ($i = 0; $i < count($properties); $i++) {
            $properties[$i]->fillation_rules = self::parseFillingRules($properties[$i]->fillation_rules, $properties);
        }

//        dd($properties);

        return $properties;

    }


    public static function convertPropertiesToObject($properties, $base_locale)
    {

        $props = [];

        foreach ($properties as $property) {

            $cds = new stdClass();
            $cds->input_type = $property->input_type;
            $cds->level = $property->level;
            $cds->fillation_rules = $property->fillation_rules;
            if (App::getLocale() == $base_locale) {
                $cds->value = $property->assigned;
            } else {
                if (isset($property->{'assigned-' . App::getLocale()})) {
                    $cds->value = $property->{'assigned-' . App::getLocale()};
                } else {
                    $cds->value = $property->assigned;
                }
            }
            $cds->locales = $property->locales;
            $cds->actions = $property->actions;
            $props[$property->title] = $cds;
        }

//        dd($properties);
        return $props;


    }


//    public static function getDataProperties2(
//        $properties_table_name,
//        $assigned_properties_table_name,
//        $assigned_property_values_table_name,
//        $properties,
//        $assigned_properties,
//        $object_assigned_property_code)
//    {
//
//        $use_translates = BaseController::getBaseLocale();
//
//
//        $assigned_property_ids = [];
//        foreach ($assigned_properties as $assigned_property) {
//            $assigned_property_ids[] = $assigned_property->id;
//        }
//
//        $property_ids = [];
//        foreach ($properties as $property) {
//            $property_ids [] = $property->id;
//        }
//
//        $property_title_translations = TranslationController::getTranslationsForTable(
//            $properties_table_name, 'title', $property_ids, true);
//
//        $assigned_property_value_translations = TranslationController::getTranslationsForTable(
//            $assigned_properties_table_name, 'value', $assigned_property_ids, true);
//
//        $assigned_values = DB::table($assigned_property_values_table_name)
//            ->whereIn('assigned_property', $assigned_property_ids)
//            ->get();
//
//        foreach ($properties as $property) {
//            foreach ($assigned_properties as $assigned_property) {
//                if ($assigned_property->property == $property->id) {
//                    $property->assigned = $assigned_property;
//                    break;
//                }
//            }
//        }
//
////        dd($properties);
//
//        $props = [];
//        foreach ($properties as $property) {
//
//            if ($property->parent != 0)
//                continue;
//
//            $cds = new stdClass();
//            $cds->input_type = $property->input_type;
//            $cds->level = $property->level;
//            $cds->fillation_rules = $property->fillation_rules;
//
//            if (isset($property->actions)) {
//                $cds->actions = PropertyController::parsePropertyActions($property->actions);
//            } else {
//                $cds->actions = "";
//            }
//
//
//            $cds->locales = isset($property_title_translations[$property->id]) ? $property_title_translations[$property->id] : [];
//
//            if ($property->input_type == "multi-text") {
//
//                if (!isset($property->assigned))
//                    continue;
//
//                $values = [];
//                foreach ($assigned_values as $assigned_value) {
//                    if ($assigned_value->assigned_property == $property->assigned->id) {
//                        $values [] = $assigned_value->value;
//                    }
//                }
//                $cds->title = $values;
//
//            } elseif ($property->input_type == 'single-user-relation') {
//
//
//                $r_id = $property->assigned->value;
//
//
//                $rels = DB::table('relation_objects')
//                    ->where('relation', '=', $r_id)
//                    ->where('object_type', '=', config('base.object_types.user'))
//                    ->get();
//
//                $u_id = $rels[0]->object_id;
//                $user = UserController::getItem($u_id);
//
//                $cds->title = $user->email;
//
//            } elseif ($property->input_type == 'documents:general') {
//
//                if (!isset($property->assigned))
//                    continue;
//
//                $cds->slides = self::getMultiImagesForRelatedProperty2(
//                    $assigned_properties_table_name, $property->assigned->id);
//
//            } elseif ($property->input_type == 'documents:check') {
//
//                if (!isset($property->assigned))
//                    continue;
//
//                $cds->checks = self::getMultiImagesForRelatedProperty2(
//                    $assigned_properties_table_name, $property->assigned->id);
//
//            } elseif ($property->input_type == 'users:customer') {
//
//                if (!isset($property->assigned))
//                    continue;
//
//                $prp = UserProperty::where('title', '=', 'name')
//                    ->where('type', '=', 2)
//                    ->get();
//
//                $ass_prp = DB::table('user_assigned_properties')
//                    ->where('user', '=', $property->assigned->value)
//                    ->where('property', '=', $prp[0]->id)
//                    ->get();
//
////                $props = UserController::getDataProperties2($property->assigned->value);
//
////                $cds->title = $props['name']->title;
//                $cds->title = $ass_prp[0]->value;
//
//
//            } elseif ($property->input_type == 'relations:price') {
//
//
//                if (!isset($property->assigned))
//                    continue;
//
////                dd($property->assigned->value);
//
//
////                dd($rels);
//
//                $cds->prices = self::getPriceForRelatedProperty2($property->assigned->value);
//
//
//            } elseif ($property->input_type == 'array-text') {
//
//
//                $sub_props = [];
//                $subs = [];
//                foreach ($properties as $prop) {
//                    if ($prop->parent == $property->id) {
//                        $subs [] = $prop;
//                    }
//                }
//
//                foreach ($subs as $sub) {
//
//                    $cds_sub = new stdClass();
//
//
//                    $svs = [];
//                    foreach ($assigned_properties as $assigned_property) {
//                        if ($assigned_property->property == $sub->id) {
//                            $svs [] = $assigned_property;
//                        }
//                    }
//
//
//                    $vs = [];
//
//                    foreach ($svs as $sv) {
//                        if ($use_translates) {
//
//                            $t = isset($assigned_property_value_translations[$sv->id][app()->getLocale()])
//                                ? $assigned_property_value_translations[$sv->id][app()->getLocale()] : "";
//                            $vs[] = $t != null && $t != "" ? $t : $sv->value;
//
//                        } else {
//                            $vs[] = $sv->value;
//                        }
//                    }
//
//                    $cds_sub->title = $vs;
//                    $cds_sub->input_type = $sub->input_type;
//                    $cds_sub->level = $sub->level;
//                    $sub_props[$sub->title] = $cds_sub;
//
//                }
//
//                $cds->sub_properties = $sub_props;
//
//            } elseif ($property->input_type == 'date') {
//
//
//                if (!isset($property->assigned->value)) {
//                    $property->assigned = new stdClass();
//                    $property->assigned->value = 0;
//                }
//
//                if (is_numeric($property->assigned->value)) {
//                    $sec = $property->assigned->value / 1000;
//                    $gr = date("d-m-Y", $sec);
//                    $gy = date("Y", $sec);
//                    $gm = date("m", $sec);
//                    $gd = date("d", $sec);
//                    $ja = jDateTime::toJalali($gy, $gm, $gd);
//
//
//                    $cds->title = $property->assigned->value;
//                    $cds->values['gr'] = $gr;
//                    $cds->values['ja'] = "{$ja[2]}/{$ja[1]}/{$ja[0]}";
//                }
//
//
//            } else {
//
//                if (!isset($property->assigned))
//                    continue;
//
//                if ($use_translates == true) {
//                    $t = isset($assigned_property_value_translations[$property->assigned->id][app()->getLocale()]) ?
//                        $assigned_property_value_translations[$property->assigned->id][app()->getLocale()] : "";
//                    $cds->title = $t != null && $t != "" ? $t : $property->assigned->value;
//                    $l = isset($property_title_translations[$property->id][app()->getLocale()])
//                        ? $property_title_translations[$property->id][app()->getLocale()] : "";
//                    if ($l != "")
//                        $cds->locale_text = $l;
//                } else {
//                    $cds->title = $property->assigned->value;
//                }
//
//            }
//
//
//            $props[$property->title] = $cds;
//        }
//        return $props;
//    }
//

    public static function saveProperties(
        Request $request,
        $item_type,
        $item_id,
        $properties,
        $assigned_properties_table_name,
        $assigned_property_values_table_name,
        $object_assigned_property_code,
        $settings = null,
        $part_update = false)
    {


        $uploaded_file_name = '';
//        dd($properties);

        $locales = ['en', 'ar'];
        $all_locales = ['fa', 'en', 'ar'];

        $keys = $request->keys();
        $to_add_arrs = [];

        foreach ($properties as $property) {
            if ($property->parent != 0)
                continue;


            $to_add_arr = [];
            if (array_search($property->title, $keys) !== false) {

                $k_t = $keys[array_search($property->title, $keys)];

                if ($request->hasFile($k_t)) {
                    $value = $request->file($k_t);
                } else {
                    $value = $request->input($k_t);
                }


                if ($property->input_type == 'documents:general') {


                    $paths = $value;
                    $doc_ids = [];
                    foreach ($paths as $path) {

//                        dd($path);
                        $d = DB::table('document_assigned_properties')
                            ->where('value', '=', $path)
                            ->orWhere('value', '=', PathUtility::normalizePath($path))
                            ->get();


                        $d_id = $d[0]->document;
                        $doc_ids[] = $d_id;

//                        $relation = new Relation();
//                        $relation->title = 'raleted image to room';
//                        $relation->type = 1;
//                        $relation->save();
//                        $r_id = $relation->id;
//
//
//                        DB::table('relation_objects')->insert(
//                            [
//                                'relation' => $r_id,
//                                'object_type' => config('base.object_types.document'),
//                                'object_id' => $d_id,
//                            ]
//                        );
//
//                        DB::table('relation_objects')->insert(
//                            [
//                                'relation' => $r_id,
//                                'object_type' => $object_assigned_property_code,
//                                'object_id' => $dp_id,
//                            ]
//                        );

                    }


                    $dp_id = DB::table($assigned_properties_table_name)->insertGetId(
                        [
                            'property' => $property->id,
                            'value' => implode(',', $doc_ids),
                            $item_type => $item_id,
                        ]
                    );

                } elseif ($property->input_type == 'documents:video') {

                    $paths = $value;
                    $doc_ids = [];
                    foreach ($paths as $path) {
                        $d = DB::table('document_assigned_properties')
                            ->where('value', '=', $path)
                            ->orWhere('value', '=', PathUtility::normalizePath($path))
                            ->get();
                        $d_id = $d[0]->document;
                        $doc_ids[] = $d_id;
                    }
                    $dp_id = DB::table($assigned_properties_table_name)->insertGetId(
                        [
                            'property' => $property->id,
                            'value' => implode(',', $doc_ids),
                            $item_type => $item_id,
                        ]
                    );

                } elseif ($property->input_type == 'documents:swf') {

                    $paths = $value;
                    $doc_ids = [];
                    foreach ($paths as $path) {
                        $d = DB::table('document_assigned_properties')
                            ->where('value', '=', $path)
                            ->orWhere('value', '=', PathUtility::normalizePath($path))
                            ->get();
                        $d_id = $d[0]->document;
                        $doc_ids[] = $d_id;
                    }
                    $dp_id = DB::table($assigned_properties_table_name)->insertGetId(
                        [
                            'property' => $property->id,
                            'value' => implode(',', $doc_ids),
                            $item_type => $item_id,
                        ]
                    );

                } elseif ($property->input_type == 'documents:check') {


                } elseif ($property->input_type == 'file') {


                    $ext = $value->getClientOriginalExtension();
                    $orig_name = pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME);
                    $dt = date('Y-m-d_h-i-s');
                    $name = $orig_name . '_' . $dt . "." . $ext;

                    if (in_array($ext, config('base.image_extensions'))) {

                        foreach (config('base.image_sizes') as $k => $v) {
                            Image::make($value->getRealPath())->fit($v[0], $v[1])->save(public_path("uploads/{$k}/" . $name));
                            chmod(public_path("uploads/{$k}/" . $name), 0644);
                        }

                        $image_resize = Image::make($value->getRealPath());
                        if (isset($settings->width) && isset($settings->height)
                            && $settings->width != "" && $settings->width != 0
                            && $settings->height != "" && $settings->height != 0) {
                            $image_resize->resize($settings->width, $settings->height);
                        }

                        $image_resize->save(public_path('uploads/' . $name));
                        chmod(public_path('uploads/' . $name), 0644);
                        $path = url('uploads/') . "/" . $name;
                        $date = round(microtime(true) * 1000, 0);

                    } elseif (in_array($ext, config('base.video_extensions'))) {
                        $value->move(public_path('/uploads/'), $name);
                        chmod(public_path('uploads/' . $name), 0644);
                        $path = url('uploads/') . "/" . $name;
                    } elseif ($ext == 'swf') {
                        $value->move(public_path('/uploads/'), $name);
                        chmod(public_path('uploads/' . $name), 0644);
                        $path = url('uploads/') . "/" . $name;
                    }

                    $to_add_arr = [
                        'property' => $property->id,
                        'value' => $path,
                        $item_type => $item_id
                    ];
                    $to_add_arrs[] = $to_add_arr;

                    $uploaded_file_name = $path;

                } elseif ($property->input_type == 'cropper') {

                    $destinationPath = public_path() . '/uploads/';
                    $file = str_replace('data:image/png;base64,', '', $value);
                    $img = str_replace(' ', '+', $file);
                    $data1 = base64_decode($img);
                    $name = sha1(time());
                    $filename = $name . ".png";
                    $file = $destinationPath . $filename;
                    $success = file_put_contents($file, $data1);

                    chmod($file, 0644);
                    $returnData = 'uploads/' . $filename;
                    $image = Image::make(file_get_contents(URL::asset($returnData)));

                    if (isset($settings->width) && isset($settings->height) && $settings->width != "" && $settings->width != 0 && $settings->height != "" && $settings->height != 0) {
                        $image = $image->resize($settings->width, $settings->height)->save($destinationPath . $filename);
                        chmod($destinationPath . $filename, 0644);
                    }

                    $path = url('uploads/') . "/" . $filename;
                    $date = round(microtime(true) * 1000, 0);

                    $to_add_arr = [
                        'property' => $property->id,
                        'value' => $path,
                        $item_type => $item_id
                    ];
                    $to_add_arrs[] = $to_add_arr;

                    $uploaded_file_name = $path;

                } elseif ($property->input_type == 'select-template') {

                    $template = Template::where('title', '=', $value)->get();
                    $tvalue = 0;
                    if (count($template))
                        $tvalue = $template[0]->widget;

                    $to_add_arr = [
                        'property' => $property->id,
                        'value' => $tvalue,
                        $item_type => $item_id
                    ];
                    $to_add_arrs[] = $to_add_arr;


                } elseif ($property->input_type == 'relations:price') {


                    $price_type_id = RelationType::where('title', '=', 'price')->first()->id;

                    $relation = new Relation();
                    $relation->title = 'related room to price';
                    $relation->type = $price_type_id;
                    $relation->save();
                    $r_id = $relation->id;


//                    DB::table('relation_objects')->insert(
//                        [
//                            'relation' => $r_id,
//                            'object_type' => $object_assigned_property_code,
//                            'object_id' => $dp_id,
//                        ]
//                    );

                    $r_props = RelationProperty::where('type', '=', $price_type_id)->get();

                    foreach ($r_props as $r_prop) {

                        if ($r_prop->title == $property->title) {
                            DB::table('relation_assigned_properties')
                                ->insert(
                                    [
                                        'relation' => $r_id,
                                        'property' => $r_prop->id,
                                        'value' => $value,
                                    ]
                                );

                        } else {

                            DB::table('relation_assigned_properties')
                                ->insert(
                                    [
                                        'relation' => $r_id,
                                        'property' => $r_prop->id,
                                        'value' => 0,
                                    ]
                                );
                        }
                    }


                    $dp_id = DB::table($assigned_properties_table_name)->insertGetId(
                        [
                            'property' => $property->id,
                            'value' => $r_id,
                            $item_type => $item_id,
                        ]
                    );


                } elseif ($property->input_type == 'dates') {


                    if ($part_update) {
                        DB::table($assigned_properties_table_name)
                            ->where($item_type, '=', $item_id)
                            ->where('property', '=', $property->id)
                            ->delete();
                    }

                    if (isset($value)) {
                        if (is_array($value)) {
                            $v = implode(',', $value);
                        } else {
                            $v = $value;
                        }
                    } else {
                        $v = $property->default_value;
                    }

                    $to_add_arr = [
                        'property' => $property->id,
                        'value' => $v,
                        $item_type => $item_id
                    ];
                    $to_add_arrs[] = $to_add_arr;

                } elseif ($property->input_type == 'nestable') {

                    if (isset($value) && is_array($value)) {
                        $to_add_arr = [
                            'property' => $property->id,
                            'value' => implode(',', $value),
                            $item_type => $item_id
                        ];
                        $to_add_arrs[] = $to_add_arr;
                    }


                } elseif ($property->input_type == 'users:*') {

                    $to_add_arr = [
                        'property' => $property->id,
                        'value' => ($value == null ? '' : $value),
                        $item_type => $item_id
                    ];
                    $to_add_arrs[] = $to_add_arr;

                } elseif ($property->input_type == 'multi-text') {


                    $vs = $value;
                    $dp_id = DB::table($assigned_properties_table_name)->insertGetId(
                        [
                            'property' => $property->id,
                            'value' => '-',
                            $item_type => $item_id
                        ]
                    );

                    foreach ($vs as $v) {
                        DB::table($assigned_property_values_table_name)->insert(
                            [
                                'assigned_property' => $dp_id,
                                'value' => $v
                            ]
                        );
                    }
                } elseif ($property->input_type == 'code') {

                    $to_add_arr = [
                        'property' => $property->id,
                        'value' => $value,
                        $item_type => $item_id
                    ];
                    $to_add_arrs[] = $to_add_arr;

                } elseif ($property->input_type == 'textarea'
                    || $property->input_type == 'text'
                    || $property->input_type == 'summernote'
                    || $property->input_type == 'tinymce') {

                    $ptitle = $property->title;
                    $translates = [];
                    foreach ($all_locales as $locale) {
                        if (array_search("$ptitle-{$locale}", $keys)) {
                            $k_t = $keys[array_search("$ptitle-{$locale}", $keys)];
                            $pvalue = $request->input($k_t);
                            $translates[$locale] = TextUtility::removeInvalidChars($pvalue);
                        }
                    }

                    if (count($translates) == 0) {
                        $to_add_arr = [
                            'property' => $property->id,
                            'value' => ($value == null ? '' : TextUtility::removeInvalidChars($value)),
                            $item_type => $item_id
                        ];
                        $to_add_arrs[] = $to_add_arr;

                    } else {
//                        $translates['fa'] = TextUtility::removeInvalidChars($value);
                        $to_add_arr = [
                            'property' => $property->id,
                            'value' => json_encode($translates, JSON_UNESCAPED_UNICODE),
                            $item_type => $item_id
                        ];
                        $to_add_arrs[] = $to_add_arr;
                    }

//                    echo json_encode($translates, JSON_UNESCAPED_UNICODE);
//                    echo "<br>";
//                    dd(json_encode($translates, JSON_UNESCAPED_UNICODE));

                } elseif ($property->input_type == 'password') {

                    $to_add_arr = [
                        'property' => $property->id,
                        'value' => bcrypt($value),
                        $item_type => $item_id
                    ];
                    $to_add_arrs[] = $to_add_arr;

                } else {

                    $to_add_arr = [
                        'property' => $property->id,
                        'value' => ($value == null ? '' : $value),
                        $item_type => $item_id
                    ];
                    $to_add_arrs[] = $to_add_arr;
                }


            } else {


                if ($property->input_type == 'check') {

                    $to_add_arr = [
                        'property' => $property->id,
                        'value' => '0',
                        $item_type => $item_id
                    ];
                    $to_add_arrs[] = $to_add_arr;


                } elseif ($property->input_type == 'dates') {

                    if ($part_update) {
                        DB::table($assigned_properties_table_name)
                            ->where($item_type, '=', $item_id)
                            ->where('property', '=', $property->id)
                            ->delete();
                    }

                    $v = $property->default_value;
                    $to_add_arr = [
                        'property' => $property->id,
                        'value' => $v,
                        $item_type => $item_id
                    ];
                    $to_add_arrs[] = $to_add_arr;

                } elseif ($property->input_type == 'text') {

                    if ($part_update) {
                        DB::table($assigned_properties_table_name)
                            ->where($item_type, '=', $item_id)
                            ->where('property', '=', $property->id)
                            ->delete();
                    }

                    $to_add_arr = [
                        'property' => $property->id,
                        'value' => '',
                        $item_type => $item_id,
                    ];
                    $to_add_arrs[] = $to_add_arr;

                } elseif ($property->input_type == 'array-of-sub-properties') {


                    $subs = [];
                    foreach ($properties as $prop) {
                        if ($prop->parent == $property->id) {
                            $subs[] = $prop;
                        }
                    }

                    foreach ($subs as $sub) {

                        if ($sub->input_type == 'select' && $sub->title == 'condition') {
                            $to_add_arr = [
                                'property' => $sub->id,
                                'value' => $request->input('condition'),
                                $item_type => $item_id,
                            ];

                        } elseif ($sub->input_type == 'single-relation-users-all' && $sub->title == 'user') {

                            $rel = new Relation();
                            $rel->type = 1;
                            $rel->title = 'connect user to service log';
                            $rel->save();
                            $rel_id = $rel->id;


                            $ser_ass_id = DB::table('service_assigned_properties')
                                ->insertGetId(
                                    [
                                        'property' => $sub->id,
                                        'value' => $rel_id,
                                        $item_type => $item_id
                                    ]
                                );


                            DB::table('relation_objects')
                                ->insert(
                                    [
                                        'relation' => $rel_id,
                                        'object_type' => config('base.object_types.service_assigned_property'),
                                        'object_id' => $ser_ass_id,
                                    ]
                                );

                            DB::table('relation_objects')
                                ->insert(
                                    [
                                        'relation' => $rel_id,
                                        'object_type' => config('base.object_types.user'),
                                        'object_id' => $request->input('customer'),
                                    ]
                                );


                        } elseif ($sub->input_type == 'date') {

                            $to_add_arr = [
                                'property' => $sub->id,
                                'value' => $request->input('date'),
                                $item_type => $item_id,
                            ];

                        }

                        $to_add_arrs[] = $to_add_arr;
                    }


                } elseif ($property->input_type == 'array-text') {

                    $subs = [];
                    foreach ($properties as $prop) {
                        if ($prop->parent == $property->id) {
                            $subs[] = $prop;
                        }
                    }
                    foreach ($subs as $sub) {

                        $vals = $request->input($sub->title);
                        $vals_en = $request->input($sub->title . '-en');
                        $vals_ar = $request->input($sub->title . '-ar');

                        for ($i = 0; $i < count($vals); $i++) {

                            $id = DB::table('data_assigned_properties')
                                ->insertGetId(
                                    [
                                        $item_type => $item_id,
                                        'property' => $sub->id,
                                        'value' => $vals[$i]
                                    ]
                                );


                            DB::table('translations')
                                ->insert(
                                    [
                                        'locale' => 'en',
                                        'table' => $assigned_properties_table_name,
                                        'field' => 'value',
                                        'record' => $id,
                                        'value' => $vals_en[$i],
                                    ]
                                );

                            DB::table('translations')
                                ->insert(
                                    [
                                        'locale' => 'ar',
                                        'table' => $assigned_properties_table_name,
                                        'field' => 'value',
                                        'record' => $id,
                                        'value' => $vals_ar[$i],
                                    ]
                                );

                        }
                    }
                }

            }
        }


        DB::table($assigned_properties_table_name)->insert(
            $to_add_arrs
        );


//        $translates = [];
//        foreach ($properties as $property) {
//            if ($property->input_type == 'text' || $property->input_type == 'summernote') {
//                $ptitle = $property->title;
//                $pid = $property->id;
//                $tr = [];
//                foreach ($locales as $locale) {
//                    if (array_search("$ptitle-{$locale}", $keys)) {
//                        $k_t = $keys[array_search("$ptitle-{$locale}", $keys)];
//                        $pvalue = $request->input($k_t);
//
//                        $regid = DB::table($assigned_properties_table_name)
//                            ->where($item_type, '=', $item_id)
//                            ->where('property', '=', $property->id)
//                            ->get(['id']);
//
//
//                        $translates[] = [
//                            'locale' => $locale,
//                            'table' => $assigned_properties_table_name,
//                            'field' => 'value',
//                            'record' => $regid[0]->id,
//                            'value' => $pvalue,
//                        ];
//                    }
//                }
//            }
//        }
//
////        return;
//        DB::table('translations')->insert(
//            $translates
//        );

        return $uploaded_file_name;

    }

    public
    static function parseValidationRules($rule)
    {
        if ($rule != '') {
            $arr = explode('|', $rule);
            if (count($arr) > 1) {
                foreach ($arr as $ar) {
                    $rs = explode(':', $ar);
                    if (count($rs) > 1) {
                        $rules[$rs[0]] = $rs[1];
                    } else {
                        $rules[$rs[0]] = $rs[0];
                    }
                }
                return $rules;
            }
        }

        return $rule;
    }


    public static function sortProperties($props)
    {

        $groups = [];
        $g_id = 1;
        $r_id = 1;

        while (true) {
            $group = [];
            foreach ($props as $k => $prop) {

                if (isset($prop->fillation_rules) && isset($prop->fillation_rules['group'])) {
                    if ($prop->fillation_rules['group'] == $g_id) {
                        $group[$prop->fillation_rules['order']] = $prop;
                        unset($props[$k]);
                    }

                } else {
                    unset($props[$k]);
                }

            }
            if (count($group) > 0) {
                $groups[$g_id] = $group;
            }

            $g_id++;
            if (count($props) == 0)
                break;
        }


        ksort($groups);

        $f_groups = [];
        foreach ($groups as $k => $v) {
            ksort($v);
            $f_groups[$k] = $v;
        }


        return $f_groups;

    }


    public static function getFilters($props)
    {

        $filters = [];
        $g_id = 1;
        $r_id = 1;

        foreach ($props as $prop) {
            if (isset($prop->filters)) {
                foreach ($prop->filters as $f_f) {
                    if (isset($f_f['group']['order'])) {
                        $filters[$f_f['group']['order']]['properties'] = null;
                    }
                }
            }
        }

        $final_filters = [];
        foreach ($filters as $k => $filter) {
            $final_filter = [];
            $f_prop = [];
            foreach ($props as $prop) {
                if (isset($prop->filters)) {
                    foreach ($prop->filters as $f_f) {
                        if (isset($f_f['group']['order']) && $f_f['group']['order'] == $k) {
                            $p = unserialize(serialize($prop));
                            $tt_filters = $p->filters;
                            foreach ($tt_filters as $k1 => $v) {
                                if ($v['group']['order'] != $f_f['group']['order']) {
                                    unset($tt_filters[$k1]);
                                }
                            }
                            $p->filters = $tt_filters;
                            $f_prop [] = $p;
                        }
                    }
                }
            }

            $final_filter['properties'] = $f_prop;
            $final_filters [$k] = $final_filter;
        }

//        dd($final_filters);


        ksort($final_filters);
        return $final_filters;


//        $f_filters = [];
//        foreach ($final_filters as $k => $v) {
//            ksort($v);
//            $f_filters[$k] = $v;
//        }
//
//
//        dd($f_filters);
//        return $f_filters;


    }

    public static function parseFilters($string_json, $route = 'current')
    {
        if (is_null($string_json) || empty($string_json) || $string_json == '')
            return [];

        if ($route == 'current') {
            $route = Route::currentRouteName();
        }

        if ((TextUtility::startsWith($string_json, '{') && TextUtility::endsWith($string_json, '}'))
            || (TextUtility::startsWith($string_json, '[') && TextUtility::endsWith($string_json, ']'))
        ) {
            $jsons = json_decode($string_json, true);

            foreach ($jsons as $json) {
                if (in_array($route, $json['routes'])) {

                    foreach ($json['filters'] as &$filter) {
                        $filter['url'] = "";
                    }

                    return $json['filters'];
                }
            }
        }
        return [];

    }


    public static function parseFillingRules($rule, $properties = [], $route = "current")
    {
        if ($route == 'current') {
            $route = Route::currentRouteName();
        }


//        var_dump($rule);
//        echo "<br>";
        if (trim($rule) != '' && $rule != null) {
//        var_dump($rule);
//        echo "<br>";

            $b_arr = explode('||', $rule);
            foreach ($b_arr as $b_ar) {
                $f_arr = explode('-->', $b_ar);
                if (count($f_arr) == 2) {
                    $r_arr = explode(':', $f_arr[0]);
                    if (count($r_arr) == 2) {
                        if (!in_array($route, explode(',', $r_arr[1])) && explode(',', $r_arr[1])[0] != 'all')
                            continue;


                        $g_arr = explode('&&', $f_arr[1]);

                        foreach ($g_arr as $gr) {

                            $conds = explode('->', $gr)[0];
                            $conds = explode('=>', $conds)[1];
                            if (trim($conds) == '*') {

                                $sits = explode('->', $gr)[1];
                                $c_arr = explode('&', $sits);
                                $t_rules = [];
                                foreach ($c_arr as $c_ar) {
                                    $d_arr = explode(':', $c_ar);
                                    if (count($d_arr) == 2) {
                                        $t_rules [$d_arr[0]] = $d_arr [1];
                                    } elseif (count($d_arr) == 1) {
                                        $t_rules [$d_arr[0]] = true;
                                    }
                                }
                                if (isset($t_rules)) {
                                    $t_rules = GuiUtility::convertColumnsToBt($t_rules);
                                }
                                return $t_rules;


                            } else {

                                $prp = explode(':', $conds)[0];
                                $vlu = explode(':', $conds)[1];

                                $to_add = false;
                                foreach ($properties as $property) {

                                    if ($property->title == $prp && $property->assigned == $vlu) {
//                                        dd($property->assigned);
                                        $to_add = true;
                                        break;
                                    }
                                }

//                                dd($to_add);

                                if ($to_add == true) {

                                    $sits = explode('->', $f_arr[1])[1];
                                    $c_arr = explode('&', $sits);
                                    $t_rules = [];
                                    foreach ($c_arr as $c_ar) {
                                        $d_arr = explode(':', $c_ar);
                                        if (count($d_arr) == 2) {
                                            $t_rules [$d_arr[0]] = $d_arr [1];
                                        } elseif (count($d_arr) == 1) {
                                            $t_rules [$d_arr[0]] = true;
                                        }
                                    }
                                    if (isset($t_rules)) {
                                        $t_rules = GuiUtility::convertColumnsToBt($t_rules);
                                    }
                                    return $t_rules;


                                }
                            }


                        }


                    }
                }
            }
        }
        return '';
    }

    public
    static function parseTypeActions($action)
    {

        $acs = explode(',', $action);
        $actions = [];
        foreach ($acs as $ac) {
            $actions[$ac] = true;
        }

        return $actions;
    }


}
