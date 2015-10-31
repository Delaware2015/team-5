<!DOCTYPE html>
<html>
<?php include "connect.php"; ?>
<head>
<title>Goodwill Login</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="homeStyle.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="homeStyle.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php
session_start();
require_once __DIR__ . '/web-test/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '133218297035484',
  'app_secret' => 'a5a45ec06f5849a8f043a3040ee0dc17',
  'default_graph_version' => 'v2.5',
  ]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional
	
try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();
  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }
if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		// getting short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;
	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();
		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
		// setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}
	// redirect the user back to the same page if it has "code" GET variable
	if (isset($_GET['code'])) {
		header('Location:http://45.55.43.61/dashboard.php');
	}
	// getting basic info about user
	try {
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
		$profile = $profile_request->getGraphNode()->asArray();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
	// printing $profile array on the screen which holds the basic info about user
	//print_r($profile);
	echo '<a href="http://45.55.43.61/logout.php">Log Out</a>';
	//header("Location:http://45.55.43.61/sean/login-new.php");
	
	//echo $profile["email"];
	$_SESSION["user_email"] = $profile["email"];
	$_SESSION["first"] = $profile["first_name"];
	$_SESSION["last"] = $profile["last_name"];
	$email = $profile["email"];
	$first = $profile["first_name"];
	$last = $profile["last_name"];
	
	//echo $_SESSION["user_email"];
	//echo "your name is " . $_SESSION["first"] . " " . $_SESSION["last"];
	//echo "<br><p>hello there its me</p>";
	
	$q1 = "SELECT * FROM Users WHERE email = '$email'";
	$result = mysql_query($q1);
	
	if(mysql_num_rows($result)>0)
	{
		//$_SESSION["test"] = "<p>hello there</p>";
		
	}
	else{
	//$_SESSION["test"] = "<p>hellere</p>";
		$query = "INSERT INTO Users (email, zip, password, first_name, last_name) VALUES ('$email', 'NULL', 'NULL','$first', '$last')";
		$result = mysql_query($query);
		//if(!result) {
			//$_SESSION["test"] = "<p>spaghetti</p>";
		//}else{
			//$_SESSION["test"] = "<p>fsdkjflj;adkf</p>";
		//}
	}
	
	
	
	
  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
	// replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
	$loginUrl = $helper->getLoginUrl('http://45.55.43.61/login.php', $permissions);
	//echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	$loginMessage = '<a style="text-align:center;font-size: 135%;" class="btn btn-default" href="' . $loginUrl . '">Log in with Facebook!</a>';
	
}

?>
</head>
<body>
<br>

<div class = "row">
  <div class="col-xs-1">
    </div>
      <div class="col-xs-10">
          <nav style="background-color:#5eb0e5"class="navbar navbar-inverse">
            <div class="container">
              <div class="navbar-header">
                 <center><a style="padding:2px;"href="homepage.html"> <img src="goodwillLogo.png" class="img-responsive" alt="Cinque Terre"> </a></center>
              </div>
            </div>
          </nav>
        </div>
      <div class="col-xs-1">
   </div>
</div>



<h1 style="text-align:center;">Login</h1><br>

<div class="well" style="text-align:center;" border="10px solid black;">
	<form action="login.php" method="post">
		<label for="username">Username:</label>
		<input type="text" name="username" id="uname"><br><br>
		<label for="password">Password:</label>
		<input type="text" name="username" id="pword"><br><br>
		<input type="submit" value="Login">
	</form><br>	
	<strong style="text-align:center;">OR</strong><br><br>
<?php echo $loginMessage ?>

<div id="status">
<br>
<div class="btn-group-vertical">
        <a href="register_reg.php" class="btn btn-default">Register Without Facebook</a>
</div>
</div>
</div>

</body>
</html>
