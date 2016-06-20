<?php

session_start();
require '../client/autoload.php';

$client_id = 'vxs7654Iu0VJcwaZiJtAf9sXT3kme3ry';
$client_secret = 'YLyB7DTU4J2aoJvUVUioP6j7o0oXqIHPkjOAOAWy';
$redirect_uri = 'http://localhost/uber-php-sdk/demo/history.php';
$con = "";
$res = "";
$local = "localhost";
$user = "root";
$password = "iti";
$database = "uberme";
$uber = new Uber();
$uber->setClientId($client_id);
$uber->setClientSecret($client_secret);
$uber->setRedirectUri($redirect_uri);
$uber->setScope('history');


if (isset($_GET['code'])) {
    $token = $uber->authenticate($_GET['code']);
    // var_dump($token);
    $_SESSION['token'] = $token->getValue();
    header("location:$redirect_uri");
}
if (isset($_SESSION['token'])) {
    $token = $_SESSION['token'];
   //echo $token;
    $result = $uber->request('v1.2/history', $token);
    // $result  = $uber->request('products',$token,["latitude"=>"37.7759792","longitude"=>'-122.41823']);
    var_dump($result);
//   var_dump($result->email);
//   var_dump($result->uuid);
  $product_id=$result->history[0]->product_id;
     $pickup_location = $result->history[0]->start_city->display_name;
     $destnation_location = $result->limit;
    $start_time=$result->history[0]->start_time;
    $end_time=$result->history[0]->end_time;
    $time=$end_time-$start_time;
    echo gmdate($time);
    echo '************************';
    $trip_time= gmdate("H:i:s",$time);
//    foreach ($result as $key=>$value) {
//        var_dump($value); 
//        //echo $value['uuid'];   
  $con = mysqli_connect('localhost', 'root','iti', 'uberme')or die();
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$res = "INSERT INTO trip (product_id,pickup_location, destnation_location,trip_time,start_time,end_time)
 VALUES ('".$product_id."','".$pickup_location."','" . $destnation_location . "','".$trip_time."',".$start_time.",".$end_time.")";
mysqli_query($con, $res);
   //$res = mysqli_query($con, "INSERT INTO `members`(`user_id`,`name`,`email`) VALUES ($user_id,'" . $name . "','" . $email . "')");
    var_dump($res);
   // echo $res;
    if ($res) {
        echo 'true database';
    } else {
        echo 'false database';
    }
//    }
    //  echo 'fathi2';
} else {
    $login = $uber->get_authorization_url();
//	echo "<a href=$login>Login with Uber</a>";
    echo $login;
}
