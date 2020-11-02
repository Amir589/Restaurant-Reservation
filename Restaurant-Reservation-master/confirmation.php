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
        <h1>Thank you! Your reservation is set for <?php echo date("m-d-yy",strtotime($_SESSION["login_date"])); ?> at <?php echo date( 'g:i A', strtotime($_SESSION["login_time"])); ?> for <?php echo $_SESSION["login_guest"]; ?> guests.</h1> 
      </center>
    </body>
	  <!-- // content -->

</html>