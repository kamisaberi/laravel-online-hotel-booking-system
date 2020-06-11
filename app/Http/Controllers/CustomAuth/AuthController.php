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

class AuthController extends Controller
{
    use  RedirectsUsers;

    public function loginForm($type)
    {

        $data = [];
        $data['type'] = $type;
        return view('custom_auth.login', $data);
    }

    /* @POST
     */
    public function login(Request $request, $type)
    {
        $mobile = $request->input('mobile');
        $password = $request->input('password');
        $rules = ['mobile' => 'required', 'password' => 'required'];
        $validate = Validator::make($request->all(), $rules);

        if ($validate->passes()) {

            $user = User::where('mobile', '=', $mobile)->get();
            if (Hash::check($password, $user[0]->password) == true) {
                \Auth::login($user[0]);
                return redirect()->intended($this->redirectPath());
            } else {
                return redirect("/login/$type")->with('error', 'Invalid Email address or Password');
            }

        } else {
            return redirect("/login/$type")->with('error', 'Invalid Email address or Password');
        }
    }


    /* GET
    */
    public
    function logout(Request $request)
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
    public
    function registrationForm($type)
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
