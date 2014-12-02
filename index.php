<?php
set_time_limit(12000);
ini_set('display_errors', 0);
require_once('EpiCurl.php');
require_once('EpiOAuth.php');
require_once('EpiTwitter.php');
require_once('function.php');



  $consumer_key = '';
	$consumer_secret = '';
	$access_token = '';
	$access_token_secret = '';

$twitterObj = new EpiTwitter($consumer_key, $consumer_secret);
$twitterObj->useAsynchronous(true);
$twitterObj->setToken($access_token, $access_token_secret);

getFriends("username");

?>
