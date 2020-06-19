<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Navigation\NavigationController;
use App\Http\Controllers\User\UserController;
use App\Libraries\Utilities\BaseUtility;
use App\Libraries\Utilities\ItemUtility;
use Illuminate\Http\Request;
use Route;
use Validator;

class GalleryController extends Controller
{
    public function index(Request $request, $type, $filters = null)
    {
        $data = BaseUtility::generateForIndex($type);
        $data ['datas'] = Gallery::all();
        return view("admin.items.views.subviews.gallery.index", $data);
    }


    public function create($type)
    {
        $data = BaseUtility::generateForCreate($type);
        $data['groups'] = ItemUtility::getPropertiesForInput(Route::currentRouteName(), Route::current()->parameters());
        $data['components'] = ItemUtility::getRequiredComponents($data['groups']);
        return view("admin.items.views.subviews.gallery.form", $data);
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

            $received_data = $request->toArray();
            $separated_data = ItemUtility::separateReceivedData($type, $received_data);

            $r = new Gallery();
            $r->title = $request->input('title');
            $r->save();
            $r_id = $r->id;
            ItemUtility::storeProperties($type, $separated_data['property'], $r_id);

            return response()->json(['success' => 'Added new records.']);

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
        $data = BaseUtility::generateForEdit($type, $id);
        $data['groups'] = ItemUtility::getPropertiesForInput(Route::currentRouteName(), Route::current()->parameters());
        $data['components'] = ItemUtility::getRequiredComponents($data['groups']);
        return view("admin.items.views.subviews.gallery.form", $data);
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
            $r = Gallery::find($id);
            $r->title = $request->input('title');
            $r->save();
            ItemUtility::storeProperties($type, $separated_data['property'], $id);

            return response()->json(['success' => 'Added new records.']);
        }
        return response()->json(['error' => $validator->errors()->all()]);
//        return redirect()->route("data.index", ['type' => $type]);

    }

    public function destroy(Request $request, $type)
    {
        $id = $request->input('id');
        ItemUtility::deleteData($type, $id);
        return response()->json(['error' => 0, 'message' => 'id is : ' . $id]);
    }

}
