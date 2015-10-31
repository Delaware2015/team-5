<?php
	//include the database connect file
	include 'connect.php';
?>

<?php
	//this will be the code to insert intot the database 
?>

<html>
<head>
  <title>Register</title>
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
					<div class="col-xs-8"><h2><center>Register</center></h2></div>
					<div class="col-xs-2">.col-xs-2</div>
				</div>
				<form role="form" action="register_reg.php">
					<div class="form-group">
						<label for="fname">First Name:</label>
						<input type="text" class="form-control" id="fname" name="fname">
					</div>
					<div class="form-group">
						<label for="lname">Last Name:</label>
						<input type="text" class="form-control" id="lname" name="lname">
					</div>
					<div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd" name="pwd">
					</div>
					<div class="form-group">
						<label for="pwd-confirm">Password Confirm:</label>
						<input type="password" class="form-control" id="pwd-confirm" name="pwd-confirm">
					</div>
					<div class="form-group">
						<label for="zipcode">Zip Code</label>
						<input type="text" class="form-control" id="zipcode" name="zipcode">
					</div>
					<center>
						<button type="submit" name="register" class="btn btn-primary">Register</button>
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