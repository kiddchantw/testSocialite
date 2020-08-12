<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Mews\Captcha\Captcha;
use Illuminate\Http\Request;


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
        $this->middleware('guest')->except('logout');
    }



    //更新captcha
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('mini')]);
    }




    public function login(Request $request){
        if (request()->getMethod() == 'POST') {
            $rules = ['captcha' => 'required|captcha'];
            $validator = validator()->make(request()->all(), $rules);
            if ($validator->fails()) {
                echo '<p style="color: #ff0000;">Incorrect!</p>';


            } else {
                echo '<p style="color: #00ff30;">Matched :)</p>';
                /*
                login正常流程
                */
            }
        }
    }

    
    public function loginAjax(Request $request){

        if (request()->getMethod() == 'POST') {
            dd("test");
            $rules = ['captcha' => 'required|captcha'];
            $validator = validator()->make(request()->all(), $rules);
            if ($validator->fails()) {
                // return response()->json(['fail'=>'Ajax Request: updateTask']);
                response()->json(['error'=>'error captach']);


            } else {
                /*
                login正常流程
                */
                // return response()->json(['success'=>'Ajax Request: updateTask']);
                 response()->json(['success'=>'correct captach']);

            }
        }
    }





    
}
