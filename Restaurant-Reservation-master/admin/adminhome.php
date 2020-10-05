<?php
session_start();
include "db_config.php";
if(verifyuser())
{
	$u=$_SESSION['sun'];
	echo "<br><br><br><br>Welcome <b style='color:green;text-transform:Capitalize'>$u</b>";

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


<div class="container" style = "margin-top : 250px">
<div class=row>
<div class="col-sm-4" style = "background-color : 808080 ; height : 100px ; font-size : 20pt ; font-family : cursive; text-align : center">
<p style = "color : cyan">Total Booking Request</p>
<p style = "color : green"><?php echo totalbookingrequest()?></p>

</div>

<div class="col-sm-4" style = "background-color : 808080 ; height : 100px ; font-size : 20pt ; font-family : cursive ; text-align : center">
<p style = "color : cyan">Total New User Request</p>
<p style = "color : green"><?php echo totaluserrequest()?></p>

</div>

<div class="col-sm-4" style = "background-color : 808080 ; height : 100px ; font-size : 20pt ; font-family : cursive ; text-align : center">
<p style = "color : cyan">Total No. of Users</p>
<p style = "color : green" >
<?php echo totalusers()?>
</p>

</div>

</div>
</div>

</body>
</html>
