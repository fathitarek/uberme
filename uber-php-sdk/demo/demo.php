<?php

session_start();
require '../client/autoload.php';

$client_id = 'Kr7poSG_TFMZ-CoQpzpYefDqQseU-TYj';
$client_secret = 'q19F35LZtBXCEE0JYGtlwhJLvrlR4b75yCkCZ-6S';
$redirect_uri = 'http://localhost/try/uber_api/demo.php';

$uber = new Uber();
$uber->setClientId($client_id);
$uber->setClientSecret($client_secret);
$uber->setRedirectUri($redirect_uri);
$uber->setScope('profile histroy');


if (isset($_GET['code'])) {
    $token = $uber->authenticate($_GET['code']);
    // var_dump($token);
    $_SESSION['token'] = $token->getValue();
    header("location:$redirect_uri");
}
if (isset($_SESSION['token'])) {
    $token = $_SESSION['token'];
    $result = $uber->request('me', $token);
    // $result  = $uber->request('products',$token,["latitude"=>"37.7759792","longitude"=>'-122.41823']);
    print_r($result);
    
     $json = json_decode($result);
     
//    foreach($json->entries as $row)
//    {
//        foreach($row as $key => $val)
//        {
//            echo $key . ': ' . $val;
//            echo '<br>';
//        }
//    }
    echo '************************\n';
   

    echo 'fathi';

    foreach ($json as $value) {
        echo $value->promo_code; 
        echo $value->email; 
        echo 'nouraa';
    }
    echo 'fathi2';
} else {
    $login = $uber->get_authorization_url();
//	echo "<a href=$login>Login with Uber</a>";
   //echo $login;
}
