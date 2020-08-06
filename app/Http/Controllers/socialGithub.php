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

        // $user->token;

        

        try {
            $user = Socialite::driver('github')->user();

        } catch (\Exception $e) {
            return redirect('/login');
        }

        // dd($user->id);

        // dd($user->email);
         // check if they're an existing user
         $existingUser = User::where('email', $user->email)->first();
         if($existingUser){
            // log them in
            // auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->nickname;
            $newUser->password        = "github";
            $newUser->email           = $user->email;
            $newUser->plaftform        = "github";
            $newUser->plaftform_id     = $user->id;
            $newUser->avatar          = $user->avatar;
            $newUser->save();

            echo " create a new user";
        }
        // return redirect()->to('/home');

    }
}
