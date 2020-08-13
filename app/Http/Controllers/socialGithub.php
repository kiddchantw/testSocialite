<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

use App\User;
use Auth;


class socialGithub extends Controller
{
    //

    /**
     * edirect the user to the GitHub authentication page.
     * 將用戶重定向到GitHub身份驗證頁面。
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     * 從GitHub獲取用戶信息。
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $userGithub = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            echo "github api error";
            //return redirect('/login');
        }

        // check user existed or note 
        $existUser = User::where('email', $userGithub->email)->first();
        
        if ($existUser) {
            $existPlatformId = $existUser->platform_id;
            // var_dump($existPlatformId);
            if ($existPlatformId == $userGithub->id) {
                //login
                // echo "login info...<br>";
                // echo User::find($existUser->id);
                // auth()->login($existingUser, true);
                $loginInfo =  User::find($existUser->id);

                return view('userdetail',['data'=>$loginInfo]);

            } else {
                echo " email is used :(";
            }
        } else {
            // create a new user            
            echo " create a new user ... <br>";
            $newUser                  = new User;
            $newUser->name            = $userGithub->nickname;
            $newUser->password        = "github";
            $newUser->email           = $userGithub->email;
            $newUser->plaftform       = "github";
            $newUser->plaftform_id    = $userGithub->id;
            $newUser->avatar          = $userGithub->avatar;
            $newUser->save();
            echo " create a new user success <br>";
            $loginUser = User::where('email', $userGithub->email)->first();
            echo $loginUser;


        }

        // return redirect()->to('/home');

    }
}
