<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\UserProperty;
use DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        $data['email'] = $data['rg-email'];
//        unset($data['rg-email']);


//        $data['password'] = $data['rg-password'];
//        unset($data['rg-password']);

        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    public function showRegistrationForm()
    {
//        return "test";

        $data = [];
        $users = UserProperty::where('type', '=', 2)->get();
        $data ['users'] = $users;
//        return $data;
        return view('auth.register', $data);
    }


//    public function register(Request $request)
//    {
//        $this->validator($request->all())->validate();
////        return "sadasdd";
//
//        event(new Registered($user = $this->create($request->all())));
//        $this->guard()->login($user);
//        return $this->registered($request, $user)
//            ?: redirect($this->redirectPath());
//    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

//        dd($data);
//        return;

        $user = new User();
        $user->type = 2;
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

//        $user = User::create([
//            'type' => '2',
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);


        $properties = UserProperty::where('type', '=', 2)->get();

        foreach ($data as $key => $value) {
            foreach ($properties as $property) {
                if ($property->title == $key) {
                    $pid = $property->id;
                    $did = $user->id;
                    DB::table('user_assigned_properties')->insert(
                        [
                            'property' => $pid,
                            'value' => ($value == null ? '' : $value),
                            'user' => $did,
                        ]
                    );
                }
            }
        }


//        dd($user->id);

        return $user;

    }
}
