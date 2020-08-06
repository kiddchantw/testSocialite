<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;


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
        $user = Socialite::driver('github')->user();

        // $user->token;

        dd($user->email);

    }
}
