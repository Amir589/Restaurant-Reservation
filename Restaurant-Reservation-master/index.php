<!DOCTYPE HTML>
<html>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
	</script>
    <script> 
        $(function(){
            $("#header").load("header.php"); 
            $("#footer").load("footer.html"); 
        });
    </script>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <div id="header"></div>
    <div id="footer"></div>
    <div class="container">
        <div id="slideshow">
            <div class="elemnt"></div>
            <div class="elemnt1"></div>
            <div class="elemnt2"></div>
            <div class="elemnt3"></div>
            <div class="elemnt4"></div>
        </div>
    </div>

    <head>
        <title>Restaurant Reservation</title>
    </head>

    <!-- content -->
	<body>
        <div class="center"> 
                <div class="header"><a href="reserve.php" class="logo">Reserve a Table Now</a></div>
        </div>
	</body>
	<!-- // content -->

</html>