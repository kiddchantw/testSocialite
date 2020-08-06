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

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', function () {
    echo User::all();
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

//在身份驗證之後接收來自提供程序的回調。
Route::get('login/github/callback', 'socialGithub@handleProviderCallback');


