
<?php
	session_start();
	
	$email = $_SESSION['email'];
	$user_id = $_SESSION['user_id'];
	
	require_once("connect.php");
	$query="SELECT * FROM Users WHERE user_id = $user_id";
	$r = mysql_query($query);
	
	if($r)
	{
		while($row = mysql_fetch_array($r))
		{
			$current_level = $row['donation_level'];
			$donations_cur_level = $row['total_donation'] % 5;	
		}
		
	}
	
	$donations_to_go = '5' - $donations_cur_level;
	$don_percent = '20' * $donations_cur_level;
	$don_percent_left = '100' - $don_percent;

?>


<!DOCTYPE html>
<head>
<html>
	  <title>Dashboard</title>
	  
	  <!--Tyler -->
	  <link rel="stylesheet" type="text/css" href="homeStyle.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  <link type="text/css" rel="stylesheet" href="homeStyle.css"/>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	  <link rel='stylesheet' href='style.css' />
	  
	  
	  <!--Will -->
	   <script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
</head>

<body>
	
	
	<nav style="background-color:#5eb0e5"class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a href="homepage.html"> <img src="http://www.goodwill.org/wp-content/themes/GII/images/general/header_logo.png" class="img-responsive" alt="Cinque Terre"> </a>
	    </div>
	  </div>
	</nav>
	<div></div>
	<!--User Information  
		Items: Email Address, Level Discount Percentage the User is At -->
	<div>
		<!--Welcome: Email Address  -->
		<h1>Welcome <?php echo $email; ?> </h1>		
	</div>
	
	
	<!--User Graphs  
		Items: Progress Bar (until next Discount Level  -->
		<!--Progress Bar (until next Discount Level  -->
		<div>Progress Bar</div>
	</div>

	<!-- This needs bootstrap centering -->
	<div class="container">
		<p> Thank you for your donations your current donation level is <?php echo $current_level; ?>.
			Another <?php echo $donations_to_go; ?> Donations to reach the next level.<p>
	</div>

	<div class="container">
	  <h2>Donation Progress</h2>
	  <div class="progress">
		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $don_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $don_percent; ?>%">
		  <?php echo $donations_cur_level; ?> out of 5  
		</div>
	<div class="progress-bar progress-bar-danger" role="progressbar" style="width:<?php echo $don_percent_left; ?>%">
		 <?php echo $donations_to_go; ?> Remaining 
	  </div>
	  </div>
	</div>
	
	
	
	<!--List of:      Stores _ Needs _ Locations _ Hours  -->
	<div>
		<div>
			<H1>Stores</H1>
		</div>
		<div>
			<div class="information">
				<h1>Wilmington</h1>
				<h3>Most Needed Item</h3>
				<p class="store-location">300 E. Lea Blvd.</p>
				<p class="store-location">Wilmington, DE 19802</p>
				<p class="store-location">(302) 761-4640</p>
				<h4>STORE HOURS</h2>
				<ul class="store-hours"><li><strong>TODAY</strong> : <span>10AM - 9PM</span></li><li><strong>TOMORROW</strong> : <span>10AM - 9PM</span></li><li><strong>SUN (11/01)</strong> : <span>11AM - 8PM</span></li><li><strong>MON (11/02)</strong> : <span>10AM - 9PM</span></li><li><strong>TUE (11/03)</strong> : <span>10AM - 9PM</span></li><li><strong>WED (11/04)</strong> : <span>10AM - 9PM</span></li><li><strong>THU (11/05)</strong> : <span>10AM - 9PM</span></li></ul>
			</div>
		</div>
		<div>
			<div class="information">
				<h1>New York</h1>
				<h3>Most Needed Item</h3>
				<p class="store-location">300 E. Lea Blvd.</p>
				<p class="store-location">Wilmington, DE 19802</p>
				<p class="store-location">(302) 761-4640</p>
				<h4>STORE HOURS</h2>
				<ul class="store-hours"><li><strong>TODAY</strong> : <span>10AM - 9PM</span></li><li><strong>TOMORROW</strong> : <span>10AM - 9PM</span></li><li><strong>SUN (11/01)</strong> : <span>11AM - 8PM</span></li><li><strong>MON (11/02)</strong> : <span>10AM - 9PM</span></li><li><strong>TUE (11/03)</strong> : <span>10AM - 9PM</span></li><li><strong>WED (11/04)</strong> : <span>10AM - 9PM</span></li><li><strong>THU (11/05)</strong> : <span>10AM - 9PM</span></li></ul>
			</div>
		</div>
	</div>
	
	
	

</body>
</html>