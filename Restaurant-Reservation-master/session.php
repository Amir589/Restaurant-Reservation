<?php
   if(!isset($_SESSION)) 
   { 
      session_start(); 
   } 
   
   include 'db_config.php'; 
   $connection = getDB();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($connection,"select useremail from users where useremail = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['useremail'];
   
   if(!isset($_SESSION['login_user'])){
      header("location: login.php");
      die();
   }
?>