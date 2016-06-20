<?php
session_start();
require '../client/autoload.php';

$client_id = 'vxs7654Iu0VJcwaZiJtAf9sXT3kme3ry';
$client_secret = 'YLyB7DTU4J2aoJvUVUioP6j7o0oXqIHPkjOAOAWy';
$redirect_uri = 'http://localhost/uber-php-sdk/demo/login.php';

$uber = new Uber();
$uber->setClientId($client_id);
$uber->setClientSecret($client_secret);
$uber->setRedirectUri($redirect_uri);
$uber->setScope('history profile places');


if(isset($_GET['code'])) {
	$token = $uber->authenticate($_GET['code']);
	// var_dump($token);
	$_SESSION['token'] = $token->getValue();
	header("location:$redirect_uri");

}
if(isset($_SESSION['token'])) {
	$token = $_SESSION['token'];
	$result  = $uber->request('me',$token);
	// $result  = $uber->request('products',$token,["latitude"=>"37.7759792","longitude"=>'-122.41823']);
	var_dump($result);
}else {

	$login = $uber->get_authorization_url();
	//echo "<a href=$login>Login with Uber</a>";
echo $login ;

}
