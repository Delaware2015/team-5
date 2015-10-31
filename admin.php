<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<h1>Compose Email:</h1>
 <form role="form">
 <div class="form-group">
 <label for="sel1">Select User Donation Level(s):</label>
   <select multiple class="form-control" id="sel1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
  </br></br>
  <textarea class="form-control" rows="5" id="message"></textarea>
</div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</body>
</html>
