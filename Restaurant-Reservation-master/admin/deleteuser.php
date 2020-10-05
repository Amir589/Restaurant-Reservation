<?php
session_start();
include "db_config.php";
$email=$_GET['id'];
if(verifyuser())
{
	$u=$_SESSION['sun'];
	echo "<br><br><br><br>Welcome: <b style='color:green;text-transform:Capitalize'>$u</b>";

}
else
{
	header("location:index.php");
}
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
<?php  include "nav_2.php"; ?>

<div class="container" style="margin-top:100px;">
<form  method="post">
<div class="form-group">
<label><b>Email Id</b></label>
<input type="text" class="form-control" name="contact" value="<?php echo $email?>" readonly >
<br>

<br>
<input type="submit" value="Delete User" name="submit" class="btn btn-danger">

</div>


</form>
</div>
<?php 
if(isset($_POST['submit']))
{


$query="delete from users where emailid='$email'";
my_iud($query);
header("location:viewusers.php");
}

?>

</body>
</html>
