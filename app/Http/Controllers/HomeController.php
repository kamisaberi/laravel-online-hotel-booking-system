<?php

namespace App\Http\Controllers;

use App;
use App\Customer;
use App\Data;
use App\DataType;
use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Item\ItemController;
use App\Http\Controllers\Navigation\NavigationController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\Widget\WidgetController;
use App\Libraries\Utilities\DateUtility;
use App\Libraries\Utilities\ItemUtility;
use App\Libraries\Utilities\TrackerUtility;
use App\Service;
use App\ServiceProperty;
use Gateway;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Larabookir\Gateway\Sadad\Sadad;
use PHPUnit\Framework\Constraint\Count;
use Route;
use Kavenegar;
use PragmaRX\Tracker\Vendor\Laravel\Facade as Tracker;


class HomeController extends Controller
{

    public static function getBaseInformation(&$data)
    {

        $data['useful_links'] = NavigationController::getNavigation('useful-links');
        $data['facility_links'] = NavigationController::getNavigation('facility-links');
        $data['navigations'] = NavigationController::getNavigation('public');
        $data['mobile_navigations'] = NavigationController::getNavigation('mobile');

        $data['website'] = ItemUtility::getItems('website')[0];

        $data['hotel'] = ItemUtility::getItems('hotel')[0];
        $data['map'] = ItemUtility::getItems('map')[0];
        $data['map_locations'] = ItemUtility::getItems('map_locations');
        $data['current_date'] = DateUtility::toJalali();
        $visits = [];
        $visits['today'] = TrackerUtility::getTodayVisitorsCount();
        $visits['week'] = TrackerUtility::getThisWeekVisitorsCount();
        $visits['month'] = TrackerUtility::getThisMonthVisitorsCount();
        $visits['all'] = TrackerUtility::getAllVisitorsCount();
        $data['visits'] = $visits;

    }

    public function index()
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data['navigations'] = NavigationController::getNavigation('index');
//        $data ['datas'] = DocumentController::getItems3('main-slide-show');
        return view('public.themes.hotel-new.views.index', $data);

    }

    public function index2()
    {

        $data = BaseController::createBaseInformations();

        self::getBaseInformation($data);

        $data['home_page_middle_navigations'] = NavigationController::getNavigation('home-page-middle');
        $data['rooms'] = ItemUtility::getItems('room');
//        $data ['slides'] = DocumentController::getItems3('second-slide-show');
//        $data ['galleries'] = DocumentController::getItems3('gallery');
//        return $data;
        return view('public.themes.hotel-new.views.index2', $data);
    }


    //################## BOOKING START ##################//
    public function startBooking(Request $request, $room)
    {
        $data = [];
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data ['room'] = ItemUtility::getItem('room', $room);

        return view("public.themes.hotel-new.views.booking.booking_start", $data);
    }

    public function updatePrices(Request $request, $type = 'room')
    {
        $data = [];
        $data['prices'] = ["1399/02/02" => 120000, "1399/02/03" => 140000, "1399/02/04" => 220000, "1399/02/05" => 80000];
        return response()->json(['result' => $data]);
    }

    public function saveBooking(Request $request, $room)
    {

        $received_data = $request->toArray();

        $mobile = $received_data['mobile'];
        $cc = DB::table('customers')->where('mobile', '=', $mobile)->get();
        $c_id = 0;
        if (count($cc) > 0) {
            $c_id = $cc[0]->id;
        } else {
            $c = new Customer();
            $c->name = $received_data['name'];
            $c->email = $received_data['email'];
            $c->mobile = $received_data['mobile'];
            $c->phone = $received_data['mobile'];
            $c->ssn = $received_data['ssn'];
            $c->password = bcrypt("1234");
            $c->save();
            $c_id = $c->id;
        }

        $received_data['room'] = $room;
        $received_data['customer'] = $c_id;
        $separated_data = ItemUtility::separateReceivedData("reserve", $received_data);
        ItemUtility::storeData("reserve", $separated_data['item'], $separated_data['property']);

        return response()->redirectToRoute('home.booking.confirm', ['code' => "1111111"]);
    }


    public function confirmBooking(Request $request, $code = 1)
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        return view("public.themes.hotel-new.views.booking.booking_confirm", $data);
    }

    public function checkRoomVerification()
    {
        return response()->json(['result' => true]);
    }

    public function payoutBooking(Request $request, $code = 1)
    {
        $data = [];
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        return view("public.themes.hotel-new.views.booking.booking_payout", $data);
    }


    public function payout($code = null)
    {

        if ($code != null) {

            $sd = ServiceProperty::where('title', '=', 'code')
                ->get();

            $sd_id = $sd[0]->id;
            $r = DB::table('service_assigned_properties')
                ->where('property', '=', $sd_id)
                ->where('value', '=', $code)
                ->get();

            $reserve_id = $r[0]->service;
            $props = ServiceController::getDataProperties3('reserve', $reserve_id);

        }


        try {

            $gateway = Gateway::make(new Sadad());
            $gateway->setCallback(route('home.return.from.bank', ['code' => $code]));

            if (env('PRICE_TEST_MODE') == 1) {
                $gateway->price(1000)->ready();
            } else {
                $gateway->price($props['price']->value * 10)->ready();
            }

//            $gateway->price(1000)->ready();
            $refId = $gateway->refId();
            $transID = $gateway->transactionId();
            // Your code here
            return $gateway->redirect();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function returnFromBank($code)
    {
        try {
            $gateway = Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $cardNumber = $gateway->cardNumber();
            return redirect()->route('home.booking.finish', ['code' => $code]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function finishBooking(Request $request, $code = 1)
    {
        $data = [];
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        return view("public.themes.hotel-new.views.booking.booking_finish", $data);
    }

    //##################BOOKING END ##################//

    public function showRooms()
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data['datas'] = ItemUtility::getItems('room');
        return view('public.themes.hotel-new.views.data.rooms', $data);
    }

    public function showRoom($id)
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data['object'] = ItemUtility::getItem('room', $id);
        return view('public.themes.hotel-new.views.data.room', $data);
    }

    public function showNewses()
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data['datas'] = ItemUtility::getItems('news');
        return view('public.themes.hotel-new.views.data.newses', $data);
    }

    public function showNews($id)
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data['object'] = ItemUtility::getItem('news', $id);
        return view('public.themes.hotel-new.views.data.news', $data);
    }


    public function showGalleries()
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data['datas'] = ItemUtility::getItems('room');
        return view('public.themes.hotel-new.views.data.rooms', $data);
    }

    public function showGallery($id)
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data['object'] = ItemUtility::getItem('room', $id);
        return view('public.themes.hotel-new.views.data.room', $data);
    }

    public function sendComplaint(Request $request)
    {
        if ($request->getMethod() == "GET") {


            $data = BaseController::createBaseInformations();
            self::getBaseInformation($data);
            return view('public.themes.hotel-new.views.documents.complaints', $data);


        } elseif ($request->getMethod() == "POST") {

        }
    }

    public function sendContact(Request $request)
    {
        if ($request->getMethod() == "GET") {
            $data = BaseController::createBaseInformations();
            self::getBaseInformation($data);
            return view('public.themes.hotel-new.views.documents.contact_us', $data);
        } elseif ($request->getMethod() == "POST") {

        }
    }

    public function showPage(Request $request, $id)
    {

    }


    public function showLoginPage($type)
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data ['type'] = $type;
        return view("public.themes.hotel-new.views.users.login", $data);
    }

    public function showRegisterPage($type)
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data ['type'] = $type;
        return view("public.themes.hotel-new.views.users.register", $data);
    }

    public function showHistory(Request $request)
    {
        if (!\Auth::check()) {
            return response()->redirectToRoute("home.index2");
        }
    }


    public function saveCheck(Request $request)
    {

        $service_id = $request->input('service_id');

        if ($request->hasFile('path')) {

            $image = $request->file('path');
            $ext = $image->getClientOriginalExtension();
            $on = $image->getClientOriginalName();
            $name = sha1(time()) . "." . $ext;
            $image->move(public_path('uploads/checks'), $name);


            return response()->json(['error' => false, 'message' => 'success']);

        } else {
            return response()->json(['error' => false, 'message' => 'no file']);
        }

    }


    public function printVoucher($code = null)
    {

        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        return view('public.themes.hotel-new.views.voucher', $data);

    }


}
