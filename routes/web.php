<?php

use Illuminate\Support\Facades\Route;

use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('upload', 'Auth\LoginController@uploadImage')->name('upload');
Route::get('profile', function () {
    return view('userdetail');
})->name('profile');



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', function () {
    echo User::all();
});

Route::get('/usersall', function () {
    return view('usersall');
});


Route::get('/users/{id}/delete', function($id) {
    if (User::find($id)){
        User::destroy($id);
        echo "delete success";
    }else{
        echo "deltete fail";
    }
});



//將用戶重新導向至OAuth提供程序
Route::get('login/github', 'socialGithub@redirectToProvider');
Route::get('login/google', 'socialGoogle@redirectToProvider');

//在身份驗證之後接收來自提供程序的回調。
Route::get('login/github/callback', 'socialGithub@handleProviderCallback');
Route::get('login/google/callback', 'socialGoogle@handleProviderCallback');


//captech
//刷新
Route::get('refreshcaptcha', 'Auth\LoginController@refreshCaptcha');

Route::get('/captch', function () {
    return view('captch');
});


// Route::any('captcha-test', function() {
//     if (request()->getMethod() == 'POST') {
//         $rules = ['captcha' => 'required|captcha'];
//         $validator = validator()->make(request()->all(), $rules);
//         if ($validator->fails()) {
//             echo '<p style="color: #ff0000;">Incorrect!</p>';
//         } else {
//             echo '<p style="color: #00ff30;">Matched :)</p>';
//         }
//     }
// });



Route::post('login2', 'Auth\LoginController@loginAjax')->name("login.ajax");
