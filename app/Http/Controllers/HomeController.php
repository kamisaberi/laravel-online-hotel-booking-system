<?php

namespace App\Http\Controllers;

use App;
use App\Customer;
use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Navigation\NavigationController;
use App\Http\Controllers\Service\ServiceController;
use App\Libraries\Utilities\DateUtility;
use App\Libraries\Utilities\ItemUtility;
use App\Libraries\Utilities\TrackerUtility;
use App\Reserve;
use App\ServiceProperty;
use Carbon\Carbon;
use Gateway;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Larabookir\Gateway\Sadad\Sadad;


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
//        $data['map'] = ItemUtility::getItems('map')[0];
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
        $data['home_page_middle_navigations'] = NavigationController::getNavigation('home-page-middle');
        $data['rooms'] = App\Room::all();
        return view('public.themes.city_tours.views.index', $data);

    }

    public function cart()
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);

        $basket = session()->get('basket');
        $room = App\Room::find($basket[0]['room']);
        $room->image = App\Image::find($room->image);
        $data['room'] = $room;
        $data['prices'] = $basket[0]['prices'];
        $data['min_price'] = min($basket[0]['prices']);
        $data['max_price'] = max($basket[0]['prices']);
        $data['total'] = array_sum($basket[0]['prices']);
        $data['adults'] = $basket[0]['adults'];
        $data['children'] = $basket[0]['children'];
        $data['check_in'] = $basket[0]['check_in'];
        $data['check_out'] = $basket[0]['check_out'];
//        return  $data;
        return view('public.themes.city_tours.views.card_hotel', $data);

    }

    public function checkout()
    {

        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);

        $basket = session()->get('basket');
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $room = App\Room::find($basket[0]['room']);
        $room->image = App\Image::find($room->image);

        $data['room'] = $room;
        $data['prices'] = $basket[0]['prices'];
        $data['min_price'] = min($basket[0]['prices']);
        $data['max_price'] = max($basket[0]['prices']);
        $data['total'] = array_sum($basket[0]['prices']);
        $data['adults'] = $basket[0]['adults'];
        $data['children'] = $basket[0]['children'];
        $data['check_in'] = $basket[0]['check_in'];
        $data['check_out'] = $basket[0]['check_out'];

        return view('public.themes.city_tours.views.payment_hotel', $data);
    }

    public function payout($code = null)
    {

//        if ($code != null) {
//            $sd = ServiceProperty::where('title', '=', 'code')
//                ->get();
//
//            $sd_id = $sd[0]->id;
//            $r = DB::table('service_assigned_properties')
//                ->where('property', '=', $sd_id)
//                ->where('value', '=', $code)
//                ->get();
//
//            $reserve_id = $r[0]->service;
//            $props = ServiceController::getDataProperties3('reserve', $reserve_id);
//        }
//
//        try {
//
//            $gateway = Gateway::make(new Sadad());
//            $gateway->setCallback(route('home.return.from.bank', ['code' => $code]));
//
//            if (env('PRICE_TEST_MODE') == 1) {
//                $gateway->price(1000)->ready();
//            } else {
//                $gateway->price($props['price']->value * 10)->ready();
//            }
//
////            $gateway->price(1000)->ready();
//            $refId = $gateway->refId();
//            $transID = $gateway->transactionId();
//            // Your code here
//            return $gateway->redirect();
//
//        } catch (Exception $e) {
//            echo $e->getMessage();
//        }

        return redirect()->route("home.return.from.bank", ['code'=>"111111"]);
    }




    public function returnFromBank($code)
    {
        return redirect()->route('home.confirmation');
//        try {
//            $gateway = Gateway::verify();
//            $trackingCode = $gateway->trackingCode();
//            $refId = $gateway->refId();
//            $cardNumber = $gateway->cardNumber();
//            return redirect()->route('home.confirmation');
//        } catch (Exception $e) {
//            echo $e->getMessage();
//        }
    }


    public function confirmation()
    {

        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);

        $basket = session()->get('basket');
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $room = App\Room::find($basket[0]['room']);
        $room->image = App\Image::find($room->image);

        $data['room'] = $room;
        $data['prices'] = $basket[0]['prices'];
        $data['min_price'] = min($basket[0]['prices']);
        $data['max_price'] = max($basket[0]['prices']);
        $data['total'] = array_sum($basket[0]['prices']);
        $data['adults'] = $basket[0]['adults'];
        $data['children'] = $basket[0]['children'];
        $data['check_in'] = $basket[0]['check_in'];
        $data['check_out'] = $basket[0]['check_out'];

        return view('public.themes.city_tours.views.confirmation_hotel', $data);

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

        session()->put('basket', []);

        $id = $request->input('id');
        $room = App\Room::find($id);
        $prices = $room->prices()->get();

        $start_day = trim(explode(' ', explode(',', $request->input('check_in'))[0])[1]);
        $start_month_str = trim(explode(' ', explode(',', $request->input('check_in'))[0])[0]);

        $end_day = trim(explode(' ', explode(',', $request->input('check_out'))[0])[1]);
        $end_month_str = trim(explode(' ', explode(',', $request->input('check_out'))[0])[0]);

        $days = App\Libraries\Utilities\CarbonDateUtility::generateDateRange(
            Carbon::create(2020, config("base.months")[$start_month_str], $start_day),
            Carbon::create(2020, config("base.months")[$end_month_str], $end_day),
            true
        );

        $final = [];
        foreach ($days as $day) {
            $final[$day] = $prices[0]->value;
        }

        session()->push('basket', [
            "room" => $id,
            'prices' => $final,
            'adults' => $request->input('adults'),
            'children' => $request->input('children'),
            'check_in' => $days[0],
            'check_out' => $days[count($days) - 1]
        ]);

        return response()->json([
            'error' => false,
            'message' => "ok",
            'prices' => $final,
            'links' => ['cart' => route("home.cart")]
        ]);
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

        $code = "BME" . rand(1000, 9999);
        $r = new Reserve();
        $r->code = $code;
        $r->start_date = $received_data ['start_date'];
        $r->end_date = $received_data ['end_date'];
        $r->price = $received_data ['price'];
        $r->situation = 1;
        $r->active = 0;
        $r->check = null;
        $r->save();

        return response()->redirectToRoute('home.booking.confirm', ['code' => $code]);
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
        $data['rooms'] = App\Room::all();
        return view('public.themes.city_tours.views.rooms', $data);
    }

    public function showRoom($id)
    {

        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data['room'] = App\Room::find($id);
        return view('public.themes.city_tours.views.room', $data);
    }

    public function showNewses()
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data['newses'] = App\News::all();
        return view('public.themes.city_tours.views.newses', $data);
    }

    public function showNews($id)
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data['object'] = App\News::find($id);
        return view('public.themes.city_tours.views.news', $data);
    }


    public function showGalleries()
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data['galleries'] = App\Gallery::all();
        return view('public.themes.city_tours.views.galleries', $data);
    }

    public function showGallery($id)
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $gallery = App\Gallery::find($id);
        $gallery->images = $gallery->images()->get();
        $data['gallery'] = $gallery;
//        return  $data;
        return view('public.themes.city_tours.views.gallery', $data);
    }


    public function sendComplaint(Request $request)
    {
        if ($request->getMethod() == "GET") {
            $data = BaseController::createBaseInformations();
            self::getBaseInformation($data);
            return view('public.themes.city_tours.views.complaint', $data);
        } elseif ($request->getMethod() == "POST") {

            $cc = Customer::where('mobile', '=', $request->mobile)->get();
            if (count($cc) > 0) {
                $c_id = $cc [0]->id;

            } else {

                $c = new Customer();
                $c->phone = $request->input('mobile');
                $c->mobile = $request->input('mobile');
                $c->email = $request->input('email');
                $c->password = bcrypt("1234");
                $c->save();
                $c_id = $c->id;

            }
            $m = new App\Complaint();
            $m->sender = $c_id;
            $m->content = $request->input('content');
            $m->reply_to = 0;
            $m->save();
            return response()->json(['error' => false, 'message' => 'success']);

        }
    }

    public function sendContact(Request $request)
    {
        if ($request->getMethod() == "GET") {
            $data = BaseController::createBaseInformations();
            self::getBaseInformation($data);
            return view('public.themes.city_tours.views.contact_us', $data);

        } elseif ($request->getMethod() == "POST") {

            $cc = Customer::where('mobile', '=', $request->mobile)->get();
            if (count($cc) > 0) {
                $c_id = $cc [0]->id;

            } else {

                $c = new Customer();
                $c->phone = $request->input('mobile');
                $c->mobile = $request->input('mobile');
                $c->email = $request->input('email');
                $c->password = bcrypt("1234");
                $c->save();
                $c_id = $c->id;

            }
            $m = new App\Message();
            $m->sender = $c_id;
            $m->content = $request->input('content');
            $m->reply_to = 0;
            $m->save();
            return response()->json(['error' => false, 'message' => 'success']);

        }
    }

    public function faq()
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data['galleries'] = App\Gallery::all();
        return view('public.themes.city_tours.views.faq', $data);
    }

    public function about()
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        return view('public.themes.city_tours.views.about', $data);
    }


    public function showPage(Request $request, $id)
    {

    }


    public function showLoginPage()
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data ['type'] = 'customer';
        return view('public.themes.city_tours.views.login', $data);
    }

    public function showRegisterPage()
    {
        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data ['type'] = 'customer';
        return view('public.themes.city_tours.views.register', $data);
    }

    public function showHistory(Request $request)
    {

        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data ['type'] = 'customer';
        return view('public.themes.city_tours.views.admin', $data);

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
