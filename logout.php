<?php

session_start();
require_once __DIR__ . '/web-test/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '133218297035484',
  'app_secret' => 'a5a45ec06f5849a8f043a3040ee0dc17',
  'default_graph_version' => 'v2.5',
  ]);
  
  $helper = $fb->getRedirectLoginHelper();
  $token = $helper->getAccessToken();
//$url = 'https://www.facebook.com/logout.php?next=' . 'http://45.55.43.61/sean/login-new.php' .
  //'&access_token='.$token;
session_destroy();
header("Location:http://45.55.43.61/login.php");

?>
