

<?php
	// Initialize the session
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
		
	// Check if the user is already logged in, if yes then redirect him to login stat page
	if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
		header("location: loginstat.php");
		exit;
	}

	// connection
	include 'db_config.php'; 
	$connection = getDB();

	// Define variables and initialize with empty values
	$email = $password = $cpassword = $fname = $lname = "";
	$email_err = $password_err = $cpassword_err = $fname_err = $lname_err = "";
	$error = "";
	$userType = "";

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		// Check if email is empty
		if(empty(trim($_POST["email"]))){
			$email_err = "Please enter your email address.";
		} else{
			$email = strtolower(trim($_POST["email"]));
		}
		
		// Check if password is empty
		if(empty(trim($_POST["password"]))){
			$password_err = "Please enter your password.";
		} else{
			$password = trim($_POST["password"]);
		}

		// Check if password is empty
		if(empty(trim($_POST["cpassword"]))){
			$cpassword_err = "Please confirm password.";
		} else{
			$cpassword = trim($_POST["cpassword"]);
		}

		// Check if fname is empty
		if(empty(trim($_POST["fname"]))){
			$fname_err = "Please enter your first name.";
		} else{
			$fname = strtolower(trim($_POST["fname"]));
		}

		// Check if lname is empty
		if(empty(trim($_POST["lname"]))){
			$lname_err = "Please enter your last name.";
		} else{
			$lname = strtolower(trim($_POST["lname"]));
		}

		$userType = $_POST["userType"];

		// Validate credentials
		if(empty($email_err) && empty($password_err) && empty($cpassword_err) && empty($lname_err) && empty($fname_err)){
		if($password == $cpassword){
			$sql = "SELECT userEmail FROM users WHERE lower(userEmail) = '$email'";

			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$active = $row['userEmail'];
		
			$count = mysqli_num_rows($result);
		
			// If result matched $email, table row must be 1 row	
			if($count == 1) {
			$error = "email already exists.";
			} else{
			$hash_pass = password_hash($password, PASSWORD_DEFAULT);
			$qry = ("INSERT INTO users VALUES ('$email', '$hash_pass', '$fname', '$lname', 'Active');");
			$connection->Query($qry);

			header("location: login.php");
			}
		} else{
			$error = "Passwords did not match.";
		}
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
<h1 class="text-center" style="font-family:'Monotype Corsiva'; color:800080">User Registration</h1>
<form method="post">
	<div class="form-group">
	<label><b>First Name</b></label>
	<input type="text" name="fname" class="form-control" placeholder="Enter your First Name">
	<label><b>Last Name</b></label>
	<input type="text" name="lname" class="form-control" placeholder="Enter your Last Name">
	<label><b>Contact Number</b></label>
	<input type="text" name="phone" class="form-control" placeholder="Enter your Phone Number" required>
	<label><b>Email</b></label>
	<input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
	<label><b>Password</b></label>
	<input type="password" name="password" class="form-control" placeholder="Enter your Password" required>
	<label><b>Confirm Password</b></label>
	<input type="password" name="cpassword" class="form-control" placeholder="Enter confirm your Password" required>
	<input type="radio" id="customer" name ="userType" value="customer" checked>
	<label for="customer"><b>Customer</b></label><br>
	<input type="radio" id="manager" name="userType" value="manager">
	<label for="manager"><b>Manager</b></label>
	<br>
	<input type="submit" value="Submit" name="submit" class="btn btn-primary">
	<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
	</div>
</form>

</div>
</body>
</html>