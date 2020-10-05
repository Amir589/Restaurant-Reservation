<?php
session_start();
$_SESSION['sun']="";
$_SESSION['spass']="";
session_destroy();
header("Location:index.php");
setcookie('cadminname',"data",time()-60*60*24*7);
setcookie('cpassword',"data",time()-60*60*24*7);

?>