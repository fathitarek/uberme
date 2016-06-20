<?php

session_start();
require '../client/autoload.php';
include_once '../client/Uber.php';
$client_id = 'vxs7654Iu0VJcwaZiJtAf9sXT3kme3ry';
$client_secret = 'YLyB7DTU4J2aoJvUVUioP6j7o0oXqIHPkjOAOAWy';
$redirect_uri = 'https://api.uber.com/v1/me';

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

//fathi

$u = $uber->getScope();
if ($u) {
//$red='http://api.uber.comv1/me';
    var_dump($u);
    header("location:$redirect_uri");
} else {
    echo 'false';
}

