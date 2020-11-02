<?php
    // Initialize the session
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    // Check if the user is already logged in, if no then redirect them to login page
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] === false){
        header("location: login.php");
        exit;
    }

    $email = "";
    $error = "";

    if(isset($_SESSION["login_role"]) && $_SESSION["login_role"] == "manager"){
        $email = "%";
    } else if(isset($_SESSION['login_user'])){
        $email = $_SESSION['login_user'];
    }

	// connection
	include 'db_config.php'; 
	$connection = getDB();

    // pull reservations
    $query = "SELECT u.userEmail, u.userFName, u.userLName, r.reserveDate, r.reserveTime, r.reserveGuest, r.reserveid
              FROM reservation r 
                JOIN users u ON r.userEmail = u.userEmail 
              WHERE r.flagCancelled = false
                and r.userEmail LIKE '" . $email . "'
              ORDER BY reserveDate DESC, reserveTime DESC";
    $result = mysqli_query($connection,$query);

    $count = mysqli_num_rows($result);

    $email = $password = $cpassword = $fname = $lname = $type = "";
	$email_err = $password_err = $cpassword_err = $fname_err = $lname_err = $type_err = "";
	$error = "";

    // update reservation to cancel
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $update = "UPDATE reservation SET flagCancelled = true WHERE reserveid = '" . $_POST["reserveid"] . "'";

        if (mysqli_query($connection,$update)) {
            header("Refresh:0");
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
        <div class="center backg">
            <form action="view.php" method="POST" onsubmit="return confirm('Are you sure you want to cancel your reservation? Click OK to proceed');"> 
            <?php 
                echo "<table id='booking'>"; 
                echo "<tr>
                        <th>Reservation Date</th>
                        <th>Reservation Time</th>
                        <th>Reservation Name</th>
                        <th>Number of Guests</th>
                        <th>Action</th>
                      </tr>" ;
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>
                            <td>" . $row['reserveDate'] . "</td>
                            <td>" . $row['reserveTime'] . "</td>
                            <td>" . $row['userFName'] . " " . $row['userLName'] . "</td>
                            <td>" . $row['reserveGuest'] . "</td>
                            <td> <input type='submit' name='Cancel' value='Cancel'><input type='hidden' name='reserveid' value=" . $row['reserveid'] . "> </td>
                          </tr>";  
                }
                echo "</table>";
            ?>
            </form>
        </div>
	</body>
	<!-- // content -->

</html>