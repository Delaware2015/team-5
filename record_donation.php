<?php	//record_donation.php
	//include the database connect file
	include 'connect.php';
?>

<?php
	//this will be the code to insert into the database 
	
	//first thing 
	
	
	if (isset($_POST["save"])){
	
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		$pwd_confirm = $_POST['pwd_confirm'];
		$zipcode = $_POST['zipcode'];
		
		//make session vars
		$_SESSION['email'] = $email;
		$_SESSION['zipcode'] = $zipcode;
		
		$registerQuery = "INSERT INTO Users (email, zip, password, first_name, last_name) VALUES ('$email', '$zipcode', '$pwd', '$fname', '$lname')";
		if($r = mysql_query($registerQuery)){
			print_r($_SESSION);
			echo '<script type="text/javascript">
							function leave() {
								window.location = "dashboard.php";
							}
							setTimeout("leave()", 1000);
						</script>';
		}else{
			echo"dog";
		}
		
		
		
		
		if(isset($_POST['num-of-donations'])){				
				for ($x = 1; $x <= $_POST['num-of-jobs']; $x++) {
					$job_text = $_POST['job'. $x .'_text'];
					$job_start_date = $_POST['job'. $x .'_start_date'];
					$job_end_date = $_POST['job'. $x .'_end_date'];
					$jobQuery = "INSERT INTO JOBS (PATIENT_ID, JOB_DESCRIPTION, START_DATE, END_DATE) VALUES('$PATIENT_ID' , '$job_text', '$job_start_date', '$job_end_date')";
						
					if(mysql_query ($jobQuery)){
						echo"<br>query success jobQuery $x";
					} else {
						echo "<br>query failure $x";
					}
				} 
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
			.col-xs-2
		</div>
		
		<div class="col-xs-10">
			<div class="well">
				<div class="row"> <!-- this is a row template -->
					<div class="col-xs-2">.col-xs-2</div>
					<div class="col-xs-8"><h2><center>Record your donation</center></h2></div>
					<div class="col-xs-2">.col-xs-2</div>
				</div>
				<form action="register_reg.php" method="post">
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
					
					<center>
						<button type="submit" name="save" class="btn btn-primary">Save Donations</button>
					</center>
				</form>
			</div>
		</div>
		
		<div class="col-xs-1">
			.col-xs-2
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
</body>
</html>