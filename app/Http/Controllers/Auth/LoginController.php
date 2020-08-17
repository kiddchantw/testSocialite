<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Mews\Captcha\Captcha;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Queue\SerializesModels;
use View;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
    use SerializesModels;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }



    //更新captcha
    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img('mini')]);
    }




    public function login(Request $request)
    {
        if (request()->getMethod() == 'POST') {
            $rules = ['captcha' => 'required|captcha'];
            $validator = validator()->make(request()->all(), $rules);
            if ($validator->fails()) {
                echo '<p style="color: #ff0000;">Incorrect!</p>';
            } else {
                // echo '<p style="color: #00ff30;">Matched :)</p>';
                /*
                login正常流程
                */
                $loginInfo =  User::where('email', '=', $request->email);
                //dd($loginInfo); 有東西

                $userdata = array(
                    'email' => $request->email,
                    'password' => $request->password
                );
                if (Auth::attempt($userdata)) {
                    // dd(Auth::user());
                    return view('userdetail');
                } else {
                    dd("not Auth");
                }
                // $request->session()->put('userinfo', $loginInfo);


                // error log
                // Serialization of 'Closure' is not allowed
                // ::serialize
                // vendor/laravel/framework/src/Illuminate/Session/Store.php:129
                // $dataUser = $loginInfo;
                // var_dump($dataUser);
                // Session::put('userinfo', $loginInfo);
                //              
                //  return View::make('userdetail')->with($dataUser);

            }
        }
    }


    public function loginAjax(Request $request)
    {

        if (request()->getMethod() == 'POST') {
            dd("test");
            $rules = ['captcha' => 'required|captcha'];
            $validator = validator()->make(request()->all(), $rules);
            if ($validator->fails()) {
                // return response()->json(['fail'=>'Ajax Request: updateTask']);
                response()->json(['error' => 'error captach']);
            } else {
                /*
                login正常流程
                */
                // return response()->json(['success'=>'Ajax Request: updateTask']);
                response()->json(['success' => 'correct captach']);
            }
        }
    }



    public function uploadImage(Request $request)
    {
        //前往upaload image 的 view
        return view('uploadImage');
    }



    public function logout(Request $request)
    {
        if (Session::has('users')) {
            // Session::flush();
            Session::forget('userinfo');

        }

        if (Auth::check()) {
            // 這個使用者已經登入...
            Auth::logout();
        }

        return view('welcome');
    }
}
