<?php
	// Initialize the session
	if(!isset($_SESSION)) 
    { 
        session_start(); 
	} 
	
	// Check if the user is already logged in, if yes then redirect him to login stat page
	if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
		if(isset($_SESSION["login_role"]) && $_SESSION["login_role"] !== "manager"){
			header("location: loginstat.php");
			exit;
		}
	}

	// connection
	include 'db_config.php'; 
	$connection = getDB();

	// Define variables and initialize with empty values
	$email = $password = $cpassword = $fname = $lname = $type = "";
	$email_err = $password_err = $cpassword_err = $fname_err = $lname_err = $type_err = "";
	$error = "";

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

		// Check if type is empty
		if(isset($_POST["type"])){
			if(empty(trim($_POST["type"]))){
				$type_err = "Please enter a user type.";
			} else{
				$type = strtolower(trim($_POST["type"]));
			}
		} else{
			$type = "customer";
		}

		// Validate credentials
		if(empty($email_err) && empty($password_err) && empty($cpassword_err) && empty($lname_err) && empty($fname_err) && empty($type_err)){
		if($password == $cpassword){
			$sql = "SELECT userEmail FROM users WHERE lower(userEmail) = '$email'";

			$result = mysqli_query($connection, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
			$count = mysqli_num_rows($result);
		
			// If result matched $email, table row must be 1 row	
			if($count == 1) {
				$error = "email already exists.";
			} else{
				$hash_pass = password_hash($password, PASSWORD_DEFAULT);
				$qry = ("INSERT INTO users VALUES ('$email', '$hash_pass', '$fname', '$lname', '$type', true);");
				$connection->Query($qry);
			
				if(isset($_SESSION["login_role"]) && $_SESSION["login_role"] == "manager"){
					header("location: viewuser.php");
				} else {
					header("location: login.php");
				}
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
        <title>Reservation</title>
    </head>
    <!-- content -->
    <body>
      <center>
		<form method="post">
			<div class="center backg">
				<div>
					<div>
						<label><b>First Name</b></label>
						<input type="text" name="fname" placeholder="Enter your First Name">
					</div>
					<div>
						<label><b>Last Name</b></label>
						<input type="text" name="lname" placeholder="Enter your Last Name">
					</div>
					<div>
						<label><b>Contact Number</b></label>
						<input type="text" name="phone" placeholder="Enter your Phone Number" required>
					</div>
					<div>
						<label><b>Email</b></label>
						<input type="email" name="email" placeholder="Enter your Email" required>
					</div>
					<div>
						<label><b>Password</b></label>
						<input type="password" name="password" placeholder="Enter your Password" required>
					</div>
					<div>
						<label><b>Confirm Password</b></label>
						<input type="password" name="cpassword" placeholder="Enter confirm your Password" required>
					</div>
					<?php 
						if(isset($_SESSION["login_role"]) && $_SESSION["login_role"] == "manager"){
						echo "<div>
								<input type='radio' id='customer' name ='type' value='customer' checked>
								<label for='customer'><b>Customer</b></label><br>
								<input type='radio' id='manager' name='type' value='manager'>
								<label for='manager'><b>Manager</b></label>
							</div>";
						}
					?>
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