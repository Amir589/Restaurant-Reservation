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

	// connection
	include 'db_config.php'; 
    $connection = getDB();
    
    if(isset($_SESSION['login_user'])){
        $email = $_SESSION['login_user'];
    }

    // pull users
    $query = "SELECT u.userEmail, u.userFName, u.userLName, u.userRole, u.flagActive
              FROM users u
              where userEmail LIKE '" . $email . "'
              ORDER BY u.userRole DESC, u.flagActive DESC, u.userLName asc, u.userFName asc";
    $result = mysqli_query($connection,$query);

    $count = mysqli_num_rows($result);

    // send to change password
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["changePass"])) {
            header("location: resetpass.php");
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
            <?php 
                echo "<table id='booking'>"; 
                echo "<tr>
                        <th>User Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Action</th>
                      </tr>" ;
                while($row = mysqli_fetch_array($result)){
                    echo "<form action='viewprofile.php' method='POST'> 
                          <tr>
                            <td>" . $row['userEmail'] . "</td>
                            <td>" . $row['userFName'] . "</td>
                            <td>" . $row['userLName'] . "</td>
                            <td> <input type='submit' name='changePass' value='Change Password'>
                                 <input type='hidden' name='userEmail' value=" . $row['userEmail'] . "> </td>
                          </tr>
                          </form>";  
                }
                echo "</table>";
            ?>
        </div>
	</body>
	<!-- // content -->

</html>