<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\UserProperty;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    protected $type_id = 1;

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//    protected $redirectAfterLogout = '/goodbye';
//
//    public function logout(Request $request)
//    {
//        $this->guard()->logout();
//        $request->session()->flush();
//        $request->session()->regenerate();
//        return redirect($this->redirectAfterLogout);
//    }

//    public function authenticate(Request $request)
//    {
//        $credentials = $request->only($this->username(), 'password');
//
//        if (Auth::attempt($credentials)) {
//            // Authentication passed...
//            return redirect()->intended('/');
//        }
//    }

//    public function login(Request $request)
//    {
////        dd($request);
//
//        $this->validateLogin($request);
//
//        // If the class is using the ThrottlesLogins trait, we can automatically throttle
//        // the login attempts for this application. We'll key this by the username and
//        // the IP address of the client making these requests into this application.
//        if ($this->hasTooManyLoginAttempts($request)) {
//            $this->fireLockoutEvent($request);
//
////            return $this->sendLockoutResponse($request);
//        }
//
//        if ($this->attemptLogin($request)) {
//            return $this->sendLoginResponse($request);
//        }
//        $this->incrementLoginAttempts($request);
//
//        return $this->sendFailedLoginResponse($request);
//
//
//    }

//    public function username()
//    {
//
//        $props = UserProperty::where('type', '=', $this->type_id)
//            ->where('validation_rules', 'like', '%username%')
//            ->get();
////        dd($props[0]->title);
//        return $props[0]->title;
//    }

}
