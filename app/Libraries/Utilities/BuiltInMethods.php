<?php


namespace App\Libraries\Utilities;


use App\User;
use http\Exception;
use Illuminate\Support\Facades\Auth;
use Gateway;
use Larabookir\Gateway\Sadad\Sadad;
class BuiltInMethods
{

    public function now()
    {
        return round(microtime(true) * 1000, 0);
    }

    public function test($a = 0, $b = 0)
    {
        dd($a);
//        return "a = $a and b= $b";
    }

    public function check_login()
    {
        return Auth::check();
    }

    public function login()
    {
        Auth::login(User::find(1));
    }

    public function register()
    {
        return true;
    }

    public function is_customer_exists($email)
    {
        $cnt = \DB::table('customers')->where('email', '=', $email)->count();
//        dd($cnt);
        if ($cnt == 0)
            return false;
        else
            return true;
    }


    public function calculate_price()
    {
        $data = [];
        $data['prices'] = ["1399/02/02" => 120000, "1399/02/03" => 140000, "1399/02/04" => 220000, "1399/02/05" => 80000];
        return  $data;
    }

    public function is_room_available()
    {
        return true;
    }

    public function prepare_for_payout($command = null)
    {
//        try {
//
//            $gateway = Gateway::make(new Sadad());
//            $gateway->setCallback(route('home.services.resume', ['type' => 'online-payout', 'step' => 2]));
//
//            $gateway->price(1000)->ready();
//            return $gateway->redirect();
//
//        } catch (\Exception $e) {
//            echo $e->getMessage();
//        }
    }

    public function return_from_payout($command=null)
    {
//        try {
//            $gateway = Gateway::verify();
//            $trackingCode = $gateway->trackingCode();
//            $refId = $gateway->refId();
//            $cardNumber = $gateway->cardNumber();
//
////            return redirect()->route('home.service', ['type' => 'reserve', 'step' => 3, 'code' => $code]);
//
//        } catch (Exception $e) {
//            echo $e->getMessage();
//        }
    }

}