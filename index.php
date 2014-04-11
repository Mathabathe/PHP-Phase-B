<?php
//The page reads informtion in a text file and display it on the form
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
	$text="";
	$fp=fopen("letter.txt",'rb');
	while(!feof($fp))
	{
		$text.=fgets($fp)."<br>";
	}
	fclose($fp);


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
	color: #0000FF;
}
body {
	background-color: #FFFF99;
}
-->
</style></head>

<body>
<form action="../Van Rooyen/11111/vanrooyen/index.php" method="post">
<div align="center" id="main">
<?php include_once("header.php"); ?>
<div id="content">
<br/>
<table width="653" border="0">
  <tr>
    <td height="59" colspan="3" align="center"><strong>Welcome to Moagi Chairs</strong></td>
    </tr>
  <tr>
    <td width="247"><strong>News</strong></td>
    <td width="91" rowspan="2">&nbsp;</td>
    <td width="301" rowspan="2" valign="top">Moagi Chairs has built a reputation of being chairs suppliers that are affordable, honest and easy to work with.Essentially, we’re a one-stop shop for all of your office chairs variety requirements with the best quality. </td>
  </tr>
  <tr>
    <td><?php echo $text;?></td>
  </tr>
  </table>


<br/>
</div>
<?php include_once("footer.php"); ?>
</div>
</form>
</body>
</html>
