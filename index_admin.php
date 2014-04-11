<?php
session_start();
//this shows activities that the admin can perform 
if(!isset($_SESSION['manager']))
{
	header("Location: Admin_login.php");	
	session_destroy();
	exit;	
}

if($_SERVER['REQUEST_METHOD']=="POST")
{

	header("Location: Admin_login.php");
	session_destroy();
}

	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home page</title>
<link rel="stylesheet" href="../Van Rooyen/11111/vanrooyen/styles/sytle.css" type="text/css" media="screen">
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
<form action="../Van Rooyen/11111/vanrooyen/index_admin.php" method="post">
<div align="center" id="main">
<?php include_once("header.php"); ?>

<div id="content">
<br />
      <div align="right" style="margin-left:24px">
      <input type="submit"  value="LogOut" />
      </div>
  <div align="left" style="margin:-left:24px;"><h2>Welcome Admin, what wil you want do?</h2>

      <div align="left" style="margin-left:24px">
      <h2><a href="../Van Rooyen/11111/vanrooyen/Inventory.php">Inventory List</a></h2><h2><a href="../Van Rooyen/11111/vanrooyen/customer_list.php">Current Customer's and Admin's List</a>      </h2>
      <h2><a href="../Van Rooyen/11111/vanrooyen/add_admin.php">Add new admin</a></h2></div>
  </div>
</div>
<?php include_once("footer.php"); ?>
</div>
</form>
</body>
</html>
