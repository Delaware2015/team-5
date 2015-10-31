<?php
	session_start();
	$email = $_SESSION['email'];
	$user_id = $_SESSION['user_id'];
	
	include 'connect.php';
	
	/*
	if($_POST["submit"])
	{
		$search = $_POST['search'];
	}
	*/
?>

<html lang="en">
<head>
  <title>Admin Delete User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">

<style type="text/css"></style>
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




<script>
	function dell()
	{
			var x = false;
			
			x = confirm("Are you sure you want to delete");
			if(x == true)
				return true;
			else
				return false;
	}
</script>


					<h1>Delete Users:</h1>
						 <div class="form-group">
							<h6>Delete Button Is Final</h4>
							 
							<br>
							
						<div>
							<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
								Search for email: <input type="text" name="search" value="<?php echo $search ?>" class="formInputField formInputFieldLong">
								<input type="submit" class="formInputFieldShort" style="font-size:1em; color:#708090">
							</form>	
						</div>
						
						
						<!--Search Result -->
						<?php
							
							$search = $_POST['search'];
							if($_POST["submit"])
							{
								
								
								//$result = mysql_query("SELECT * FROM Users WHERE email = '$search'");
								
								echo $search;
								
								// sql to delete a record
								$sqlDelete = "DELETE FROM Users WHERE email=$search";
								if (mysql_query($sqlDelete) === TRUE) {
									echo "Record deleted successfully";
								} else {
									echo "Error";
								}
								
							}
							
							
							
						?>
						
						<br>
						<br>
						<br>
						<br>
						
						
						<div style="height:0.5em; background-color: black"></div>

						<br>

						<?php
							$sqlSelectAll = "SELECT * FROM Users";
							if($r = mysql_query($sqlSelectAll))
							{
								echo '<p style="font-size: 2em">Database</p>';
								echo '<br>';
								echo '<table style="padding-left:15% ; padding-right:15%;width:100%">';
									echo "<tr>";
										echo "<th>ID</th>";
										echo "<th>Email Address</th>";
									echo "</tr>";
									while($row = mysql_fetch_assoc($r)) 
									{
										echo "<tr><td>";
											echo $row["user_id"];
										echo "</td><td>";
											echo $row["email"];
										echo "</td></tr>"; 
									}
								echo "</table>";      
							}
							else
							{
								echo "hammer time";
							}
						?>


							
						</div>
						<!--<button type="submit" class="btn btn-default" value = "Delete" onclick="return confirm('Are you sure you want to Dlete this User?')">Delete</button> -->
				</div>
			</div>
			<div class="col-xs-1">
				.col-xs-1			
			</div>
			
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<?php
		if($_POST["Delete"])
		{
			$
		}
	?>

</body>
</html>
