<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

$dataUser = Session::get('userinfo', null);
if ($dataUser == null) {
    $dataUser = Auth::user();
}
$dataUser = json_decode($dataUser, true);
?>


@extends('layouts.app2')

@section('content')
<div class="container">
    @if($dataUser != null)
    <div class="row col-sm-9 jumbotron">

        @foreach ($dataUser as $key => $value)

        {{ $key }} : {{$value}} <br>

        <!-- @if(( $key =='platform') && ($value == null))
            <img src="{{asset('/storage/' .'user/11.png')}}" class="img-thumbnail" alt="Responsive image"> 
        @else   
            <img src="{{ $dataUser['avatar'] }}" class="img-thumbnail" alt="Responsive image" style="width:75%; height: 75%;"> 
        @endif -->
        <!-- @if(( $key =='avatar') && ($value != null))
            <div class="row">
            <img src="{{asset('/storage/' .'user/11.png')}}" class="img-thumbnail" alt="Responsive image" style="width: 50%; height: 50%;"> 
        </div>
        @endif -->
        @endforeach

        <div class="row">
            @if($dataUser['platform'] == null)
          
            <?php 
            //<img src= "{{asset('/storage/' .'/user/11.png')}} class="img-thumbnail" alt="Responsive image"> 
            //<img src="storage//user/11.png"  class="img-thumbnail" alt="Responsive image">

            // $testURL = "storage/app/public/user/11.png"  no
            // $testURL = "storage//user/11.png"; ok
            // $testURL = "storage//user/".$dataUser['id'].".png";  ok
            // $testURL = asset('/storage/' .'/user/11.png');
            $strA = "user/".$dataUser['id'].".png";            //ok
            $strb = explode("/",$dataUser['avatar'],2)[1];     //ok

            $testURL = asset('/storage/' .$strb);

            ?>

            <br>
            <img src="{{ $testURL }}" class="img-thumbnail" alt="Responsive image">

            @else
           
            <img src="{{ $dataUser['avatar'] }}" class="img-thumbnail" alt="Responsive image">

            @endif
        </div>


    </div>
</div>
@else
<div class="row col-sm-9 jumbotron">
    login error
</div>

@endif

</div>

@endsection