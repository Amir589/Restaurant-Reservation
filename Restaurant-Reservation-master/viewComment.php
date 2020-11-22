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

    if(isset($_SESSION["login_role"]) && $_SESSION["login_role"] == "customer"){
        header("location: login.php");
        exit;
    }

	// connection
	include 'db_config.php'; 
	$connection = getDB();

    // pull users
    $query = "SELECT u.contactName, u.contactEmail, u.contactPhone, u.contactComment
              FROM ContactUs u";
    $result = mysqli_query($connection,$query);

    $count = mysqli_num_rows($result);
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
            <?php 
                echo "<table id='booking'>"; 
                echo "<tr>
                        <th>Contact Name</th>
                        <th>Contact Email</th>
                        <th>Contact Phone</th>
                        <th>Comment</th>
                      </tr>" ;
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>
                            <td>" . $row['contactName'] . "</td>
                            <td>" . $row['contactEmail'] . "</td>
                            <td>" . $row['contactPhone'] . "</td>
                            <td>" . $row['contactComment'] . "</td>
                          </tr>";  
                }
                echo "</table>";
            ?>
        </div>
	</body>
	<!-- // content -->

</html>