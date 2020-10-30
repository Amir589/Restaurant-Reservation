<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
</head>
<style>
    .img {
        height: 500px;
        width: 100%;
    }
    .button {
        font-size: 24px;
        width: 50%; 
        height: 100px;
        background-color: #18507F;
        padding: 15px 32px;
        color: white;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }
    .button_div {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<body >
<?php include "nav_1.php"; ?>
<div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ul class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ul>
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner center" >
            <div class="carousel-item active">
                <img src="images/background.jpg " class="img">
            </div>
            <div class="carousel-item">
                <img src="images/book a table.jpg " class="img">
            </div>
            <div class="carousel-item">
                <img src="images/minneapolis.jpg" class="img">
            </div>
            <div class="carousel-item">
                <img src="images/reserv.jpg" class="img">
            </div>
            <div class="carousel-item">
                <img src="images/table-reservation.jpg" class="img">
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>
<form action="reserve.php" method="GET">
    <div class="button_div">
        <button type="submit" class="button">Click Here to Reserve Your Table!</button>
    </div>
</form>

</body>
</html>