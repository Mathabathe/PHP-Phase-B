<?php
session_start();
//the form basically requires the information/ credentials of the admin in order for him to login to other pages. If the admin was already logged in, he/she will be redirected to the index_admin.php
require("scripts/admin.class.php");
if(isset($_SESSION['manager']))
{
	header("Location: index_admin.php");	
	exit;
}

if(isset($_SESSION['admin']))
{
	header("Location: myadmin.php");	
}

if($_SERVER['REQUEST_METHOD']=="POST")
{
		$result="";
		$priv=$_POST['privilages'];
		$manager=$_POST['username'];
		$password=$_POST['password'];
		$obj=new admin();

		$result=$obj->check($manager,$password,$priv);
		if($result=="superadmin")
		{
			
		$_SESSION["manager"]=$manager;
		$_SESSION["password"]=$password;
		header("Location: index_admin.php");
		
		}else if($result=="admin")
		{
			$_SESSION["admin"]=$manager;
			$_SESSION["password"]=$password;
			header("Location: myadmin.php");
		}
		else
		{
			echo 'The information is incorrect <a href="index_admin.php">Click here</a>';
			exit;
		}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home page</title>
<link rel="stylesheet" href="styles/sytle.css" type="text/css" media="screen">
<style type="text/css">
<!--
body,td,th {
	font-family: Georgia, Times New Roman, Times, serif;
	color: #0000FF;
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
    <p>Please provide your credentials
     </p>
    
    <form id="form1" name="form1" method="post" action="admin_login.php">
      Username:
      <input type="text" name="username" id="username" />
      <br/>
      <br/>
      Password:
      <input type="password" name="password" id="password" />
      <br/>
      <br/>
      <select name="privilages">
      <option></option>
      <option value="superadmin">superadmin</option>
      <option value="admin">admin</option>
      </select>
      <br/>
      <br/><input type="submit" value="Login" />
</form>
    <h2> </h2>
  </div>
</div>
<?php include_once("footer.php"); ?>
</div>
</body>
</html>
