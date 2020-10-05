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
<body>
<?php include "nav_1.php"; ?>

</div>
<div class="container" style="margin-top:100px">
<h1 class="text-center" style="font-family:'Monotype Corsiva'; color:#800080;">Admin Login</h1>
<form method="post">
<div class="form-group">
<label><b>Admin Name</b></label>
<input type="text" name="adminname" required class="form-control" placeholder="Enter Your Name">
<label><b>Password</b></label>
<input type="password" name="password" required class="form-control" placeholder="Enter Your Password">
<br>

<input type="checkbox" name="rem">Remember Me
<br><br>
<input type="submit" name="login" value="Login" class="btn btn-primary">
</div>
</form>

</div>
</body>
</html>

<?php 
include "db_config.php";
if(isset($_POST['login']))
{
	$adminname=$_POST['adminname'];
	$password=$_POST['password'];
	
	if(isset($_POST['rem']))
	{
		$remember="yes";
	}
	else
	{
		$remember="no";
	}
$query="select count(*) from admin where adminname='$adminname' and password='$password'";

$ans=my_login($query);
if($ans==1)
{
	$_SESSION['sun']=$adminname;
	$_SESSION['spass']=$password;
  
	if($remember=='yes')
	{
		setcookie('cadminname',$adminname,time()+60*60*24*7);
		setcookie('cpassword',$password,time()+60*60*24*7);

	}
		header("location:adminhome.php");
}
else
{
	echo '<script>alert("Invalid Login Credentials");</script>';
}
}

?>