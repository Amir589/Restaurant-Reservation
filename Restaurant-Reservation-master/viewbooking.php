<?php
session_start();
$user=$_SESSION['sun'];
include "db_config.php";
if(verifyuser())
{
	$u=$_SESSION['sun'];
	$query="select * from users where contact='$u'";
	$rs=my_select($query);
	while($row=mysqli_fetch_array($rs))
	{
		$username=$row[1] . " ". $row[2];
		
	}
	echo "<br><br><br><br>Welcome: <b style='color:green;text-transform:Capitalize'>$username</b>";

}
else
{
	header("location:index.php");
}
?>
  <?php include "header.php"; ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body style = "background-color: 808080">
<?php  include "nav_2.php"; ?>


<div class="container">
<h1 class="text-center" style="font-family:'Monotype Corsiva';color:#E6120E">View My Booking</h1>

<div class="table-responsive">
<table id="example" class="table table-hover">
<thead style="background-color:purple">
<tr>
<th>ID</th>
<th>Type of Table</th>
<th>Purpose</th>
<th>Meal Plan</th>
<th>Arrival Time</th>
<th>Book Date</th>
<th>Status</th>
<th>Confirm Booking</th>


</tr>
</thead>
</div>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>
</body>
</html>