@extends('layouts.app2')

@section('content')


<div class="container">
    <div class="row col-sm-9 jumbotron">


        @foreach (json_decode($data, true) as $key => $value)

        {{ $key }} : {{$value}} <br>

        @if( $key =='avatar' )
        <div class="row">
            <img src="{{$value}}" class="img-thumbnail" alt="Responsive image" style="width:75%; height: 75%;">
        </div>
        @endif

        @endforeach
    </div>
</div>

</div>

@endsection