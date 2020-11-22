<?php
	// Initialize the session
	if(!isset($_SESSION)) 
    { 
        session_start(); 
	} 
	
	// Check if the user is already logged in, if yes then redirect them to login stat page
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] === false){
        //header("location: login.php");
        //exit;
    }

	// connection
	include 'db_config.php'; 
	$connection = getDB();

	// Define variables and initialize with empty values
	$email = $password = $cpassword = "";
	$email_err = $password_err = $cpassword_err = "";
    $error = "";
    
    if(isset($_SESSION['login_user'])){
        $email = $_SESSION['login_user'];
    } else {
        $error = "Error";
    }

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
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

		// Validate credentials
		if(empty($email_err) && empty($password_err) && empty($cpassword_err)){
		if($password == $cpassword){
			$sql = "SELECT userEmail FROM users WHERE lower(userEmail) = '$email';";

			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
			$count = mysqli_num_rows($result);
		
			// If result matched $email, table row must be 1 row	
			if($count == 1) {
				$hash_pass = password_hash($password, PASSWORD_DEFAULT);
				$qry = ("UPDATE users SET userPass = '$hash_pass' WHERE userEmail = '$email';");
				$connection->Query($qry);
			
				header("location: viewprofile.php");
			} else{
				$error = "record did not match.";
			}
		} else{
			$error = "Passwords did not match.";
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
        <title>Restaurant Reservation</title>
    </head>
    <!-- content -->
    <body>
      <center>
		<form method="post">
			<div class="center backg">
				<div>
					<div>
						<label><b>Password</b></label>
						<input type="password" name="password" placeholder="Enter your Mew Password" required>
					</div>
					<div>
						<label><b>Confirm Password</b></label>
						<input type="password" name="cpassword" placeholder="Enter confirm your New Password" required>
					</div>
					<br>
					<input type="submit" value="Submit" name="submit">
					<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
				</div>
			</div>
		</form>
      </center>
    </body>
	  <!-- // content -->

</html>