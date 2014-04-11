<?php
//displays the products that already there in the database on the form
require("scripts/sql_scripts.php");
$obj=new sql_commands();
$msg="";
$dis_office_chairs=$obj->select_for_Office_Chairs();
$dis_Camping_Chairs=$obj->select_for_Camping_Chairs();
$dis_Study_Chairs=$obj->select_for_Study_Chairs();
$dis_Kiddies_Chairs=$obj->select_for_Kiddies_Chairs();
$dis_Visitors_Chairs=$obj->select_for_Visistors_Chairs();
$dis_Kitchen_Chairs=$obj->select_for_Kitchen_Chairs();

//header("Location: product_list.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$search=$_POST['search'];
	
	$result=$obj->search($search);
	if($result>0)
	{
		$msg="Product your looking for exist!! <a href=result_search.php?id=$result>View Results</a>";
	}
	else
	{
		$msg="Product doesn't exist!!";
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product List</title>
<link rel="stylesheet" href="../../../../xampp/htdocs/PHP Phase B/styles/sytle.css" type="text/css" media="screen">
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
	color: #000066;
	font-family: Georgia, Times New Roman, Times, serif;
}
body {
	background-color: #FFFF99;
	background-repeat: repeat;
	margin-left: 2cm;
	background-image: url();
}
-->
</style></head>

<body>
<div align="center" id="main">
<div align="center" id="main">
<?php include_once("header.php"); ?>
<form action="../../../../xampp/htdocs/PHP Phase B/product_list.php" method="post">
<div id="content">
  <p>Search by name:
    <input type="text" name="search" /><input type="submit" value="Search" /></p>
  <p><?php  echo $msg;?></p>
  <table width="539" height="324" border="2">
  <tr>
    <td height="18" bgcolor="#FFCC99">Office chairs</td>
    <td bgcolor="#FFCC99">Camping chairs</td>
    <td bgcolor="#FFCC99">Study chairs</td>
	<td bgcolor="#FFFF99">Kiddies chairs</td>
	<td bgcolor="#FFFF99">Visitors chairs</td>
	<td bgcolor="#FFFF99">Kitchen chairs</td>
  </tr>
  <tr>
    <td bgcolor="#FFFF99"><?php  echo $dis_office;?></td>
    <td><?php echo $dis_Camping;?></td>
    <td><?php  echo $dis_Study;?></td>
	<td><?php echo $dis_Kiddies;?></td>
	<td><?php echo $dis_Visitors;?></td>
	<td><?php echo $dis_Kitchen;?></td>
  </tr>
</table>
  <p>&nbsp;</p>
   <p></p>
</div>
</form>
<?php include_once("footer.php"); ?>
</div>
</div>
</body>
</html>
	