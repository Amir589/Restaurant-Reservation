<?php
    // Initialize the session
	if(!isset($_SESSION)) 
	{ 
	   session_start(); 
	} 
?>
<div class="header">
	<head>
		<title>Restaurant Reservation</title>
	</head>

	<a href="reserve.php" class="logo">Reserve</a> 
	
	<?php if(isset($_SESSION["login_fname"]) && $_SESSION["logged_in"] === true){?>
		<span class="header-middle">Hello, <?php echo ucfirst(strtolower($_SESSION["login_fname"])); ?>!</span>
	<?php } ?>


	<div class="header-right"> 
		<a href="index.php">Home</a>
		<a href="about.php">About</a>
		<a href="contact.php">Contact</a>
		<?php if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
			echo "<a href='reserve.php'>New Reservation</a>
				  <a href='view.php'>View Reservations</a>";
		}?>
		<?php if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true && $_SESSION["login_role"] == "manager"){
			echo "<a href='registration.php'>Register New User</a>";
		}?>
		<?php if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
			echo "<a href='logout.php'>Logout</a>";
		} else{
			echo "<a href='login.php'>Login</a>";
		}?>
	</div>
</div>