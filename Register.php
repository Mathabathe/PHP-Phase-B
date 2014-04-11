<?php
//user provided necessary information so that they can be registered in with the site and be able to make necessary purchases
$error="";
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$name=$_POST["name"];
	$surname=$_POST["surname"];
	$address=$_POST["address"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$id=$_POST['id'];
	if(!$address||!$email||!$name||!$password||!$surname||!$id)
	{
		echo "Provide all fields";
		exit;	
	}
	if(!preg_match("/[a-zA-Z0-9_\-.\]+@[a-zA-Z0-9\-]\.[a-zA-Z]{3,4}+$/",$email))
	{
		echo "Email should be in this format mello11@gmail.com <a href='Register.php'>Click Here</a>";
		exit;
	}
	if(!preg_match("/[0-9]{13}/",$id))
	{
		echo "ID number not valid <a href='Register.php'>Click Here</a>";
		exit;	
	}
	

		require("scripts/sql_scripts.class.php");
	$obj=new sql_commands();
	$error =$obj->register($name,$surname,$address,$email,$password,$id);
	if($error >0)
	{
		echo "A user with the email address entered exists";
		exit;
	}
	echo "account created succefully <a href='user_login.php'>Click Here</a>";
	exit;
}

?>

