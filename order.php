<?php
session_start();
//users sends necessary information for him/her to be able to make an order
require("scripts/shopping_cart.class.php");
$myObj=new shopping_cart();
$tabl=$myObj->order_display($_SESSION);
$total_cost=$myObj->cost();
$total=$myObj->total_cost_to_pay();

if($_SERVER['REQUEST_METHOD']=="POST")
{
	
	//header("Location: order.php");	

//accepting the variables from the text boxes
$credit=$_POST["credit"];
$amount=$_POST["amount"];
if(isset($credit)&& isset($amount))
{
	if(!preg_match("/[0-9]{16}/",$credit))
	{
		echo "Credit number not valid <a href='order.php'>Click Here</a>";
		exit;	
	}
	
	if($total_cost==0)
	{
		session_destroy();
		echo "Your shopping card is empty so u can't do any of the transaction so you will be logged out <a href='index.php'>Click Here</a>";	
		exit;	
	}
	
	
	//checks if the user is paying enough
	if($total_cost >= $amount)
	{
		 
		 $new_id=$myObj->order($_SESSION["id"],$total_cost,$amount);
		 $myObj->order_items($new_id,$_SESSION);
		 session_destroy();
		  echo "Order successfully processed. You will be notifyed on your email out your products... You will be locked out by the security of the system... Thanks <a href='check_out.php'>Click Here</a>";
		  exit;
	}
	else
	{
		echo "You dont have enough cash for you to pay for products <a href='order.php'>Click Here</a>";	
		exit;
	}
	
	
	}
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="../Van Rooyen/11111/vanrooyen/styles/sytle.css" type="text/css" media="screen">
</head>

<body>
<form id="form1" name="form1" method="post" action="../Van Rooyen/11111/vanrooyen/order.php">
<div align="center" id="main">
<?php include_once("header.php"); ?>

<div id="content">

  <div align="center" style="margin:-left:24px;">  
    <p>Please provide neccessary information</p>
    
  	  <table width="242" border="0">
  	    <tr>
  	      <td width="78">Total Cost:            </td>
  	      <td width="148"><input name="Cost" type="text" id="cost" value="<?php echo $total_cost; ?>" readonly="readonly" size="4"/></td>
	      </tr>
  	    <tr>
  	      <td>Credit Card No:</td>
  	      <td><input type="text" name="credit" id="credit" /></td>
	      </tr>
  	    <tr>
  	      <td>Amount:</td>
  	      <td><input type="text" name="amount" id="amount" /></td>
	      </tr>
  	    <tr>
  	      <td>&nbsp;</td>
  	      <td><input type="submit" value="Order" /></td>
	      </tr>
	    </table>
  	  <p>&nbsp;</p>
  	  <p><br/>
  	    <br/>
  	    <br/>
        <a href="../Van Rooyen/11111/vanrooyen/check_out.php">Back</a>
  	    <br/>
  	    <br/>
  	    <br/>
  	  </p>
  </div>
</div>
<?php include_once("footer.php"); ?>
</div>
</form>
</body>
</html>