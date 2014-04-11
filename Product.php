<?php
require("scripts/sql_scripts.class.php");
//display the specific product that the user selected from the from called product_list.php
session_start();
$obj=new sql_commands();
$output="";
$id=0;
//$_SESSION['cart_'.$_GET['id']]="";

	//checks if the product was selected
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$output=$obj->view_specific_product($id);		
	}
	
	
		if(isset($_POST['pid']))
		{
			$pid=$_POST['pid'];
			$_SESSION['cart_'.$pid]+=1;
			header("Location: cart.php");
		
		}

	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product</title>
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
<form action="product.php" method="post">
<div align="center" id="main">
<?php include_once("header.php"); ?>

<div id="content">
  <p>&nbsp;</p>
  <table width="317" border="0">
  <tr>
    <td width="20%" valign="top"><img src="proImages/<?php echo $id;?>.jpg" width="191" height="187" />
    <a href="proImages/<?php echo $id;?>.jpg">View Full Image</a>    </td>
    
    <td width="80%" valign="top"><?php echo $output;?>
      <p>&nbsp;</p>
      
      <p><input type="hidden" name="pid" value="<?php echo $id;?>"/>
      <input type="submit" value="Add to Cart" /></p>
      
      <p>&nbsp;</p>
      <p><a href="product_list.php"><-back</a></p></td>
  </tr>
</table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>


<?php include_once("footer.php"); ?>
</div>
</form>
</body>
</html>
