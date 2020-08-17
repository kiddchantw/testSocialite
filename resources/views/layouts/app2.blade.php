<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- 先註解掉 -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script>  -->

    <!-- mews/captcha 加入 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" , rel="stylesheet" , integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" , crossorigin="anonymous">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}"> -->



</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">{{ __('profile') }}</a>
                        </li> 

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('upload') }}">{{ __('Upload') }}</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>




    </div>
</body>



<script type="text/javascript">
    $('#refresh').click(function() {
        $.ajax({
            type: 'GET',
            url: 'refreshcaptcha',
            success: function(data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

</script>


<script>
  
    function myFunction() {

        var x = document.getElementById("captcha").value;
        document.getElementById("demo").innerHTML = x;

        $.ajax({
            type: 'post',
            url: "{{ route('login.ajax') }}",
            data: {
                captcha: x
            },

            success: function(data) {
                console.log(x);
                // alert(data.success);
                var data = JSON.parse(data);
                alert(data.result);

            },

            error: function(jsonResponse) {
                console.log(jsonResponse.status);
                console.log(jsonResponse.responseText);

 
                alert("失敗");
            },
        });
    }
</script>


<p id="demo"></p>


</html>