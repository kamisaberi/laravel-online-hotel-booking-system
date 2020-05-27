<?php

namespace App\Http\Controllers\User;

use App;
use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Base\ComponentController;
use App\Http\Controllers\Base\PropertyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Navigation\NavigationController;
use App\Http\Controllers\Widget\WidgetController;
use App\Libraries\MyLib\MyPluralizer;
use App\Libraries\Utilities\TextUtility;
use App\Libraries\Utilities\TypeUtility;
use App\User;
use App\UserProperty;
use App\UserType;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use Route;
use Spatie\Permission\Models\Role;
use stdClass;
use Validator;

class UserController extends Controller
{

    protected static $types_table_name = 'user_types';

    public static function getBaseInforamation(&$data, $type)
    {
        $navs = NavigationController::getNavigation('admin', true);

        foreach ($navs as $k => $nav) {
            foreach ($nav as $k1 => $nav1) {
                if (in_array($nav1->properties->route, config('base.routes.users.items'))
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
        $permissions['index'] = "users.index" . ":" . $type;
        $permissions['show'] = "users.show" . ":" . $type;
        $permissions['create'] = "users.create" . ":" . $type;
        $permissions['store'] = "users.store" . ":" . $type;
        $permissions['update'] = "users.update" . ":" . $type;
        $permissions['edit'] = "users.edit" . ":" . $type;
        $permissions['change'] = "users.change" . ":" . $type;
        $permissions['destroy'] = "users.destroy" . ":" . $type;


        $permissions['properties.store'] = "users.properties.store" . ":" . $type;
        $permissions['settings.edit'] = "users.settings" . ":" . $type;

        return $permissions;


    }

    public static function getUrls($type, $actions = [], $id = 0)
    {

        $urls = [];
        $urls['index'] = route("users.index", ['type' => $type]);
        if (isset($actions['create']) && $actions['create'] == true) {
            $urls['create'] = route("users.create", ['type' => $type]);
            $urls['store'] = route("users.store", ['type' => $type]);
        }
        if (isset($actions['edit']) && $actions['edit'] == true)
            $urls['update'] = route("users.update", ['type' => $type, 'id' => $id]);
        $urls['change'] = route("users.change", ['type' => $type]);
        if (isset($actions['destroy']) && $actions['destroy'] == true)
            $urls['destroy'] = route("users.destroy", ['type' => $type]);

        if (isset($actions['show']) && $actions['show'] == true)
            $urls['show'] = route("users.show", ['type' => $type, 'id' => $id]);

        $urls['properties.store'] = route("users.properties.store", ['type' => $type]);

        if (isset($actions['settings']) && $actions['settings'] == true)
            $urls['settings.edit'] = route("users.settings.edit", ['type' => $type]);
        return $urls;

    }


//    public static function getDataProperties2($user_id)
//    {
//
////        dd($user_id);
////        dd(Route::getCurrentRoute());
//
//        $type_id = User::find($user_id)->type;
//        $properties = UserProperty::where('type', '=', $type_id)->where('is_setting', '=', 0)->get();
//        $assigned_properties = DB::table('user_assigned_properties')
//            ->where('user', '=', $user_id)
//            ->get();
//
//
//        $props = PropertyController::getDataProperties2(
//            "user_properties",
//            "user_assigned_properties",
//            "user_assigned_property_values",
//            $properties,
//            $assigned_properties,
//            config('base.object_types.user_assigned_property')
//        );
//        return $props;
//    }


    public static function getDataProperties3($type, $id = null, $filters = null)
    {
        if ($type == null && $id == null)
            return null;

        if ($type == null) {
            $user = User::find($id);
//            $type = UserType::find($user->type)->first()->title;
            $type = UserType::where('id', '=', $user->type)->get()[0]->title;
//            dd($type , $id, $user->type);
        }

        $properties = self::getProperties($type, $id, false, 'current', $filters);
        $base_locale = 'fa';
//        if($tt == null)
//            dd($properties);

        if (!is_null($properties)) {
            return PropertyController::convertPropertiesToObject($properties, $base_locale);

        } else {
            return null;
        }

    }


    public static function getItem($id)
    {
        $object = User::where('id', '=', $id)->get();
        if (count($object) == 0)
            return null;

        $user = $object[0];
        if ($object[0]->type == 1) {
            $user->properties = self::getDataProperties3('user', $user->id);
        } elseif ($object[0]->type == 2) {
            $user->properties = self::getDataProperties3('customer', $user->id);
        }


        return $user;
    }

    public static function getItems($type, $actions = [])
    {
        $bt_id = UserType::where('title', '=', $type)->first();
        $objects = User::where('type', '=', $bt_id->id)->get();

        for ($i = 0; $i < count($objects); $i++) {
            $objects[$i]->properties = self::getDataProperties3('user', $objects[$i]->id);

            $urls = [];
            if (isset($actions['edit']) && $actions['edit'] == true) {
                $urls['edit'] = route('users.edit', ['type' => $type, 'id' => $objects[$i]->id]);
            }
            $objects[$i]->urls = $urls;
        }
        return $objects;
    }

    public static function getItems2($type, $actions = [], $filling_rules_required = false, $sort_properties = true, $route = 'current', $filters = null)
    {
        $bt_id = UserType::where('title', '=', $type)->first();
        $objects = User::where('type', '=', $bt_id->id)->get();

        foreach ($objects as $k => $object) {
            $properties = self::getProperties($type, $object->id, $filling_rules_required, $route, $filters);
            if (is_null($properties)) {
                unset($objects[$k]);
                continue;
            }
            if ($sort_properties) {
                $object->properties = PropertyController::sortProperties($properties);
            } else {
                $object->properties = $properties;
            }
            $urls = [];
            if (isset($actions['edit']) && $actions['edit'] == true) {
                $urls['edit'] = route('users.edit', ['type' => $type, 'id' => $object->id]);
            }
            if (isset($actions['show']) && $actions['show'] == true) {
                $urls['show'] = route('users.show', ['type' => $type, 'id' => $object->id]);
            }


            $urls['update'] = route('users.update', ['type' => $type, 'id' => $object->id]);
            $object->urls = $urls;
        }


        //TODO ADD TO OTHERS
        $objs = [];
        foreach ($objects as $object) {
            $objs[] = $object;
        }

//        $objects = array_merge($objects );
        return $objs;
    }

    public static function getItems3($type, $actions = [], $filters = null)
    {
//        if($filters != null)
//            dd($type,$filters);

        $bt_id = UserType::where('title', '=', $type)->first();
        $data ['type'] = $type;
        $objects = User::where('type', '=', $bt_id->id)->get();

        foreach ($objects as $k => $object) {

            $properties = self::getDataProperties3($type, $object->id, $filters);

            if (is_null($properties)) {
                unset($objects[$k]);
                continue;
            }

            $object->properties = $properties;

            $urls = [];
            if (isset($actions['edit']) && $actions['edit'] == true) {
                $urls['edit'] = route('users.edit', ['type' => $type, 'id' => $object->id]);
            }
            $object->urls = $urls;

        }

        $objs = [];
        foreach ($objects as $object) {
            $objs[] = $object;
        }
        return $objs;


//        for ($i = 0; $i < count($objects); $i++) {
//            $properties = self::getDataProperties3($type, $objects[$i]->id, $filters);
//            $objects[$i]->properties = $properties;
//            $urls = [];
//            if (isset($actions['edit']) && $actions['edit'] == true) {
//                $urls['edit'] = route('data.edit', ['type' => $type, 'id' => $objects[$i]->id]);
//            }
//            $objects[$i]->urls = $urls;
//        }


//        return $objects;
    }


    public static function getPropertyValue($type, $property)
    {
        $bt_id = UserType::where('title', '=', $type)->first();

        $dd = User::where('type', '=', $bt_id->id)->get();
        if (count($dd) == 0)
            return null;

        $dd_id = $dd[0]->id;

        $objects = DB::table('user_properties')
            ->join('user_assigned_properties', 'user_assigned_properties.property', '=', 'user_properties.id')
            ->where('user_properties.title', '=', $property)
            ->where('user_properties.type', '=', $bt_id->id)
            ->where('user_assigned_properties.user', '=', $dd_id)
            ->get(['user_assigned_properties.value']);

        if (count($objects) == 0)
            return null;

        return $objects[0]->value;
    }


    public static function saveProperties(Request $request, $type, $user_id, $part_update = false)
    {

        $bt_id = UserType::where('title', '=', $type)->first();


        if (!$part_update) {

            $properties = UserProperty::where('type', '=', $bt_id->id)
                ->where('is_setting', '=', 0)
                ->whereIn('title', $request->request->keys())
                ->get();

            $ids = [];
            foreach ($properties as $property) {
                $ids[] = $property->id;
            }

            DB::table('user_assigned_properties')
                ->whereIn('property', $ids)
                ->where('user', '=', $user_id)
                ->delete();

        } else {

            $properties = UserProperty::where('type', '=', $bt_id->id)
                ->where('is_setting', '=', 0)
                ->whereIn('title', $request->request->keys())
                ->get();

            $ids = [];
            foreach ($properties as $property) {
                $ids[] = $property->id;
            }

            DB::table('user_assigned_properties')
                ->whereIn('property', $ids)
                ->where('user', '=', $user_id)
                ->delete();

        }

//        $properties = UserProperty::where('type', '=', $bt_id->id)->where('is_setting', '=', 0)->get();

        PropertyController::saveProperties(
            $request,
            'user',
            $user_id,
            $properties,
            'user_assigned_properties',
            'user_assigned_property_values',
            config('base.object_types.user_assigned_property'));

    }


    public static function getProperties($type, $id = null, $filling_rules_required = false, $route = 'current', $filters = null)
    {

        if ($route == 'current') {
            $route = Route::currentRouteName();
        }

        $bt_id = UserType::where('title', '=', $type)->first();

        if ($filling_rules_required) {

            $properties = UserProperty::where('type', '=', $bt_id->id)
                ->where('is_setting', '=', 0)
                ->where('fillation_rules', 'like', '%' . $route . '%')
                ->orderBy('level')->get();

        } else {
            $properties = UserProperty::where('type', '=', $bt_id->id)->where('is_setting', '=', 0)->orderBy('level')->get();

        }

        $property_ids = [];
        foreach ($properties as $property) {
            $property_ids [] = $property->id;
        }

//        $property_values = UserPropertyValue::whereIn('property', $property_ids)->get();

        if (is_null($id)) {
            $assigned_properties = null;
        } else {
            $assigned_properties = DB::table("user_assigned_properties")->where('user', '=', $id)->get();
        }

        $properties = PropertyController::getProperties(
            'user_properties',
            'user_assigned_properties',
            'user_assigned_property_values',
            $properties,
            [],
            $assigned_properties,
            config('base.object_types.user_assigned_property'),
            $filters
        );

        if (is_null($properties))
            return $properties;

        for ($i = 0; $i < count($properties); $i++) {

            if (TextUtility::startsWith($properties[$i]->input_type, 'relations')) {

                $rel_type = explode(':', $properties[$i]->input_type)[1];
                $url = route('relations.store', ['type' => $rel_type]);
                $url .= "?type=$type&id=$id";
                $properties[$i]->url = $url;
            }

            $filters = $properties[$i]->filters;
            if (!is_null($filters) && is_array($filters)) {
                for ($j = 0; $j < count($filters); $j++) {
                    if (isset($filters[$j]['values'])) {
                        $operator = $filters[$j]['operator'];
                        $values = $filters[$j]['values'];
                        $title = $properties[$i]->title;
                        $filters_rt = urlencode(json_encode([$title => ['values' => $values, 'operator' => $operator]]));
                        $filters[$j]['url'] = route(Route::currentRouteName(), ['type' => $type, 'filters' => $filters_rt]);
                    }
                }
                $properties[$i]->filters = $filters;
            }

            $properties[$i]->actions = PropertyController::parsePropertyActions($properties[$i]->actions, $properties);
        }

        return $properties;


    }


    public static function isUserExistsBasedOnEmail($email)
    {
        $us = User::where('email', '=', $email)->get();
        if (count($us) > 0)
            return $us[0]->id;
        else
            return 0;
    }

    public static function getUserBasedOnEmail($email)
    {
        $us = User::where('email', '=', $email)->get();
        if (count($us) > 0)
            return $us[0];
        else
            return null;
    }

    public static function isUserExistsBasedOnMobile($type, $mobile)
    {
        $bt_id = UserType::where('title', '=', $type)->first();

        $prs = UserProperty::where('type', '=', $bt_id->id)
            ->where('title', '=', 'mobile')
            ->get();

        $pr_id = $prs[0]->id;

        $us = DB::table('user_assigned_properties')
            ->where('property', '=', $pr_id)
            ->where('value', '=', $mobile)
            ->get();
        if (count($us) > 0) {
            $u_id = $us[0]->user;
            return User::find($u_id);

        } else
            return null;
    }

    public static function getCurrentUserData()
    {
        if (Auth::check() == false)
            return null;
        $user = User::find(Auth::id());
        $user->properties = UserController::getDataProperties3('user', Auth::id());
        return $user;

    }

    public static function getUserCount($type)
    {

        $cc = User::where('type', '=', $type)->count();
        return $cc;
    }

    public static function get($type)
    {
        $bt_id = UserType::where('title', '=', $type)->first();

        $cc = User::where('type', '=', $bt_id->id)->get();
        return $cc;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $type, $filters = null)
    {

        $filts = $filters == null ? null : json_decode(urldecode($filters));

        $bt_id = UserType::where('title', '=', $type)->first();
        $bt_id->actions = PropertyController::parseTypeActions($bt_id->actions);
        $bt_id->triggers = TypeUtility::parseTriggers($bt_id->triggers);
        $bt_id->locales = (array)json_decode($bt_id->locales);

        if (!\Request::ajax()) {
            $data = BaseController::createBaseInformations();
            self::getBaseInforamation($data, $type);
            $data ['widgets'] = WidgetController::getWidgets("users.index", 'user', $type);
            $properties = self::getProperties($type);
            $data['properties'] = $properties;
            $props = unserialize(serialize($properties));
            $data['groups'] = PropertyController::sortProperties($props);

            $props2 = unserialize(serialize($properties));
            $data['filters'] = PropertyController::getFilters($props2);

            $data['permissions'] = self::getPermissions($type);
            $data['urls'] = self::getUrls($type, $bt_id->actions);
            $data['actions'] = $bt_id->actions;

            $data['page_title'] = trans('messages.list of') . MyPluralizer::plural($bt_id->locales[App::getLocale()]);

            $data['breadcrumbs'] = [
                [
                    'title' => trans('messages.navigation_titles.dashboard'),
                    'url' => route('admin.index')
                ],
                [
                    'title' => MyPluralizer::plural($bt_id->locales[App::getLocale()]),
                    'url' => ''
                ]
            ];
        }

        $data ['type'] = $bt_id;
        $data ['datas'] = self::getItems2($type, $bt_id->actions, true, true, 'current', $filts);

        if (!\Request::ajax()) {
            return view("admin.items.views.index", $data);
        } else {
            return response()->json(['error' => 0, 'message' => $data]);
        }
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {

        $data = BaseController::createBaseInformations();
        self::getBaseInforamation($data, $type);

        $data['type'] = $type;
        $properties = self::getProperties($type);

        $r_std = PropertyController::createProperty(
            [
                'id' => -1,
                'title' => 'role',
                'default_value' => '-',
                'input_type' => 'select',
                'validation_rules' => 'required',
                'fillation_rules' => PropertyController::parseFillingRules('routes:users.create,users.edit-->conditions=>*->width:m6 s12&type:text&method:direct&group:6&order:1'),
                'locales' => ["fa" => "نقش", "en" => "role", "ar" => "النقش"],
            ]
        );


        $user_roles = Auth::user()->getRoleNames();
        $best_role_id = 100000;
        foreach ($user_roles as $user_role) {
            $rl = Role::findByName($user_role);
            if ($rl->id < $best_role_id) {
                $best_role_id = $rl->id;
            }
        }

        if ($type == 'user') {

            $roles = Role::all();
            $values = [];
            foreach ($roles as $role) {
                if ($role->id <= $best_role_id)
                    continue;

                $s = new stdClass();
                $s->title = $role->name;
                $s->value = $role->name;
                $values[] = $s;
            }

            $r_std->values = $values;
            $r_std->assigned = "";
            $properties[] = $r_std;
        }

        $bt_id = UserType::where('title', '=', $type)->first();
        $bt_id->actions = PropertyController::parseTypeActions($bt_id->actions);
        $bt_id->locales = (array)json_decode($bt_id->locales);

        $data['properties'] = $properties;
//        return $properties;
        $props = unserialize(serialize($properties));
        $data['groups'] = PropertyController::sortProperties($props);
        ComponentController::getRequiredComponents($data['groups'], $data);


        $components['files']['images'] = DB::table('images')->get(['id', 'title', 'path']);

        $data['permissions'] = self::getPermissions($type);
        $data['urls'] = self::getUrls($type, $bt_id->actions);

//        return $data;


        $data['page_title'] = trans('messages.list of') . MyPluralizer::plural($bt_id->locales[App::getLocale()]);

        $data['breadcrumbs'] = [
            [
                'title' => trans('messages.navigation_titles.dashboard'),
                'url' => route('admin.index')
            ],
            [
                'title' => MyPluralizer::plural($bt_id->locales[App::getLocale()]),
                'url' => route('users.index', ['type' => $type])
            ],
            [
                'title' => trans('messages.create new item'),
                'url' => ''
            ]
        ];


        return view("admin.items.views.create", $data);

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type)
    {
        $bt_id = UserType::where('title', '=', $type)->first();
        $type_id = $bt_id->id;
        $rules = UserPropertyController::createValidationRules($type_id);

//        $rules['email'] = 'required';
//        $rules['password'] = 'required';

//        dd($rules);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {


            $data = new User();
            $data->type = $bt_id->id;
//            $data->email = $request->input('email');
//            $data->password = Hash::make($request->input('password'));
            $data->save();

//        return;
//        return $request->keys();

            self::saveProperties($request, $type, $data->id);
//        return;

            if ($type == 'user') {
                if ($request->input('role') != null) {
                    $data->assignRole($request->input('role'));
                }
            } else {
                $data->assignRole('customer');
            }

            $rels = [];
            $rel_d = new stdClass();
            $rel_d->object_id = $data->id;
            $rel_d->object_type = config("base.object_types.user");
            $rels[] = $rel_d;

            $rel_u = new stdClass();
            $rel_u->object_id = \Auth::id();
            $rel_u->object_type = config("base.object_types.user");
            $rels[] = $rel_u;

            RelationController::createRelation($type, $rels);


            return response()->json(['success' => 'Added new records.']);
        }

        return response()->json(['error' => $validator->errors()->all()]);

        //        return;
//        return redirect()->route("users.index", ['type' => $type]);

        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Property $property
     * @return \Illuminate\Http\Response
     */
    public function show($type, $id)
    {

        $data = BaseController::createBaseInformations();
        self::getBaseInforamation($data, $type);

        $bt_id = UserType::where('title', '=', $type)->first();
        $bt_id->actions = PropertyController::parseTypeActions($bt_id->actions);
        $bt_id->triggers = TypeUtility::parseTriggers($bt_id->triggers);
        $bt_id->locales = (array)json_decode($bt_id->locales);

        $properties = self::getDataProperties3($type, $id);
        $data['properties'] = $properties;


        if (!\Request::ajax()) {
            $data = BaseController::createBaseInformations();
            self::getBaseInforamation($data, $type);
            $data ['widgets'] = WidgetController::getWidgets("users.show", 'user', $type);


            $data['page_title'] = trans('messages.list of') . MyPluralizer::plural($bt_id->locales[App::getLocale()]);

            $data['breadcrumbs'] = [
                [
                    'title' => trans('messages.navigation_titles.dashboard'),
                    'url' => route('admin.index')
                ],
                [
                    'title' => MyPluralizer::plural($bt_id->locales[App::getLocale()]),
                    'url' => ''
                ]
            ];
        }

        $data ['type'] = $bt_id;
        $st = new stdClass();
        $st->id = $id;
        $st->properties = self::getDataProperties3($type, $id);
        $data ['data'] = $st;

        $reserves = ServiceController::getItems3('reserve', [], ['customer' => ['values' => $id, 'operator' => 'eq'], 'situation' => ['values' => [7, 9], 'operator' => 'in']]);
        $data ['reserves'] = $reserves;

//        return $data;
        if (!\Request::ajax()) {
            return view("admin.items.views.show", $data);
        } else {
            return response()->json(['error' => 0, 'message' => $data]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Property $property
     * @return \Illuminate\Http\Response
     */
    public function edit($type, $id)
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInforamation($data, $type);

        $data ['images'] = DocumentController::getItems('general');
        $data['type'] = $type;
        $s_user = User::find($id);
        $data['s_user'] = $s_user;


        $properties = self::getProperties($type, $id);

//        $properties [] = PropertyController::createProperty(
//            [
//                'id' => -1,
//                'title' => 'email',
//                'default_value' => '-',
//                'input_type' => 'text',
//                'validation_rules' => 'required',
//                'assigned' => $s_user->email,
//                'fillation_rules' => PropertyController::parseFillingRules('routes:users.create,users.edit-->conditions=>*->width:m6 s12&type:text&method:direct&group:1&order:3'),
//                'locales' => ["fa" => "ایمیل", "en" => "email", "ar" => "الایمیل"],
//            ]
//        );
//
//        $properties [] = PropertyController::createProperty(
//            [
//                'id' => -1,
//                'title' => 'password',
//                'default_value' => '-',
//                'input_type' => 'password',
//                'validation_rules' => 'required',
//                'assigned' => "",
//                'fillation_rules' => PropertyController::parseFillingRules('routes:users.create,users.edit-->conditions=>*->width:m6 s12&type:text&method:direct&group:1&order:4'),
//                'locales' => ["fa" => "رمز عبور", "en" => "password", "ar" => "الرمز العبور"],
//            ]
//        );


        $r_std = PropertyController::createProperty(
            [
                'id' => -1,
                'title' => 'role',
                'default_value' => '-',
                'input_type' => 'select',
                'validation_rules' => 'required',
                'fillation_rules' => PropertyController::parseFillingRules('routes:users.create,users.edit-->conditions=>*->width:m6 s12&type:text&method:direct&group:6&order:1'),
                'locales' => ["fa" => "نقش", "en" => "role", "ar" => "النقش"],
            ]
        );


        $user_roles = Auth::user()->getRoleNames();
        $best_role_id = 100000;
        foreach ($user_roles as $user_role) {
            $rl = Role::findByName($user_role);
            if ($rl->id < $best_role_id) {
                $best_role_id = $rl->id;
            }
        }

        if ($type == 'user') {

            $roles = Role::all();
            $values = [];
            foreach ($roles as $role) {
                if ($role->id <= $best_role_id)
                    continue;

                $s = new stdClass();
                $s->title = $role->name;
                $s->value = $role->name;
                $values[] = $s;
            }

            $r_std->values = $values;
            $r_std->assigned = "";
            $properties[] = $r_std;
        }

        $data['properties'] = $properties;
        $props = unserialize(serialize($properties));
        $data['groups'] = PropertyController::sortProperties($props);
        ComponentController::getRequiredComponents($data['groups'], $data);


        $data['id'] = $id;

        $bt_id = UserType::where('title', '=', $type)->first();
        $bt_id->actions = PropertyController::parseTypeActions($bt_id->actions);
        $bt_id->locales = (array)json_decode($bt_id->locales);

        $data['permissions'] = self::getPermissions($type);
        $data['urls'] = self::getUrls($type, $bt_id->actions, $id);


        $data['page_title'] = trans('messages.list of') . MyPluralizer::plural($bt_id->locales[App::getLocale()]);

        $data['breadcrumbs'] = [
            [
                'title' => trans('messages.navigation_titles.dashboard'),
                'url' => route('admin.index')
            ],
            [
                'title' => MyPluralizer::plural($bt_id->locales[App::getLocale()]),
                'url' => route('users.index', ['type' => $type])
            ],
            [
                'title' => trans('messages.edit existing item'),
                'url' => ''
            ]
        ];


        return view("admin.items.views.edit", $data);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Property $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type, $id)
    {

        if ($request->input('part_update') && $request->input('part_update') == true) {
            self::saveProperties($request, $type, $id, true);
            return response()->json(['success' => 'Added new records.']);
        }

        $bt_id = UserType::where('title', '=', $type)->first();
        $type_id = $bt_id->id;
        $rules = UserPropertyController::createValidationRules($type_id, false, $id);

//        $rules['email'] = 'required';
//        $rules['password'] = 'required';

        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {

//            $user = User::find($id);
//            if ($user->email != $request->input('email')) {
//                $user->email = $request->input('email');
//                $user->save();
//            }

//            DB::table('user_assigned_properties')
//                ->where('user', '=', $id)
//                ->delete();

            self::saveProperties($request, $type, $id);

            return response()->json(['success' => 'Added new records.']);
        }


        return response()->json(['error' => $validator->errors()->all()]);

//        return redirect()->route("users.index", ['type' => $type]);

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Property $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $type)
    {


        $id = $request->input('id');

        $document = User::find($id);
        $document->delete();
        DB::table('user_assigned_properties')->where('user', '=', $id)->delete();
        return response()->json(['error' => 0, 'message' => 'id is : ' . $id]);
        //
    }

}
