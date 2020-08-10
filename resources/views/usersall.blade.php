<?php

use GuzzleHttp\Client;

$url = "http://127.0.0.1:8002/users";

//$url = "https://soweb.kcg.gov.tw/webapi/api/Category/";

$client = new \GuzzleHttp\Client();
$request = $client->get($url);
$response = $request->getBody()->getContents();
//dd($response);

?>

<div class="container">
    <div class="row col-sm-9">

        @extends('userinfo')

        @section('pageTitle','Hello!')

        @section('title',' User information (blade.php)') 

        @section('content')
        <div class="jumbotron">
        <!-- {{ $response }} -->

        <br>
        @foreach ( json_decode($response, true) as $res)
            @foreach ( $res as $key => $val )
                {{ $key }} : {{ $val }}  <br>
            @endforeach
        @endforeach
          
        </div>

        @endsection
    </div>

</div>