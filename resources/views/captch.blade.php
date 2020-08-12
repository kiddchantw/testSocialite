<html lang="en">

<head>
    <title>Captcha Code in Laravel</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" , rel="stylesheet" , integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" , crossorigin="anonymous">
</head>

<body>
    <h2>Captcha Code in Laravel</h2><br />


    <form method="post" action="{{url('captcha-test')}}">
    @csrf

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <div class="captcha">
                    <span>{!! captcha_img() !!}</span>
                    <button type="button" class="btn btn-success"><i class="fa fa-refresh" id="refresh"></i></button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>



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

</html>