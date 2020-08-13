<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Laravel\Socialite\Facades\Socialite;
use App\User;

class socialGoogle extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $userGoogle = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        // check user existed or note 
        $existUser = User::where('email', $userGoogle->email)->first();


        if ($existUser) {
            $existPlatformId = $existUser->platform_id;
            if ($existPlatformId == $userGoogle->id) {
                //login
                $loginInfo =  User::find($existUser->id);
                // echo $loginInfo;  
                return view('userdetail',['data'=>$loginInfo]);
                
            } else {
                echo " email is used :(( ";
            }
        } else {
            // create a new user            
            echo " create a new user ... <br>";
            $newUser                  = new User;
            $newUser->name            = $userGoogle->nickname;
            $newUser->password        = "google";
            $newUser->email           = $userGoogle->email;
            $newUser->plaftform       = "google";
            $newUser->plaftform_id    = $userGoogle->id;
            $newUser->avatar          = $userGoogle->avatar;
            $newUser->save();
            echo " create a new user success <br>";

        }
    }
}
