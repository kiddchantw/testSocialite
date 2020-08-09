<h1>users all test</h1>


<?php

// if (!$data = file_get_contents("http://www.google.com")) {
//     $error = error_get_last();
//     echo "HTTP request failed. Error was: " . $error['message'];
// } else {
//     echo "Everything went better than expected";
// }

//$url = "http://127.0.0.1:80/users";
// $url = "https://data.kcg.gov.tw/dataset/6f29f6f4-2549-4473-aa90-bf60d10895dc/resource/30dfc2cf-17b5-4a40-8bb7-c511ea166bd3/download/lightrailtraffic.json";
$url = "https://soweb.kcg.gov.tw/webapi/api/Category/";


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
// echo $data;
// $result = json_decode($data,true);
// echo response()->json($data);



$json_error = "";

$sets = json_decode($data,true);
switch (json_last_error()) {

    case JSON_ERROR_DEPTH:
        $json_error = 'Maximum stack depth exceeded';
        break;
    case JSON_ERROR_STATE_MISMATCH:
        $json_error = 'Underflow or the modes mismatch';
        break;
    case JSON_ERROR_CTRL_CHAR:
        $json_error = 'Unexpected control character found';
        break;
    case JSON_ERROR_SYNTAX:
        $json_error = 'Syntax error, malformed JSON';
        break;
    case JSON_ERROR_UTF8:
        $json_error = 'Malformed UTF-8 characters, possibly incorrectly encoded';
        break;
}
echo   $json_error;

//  echo file_get_contents($url);

foreach ($sets as $ddd){
    var_dump($ddd) ;
    echo "<br>";
}

?>


<div>
<br>
    <!-- @json($sets) -->
<br>

    @foreach( $sets as $aaa)
        @json($aaa["kind"]) <br>
    @endforeach
</div>
