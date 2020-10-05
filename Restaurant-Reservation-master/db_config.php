<?php
function my_iud($query)
{

$c=mysqli_connect("localhost","root","") or die('Connection Failed');

mysqli_select_db($c,"booktablephp");

mysqli_query($c,$query);


$n=mysqli_affected_rows($c);
mysqli_close($c);
return $n;
}

function my_login($query)
{

$c=mysqli_connect("localhost","root","") or die('Connection Failed');

mysqli_select_db($c,"booktablephp");

$data=mysqli_query($c,$query);


$row=mysqli_fetch_array($data);

mysqli_close($c);
return $row[0];
}

function verifyuser()
{
	$u="";
	$p="";
	if(isset($_COOKIE['contactnumber']) && isset($_COOKIE['password']))
	{
		$u=$_COOKIE['ccontactnumber'];
		$p=$_COOKIE['password'];
	}
	else
	{
		$u=$_SESSION['sun'];
		$p=$_SESSION['spwd'];
	}
	$query="select count(*) from users where contactnumber='$u' and password='$p'";
	$n=my_login($query);
	if($n==1)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function my_select($query)
{
$c=mysqli_connect("localhost","root","") or die('Connection Failed');
mysqli_select_db($c,"booktablephp");
$data=mysqli_query($c,$query);
mysqli_close($c);
return $data;
}

?>