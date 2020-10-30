<?php
	// Initialize the session
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    // Check if the user is already logged in, if no then redirect them to login page
	if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === false){
		header("location: login.php");
		exit;
    }

	// connection
	include 'db_config.php'; 
	$connection = getDB();

	// Define variables and initialize with empty values
	$guest = $date = $time = "";
	$guest_err = $date_err = $time_err = "";
    $error = "";
    $email = $_SESSION['login_user'];

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		// Check if guest is empty
		if(empty(trim($_POST["guest"]))){
			$guest_err = "Please enter number of guests.";
		} else{
			$guest = strtolower(trim($_POST["guest"]));
		}
		
		// Check if date is empty OR date is invalid
		if(empty(trim($_POST["reservedate"]))){
			$date_err = "Please enter a date.";
		} else if (trim($_POST["reservedate"]) < date("Y-m-d")){
            $date_err = "Date entered is a past date. Please enter a future date.";
        } else{
			$date = trim($_POST["reservedate"]);
		}

		// Check if time is empty
		if(empty(trim($_POST["time"]))){
			$time_err = "Please a time.";
		} else{
			$time = trim($_POST["time"]);
        }
        
		// Validate credentials
		if(empty($guest_err) && empty($date_err) && empty($time_err)){
			$sql = "SELECT reserveid FROM reservation WHERE reservedate = '$date' and reservetime = '$time'";

			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
            $count = mysqli_num_rows($result);
            echo $count;
		
			// If result matched $email, table row must be 1 row	
			if($count == 1) {
			    $error = "The date and time has already been reserved.";
			} else{
			    $qry = ("INSERT INTO reservation (reserveGuest, reserveDate, reserveTime, userEmail) VALUES($guest, '$date', '$time', '$email');");
                $connection->Query($qry);
                  
			    //header("location: index.php");
			}
		} else {
            $error = "ERROR: " . $guest_err . $date_err . $time_err;
        }
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
<body style = "background-color: 808080">
<?php include "nav_1.php"; ?>

<div class="container" style="margin-top:100px">
<h1 class="text-center" style="font-family:'Monotype Corsiva'; color:18507F">Reservation</h1>

<form action="reserve.php" method="POST">
	<div class="form-group">
        <label><b>Select Number of Guests</b></label>
        <select name="guest" id="guest" class="form-control">
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
            <option value=6>6</option>
        </select>
        <label><b>Select a Date</b></label>
        <input type="date" name="reservedate" id="reservedate" class="form-control" required>
        <label><b>Select a Time</b></label>
        <select name="time" id="time" class="form-control">
            <option value=1100>11:00AM</option>
            <option value=1130>11:30AM</option>
            <option value=1200>12:00PM</option>
            <option value=1230>12:30PM</option>
            <option value=1300>1:00PM</option>
            <option value=1330>1:30PM</option>
            <option value=1400>2:00PM</option>
            <option value=1430>2:30PM</option>
            <option value=1500>3:00PM</option>
            <option value=1530>3:30PM</option>
            <option value=1600>4:00PM</option>
            <option value=1630>4:30PM</option>
            <option value=1700>5:00PM</option>
            <option value=1730>5:30PM</option>
            <option value=1800>6:00PM</option>
            <option value=1830>6:30PM</option>
            <option value=1900>7:00PM</option>
            <option value=1930>7:30PM</option>
            <option value=2000>8:00PM</option>
            <option value=2030>8:30PM</option>
            <option value=2100>9:00PM</option>
            <option value=2130>9:30PM</option>
            <option value=2200>10:00PM</option>
        </select>
	</div>
	<br>
	<div style = "font-size:20px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
	<br><br>
	<input type="submit" name="reserve" value="Reserve" class="btn btn-primary">
	</div>
</form> 
</div>
</body>
</html>