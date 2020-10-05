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
<?php include "nav_2.php"; ?>
<div class="container" style="margin-top:100px">
<h1 class="text-center" style="font-family:'Monotype Corsiva'; color:#FF69B4;">Book A Table</h1>
<form method="post">
<div class="form-group">
<label><b>Type of Table</b></label>
<select class="form-control" name="tabletype" required>
<option selected>-----Select Number Of Person-----</option>
<option value="table for 2">Table For 2 Person</option>
<option value="table for 3">Table For 3 Person</option>
<option value="table for 4">Table For 4 Person</option>
<option value="table for 5">Table For 5 Person</option>
<option value="table for 6">Table For 6 Person</option>
<option value="table for 7">Table For 7 Person</option>

</select>

<label><b>Purpose</b></label>
<select class="form-control" name="purpose" required>
<option selected>-----Select Purpose-----</option>
<option value="Meeting">Meeting</option>
<option value="Casual">Casual</option>
<option value="Celebration">Celebration</option>

</select>

<label><b>Meal Plan</b></label>
<select class="form-control" name="mealplan" required>
<option selected>-----Select Meal Plan-----</option>
<option value="Breakfast">Breakfast</option>
<option value="Lunch">Lunch</option>
<option value="Dinner">Dinner</option>

</select>

<label><b>Time</b></label>
<input type="time" name="arrivaltime" required class="form-control">
<label><b>Date</b></label>
<input type="date" name="dateofbook" required class="form-control">

<br>
<input type="submit" class="form-control btn btn-primary" value="Submit" name="submit" >
</div>
</form>

</div>
</body>
</html>
