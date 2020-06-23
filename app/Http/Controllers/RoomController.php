<?php

namespace App\Http\Controllers;

use App\Flash;
use App\Hotel;
use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Navigation\NavigationController;
use App\Http\Controllers\User\UserController;
use App\Image;
use App\Libraries\Utilities\BaseUtility;
use App\Libraries\Utilities\ItemUtility;
use App\Room;
use App\Video;
use Illuminate\Http\Request;
use Route;
use Validator;

class RoomController extends Controller
{

    public function index(Request $request, $type, $filters = null)
    {
        $data = BaseUtility::generateForIndex($type);
        $data ['datas'] = Room::all();
//        dd($data['datas'][0]->prices());
//        return $data['datas'][0]->prices()->get();
        return view("admin.items.views.subviews.room.index", $data);
    }

    public function create($type)
    {
        $data = BaseUtility::generateForCreate($type);
        $data['groups'] = ItemUtility::getPropertiesForInput(Route::currentRouteName(), Route::current()->parameters());
        $data['components'] = ItemUtility::getRequiredComponents($data['groups']);
        return view("admin.items.views.subviews.room.form", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type)
    {
        $validator = Validator::make($request->all(), ItemUtility::getItemsValidationRules(Route::currentRouteName(), Route::current()->parameters()));
        if ($validator->passes()) {
            $received_data = $request->toArray();
            $received_data['available'] = 1;
            $separated_data = ItemUtility::separateReceivedData($type, $received_data);

            $r = new Room();
            $r->title = $request->input('title');
            $r->description = $request->input('description');
            $r->content = $request->input('content');
            $r->floor = $request->input('floor');
            if ($request->input('image') != null && count($request->input('image')) != 0) {
                $r->image = Image::where('path', '=', $request->input('image')[0])->get(['id'])[0]['id'];
            } else {
                $r->image = 0;
            }
            if ($request->input('video') != null && count($request->input('video')) != 0) {
                $r->video = Video::where('path', '=', $request->input('video')[0])->get(['id'])[0]['id'];
            } else {
                $r->video = 0;
            }

            if ($request->input('flash') != null && count($request->input('flash')) != 0) {
                $r->flash = Flash::where('path', '=', $request->input('flash')[0])->get(['id'])[0]['id'];
            } else {
                $r->flash = 0;
            }

            if ($request->input('hotel') != null) {
                $r->hotel = $request->input('hotel');
            } else {
                $r->hotel = Hotel::all()[0]->id;
            }

            $r->available = 0;
            $r->save();
            $r_id = $r->id;
            ItemUtility::storeProperties($type, $separated_data['property'], $r_id);


            return response()->json(['success' => 'Added new records.']);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function show($type, $id)
    {


        $data = BaseController::createBaseInformations();
        $user = UserController::getCurrentUserData();
        $data ['user'] = $user;
        $data['navigations'] = NavigationController::getNavigation('admin');
        return view("items.index", $data);
    }

    public function get($type, $id)
    {
        $data = BaseController::createBaseInformations();
        $user = UserController::getCurrentUserData();
        $data ['user'] = $user;
        $data['navigations'] = NavigationController::getNavigation('admin');
        return view("items.index", $data);
    }


    public function edit($type, $id)
    {

        $data = BaseUtility::generateForEdit($type, $id);
        $data['groups'] = ItemUtility::getPropertiesForInput(Route::currentRouteName(), Route::current()->parameters(), $id);
        $data['components'] = ItemUtility::getRequiredComponents($data['groups']);
        return view("admin.items.views.subviews.room.form", $data);
    }

    public function update(Request $request, $type, $id)
    {
        $validator = Validator::make($request->all(), ItemUtility::getItemsValidationRules(Route::currentRouteName(), Route::current()->parameters()));
        if ($validator->passes()) {
            $received_data = $request->toArray();
            $separated_data = ItemUtility::separateReceivedData($type, $received_data);

            $r = Room::find($id);
            $r->title = $request->input('title');
            $r->description = $request->input('description');
            $r->content = $request->input('content');
            $r->floor = $request->input('floor');
            if ($request->input('image') != null && count($request->input('image')) != 0) {
                $r->image = Image::where('path', '=', $request->input('image')[0])->get(['id'])[0]['id'];
            } else {
                $r->image = 0;
            }
            if ($request->input('video') != null && count($request->input('video')) != 0) {
                $r->video = Video::where('path', '=', $request->input('video')[0])->get(['id'])[0]['id'];
            } else {
                $r->video = 0;
            }

            if ($request->input('flash') != null && count($request->input('flash')) != 0) {
                $r->flash = Flash::where('path', '=', $request->input('flash')[0])->get(['id'])[0]['id'];
            } else {
                $r->flash = 0;
            }
            $r->save();

            ItemUtility::storeProperties($type, $separated_data['property'], $id);
//            ItemUtility::storeData($type, $separated_data['item'], $separated_data['property'], $id);
            return response()->json(['success' => 'Added new records.']);
        }
        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function destroy(Request $request, $type)
    {
        $id = $request->input('id');
        ItemUtility::deleteData($type, $id);
        return response()->json(['error' => 0, 'message' => 'id is : ' . $id]);
    }

    public function getProperty(Request $request, $type, $property)
    {
        if ($property == "price") {
            $r = Room::find($request->input('id'));
            $prices = $r->prices()->get();
            return response()->json(['error' => false, 'message' => "success for ID :" . $request->input('id'), 'prices' => $prices]);
        }
    }


    public function setProperty(Request $request, $type, $property)
    {
        if ($property == "price") {

        }
    }


}








