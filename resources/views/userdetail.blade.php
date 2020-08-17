<?php
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

$dataUser = Session::get('userinfo', null );
if($dataUser == null){
    $dataUser = Auth::user();
}
?>


@extends('layouts.app2')

@section('content')
<div class="container">
@if($dataUser != null)         
    <div class="row col-sm-9 jumbotron">
    
        @foreach (json_decode($dataUser, true) as $key => $value)

        {{ $key }} : {{$value}} <br>

        @if(( $key =='avatar') && ($value != null))
        <div class="row">
            <img src="{{$value}}" class="img-thumbnail" alt="Responsive image" style="width:75%; height: 75%;">
        </div>
        @endif

        @endforeach
    </div>
</div>
@else
<div class="row col-sm-9 jumbotron">
    login error 
</div>

@endif

</div>

@endsection