<?php
session_start();
$_SESSION["logged_in"]=false;
$_SESSION["login_user"]="";
$_SESSION["login_fname"]="";
$_SESSION["login_role"]="";
session_destroy();
header("Location:index.php");
setcookie('cadminname',"data",time()-60*60*24*7);
setcookie('cpassword',"data",time()-60*60*24*7);
?>