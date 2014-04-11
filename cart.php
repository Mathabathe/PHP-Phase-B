<?php
require("PHP Phase B/cart.php");
session_start();
//displays the products that the customer selected and stored them on a shopping cart 
if(isset($_GET['add']))
{
	
	$_SESSION['cart_'.$_GET['add']]+=1;
}

if(isset($_GET['sub']))
{
	
	$_SESSION['cart_'.$_GET['sub']]--;
}

if(isset($_GET['remov']))
{
	
	$_SESSION['cart_'.$_GET['remov']]=0;
}

$obj=new shopping_cart();
$output=$obj->cart($_SESSION);
$total=$obj->total_cost_to_pay();

if(isset($_GET['clear'])&&isset($_GET['clear'])=="empty")
{
	session_destroy();
	header("Location: index.php");
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cart</title>
<link rel="stylesheet" href="../Van Rooyen/11111/vanrooyen/styles/sytle.css" type="text/css" media="screen">
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
<br />
<div style="margin:24px text-align:left">
<table width="98%" border="1" cellpadding="6" cellspacing="0">
<tr>
<td width="15%" bgcolor="#FFCC99"><strong>Product</strong></td>
<td width="22%" bgcolor="#FFCC99"><strong>Description</strong></td>
<td width="11%" bgcolor="#FFCC99"><strong>Price</strong></td>
<td width="11%" bgcolor="#FFCC99"><strong>Categoty</strong></td>
<td width="14%" bgcolor="#FFCC99"><strong>Sub-Category</strong></td>
<td width="10%" bgcolor="#FFCC99"><strong>Quantity</strong></td>
<td width="17%" bgcolor="#FFCC99"><strong>add/sub/remove</strong></td>


</tr>
<?php echo $output;?>


</table>
<p>
<div align="right">
  <p><a href="../PHP Phase B/login.php"><img src="Pictures/add-cart-button.png" width="92" height="83" align="right"/></a><br />
    
    </p>
  <p>&nbsp;</p>
  <p>&nbsp;	</p>
</div>  
  </p>
<p>&nbsp;</p>
<p><?php echo $total;?></p>
<p><br />
  <br />
  <a href=../PHP Phase B/cart.php?clear=empty>Empty Shopping cart</a></p>
  <br />
</div>
 </div>
<?php include_once("footer.php"); ?>
</div>
</body>
</html>
