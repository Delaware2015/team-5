<?php
// Address error handling
$user = 'root';
$pass = 'code4good';
$db = 'goodwill';

ini_set('display_errors' , 1);
error_reporting(E_ALL & ~E_NOTICE);
// Attempt to Connect

$connection = @mysql_connect ('localhost', $user, $pass);
if($connection){
		
		//mysql_close();
}
else{
		die('<p>Could not connect to MySQL beacuse: <b>' .mysql_error() . '</b></p>');
}
if (@mysql_select_db($db, $connection)){
		 //print '<p>The goodwill example database has been selected.</p>';
}
else{
		die('<p> Could not select the goodwill database because: <b>' .mysql_error() . '</b></p>');
}

?>		

