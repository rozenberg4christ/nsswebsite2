<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

ob_start();
require "config.php";

if(isset($_REQUEST['submit']))
{


$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$status="Y";
$select=mysql_query("select * from tbl_login where log_name = '".$username."' and log_pass ='".base64_encode($password)."' and log_status='".$status."'") or die(mysql_error());
$num_rows = mysql_num_rows($select);
$row = mysql_fetch_array($select);
if($num_rows == 1)
{
if($row['log_id']=='1')
{
$_SESSION['userid'] = $row['log_id'];
$_SESSION['log_name'] = $row['log_name'];
header("location:index.php");
}
else
{
$_SESSION['user_id_guest'] = $row['log_id'];
$_SESSION['log_name'] = $row['log_name'];
$_SESSION['colcode'] = $row['col_code'];
$_SESSION['colname'] = $row['col_name'];
header("location:home.php");
}
$select_seq=mysql_query("select * from tbl_login where log_name = '".$username."' and log_pass ='".base64_encode($username)."' and log_id='".$row['log_id']."'") or die(mysql_error());
$seq_rows = mysql_num_rows($select_seq);
if($seq_rows==1)
{
header("location:securitylogin.php");
}
}
else
{
header("Location:login.php?msg=error");
}

}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>NSS :: Web Portal </title>
	<link href="stylesheet.css" rel="stylesheet">
<script language="javascript" type="text/javascript">
function logval()
{
	if(document.login.username.value=="")
	{
	alert("Enter your username");
	document.login.username.focus();
	return false;
	}
	if(document.login.password.value=="")
	{
	alert("Enter your password");
	document.login.password.focus();
	return false;
	}
}
</script>	
<style type="text/css">
<!--
.style4 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<table width="101%" border="0" >
  <tr>
    <td style="top: 0px;left: 0px;height: 60px;width: 100%;background: #0083C1;padding-top: 8px;font-size: 20px;text-transform: uppercase;letter-spacing: 0.3em;color: #fff;" align="center">
		<h1>National Service Scheme</h1>
      <h2>anna university, chennai - 25</h2>
      <p><strong>Online Web portal </strong></p></td>
  </tr>
  <tr style="background-color:#77BBFF">
    <td height="80%" ><table width="100%" border="0">
	
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>User Name : college Code </td>
    <td align="center"><a href="/nss" style="font-size:16px;color:#0000FF; "><strong>Click here to home </strong></a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Password : college code </td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Note : After entered the above login credentials, immediately change your own conveneient password. The password length should not exceed 8 characters </td>
    <td align="center"><img src="images/logo.jpg" width="109" height="108" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Any difficulties / Technical issues please contact 044 - 2235 8409 / 8410 </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td>
	<?php
	if(isset($_REQUEST['msg']))
	{
	?>
<div style="border:1px solid #efdcb1; font-family:Verdana, Arial, Helvetica, sans-serif; background-color:#fffbf1; text-align:center; padding-top:5px; padding-bottom:5px;width:100%; font-size:12px; display:block;"><strong>Incorrect!</strong> User Name/Password</div> 	
	<?php
	}
	if(isset($_REQUEST['vcode']))
	{
	?>
	<div style="border:1px solid #efdcb1; font-family:Verdana, Arial, Helvetica, sans-serif; background-color:#fffbf1; text-align:center; padding-top:5px; padding-bottom:5px;width:100%; font-size:12px; display:block;"><strong>Warning!</strong> Verification error</div> 
	<?php
	}
	?>	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="36%">&nbsp;</td>
    <td width="28%"><table class='visible' width='100%' cellspacing=2 cellpadding=5 >
	<tr style="background-color:#3399FF"><th><span class="style4">Login details</span></th>
	</tr>
      <tr bgcolor="#CEE7FF">
        <td align="center">
	<form id="login" name="login" method="post" action="">
	
	<table cellspacing=0 cellpadding=5 >
	<tr>
	<td>Username</td>
	<td><input type="text" name="username" id="username" class="txtBox" value=""></td>
	</tr>
	<tr>
	<td>Password</td>
	<td><input type="password" name="password" id="password" class="txtBox"></td>
	</tr>
	<?php
	if(isset($_REQUEST['msg']) or isset($_REQUEST['vcode']))
	{
	?>
	<tr>
	  <td><img border="0" id="captcha" src="image.php" alt="" /></td>
	  <td align="left"><input type="text" name="verif_box" id="verif_box" class="txtBox" size="10"></td>
	  </tr>
	<?php
	}
	?>
	<tr>
	<td></td>
	<td align="left"><input type="submit" name="submit" id="submit" value="Login!" onclick="return logval();" ></td>
	</tr>
	</table>
	</form>		</td>
      </tr>
    </table></td>
    <td width="36%">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  
  <tr bgcolor="#0083C1">
    <td colspan="3"><div align="center">
      <p><span class="Apple-style-span" style="border-collapse: separate; color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-align: -webkit-auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-border-horizontal-spacing: 0px; -webkit-border-vertical-spacing: 0px; -webkit-text-decorations-in-effect: none; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; font-size: medium;"><span class="Apple-style-span" style="color: #E8E800; font-family: Arial; font-size: 14px;"><strong> &copy; Copyright 2014 @ NSS, Anna University, Chennai - 25. All Rights Reserved.</strong></span></span> </p>
      <span class="style4">Developed and maintained by <a href="http://www.info-universalservice.com/saravanan/" style="font:Arial, Helvetica, sans-serif; color: #0000F0;" target="_blank">Saravanan</a></span>
    </div></td>
  </tr>
    </table>
</td>
  </tr>
</table>
</body>
</html>
