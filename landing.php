<?php
session_start();

$email = $_SESSION["user_email"];
$first = $_SESSION["first"];
$last = $_SESSION["last"];
$test = $_SESSION["test"];

echo "hello " . $first . " " . $last . ". Your email is " . $email . ".";

echo '<a href="http://45.55.43.61/sean/logout.php">Log Out</a>';
echo $test;
?>