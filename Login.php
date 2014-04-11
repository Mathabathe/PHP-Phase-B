<?php
session_start();
//the form basically requires the information/ credentials of the user in order for him to login to other pages to make a purchase. If the user was already logged in, he/she will be redirected to order.php 
if(isset($_SESSION['user']))
{
	header("Location: order.php");	
	exit;
}
if($_SERVER['REQUEST_METHOD']=="POST")
{
	
	$user=$_POST['email'];
	$password=$_POST['password'];
	if(!$user||!$password)
	{
		echo "Please enter name and password";	
		exit;
	}
	require("scripts/sql_scripts.class.php");
	$obj=new sql_commands();
	//$obj->connect();
	$value=$obj->user_login($user,$password);
		if($value>0)
		{
			
		$_SESSION["user"]=$user;
		$_SESSION["id"]=$value;
		header("Location: check_out.php");
		exit;
		}else
		{
			echo 'The information is incorrect <a href="user_login.php">Click here</a>';
		exit;
	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="styles/sytle.css" type="text/css" media="screen">
<style type="text/css">
<!--
body,td,th {
	color: #0000FF;
	font-family: Georgia, Times New Roman, Times, serif;
}
body {
	background-color: #FFFF99;
}
-->
</style></head>
<body>
<div align="center" id="main">
<?php include_once("header.php"); ?>

<div id="content">
  <div align="right" style="margin:-left:24px;">  
    <p>Please Sign In
     </p>
    
    <form id="form1" name="form1" method="post" action="user_login.php">
      E-mail:
      <input type="text" name="email" id="email" />
      <br/>
      <br/>
      Password:
      <input type="password" name="password" id="password" />
      <br/>
      <br />
      <br/><input type="submit" value="Login" />
      <br/>
       <br/>
      <a href="register.php">Register Here</a>
</form>
    <h2> </h2>
  </div>
</div>
<?php include_once("footer.php"); ?>
</div>
</body>
</html>
