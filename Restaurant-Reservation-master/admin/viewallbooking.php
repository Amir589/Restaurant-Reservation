<?php
session_start();
include "db_config.php";
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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
	
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">


</head>
<body>
<?php  include "nav_2.php"; ?>


<div class="container">
<h1 class="text-center" style="font-family:'Monotype Corsiva';color:#E6120E">View All Booking</h1>


<?php

$query="select * from booking";
$rs=my_select($query);
?>
<div class="table-responsive">
<table id="example" class="table table-hover">
<thead style="background-color:green">
<tr>
<th>ID</th>
<th>Type of Table</th>
<th>Purpose</th>
<th>Meal Plan</th>
<th>Arrival Time</th>
<th>Book Date</th>
<th>Status</th>

</tr>
</thead>

<tbody>
<?php
while($row=mysqli_fetch_array($rs))
{
?>
<tr class="table-success">
<td> <?php echo $row[0]; ?>  </td>
<td> <?php echo $row[1]; ?>  </td>
<td> <?php echo $row[2]; ?>  </td>
<td> <?php echo $row[3]; ?>  </td>
<td> <?php echo $row[4]; ?>  </td>
<td> <?php echo $row[5]; ?>  </td>
<td> <?php echo $row[6]; ?>  </td>


</tr>
<?php

}

?>


</tbody>
</div>


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
