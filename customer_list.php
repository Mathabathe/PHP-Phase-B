<?php
//display customers and admins that are already registered
require("scripts/sql_scripts.class.php");
$obj=new sql_commands();

session_start();
if(!isset($_SESSION['manager']))
{
	header("Location: login.php");	
	session_destroy();
	exit;	
}

if(isset($_GET['del']))
{
	$obj->deleteUser($_GET['del']);	
}

if(isset($_GET['delAdmin']))
{
	$obj->deleteAdmin($_GET['delAdmin']);	
}
$current_user=$obj->getAllCustomers();
$current_admins=$obj->getAllAdmin();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home page</title>
<link rel="stylesheet" href="../Van Rooyen/11111/vanrooyen/styles/sytle.css" type="text/css" media="screen">

</head>

<body>
<form action="../Van Rooyen/11111/vanrooyen/customer_list.php" method="post">
<div align="center" id="main">
<?php include_once("header.php"); ?>
<div id="content">
<br/>
<h2>Customers and Admins Registered </h2>
<br/>
<table width="826" border="1">
  <tr>
    <td width="476"><strong>Customers Registered</strong></td>
    <td width="334"><strong>Admins Registered</strong></td>
  </tr>
  <tr>
    <td><?php echo $current_user;?></td>
    <td><?php echo $current_admins;?></td>
  </tr>
</table>

<br/>
<a href="../Van Rooyen/11111/vanrooyen/index_admin.php">Back</a>
<br/>
<br/>
</div>
<?php include_once("footer.php"); ?>
</div>
</form>
</body>
</html>
