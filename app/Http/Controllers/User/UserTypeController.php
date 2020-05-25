<?php

namespace App\Http\Controllers\User;

use App\DocumentType;
use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Base\PropertyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Navigation\NavigationController;
use App\Http\Controllers\Widget\WidgetController;
use App\Libraries\MyLib\MyPluralizer;
use App\UserType;
use Illuminate\Http\Request;
use Validator;

class UserTypeController extends Controller
{
    public static function getBaseInforamation(&$data)
    {
        $navs = NavigationController::getNavigation('admin', true);

        foreach ($navs as $k => $nav) {
            foreach ($nav as $k1 => $nav1) {
                if (in_array($nav1->properties->route, config('base.routes.users.types'))) {
                    $nav1->active = true;
                } else {
                    $nav1->active = false;
                }
            }
        }

        $data['navigations'] = $navs;

    }

    public static function getPermissions()
    {
        $permissions = [];
        $permissions['create'] = "users.types.create";
        $permissions['store'] = "users.types.store";
        $permissions['update'] = "users.types.update";
        $permissions['edit'] = "users.types.edit";
        $permissions['change'] = "users.types.change";
        $permissions['destroy'] = "users.types.destroy";
        return $permissions;

    }

    public static function getUrls($id = 0)
    {
        $urls = [];
        $urls['index'] = route("users.types.index");
        $urls['create'] = route("users.types.create");
        $urls['destroy'] = route("users.types.destroy");
        $urls['store'] = route("users.types.store");
        $urls['update'] = route("users.types.update", ['id' => $id]);
        return $urls;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInforamation($data);

        $datas = UserType::all();

        $data['datas'] = $datas;

        $data ['widgets'] = WidgetController::getWidgets("users.types.index", 'user');

        $data['urls'] = self::getUrls();

        $data['permissions'] = self::getPermissions();

        $data['page_title'] = trans('messages.list of') . MyPluralizer::plural(trans('messages.types.users'));
        $data['breadcrumbs'] = [
            [
                'title' => trans('messages.navigation_titles.dashboard'),
                'url' => route('admin.index')
            ],
            [
                'title' => MyPluralizer::plural(trans('messages.types.users')),
                'url' => ''
            ]
        ];


        return view('admin.types.views.index', $data);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInforamation($data);

        $data['urls'] = self::getUrls();

        $data['permissions'] = self::getPermissions();


        $data['page_title'] = trans('messages.list of') . MyPluralizer::plural(trans('messages.types.users'));
        $data['breadcrumbs'] = [
            [
                'title' => trans('messages.navigation_titles.dashboard'),
                'url' => route('admin.index')
            ],
            [
                'title' => MyPluralizer::plural(trans('messages.types.users')),
                'url' => route('users.types.index')
            ],
            [
                'title' => trans('messages.create new type'),
                'url' => ''
            ]
        ];

        return view('admin.types.views.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), PropertyController::createValidationRulesForTypeOperations());
        if ($validator->passes()) {


            $dt = new UserType();
            $dt->title = $request->input('title');
            $dt->can_have_child = $request->input('can_have_child');
            $dt->can_have_item = $request->input('can_have_item');
            $dt->parent = 0;
            $dt->save();

            return response()->json(['success' => 'Added new records.']);
        }

        return response()->json(['error' => $validator->errors()->all()]);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\DocumentType $documentType
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentType $documentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\DocumentType $documentType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInforamation($data);
        $dt = UserType::find($id);
        $data['data'] = $dt;
        $data['id'] = $id;
        $data['urls'] = self::getUrls($id);

        $data['permissions'] = self::getPermissions();


        $data['page_title'] = trans('messages.list of') . MyPluralizer::plural(trans('messages.types.users'));
        $data['breadcrumbs'] = [
            [
                'title' => trans('messages.navigation_titles.dashboard'),
                'url' => route('admin.index')
            ],
            [
                'title' => MyPluralizer::plural(trans('messages.types.users')),
                'url' => route('users.types.index')
            ],
            [
                'title' => trans('messages.edit existing type'),
                'url' => ''
            ]
        ];


        return view('admin.types.views.edit', $data);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\DocumentType $documentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), PropertyController::createValidationRulesForTypeOperations());
        if ($validator->passes()) {

            $data = [];
            $dt = UserType::find($id);
            $dt->title = $request->input('title');
            $dt->can_have_child = $request->input('can_have_child');
            $dt->can_have_item = $request->input('can_have_item');
            $dt->parent = 0;
            $dt->save();
            return response()->json(['success' => 'Added new records.']);
        }

        return response()->json(['error' => $validator->errors()->all()]);

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\DocumentType $documentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');

        $dt = UserType::find($request->input('id'));
        $dt->delete();
        return response()->json(['error' => 0, 'message' => 'id is : ' . $id]);


        //
    }
}
