<div class="container">
    <div class="row col-sm-9">

        @extends('userinfo')

        @section('pageTitle','Hello!')

        @section('title','login done')

        @section('content')
        <div class="jumbotron">

            @foreach (json_decode($data, true) as $key => $value)

            {{ $key }} : {{$value}} <br>

            @endforeach
        </div>

        @endsection
    </div>

</div>