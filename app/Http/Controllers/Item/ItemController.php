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
use App\Libraries\MyLib\PluralUtility;
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

class ItemController extends Controller
{

    public function index(Request $request, $type, $filters = null)
    {
        if (Str::lower(Str::singular($type)) == "room") {
            return ((new App\Http\Controllers\RoomController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "reserve") {
            return ((new App\Http\Controllers\ReserveController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "customer") {
            return ((new App\Http\Controllers\CustomerController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "image") {
            return ((new App\Http\Controllers\ImageController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "gallery") {
            return ((new App\Http\Controllers\GalleryController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "video") {
            return ((new App\Http\Controllers\VideoController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "flash") {
            return ((new App\Http\Controllers\FlashController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "slide") {
            return ((new App\Http\Controllers\SlideController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "message") {
            return ((new App\Http\Controllers\MessageController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "comment") {
            return ((new App\Http\Controllers\CommentController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "complaint") {
            return ((new App\Http\Controllers\ComplaintController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "rating") {
            return ((new App\Http\Controllers\RatingController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "user") {
            return ((new App\Http\Controllers\User\UserController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "website") {
            return ((new App\Http\Controllers\WebsiteController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "hotel") {
            return ((new App\Http\Controllers\HotelController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "news") {
            return ((new App\Http\Controllers\NewsController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "map") {
            return ((new App\Http\Controllers\MapController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "map_location") {
            return ((new App\Http\Controllers\MapLocationController())->index($request, $type, $filters));
        } elseif (Str::lower(Str::singular($type)) == "page") {
            return ((new App\Http\Controllers\PageController())->index($request, $type, $filters));
        } else {
            abort("404");
        }
    }

    public function create($type)
    {

        if (Str::lower(Str::singular($type)) == "room") {
            return ((new App\Http\Controllers\RoomController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "reserve") {
            return ((new App\Http\Controllers\ReserveController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "customer") {
            return ((new App\Http\Controllers\CustomerController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "image") {
            return ((new App\Http\Controllers\ImageController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "gallery") {
            return ((new App\Http\Controllers\GalleryController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "video") {
            return ((new App\Http\Controllers\VideoController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "flash") {
            return ((new App\Http\Controllers\FlashController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "slide") {
            return ((new App\Http\Controllers\SlideController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "message") {
            return ((new App\Http\Controllers\MessageController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "comment") {
            return ((new App\Http\Controllers\CommentController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "complaint") {
            return ((new App\Http\Controllers\ComplaintController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "rating") {
            return ((new App\Http\Controllers\RatingController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "user") {
            return ((new App\Http\Controllers\User\UserController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "website") {
            return ((new App\Http\Controllers\WebsiteController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "hotel") {
            return ((new App\Http\Controllers\HotelController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "news") {
            return ((new App\Http\Controllers\NewsController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "map") {
            return ((new App\Http\Controllers\MapController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "map_location") {
            return ((new App\Http\Controllers\MapLocationController())->create($type));
        } elseif (Str::lower(Str::singular($type)) == "page") {
            return ((new App\Http\Controllers\PageController())->create($type));
        } else {
            abort("404");
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type)
    {

        if (Str::lower(Str::singular($type)) == "room") {
            return ((new App\Http\Controllers\RoomController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "reserve") {
            return ((new App\Http\Controllers\ReserveController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "customer") {
            return ((new App\Http\Controllers\CustomerController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "image") {
            return ((new App\Http\Controllers\ImageController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "gallery") {
            return ((new App\Http\Controllers\GalleryController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "video") {
            return ((new App\Http\Controllers\VideoController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "flash") {
            return ((new App\Http\Controllers\FlashController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "slide") {
            return ((new App\Http\Controllers\SlideController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "message") {
            return ((new App\Http\Controllers\MessageController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "comment") {
            return ((new App\Http\Controllers\CommentController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "complaint") {
            return ((new App\Http\Controllers\ComplaintController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "rating") {
            return ((new App\Http\Controllers\RatingController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "user") {
            return ((new App\Http\Controllers\User\UserController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "website") {
            return ((new App\Http\Controllers\WebsiteController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "hotel") {
            return ((new App\Http\Controllers\HotelController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "news") {
            return ((new App\Http\Controllers\NewsController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "map") {
            return ((new App\Http\Controllers\MapController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "map_location") {
            return ((new App\Http\Controllers\MapLocationController())->store($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "page") {
            return ((new App\Http\Controllers\PageController())->store($request, $type));
        } else {
            abort("404");
        }
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

        if (Str::lower(Str::singular($type)) == "room") {
            return ((new App\Http\Controllers\RoomController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "reserve") {
            return ((new App\Http\Controllers\ReserveController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "customer") {
            return ((new App\Http\Controllers\CustomerController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "image") {
            return ((new App\Http\Controllers\ImageController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "gallery") {
            return ((new App\Http\Controllers\GalleryController())->edit($type,$id));
        } elseif (Str::lower(Str::singular($type)) == "video") {
            return ((new App\Http\Controllers\VideoController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "flash") {
            return ((new App\Http\Controllers\FlashController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "slide") {
            return ((new App\Http\Controllers\SlideController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "message") {
            return ((new App\Http\Controllers\MessageController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "comment") {
            return ((new App\Http\Controllers\CommentController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "complaint") {
            return ((new App\Http\Controllers\ComplaintController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "rating") {
            return ((new App\Http\Controllers\RatingController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "user") {
            return ((new App\Http\Controllers\User\UserController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "website") {
            return ((new App\Http\Controllers\WebsiteController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "hotel") {
            return ((new App\Http\Controllers\HotelController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "news") {
            return ((new App\Http\Controllers\NewsController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "map") {
            return ((new App\Http\Controllers\MapController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "map_location") {
            return ((new App\Http\Controllers\MapLocationController())->edit($type, $id));
        } elseif (Str::lower(Str::singular($type)) == "page") {
            return ((new App\Http\Controllers\PageController())->edit($type, $id));
        } else {
            abort("404");
        }

    }

    public function update(Request $request, $type, $id)
    {

        if (Str::lower(Str::singular($type)) == "room") {
            return ((new App\Http\Controllers\RoomController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "reserve") {
            return ((new App\Http\Controllers\ReserveController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "customer") {
            return ((new App\Http\Controllers\CustomerController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "image") {
            return ((new App\Http\Controllers\ImageController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "gallery") {
            return ((new App\Http\Controllers\GalleryController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "video") {
            return ((new App\Http\Controllers\VideoController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "flash") {
            return ((new App\Http\Controllers\FlashController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "slide") {
            return ((new App\Http\Controllers\SlideController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "message") {
            return ((new App\Http\Controllers\MessageController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "comment") {
            return ((new App\Http\Controllers\CommentController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "complaint") {
            return ((new App\Http\Controllers\ComplaintController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "rating") {
            return ((new App\Http\Controllers\RatingController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "user") {
            return ((new App\Http\Controllers\User\UserController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "website") {
            return ((new App\Http\Controllers\WebsiteController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "hotel") {
            return ((new App\Http\Controllers\HotelController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "news") {
            return ((new App\Http\Controllers\NewsController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "map") {
            return ((new App\Http\Controllers\MapController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "map_location") {
            return ((new App\Http\Controllers\MapLocationController())->update($request, $type, $id));
        } elseif (Str::lower(Str::singular($type)) == "page") {
            return ((new App\Http\Controllers\PageController())->update($request, $type, $id));
        } else {
            abort("404");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Data $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $type)
    {

        if (Str::lower(Str::singular($type)) == "room") {
            return ((new App\Http\Controllers\RoomController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "reserve") {
            return ((new App\Http\Controllers\ReserveController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "customer") {
            return ((new App\Http\Controllers\CustomerController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "image") {
            return ((new App\Http\Controllers\ImageController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "gallery") {
            return ((new App\Http\Controllers\GalleryController())->destroy($request, $type));
        } elseif (Str::lower(Str::singular($type)) == "video") {
            return ((new App\Http\Controllers\VideoController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "flash") {
            return ((new App\Http\Controllers\FlashController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "slide") {
            return ((new App\Http\Controllers\SlideController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "message") {
            return ((new App\Http\Controllers\MessageController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "comment") {
            return ((new App\Http\Controllers\CommentController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "complaint") {
            return ((new App\Http\Controllers\ComplaintController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "rating") {
            return ((new App\Http\Controllers\RatingController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "user") {
            return ((new App\Http\Controllers\User\UserController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "website") {
            return ((new App\Http\Controllers\WebsiteController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "hotel") {
            return ((new App\Http\Controllers\HotelController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "news") {
            return ((new App\Http\Controllers\NewsController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "map") {
            return ((new App\Http\Controllers\MapController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "map_location") {
            return ((new App\Http\Controllers\MapLocationController())->destroy($request , $type));
        } elseif (Str::lower(Str::singular($type)) == "page") {
            return ((new App\Http\Controllers\PageController())->destroy($request , $type));
        } else {
            abort("404");
        }
    }

}
