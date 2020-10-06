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
	$email = $password = "";
	$email_err = $password_err = "";
	$error = "";

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$error = "";

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
		
		// Validate credentials
		if(empty($username_err) && empty($password_err)){

			$sql = "SELECT userpass FROM users WHERE lower(useremail) = '$email';";
			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$sqlpass = $row['userpass'];

			// Verify password
			if(password_verify($password, $sqlpass)){
				$_SESSION["logged_in"] = true;
				$_SESSION["login_user"] = $email;

				header("location: loginstat.php");
			} else {
			$error = "Your Email or Password is invalid";
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
<h1 class="text-center" style="font-family:'Monotype Corsiva'; color:800080">User Login</h1>

<form action="login.php" method="POST">
	<div class="form-group">
	<label><b>Email Address</b></label>
	<input type="text" name="email" class="form-control" placeholder="Enter your Email Address" required>
		</div>
	<label><b>Password</b></label>
	<input type="password" name="password" class="form-control" placeholder="Enter your Password" required>
	<br>
	<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
	<!-- <input type="checkbox"> Remember me -->
	<br><br>
	<input type="submit" name="login" value="Login" class="btn btn-primary">
	<a href="registration.php" class="btn btn-secondary">Signup</a>
	</div>
</form>

</div>
</body>
</html>