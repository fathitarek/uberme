<?php

session_start();
require '../client/autoload.php';

$client_id = 'vxs7654Iu0VJcwaZiJtAf9sXT3kme3ry';
$client_secret = 'YLyB7DTU4J2aoJvUVUioP6j7o0oXqIHPkjOAOAWy';
$redirect_uri = 'http://localhost/uber-php-sdk/demo/login.php';
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
//$uber->setScope('profile');
//ncurses_erase();
//ncurses_addstr($uber->setScope('profile'));
//str_replace('string(7) "profile" ','',$uber->setScope('profile'));
if (isset($_GET['code'])) {
    $token = $uber->authenticate($_GET['code']);
    // var_dump($token);
    echo '<br>';
    $_SESSION['token'] = $token->getValue();
    header("location:$redirect_uri");
}
if (isset($_SESSION['token'])) {
    $token = $_SESSION['token'];
    $result = $uber->request('v1/me', $token);
    // $result  = $uber->request('products',$token,["latitude"=>"37.7759792","longitude"=>'-122.41823']);
    print_r($result);
//   var_dump($result->email);
//   var_dump($result->uuid);
    $email = $result->email;
    $uuid = $result->uuid;
    $name = $result->first_name;
    echo $name;
    //echo $user_id;
    //var_dump(json_decode($result));
    $result->uuid;
    echo '************************';
    //  echo 'fathi';
//    foreach ($result as $key=>$value) {
//        var_dump($value); 
//        //echo $value['uuid']; 
//        //echo $value->email; 
//        //echo 'nouraa';
  $con = mysqli_connect('localhost', 'root','iti', 'uberme')or die();
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$res = "INSERT INTO members (uuid, name, email)
 VALUES ('".$uuid."','" . $name . "','" . $email . "')";
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
