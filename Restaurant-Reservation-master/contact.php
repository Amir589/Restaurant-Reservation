<?php 
    include "db_config.php";

    //creating connection to database
    $conn=getDB();

    $Name = $Email = $Phone = $comments = "";

    //check whether submit button is pressed or not
    if((isset($_POST['submit'])))
    {
        //fetching and storing the form data in variables
        $Name = $conn->real_escape_string($_POST['name']);
        $Email = $conn->real_escape_string($_POST['email']);
        $Phone = $conn->real_escape_string($_POST['contact']);
        $comments = $conn->real_escape_string($_POST['text']);
        //query to insert the variable data into the database
        $sql="INSERT INTO contactus (contactName, contactEmail, contactPhone, contactComment) VALUES ('".$Name."','".$Email."', '".$Phone."', '".$comments."')";

        //Execute the query and returning a message
        if(!$result = $conn->query($sql)){
        die('Error occured [' . $conn->error . ']');
    }
    else
        header("location: contactThank.php");
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
                <h4>Contact us today! We will respond within 24 hours.</h4>
            <form class="form" action="contact.php" method="POST">

                <p class="username">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" required>
                
                </p>

                <p class="useremail">
                <label for="email">Email</label>
                <input type="text" name= "email" id= "email" placeholder="mail@example.com" required>
                
                </p>

                <p class="usercontact">
                <label for="contact">Phone number</label>
                <input type="text" name="contact" id="contact" placeholder="contact no." required>
                
                </p>    

                <p class="usertext">
                <label for="text">Comments</label>
                <textarea name="text" placeholder="Write something to us" required></textarea>             
                </p>

                <p class="usersubmit">
                <input type="submit" name="submit" value="Send">
                </p>
            </form>

        </center>
    </body>
	<!-- // content -->
    </html>  