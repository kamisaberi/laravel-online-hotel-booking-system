<?php

namespace App\Http\Controllers\Item;

use App;
use App\Data;
use App\DataProperty;
use App\DataPropertyValue;
use App\DataType;
use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Base\ComponentController;
use App\Http\Controllers\Base\PropertyController;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\Document\DocumentController;
use App\Http\Controllers\Navigation\NavigationController;
//use App\Http\Controllers\Relation\RelationController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Widget\WidgetController;
use App\Libraries\MyLib\MyPluralizer;
use App\Libraries\Utilities\ItemUtility;
use App\Libraries\Utilities\TextUtility;
use App\Libraries\Utilities\TypeUtility;
use App\Rules\AppUnique;
use App\Rules\CheckLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Self_;
use Route;
use stdClass;
use Validator;

class ItemTController extends Controller
{

    public static function getBaseInformation(&$data, $type)
    {

        $navs = NavigationController::getNavigation('admin', true);
        foreach ($navs as $k => $nav) {
            foreach ($nav as $k1 => $nav1) {
                if (in_array($nav1->properties->route, config('base.routes.data.items'))
                    && $nav1->properties->value == $type) {
                    $nav1->active = true;
                } else {
                    $nav1->active = false;
                }
            }
        }

        $data['navigations'] = $navs;
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

    public static function getUrls($type, $id = 0)
    {

        $actions = ItemUtility::getItemActions(Route::currentRouteName(), Route::current()->parameters());

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

        return $urls;

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

    public static function getItemsValidationRules($route, $parameters)
    {
        $route = DB::table('routes')
            ->where('name', '=', $route)
            ->where('parameters', '=', json_encode($parameters))->get();


        if (count($route) == 0 || count($route) >= 2) {
            return [];
        }

        $groups = DB::table('validation_groups')
            ->join('validation_group_items', 'validation_group_items.group', '=', 'validation_groups.id')
            ->join('validation_items', 'validation_items.id', '=', 'validation_group_items.item')
            ->where('validation_groups.route', '=', $route[0]->id)
            ->get(['validation_items.*']);

//        dd($groups );
//        if (count($groups) == 0 || count($groups) >= 2) {
//            return null;
//        }
//        $group = $groups[0];

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


    public function index(Request $request, $type, $filters = null)
    {

        if (Str::lower(Str::singular($type)) == "room") {
            return ((new App\Http\Controllers\RoomController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "hotel") {
            return ((new App\Http\Controllers\HotelController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "news") {
            return ((new App\Http\Controllers\NewsController())->index($request, $type, $filters));
        }


//        $filts = $filters == null ? null : json_decode(urldecode($filters));
//        $data = BaseController::createBaseInformations();
//        self::getBaseInformation($data, $type);
//
//        $data['type'] = $type;
//
//        if (!\Request::ajax()) {
//
//            $data['page_title'] = trans('messages.list of') . Str::plural($type);
//            $data['breadcrumbs'] = [
//                [
//                    'title' => trans('messages.navigation_titles.dashboard'),
//                    'url' => route('admin.index')
//                ],
//                [
//                    'title' => Str::plural($type),
//                    'url' => ''
//                ]
//            ];
//
//            $data ['widgets'] = WidgetController::getWidgets("items.index", $type);
//
//        }
//
//        $data['urls'] = self::getUrls($type);
//        $data['permissions'] = self::getPermissions($type);
//        $data ['datas'] = ItemUtility::getItems($type);
//
//        if (!\Request::ajax()) {
//            return view("admin.items.views.index", $data);
//        } else {
//            return response()->json(['error' => 0, 'message' => $data]);
//        }
    }

    public function create($type)
    {


        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data, $type);

//        self::checkType($type);
//        self::checkTables();

//        dd(self::$property_table_structure);

        $data['groups'] = ItemUtility::getPropertiesForInput(Route::currentRouteName(), Route::current()->parameters());
//        dd($data['groups']);
        $data['components'] = self::getRequiredComponents($data['groups']);

        $data['type'] = $type;
        $data['urls'] = self::getUrls($type);

        $data['permissions'] = self::getPermissions($type);
        $data['page_title'] = trans('messages.list of') . Str::plural($type);
        $data['breadcrumbs'] = [
            [
                'title' => trans('messages.navigation_titles.dashboard'),
                'url' => route('admin.index')
            ],
            [
                'title' => Str::plural($type),
                'url' => route('items.index', ['type' => $type])
            ],
            [
                'title' => trans('messages.create new item'),
                'url' => ''
            ]
        ];

//        return  route("data.properties.update", ['type' => 'news', 'id'=>93]);
//        return $data;
        return view("admin.items.views.create", $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type)
    {

//        self::checkType($type);
//        self::checkTables();

//        $ruels = self::getItemsValidationRules(Route::currentRouteName(), Route::current()->parameters());
//        dd($ruels);
        $validator = Validator::make(
            $request->all(),
            self::getItemsValidationRules(Route::currentRouteName(), Route::current()->parameters())
        );
        if ($validator->passes()) {

//            dd($request->toArray());
            $received_data = $request->toArray();
//            $separated_data = self::separateReceivedData($received_data);
            $separated_data = ItemUtility::separateReceivedData($type, $received_data);

            ItemUtility::storeData($type, $separated_data['item'], $separated_data['property']);

//            dd($separated_data);

            //            return response()->json(['success' => 'Added new records.']);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Data $data
     * @return \Illuminate\Http\Response
     */
    public function show($type, $id)
    {
        $data = BaseController::createBaseInformations();

        $user = UserController::getCurrentUserData();
        $data ['user'] = $user;

        $data['navigations'] = NavigationController::getNavigation('admin');

        return view("items.index", $data);

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Data $data
     * @return \Illuminate\Http\Response
     */
    public function edit($type, $id)
    {

        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data, $type);

//        self::checkType($type);
//        self::checkTables();

        $data['groups'] = ItemUtility::getPropertiesForInput(Route::currentRouteName(), Route::current()->parameters());
        $data['type'] = $type;
        $data['id'] = $id;

        $data['urls'] = self::getUrls($type, $id);
        $data['permissions'] = self::getPermissions($type);
        $data['page_title'] = trans('messages.list of') . Str::plural($type);
        $data['breadcrumbs'] = [
            [
                'title' => trans('messages.navigation_titles.dashboard'),
                'url' => route('admin.index')
            ],
            [
                'title' => Str::plural($type),
                'url' => route('items.index', ['type' => $type])
            ],
            [
                'title' => trans('messages.edit existing item'),
                'url' => ''
            ]
        ];
//        return $data;
        return view("admin.items.views.edit", $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Data $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type, $id)
    {

//        self::checkType($type);
//        self::checkTables();

        $validator = Validator::make(
            $request->all(),
            self::getItemsValidationRules(Route::currentRouteName(), Route::current()->parameters())
        );
        if ($validator->passes()) {

            $received_data = $request->toArray();
//            $separated_data = self::separateReceivedData($received_data);
            $separated_data = ItemUtility::separateReceivedData($type, $received_data);
            ItemUtility::storeData($type, $separated_data['item'], $separated_data['property'], $id);

//            dd($separated_data);

            return response()->json(['success' => 'Added new records.']);
        }
        return response()->json(['error' => $validator->errors()->all()]);
//        return redirect()->route("data.index", ['type' => $type]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Data $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $type)
    {

        $id = $request->input('id');
        ItemUtility::deleteData($type, $id);

        return response()->json(['error' => 0, 'message' => 'id is : ' . $id]);
    }


    public function changeProperty(Request $request, $type)
    {
        $did = $request->input('id');
        $value = $request->input('value');
        $key = $request->input('key');
//        return response()->json(["error" => 0, 'message' => "dassasdadds"]);
//        return response()->json(["error" => 0, 'message' => $did . " " . $value . " " . $key]);
        $dtid = Data::where('id', '=', $did)->get();
        $p = DataProperty::where('title', '=', $key)->where('type', '=', $dtid[0]->type)->get();

        $pid = $p[0]->id;

        DB::table('data_assigned_properties')
            ->where('data', '=', $did)
            ->where('property', '=', $pid)
            ->update([
                'value' => $value
            ]);

//        return response()->json(["error" => 0, 'message' => $pid ]);

        return response()->json(["error" => 0, 'message' => 'success']);
    }


    public function refresh(Request $request)
    {

        $did = $request->input('id');
        $value = $request->input('value');
        $key = $request->input('key');

        $dtid = Data::where('id', '=', $did)->get();

        $p = DataProperty::where('title', '=', $key)->where('type', '=', $dtid[0]->type)->get();
        $pid = $p[0]->id;

        DB::table('data_assigned_properties')
            ->where('data', ' = ', $did)
            ->where('property', ' = ', $pid)
            ->update([
                'value' => $value
            ]);

        return response()->json(["error" => 0, 'message' => 'success']);
    }


}
