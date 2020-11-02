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

			$sql = "SELECT userpass, userFName, userRole FROM users WHERE lower(useremail) = '$email';";
			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$count = mysqli_num_rows($result);
			if($count == 1) {
				$sqlpass = $row['userpass'];
				$sqlfname = $row['userFName'];
				$sqlrole = $row['userRole'];
				
				// Verify password
				if(password_verify($password, $sqlpass)){
					$_SESSION["logged_in"] = true;
					$_SESSION["login_user"] = $email;
					$_SESSION["login_fname"] = $sqlfname;
					$_SESSION["login_role"] = $sqlrole;

					header("location: loginstat.php");
					exit;
				} else {
					$error = "Your Email or Password is invalid";
				}
			} else {
				$error = "Your Email or Password is invalid";
			}
		}
	}
?>
<!DOCTYPE HTML>
<html>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script> 
        $(function(){
            $("#header").load("header.php"); 
            $("#footer").load("footer.html"); 
        });
    </script>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <div id="header"></div>
    <div id="footer"></div>

    <head>
        <title>Reservation</title>
    </head>
    <!-- content -->
    <body>
      <center>
        <div class="center backg">
          <div>
          	<h2 class="h2">User Login</h2>
			<form action="login.php" method="POST">
				<div>
					<label><b>Email Address</b></label>
					<input type="text" name="email" placeholder="Enter your Email Address" required>
				</div>
				<div>
					<label><b>Password</b></label>
					<input type="password" name="password" placeholder="Enter your Password" required>
				</div>
				<br>
				<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
				<div>
				<!-- <input type="checkbox"> Remember me -->
					<input type="submit" name="login" value="Login">
				</div>
				<div>
					<label>No Account? Click <a href="registration.php">here</a> to register.</label>
				</div>
			</form>
          </div>
        </div>
      </center>
    </body>
	  <!-- // content -->

</html>