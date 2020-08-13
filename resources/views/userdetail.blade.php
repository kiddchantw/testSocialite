<div class="container">
    <div class="row col-sm-9">

        @extends('userinfo')

        @section('pageTitle','Hello!')

        @section('title','login done')

        @section('content')
        <div class="jumbotron">

            @foreach (json_decode($data, true) as $key => $value)

            {{ $key }} : {{$value}} <br>
                @if($key =='avatar')
                <img src="{{$value}}" class="img-thumbnail" alt="Responsive image" style="width: 50%; height: 50%;">
                <br>

                @endif

            @endforeach
        </div>

        @endsection
    </div>

</div>