<?php
    // Initialize the session
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] === false){
        header("location: login.php");
        exit;
    }

    include('session.php');
?>

<!DOCTYPE HTML>

<html>
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

  <div id="header"></div>

    <body>
      <h1>Hello! You're currently logged in as <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
    </body>

  <div id="footer"></div>

</html>