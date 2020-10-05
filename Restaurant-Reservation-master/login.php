<?php
session_start();
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
<h1 class="text-center" style="font-family:'Monotype Corsiva'; color:800080">User Login</h1>
<form method="post">
<div class="form-group">
<label><b>Contact Number</b></label>
<input type="text" class="form-control" id="validationDefault01" placeholder="Enter your contact Number">
    </div>
<label><b>Password</b></label>
<input type="text" class="form-control" id="validationDefault01" placeholder="Enter your Password">
<br>
<input type="checkbox"> Remember me
<br><br>
<input type="submit" name="login" value="Login" class="btn btn-primary">
<a href="registration.php" class="btn btn-secondary">Signup</a>
</div>
</form>

</div>
</body>
</html>

<?php 
include "db_config.php";

if(isset($_POST['login'])){

  $contact=$_POST['contactnumber'];
	$password=$_POST['password'];

}
	
	if(isset($_POST['rem']))
	{
		$remember="yes";
	}
	else
	{
		$remember="no";
	}
$query=" select count(*) from users where contactnumber='$contactnumber' and password='$password' and status='accept' ";

$ans=my_login($query);
if($ans==1)
{
	$_SESSION['sun']=$contactnumber;
	$_SESSION['spwd']=$password;
  
	if(remember=='yes')
	{
		setcookie('ccontact',$contact,time()+60*60*24*7);
		setcookie('cpassword',$password,time()+60*60*24*7);

	}
		header("location:userhome.php");
}
else
{
	echo '<script>alert("Invalid Login Credentials");</script>';
}
?>