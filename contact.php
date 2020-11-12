<?php 
require 'db_config.php';

  //creating connection to database
$con=mysqli_connect('localhost','root','','reservation') or die(mysqli_error());
  
//check whether submit button is pressed or not
if((isset($_POST['submit'])))
{
  //fetching and storing the form data in variables
$Name = $con->real_escape_string($_POST['name']);
$Email = $con->real_escape_string($_POST['email']);
$Phone = $con->real_escape_string($_POST['contact']);
$comments = $con->real_escape_string($_POST['text']);
  //query to insert the variable data into the database
$sql="INSERT INTO contactus (name, email, phone, comments) VALUES ('".$Name."','".$Email."', '".$Phone."', '".$comments."')";
  //Execute the query and returning a message
if(!$result = $con->query($sql)){
die('Error occured [' . $conn->error . ']');
}
else
   echo "Thank you! We will get in touch with you soon";
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
            <div class="center backg">
                <div>
                <h2>Contact Us</h2>
  
  <form class="form" action="contact.php" method="POST">
    
    <p class="username">
      <input type="text" name="name" id="name" placeholder="Enter your name" >
      <label for="name">Name</label>
    </p>
    
    <p class="useremail">
      <input type="text" name="email" id="email" placeholder="mail@example.com" >
      <label for="email">Email</label>
    </p>
    
    <p class="usercontact">
      <input type="text" name="contact" id="contact" placeholder="contact no." >
      <label for="contact">Phone number</label>
    </p>    
  
    <p class="usertext">
      <textarea name="text" placeholder="Write something to us" ></textarea>
                        <label for="text">Comments</label>
    </p>
    
    <p class="usersubmit">
      <input type="submit" name="submit" value="Send" >
    </p>
  </form>
                    
        </center>
    </body>
	<!-- // content -->
    </html> 