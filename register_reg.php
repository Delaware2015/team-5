<?php	//register_reg.php
	//include the database connect file
	include 'connect.php';
?>

<?php
	//this will be the code to insert into the database 
	
	
	if (isset($_POST["register"])){
	
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
	
	}
	
	
	
	
?>

<html>
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  
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



<div class="container">

	<div class="row">

		<div class="col-xs-1">
			
		</div>
		
		<div class="col-xs-10">
			<div class="well">
				<div class="row"> <!-- this is a row template -->
					<div class="col-xs-2"></div>
					<div class="col-xs-8"><h2><center>Register</center></h2></div>
					<div class="col-xs-2"></div>
				</div>
				<form action="register_reg.php" method="post">
					<div class="form-group">
						<label for="fname">First Name:</label>
						<input type="text" class="form-control" id="fname" name="fname" required>
					</div>
					<div class="form-group">
						<label for="lname">Last Name:</label>
						<input type="text" class="form-control" id="lname" name="lname" required
					</div>
					<div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd" name="pwd" required>
					</div>
					<div class="form-group">
						<label for="pwd_confirm">Password Confirm:</label>
						<input type="password" class="form-control" id="pwd_confirm" name="pwd_confirm" required>
					</div>
					<div class="form-group">
						<label for="zipcode">Zip Code</label>
						<input type="text" class="form-control" id="zipcode" name="zipcode" required>
					</div>
					<center>
						<button type="submit" name="register" class="btn btn-primary">Register</button>
					</center>
				</form>
			</div>
		</div>
		
		<div class="col-xs-1">
			
		</div>
		
	</div>



</div>


<div class="row"> <!-- this is a row template -->
  <div class="col-xs-2"></div>
  <div class="col-xs-8"></div>
  <div class="col-xs-2"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
