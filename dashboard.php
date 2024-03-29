
<?php
	session_start();
	
	$email = $_SESSION['user_email'];
	$first = $_SESSION['first'];
	$last = $_SESSION['last'];
	$user_id = $_SESSION['user_id'];
	$zip = $_SESSION['zip'];
	$zip = '19802';
	//echo "$email";
	require_once("connect.php");
	$query="SELECT * FROM Users WHERE email = '$email'";
	$query2="SELECT Store_Needed.*,Store_Info.*, Donation_Category.*
					FROM Store_Needed,Store_Info, Donation_Category
					WHERE Store_Needed.store_id = Store_Info.store_id && Store_Info.zip = $zip && 
					Donation_Category.Donation_ID = Store_Needed.item_category";
	$r = mysql_query($query);
	$r2 = mysql_query($query2);
	
	if($r)
	{
		while($row = mysql_fetch_array($r))
		{
			$_SESSION['user_id'] = $row[user_id];
			$current_level = $row['donation_level'];
			$donations_cur_level = $row['amount_of_donations'] % 5;	
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
<div class="container">

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
	
	
	<a class="btn btn-default" style="float:right;" href="http://45.55.43.61/logout.php">Log Out</a>
	<div></div>
	<!--User Information  
		Items: Email Address, Level Discount Percentage the User is At -->
	<div>
		<!--Welcome: Person name  -->
		<h1>Welcome <?php echo $first . " " . $last; ?> </h1>		
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
	<div class="container">
  <h2>Most requested items in your (<?php echo $zip; ?>) area</h2>            
  <table class="table table-bordered table-striped">
    <?php
    echo"<thead>";
      echo "<tr>";
        echo "<th>Location</th>";
        echo "<th>Items Requested</th>";
      echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = mysql_fetch_array($r2)){
      echo "<tr>";
        echo "<td>".$row["address"]."</td>";
        echo "<td>".$row["Category"]."</td>";
      echo "</tr>";
      }
    echo "</tbody>";
  echo "</table>"; 
  ?>

<div style="align-center"  class="btn-group-vertical">

<div class="container">
<div class="row">
	<div class="col-xs-5"></div>
	<div class="col-xs-2">
		<center>
		<a href="record_donation.php" class="btn btn-primary btn-block" style="width:150px">Record Donations</a>
		<a href="admin.php" class = "btn btn-primary btn-block" style="width:150px"> Admin Page </a>
		<a href="admin_delete.php" class="btn btn-primary btn-block" style="width:150px">Admin Delete</a>
        	<a href="items.php" class = "btn btn-primary btn-block" style="width:150px">Items </a>
		</center>
	</div>
	<div class="col-xs-5"></div>
</div>
</div>

	
</div>


</div>
</body>
</html>
