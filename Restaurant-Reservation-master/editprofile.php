<?php
session_start();
	echo "<br><br><br><br>Welcome <b style='color:green;text-transform:Capitalize'>$username</b>";

	header("location:index.php");

?>
<html lang="en">
<head>
  <?php include "header.php"; ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  td{color : brown ; font-weight : bold}
  </style>
</head>
<body>
<?php  include "nav_2.php";

 ?>
<div class = container style = "margin-top : 100px">
<div class = row>
<div class=col-sm-3>

</div>
<div class=col-sm-6>
 <table class="table table-hover table-borderless">
 <form method = post>
 <tr><th>ID</th><td><input type = text name = id value="<?php echo $row[0] ?>" ></td></tr>
 <tr><th>FirstName</th><td><input type = text name = firstname value="<?php echo $row[1] ?>" ></td></tr>
 <tr><th>LastName</th><td><input type = text name = lastname value="<?php echo $row[2] ?>" ></td></tr>
 <tr><th>Email ID</th><td><input type = email name = emailid value="<?php echo $row[5] ?>" ></td></tr>

 
 </table>

<input type = submit value = "Edit Profile" class = "btn btn-primary" name=edit>
</form>
 </div>
 <div class=col-sm-3>

</div>
</div>

</div>

</body>
</html>


