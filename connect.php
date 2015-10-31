
	
	
	<?php
	
	if ($connection = @mysql_connect ('localhost', 'seand',  'abc123')){
		print '<p>Successfully connected to MySQL.</p>';
		mysql_close(); // close the connection
	}
	else {
		die('<p>Could not connect to MySQL because: <b>' .mysql_error() .
		'</b></p>');
	}
	if (@mysql_select_db("goodwill", $connection)){
		print '<p>The goodwill database has been selected.</p>';
	}
	else {
		die('<p>Cound not select the NameOfYourDatabase database because: <b>' .mysql_error().'</b></p>');
	}
	
	?>
