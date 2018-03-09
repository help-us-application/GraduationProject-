<?php
error_reporting(E_ALL);
// set variables
$queryUrl = "http://api.kairos.com/recognize";


$path = '12.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

$imageObject = '{"image": "' .$base64. '", "gallery_name":"frist" }';
//echo $imageObject;
$APP_ID = "d63132f8";
$APP_KEY = "730ea2ac5dd2d841e03b3668b9a895b3";
 
$request = curl_init($queryUrl);
// set curl options
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request,CURLOPT_POSTFIELDS, $imageObject);
curl_setopt($request, CURLOPT_HTTPHEADER, array(
        "Content-type: application/json",
        "app_id:d63132f8" ,
        "app_key:730ea2ac5dd2d841e03b3668b9a895b3" 
    )
);
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($request);
// show the API response


echo $response;
// close the session
curl_close($request);



?>