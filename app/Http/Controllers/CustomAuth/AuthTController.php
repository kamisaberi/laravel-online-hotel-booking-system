<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Base\PropertyController;
use App\Http\Controllers\User\UserController;
use App\Libraries\Utilities\TypeUtility;
use App\User;
use App\UserType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class AuthTController extends Controller
{
    use  RedirectsUsers;

    public function loginForm($type)
    {
        $data = [];
        $bt_id = UserType::where('title', '=', $type)->first();
        $bt_id->actions = PropertyController::parseTypeActions($bt_id->actions);
        $bt_id->triggers = TypeUtility::parseTriggers($bt_id->triggers);
        $bt_id->locales = (array)json_decode($bt_id->locales);

        $data['type'] = $bt_id;
        $props = UserController::getProperties($type);

        $properties = [];
        foreach ($props as $prop) {
            if (is_array($prop->validation_rules)) {
                if (in_array('required_for_login', $prop->validation_rules)) {
                    $properties[] = $prop;
                }
            } else {
                if ($prop->validation_rules == 'required_for_login') {
                    $properties[] = $prop;
                }
            }
        }
        $data['properties'] = $properties;
        return view('custom_auth.login', $data);
    }

    /* @POST
     */
    public function login(Request $request, $type)
    {

        $bt_id = UserType::where('title', '=', $type)->first();
        $bt_id->actions = PropertyController::parseTypeActions($bt_id->actions);
        $bt_id->triggers = TypeUtility::parseTriggers($bt_id->triggers);
        $bt_id->locales = (array)json_decode($bt_id->locales);
        $props = UserController::getProperties($type);

        $rules = [];
        $prperties = [];
//        $non_pass_prop_id = 0;
        $possible_user_id = 0;
        foreach ($props as $prop) {
            if (is_array($prop->validation_rules)) {
                if (in_array('required_for_login', $prop->validation_rules)) {
                    $rules[$prop->title] = 'required';
                    $prperties[] = $prop;
                    if ($prop->input_type != 'password')
                        $non_pass_prop_id = $prop;

                }
            } else {
                if ($prop->validation_rules == 'required_for_login') {
                    $rules[$prop->title] = 'required';
                    $prperties[] = $prop;
                    if ($prop->input_type != 'password')
                        $non_pass_prop_id = $prop;

                }
            }
        }

//        dd($rules);
        $validate = Validator::make($request->all(), $rules);

        if ($validate->passes()) {


            $prp_ids = [];
            foreach ($prperties as $prperty) {
                $prp_ids [] = $prperty->id;
            }
//            dd($prp_ids);
            $assgnds = DB::table('user_assigned_properties')
                ->whereIn('property', $prp_ids)
                ->get();

            foreach ($assgnds as $assgnd) {
                if ($assgnd->property == $non_pass_prop_id->id && $assgnd->value == $request->input($non_pass_prop_id->title))
                    $possible_user_id = $assgnd->user;
            }

//            dd($possible_user_id);
            $can_login = false;
//                $can_login = true;
            foreach ($prperties as $prperty) {
                if ($prperty->input_type == 'password') {
                    foreach ($assgnds as $assgnd) {
                        if ($assgnd->property == $prperty->id) {
                            if (Hash::check($request->input($prperty->title), $assgnd->value) == true && $assgnd->user == $possible_user_id) {
                                $can_login = true;
                                break;
                            }
                        }
                    }
                }
            }
            if ($can_login) {
                $user = User::where('id', '=', $possible_user_id)->get();
                \Auth::login($user[0]);
                return redirect()->intended($this->redirectPath());
            } else {
                return redirect("/login/$type")->with('error', 'Invalid Email address or Password');
            }
        }
    }

    /* GET
    */
    public function logout(Request $request)
    {
        if (\Auth::check()) {
            \Auth::logout();
            $request->session()->invalidate();
        }
//        return redirect('/login');
        return redirect()->route('auth.login.form', ['type' => 'user']);
    }

    /* GET
*/
    public function registrationForm($type)
    {
        $data = [];
        $bt_id = UserType::where('title', '=', $type)->first();
        $bt_id->actions = PropertyController::parseTypeActions($bt_id->actions);
        $bt_id->triggers = TypeUtility::parseTriggers($bt_id->triggers);
        $bt_id->locales = (array)json_decode($bt_id->locales);
        $data['type'] = $bt_id;

        return view('custom_auth.register', $data);
    }


    /* POST
    */
    public function registerUser(Request $request)
    {
        $validate = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|max:255'
        ]);
        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate);
        }
        $user_create = \App\User::create([
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'name' => $request->name
        ]);
        return redirect('/register')->with('success', 'Successfully registered');
    }


    //
}
