<?php	//record_donation.php
	//include the database connect file
	include 'connect.php';
?>

<?php
	//this will be the code to insert into the database 
	
	//first thing 
	
	
	if (isset($_POST["save"])){
		print_r($_SESSION);
		$user_id = $_SESSION['user_id'];
		$user_id = 1;
		
		$donation_type = $_POST['donation_type1'];
		$amount = $_POST['amount1'];
		$store_id = '12345';
		$timestamp = date("Y-n-d G:i:s");
		
		
		
		//insert into User_Donation
		$donationQuery = "INSERT INTO User_Donation (user_id, store_id, timestamp) VALUES ('$user_id', '$store_id', '$timestamp')";
		if($r = mysql_query($donationQuery)){
			//echo "cheah brah";
		}else{
			echo"dog";
		}
		

		
		
		if(isset($_POST['num_of_donations'])){				
			for ($x = 1; $x <= $_POST['num_of_donations']; $x++) {
				echo"<br>***x is: ".$x;
				
				$donation_type = $_POST['donation_type'.$x];
				$amount = $_POST['amount'.$x];
				$store_id = '12345';
				$timestamp = date("Y-n-d G:i:s");
				
				
				
				//insert into User_Donation
				$donationQuery = "INSERT INTO User_Donation (user_id, store_id, timestamp) VALUES ('$user_id', '$store_id', '$timestamp')";
				if($r = mysql_query($donationQuery)){
					//echo "cheah brah";
				}else{
					echo"dog";
				}
				
				//now get the don_id and insert into Donation_info
				$donationInfoQuery = "SELECT * FROM User_Donation WHERE timestamp = '$timestamp' AND user_id = '$user_id' AND store_id = '$store_id'";
				if($r = mysql_query($donationInfoQuery)){
					$rows = mysql_fetch_array($r);
					//echo "don_id is: " . $rows['don_id'];
					$don_id = $rows['don_id'];
					
					$donationInfoQuery2 = "INSERT INTO Donation_Info (don_id, item_category, amount) VALUES ('$don_id', '$donation_type' , '$amount')";
					if($r = mysql_query($donationInfoQuery2)){
						//echo "<br>cheah brah donationInfoQuery2";
					}else{
						echo"dog";
					}
				
					echo "cheah brah";
				}else{
					echo"dog";
				}
				
			} 
			
			//redirect back to user dashboard
			echo '<script type="text/javascript">
							function leave() {
								window.location = "dashboard.php";
							}
							setTimeout("leave()", 1000);
						</script>';
		}
		
	
	
	}
	
	
	
	
?>

<html>
<head>
  <title>Record Donation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  
</head>
<body>


	<nav class="navbar navbar-inverse ">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">WebSiteName</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Page 1</a></li>
					<li><a href="#">Page 2</a></li> 
					<li><a href="#">Page 3</a></li> 
				</ul>
			</div>
		</div>
	</nav>



<div class="container">

	<div class="row">

		<div class="col-xs-1">
			.col-xs-1
		</div>
		
		<div class="col-xs-10">
			<div class="well">
				<div class="row"> <!-- this is a row template -->
					<div class="col-xs-2">.col-xs-2</div>
					<div class="col-xs-8"><h2><center>Record your donation</center></h2></div>
					<div class="col-xs-2">.col-xs-2</div>
				</div>
				<form action="record_donation.php" method="post">
					<div id="donation_div">
						<input type="hidden" class="form-control" id="num_of_donations" name="num_of_donations" value="1">
						<div class="form-group">
							<label for="donation_type1">Donation Type</label>
							<select class="form-control" id="donation_type1" name="donation_type1" required>
								<option value="" selected disabled hidden>Donation Category</option>
								<option value="1">Clothing</option>
								<option value="2">Appliances/Stereos</option>
								<option value="3">Cars/Trucks/RVs/ Boats/Motorcycles</option>
								<option value="4">Dictionaries/Text Books/Encyclopedias</option>
								<option value="5">Furniture</option>
								<option value="6">Household Items</option>
								<option value="7">Furnishings</option>
								<option value="8">Computers and all Peripherals</option>
								<option value="9">Records/CDs/Tapes/DVDs/Video Games</option>
								<option value="10">Sporting Goods and Exercise Equipment</option>
							</select>	
						</div>
						<div class="form-group">
							<label for="amount1">Amount of Donation Items</label>
							<input type="number" class="form-control" id="amount1" name="amount1" min="1" placeholder = "Amount of Donated Items" required>
						</div>
						
					</div>
						
						<div class="row"> <!-- this is a row template -->
							<div class="col-xs-1">
								<a class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Add Another Job" onclick="addNewDonationField()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
							</div>
							<div class="col-xs-10">
								<center>
									<button type="submit" name="save" class="btn btn-primary">Save Donations</button>
								</center>
							</div>
							<div class="col-xs-1">
								.col-xs-1
							</div>
						</div>
					
					
					
					
					
				</form>
			</div>
		</div>
		
		<div class="col-xs-1">
			.col-xs-1
		</div>
		
	</div>



</div>


<div class="row"> <!-- this is a row template -->
  <div class="col-xs-2">.col-xs-2</div>
  <div class="col-xs-8">.col-xs-2</div>
  <div class="col-xs-2">.col-xs-2</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/record_donation_js.js"></script>
</body>
</html>