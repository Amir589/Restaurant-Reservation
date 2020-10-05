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

function my_select($query)
{
$c=mysqli_connect("localhost","root","") or die('Connection Failed');
mysqli_select_db($c,"booktablephp");
$data=mysqli_query($c,$query);
mysqli_close($c);
return $data;
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


//function for verifying user:

function verifyuser()
{
	$u="";
	$p="";
	if(isset($_COOKIE['adminname']) && isset($_COOKIE['password']))
	{
		$u=$_COOKIE['adminname'];
		$p=$_COOKIE['password'];
	}
	else
	{
		$u=$_SESSION['sun'];
		$p=$_SESSION['spass'];
	}
	$query="select count(*) from admin where adminname='$u' and password='$p'";
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


function totalbookingrequest()
{
	$rs = my_select("select * from booking where status='Pending'");
	//$n = mysql_num_rows($rs);
	$n = 0;
	while($row=mysqli_fetch_array($rs))
	{
		$n++;
	}
	return $n;
	
	
}

function totaluserrequest()
{
	$rs = my_select("select * from users where status='Pending'");
	//$n = mysql_num_rows($rs);
	$n = 0;
	while($row=mysqli_fetch_array($rs))
	{
		$n++;
	}
	return $n;
	
	
}

function totalusers()
{
	$rs = my_select("select * from users");
	//$n = mysql_num_rows($rs);
	$n = 0;
	while($row=mysqli_fetch_array($rs))
	{
		$n++;
	}
	return $n;
	
	
}

?>