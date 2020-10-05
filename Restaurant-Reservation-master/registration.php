

<?php
session_start();
include "db_config.php";

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
</head>

<body style = "background-color: 808080">
<?php include "nav_1.php"; ?>

<div class="container" style="margin-top:100px">
<h1 class="text-center" style="font-family:'Monotype Corsiva'; color:800080">User Registration</h1>
<form method="post">
<div class="form-group">
<label><b>ID</b></label>
<input type="text" name="id" class="form-control" required placeholder="Enter your ID Number">
<label><b>First Name</b></label>
<input type="text" name="fname" class="form-control" required placeholder="Enter your First Name">
<label><b>Last Name</b></label>
<input type="text" name="lname" required class="form-control" placeholder="Enter your Last Name">
<label><b>Contact Number</b></label>
<input type="text" name="contact" required class="form-control" placeholder="Enter your contact Number">
<label><b>Password</b></label>
<input type="password" required name="password" class="form-control" placeholder="Enter your Password">
<label><b>Email ID</b></label>
<input type="email" required name="email" class="form-control" placeholder="Enter your Email Id">

<br>

<input type="submit" value="Submit" name="submit" class="btn btn-primary">
</div>
</form>

</div>
</body>
</html>

<?php
include "db_config.php";
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$contact=$_POST['contact'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$status="Pending";
	
	$query="insert into users values('$id','$fname','$lname','$contact','$password','$email','$status')";
	$n=my_iud($query);
	if($n==1)
	{
		echo '<script>alert("Signup Successfull..");
		window.location="login.php";</script>';
	}
	else
	{
		echo '<script>alert("Something Went Wrong.. Try Again");</script>';
	}
}

?>