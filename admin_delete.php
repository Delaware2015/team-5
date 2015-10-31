<html lang="en">
<head>
  <title>Admin Delete User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">

<style type="text/css"></style>
</head>
<body>
	
	<?php
		//require_once("connect.php");
		include 'connect.php';
		
		$sqlSelectAll = "SELECT * FROM Users";
        //$result = mysql_query($sqlSelectAll);
		//if ($result->num_rows > 0) 
        //{
			
		
        
	?>
    <br/>
    <br/>
    <br/>

   	
	

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







					<h1>Delete Users:</h1>
					 <form role="form">
					 <div class="form-group">
					 <label for="sel1">Delete Button Is Final</label>
						 
						<br><br>

					<?php
						if($r = mysql_query($sqlSelectAll))
						{
				        	echo "hello";
							echo '<table style="padding-left:15% ; padding-right:15%;width:100%">';
				                echo "<tr>";
				   					echo "<th>User ID</th>";
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
						<button type="submit" class="btn btn-default">Delete</button>
					</form>
				</div>
			</div>
			<div class="col-xs-1">
				.col-xs-1			
			</div>
			
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>


</body>
</html>
