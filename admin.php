<?php
if (isset($_POST["send"]))
	$message = "Email " .$_POST["message"]. " sent";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>

	<nav class="navbar navbar-inverse ">
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
					<h1>Compose Email:</h1>
					 <form action="admin.php" method="post">
					 <div class="form-group">
					 <label for="sel1">Select User Donation Level(s):</label>
						 <select multiple class="form-control" name="sel1">
							<option name="opt1">1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
						</br></br>
						<textarea class="form-control" rows="5" name="message"></textarea>
					</div>
						<button type="submit" name="send" class="btn btn-default">Submit</button>
					</form>
					<?php echo $message; ?>
				</div>
			</div>
			<div class="col-xs-1">
							
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

