<?php
session_start();
ob_start();
require "config.php";
if(!isset($_SESSION['userid']) && !isset($_SESSION['user_id_guest']))
{
header("location:login.php");
}
if(isset($_SESSION['userid']))
{
$userid=$_SESSION['userid'];
}
else
{
$userid=$_SESSION['user_id_guest'];
}

if(isset($_REQUEST['change']))
{
$que=mysql_query("select * from tbl_login where log_id='".$userid."' and log_pass='".base64_encode($_REQUEST['opwd'])."'")or die(mysql_error());
$re=mysql_fetch_array($que);
$nu=mysql_num_rows($que);
if($nu==1)
{
$update=mysql_query("update tbl_login set log_pass='".base64_encode($_REQUEST['pwd'])."' where log_id='".$userid."'")or die(mysql_error());
echo '<script language="javascript">alert("Username and Password changed successfully");</script>';
echo '<script language="javascript">alert("Please Relogin !");</script>';
echo '<script language="javascript">window.location.href="logout.php"</script>';
}
else
{
echo '<script language="javascript">alert("Old password is wrong !");</script>';
}
}
$sel_fet=mysql_query("select * from tbl_login where log_id = '".$userid."'") or die(mysql_error());
$fet = mysql_fetch_array($sel_fet);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Anna University of Technology Chennai :: Student's Practical Marks </title>
	<link href="stylesheet.css" rel="stylesheet">
<script language="javascript">
	function validate(){
		d=document.change;
		if(d.opwd.value==""){
			alert("Enter Current Password");
			d.opwd.focus();
			return false;		
		}
		if(d.pwd.value==""){
			alert("Enter new password");
			d.pwd.focus();
			return false;		
		}
		if(d.cpwd.value==""){
			alert("Enter confirm password");
			d.cpwd.focus();
			return false;		
		}
		if(d.pwd.value!=d.cpwd.value){
			alert("Passwords do not match please type in your password");
			d.cpwd.focus();
			return false;		
		}
			}
</script>
<style type="text/css">
<!--
.style3 {
	color: #FF0000;
	font-size: 16px;
	font-weight: bold;
}
.style4 {
	color: #007500;
	font-size: 14px;
	font-weight: bold;
}
.style5 {
	color: #0000FF;
	font-weight: bold;
}
.style6 {
	color: #FFFFFF;
	font-size: 14px;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<table width="100%" border="0">
  <tr>
    <td style="top: 0px;left: 0px;height: 60px;width: 100%;background:#0083C1;padding-top: 8px;font-size: 20px;text-transform: uppercase;letter-spacing: 0.3em;color: #fff;" align="center"><h1>office of the student affairs</h1>
      <h2>anna university, chennai - 25 </h2>
      <p><strong>Online web portal for furnish the College Details </strong></p>  </td>
  </tr>
  <tr style="background-color:#77BBFF">
    <td height="80%" ><table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><img src="images/logo.jpg" width="109" height="108" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><span class="style3">Security Login !...</span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><span class="style4">Immediately change your own Password .. </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><span class="style5">The password length should not exceed 8 character </span></td>
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
    <td width="28%"><table class='visible' width='100%' cellspacing=0 cellpadding=5>
	<tr style="background-color:#3399FF">
	  <th><span class="style6">Change Password</span></th>
	</tr>
      <tr bgcolor="#CEE7FF">
        <td align="center">
	<form id="change" name="change" method="post" action="">
	
	<table cellspacing=0 cellpadding=5>
	<tr>
	<td>Username</td>
	<td><strong><?php echo $fet['log_name']; ?></strong></td>
	</tr>
	<tr>
	<td>Current Password</td>
	<td><input type="password" name="opwd" id="opwd" class="txtBox"></td>
	</tr>
	<tr>
	<td>New Password</td>
	<td><input type="password" name="pwd" id="pwd" class="txtBox"></td>
	</tr>
	<tr>
	<td>Confirm Password</td>
	<td><input type="password" name="cpwd" id="cpwd" class="txtBox"></td>
	</tr>
	<tr>
	<td></td>
	<td align="left"><input type="submit" name="change" id="change" value="Change Password" onclick="return validate();" ></td>
	</tr>
	</table>
	</form>		</td>
      </tr>
    </table></td>
    <td width="36%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
   <tr bgcolor="#0083C1">
    <td colspan="3"><div align="center">
      <p><span class="Apple-style-span" style="border-collapse: separate; color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-align: -webkit-auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-border-horizontal-spacing: 0px; -webkit-border-vertical-spacing: 0px; -webkit-text-decorations-in-effect: none; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; font-size: medium;"><span class="Apple-style-span" style="color: #E8E800; font-family: Arial; font-size: 14px;"><strong> &copy; Copyright 2012 Student Affairs, Anna University, Chennai - 25. All Rights Reserved.</strong></span></span> </p>
      <span class="style6">Developed and maintained by Web team @ Student Affairs.</span>
    </div></td>
  </tr>
  </table>
</td>
  </tr>
</table>
</body>
</html>
