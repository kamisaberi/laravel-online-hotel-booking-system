<?php

namespace App\Http\Controllers;

use App\Data;
use App\DataProperty;
use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Navigation\NavigationController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Widget\WidgetController;
use App\Libraries\Utilities\ItemUtility;
use App\Libraries\Utilities\NavigationUtility;
use App\Slide;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Route;
use Validator;

class SlideController extends Controller
{
    public function index(Request $request, $type, $filters = null)
    {

        $filts = $filters == null ? null : json_decode(urldecode($filters));
        $data = BaseController::createBaseInformations();
        $data['navigations'] = NavigationUtility::createNavigations($type);

        $data['type'] = $type;

        $data['page_title'] = trans('messages.list of') . Str::plural($type);
        $data['breadcrumbs'] = [
            [
                'title' => trans('messages.navigation_titles.dashboard'),
                'url' => route('admin.index')
            ],
            [
                'title' => Str::plural($type),
                'url' => ''
            ]
        ];

        $data ['widgets'] = 'admin.items.widgets.slide';


        $data['urls'] = ItemUtility::getUrls($type);
        $data['permissions'] = ItemUtility::getPermissions($type);
        $data ['datas'] = ItemUtility::getItems($type);

        return view("admin.items.views.subviews.slide", $data);
    }

    public function create($type)
    {
        $data = BaseController::createBaseInformations();
        $data['navigations'] = NavigationUtility::createNavigations($type);

//        self::checkType($type);
//        self::checkTables();

//        dd(self::$property_table_structure);

        $data['groups'] = ItemUtility::getPropertiesForInput(Route::currentRouteName(), Route::current()->parameters());
//        dd($data['groups']);
        $data['components'] = ItemUtility::getRequiredComponents($data['groups']);

        $data['type'] = $type;
        $data['urls'] = ItemUtility::getUrls($type);

        $data['permissions'] = ItemUtility::getPermissions($type);
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
            ItemUtility::getItemsValidationRules(Route::currentRouteName(), Route::current()->parameters())
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
        $data['navigations'] = NavigationUtility::createNavigations($type);

//        self::checkType($type);
//        self::checkTables();

        $data['groups'] = ItemUtility::getPropertiesForInput(Route::currentRouteName(), Route::current()->parameters());
        $data['type'] = $type;
        $data['id'] = $id;

        $data['urls'] = ItemUtility::getUrls($type, $id);
        $data['permissions'] = ItemUtility::getPermissions($type);
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
            ItemUtility::getItemsValidationRules(Route::currentRouteName(), Route::current()->parameters())
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
