<?php
session_start();
ob_start();
require("config.php");
$colcode=$_SESSION['colcode'];
$colname=$_SESSION['colname'];

if(!isset($_SESSION['userid']) && !isset($_SESSION['user_id_guest']))
{
header("location:login.php");
}
$colcode=$_SESSION['colcode'];
$colname=$_SESSION['colname'];
$query=mysql_query("select * from tbl_settings") or die(mysql_error());
$result=mysql_fetch_array($query);
$fee_year=$result['set_year'];
$cflag=0;
if(isset($_SESSION['user_id_guest']))
{
$select=mysql_query("select * from tbl_login where log_id = '".$_SESSION['user_id_guest']."' and log_status='Y'") or die(mysql_error());
$num_rows = mysql_num_rows($select);
$row = mysql_fetch_array($select);
$cflag=1;
}

if(isset($_REQUEST['submit']))
{
$ocm=$_REQUEST['ocm'];
$scm=$_REQUEST['scm'];
$stm=$_REQUEST['stm'];
$ocf=$_REQUEST['ocf'];
$scf=$_REQUEST['scf'];
$stf=$_REQUEST['stf'];
$totm=$_REQUEST['totm'];
$totf=$_REQUEST['totf'];
$total=$_REQUEST['total'];

$query = "SELECT * FROM volunteer WHERE col_code = $colcode and status = 'N'";
$sqlsearch = mysql_query($query);
$resultcount = mysql_num_rows($sqlsearch);

/*if($total>100)
{
echo "<script>alert(\"Sorry, you are exceeded the total number of volunteers... Maximum 100 volunteers only allowed !!! Enter valid data ... \");</script>";
echo "<script type='text/javascript'> document.location = 'volunteers.php'; </script>";
exit(); 
}*/

if ($resultcount == 0) 
		{
		mysql_query("INSERT INTO `volunteer` (`col_code`,`col_name`,`ocm`,`ocf`,`scm`,`scf`,`stm`,`stf`,`totm`,`totf`,`total`,`status`) VALUES ('$colcode','$colname','$ocm','$ocf','$scm','$scf','$stm','$stf','$totm','$totf','$total','N')")   or die(mysql_error()); 
		echo'<script language=javascript>alert("Volunteers Data entered successfully");</script>';
		 }
		else
		{

echo'<script language=javascript>alert("You have already entered volunteers details.. If any update plz contact Administrator. ");</script>';
}
}
?>
<?php
require("header.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
<title>NSS</title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Style-Type" content="text/css"> 
<meta http-equiv="Content-Script-Type" content="text/javascript"> 
<script type="text/javascript"> 
var howmanytoadd=3; 
var rows; 
function calc(){ 
var tot=0; 
for(var i=0;i<rows.length;i++){ 
var linetot=0; 
for(var j=0;j<howmanytoadd;j++){ 
linetot+=Number(rows[i].getElementsByTagName('input')[j].value) 
} 
rows[i].getElementsByTagName('input')[howmanytoadd].value=linetot; 
tot+=linetot; 
} 
document.getElementById('total').value =tot 
} 
onload = function(){ 
rows=document.getElementById('tab').getElementsByTagName('tr'); 
for(var i=0;i<rows.length;i++){ 
for(var j=0;j<howmanytoadd;j++){ 
rows[i].getElementsByTagName('input')[j].onkeyup=calc; 
} 
} 
} 
</script> 

<script language="javascript" type="text/javascript">
function check()
{
	if(document.volunteers.ocm.value=="")
	{
	alert("Enter the male count for OC ");
	document.volunteers.ocm.focus();
	return false;
	}
	
	if(document.volunteers.scm.value=="")
	{
	alert("Enter the male count for SC ");
	document.volunteers.scm.focus();
	return false;
	}
	
	if(document.volunteers.stm.value=="")
	{
	alert("Enter the male count for ST ");
	document.volunteers.stm.focus();
	return false;
	}
	
	if(document.volunteers.ocf.value=="")
	{
	alert("Enter the female count for OC ");
	document.volunteers.ocf.focus();
	return false;
	}
	
	if(document.volunteers.scf.value=="")
	{
	alert("Enter the female count for SC ");
	document.volunteers.scf.focus();
	return false;
	}
	
	if(document.volunteers.stf.value=="")
	{
	alert("Enter the female count for ST ");
	document.volunteers.stf.focus();
	return false;
	}
	
	
}
</script>	


<!--[if !IE]>start section<![endif]-->
<style type="text/css">
<!--
.style1 {color: #3300FF}
.style2 {color: #0000FF}
.style3 {
	color: #CC0000;
	font-size: 12px;
}
.style10 {
	font-size: 16px;
	font-weight: bold;
	color: #0000DD;
}
.style10 {font-size: 15px; font-weight: bold; color: #3333FF; }
.style10 {font-size: 14px; font-weight: bold; color: #0000DD; }
-->
</style>

</head> 
<body>
	
					<div class="section" style="vertical-align:top;">
						<!--[if !IE]>start section content<![endif]-->
						<div class="section_content">
							<!--[if !IE]>start section content top<![endif]-->
							<div class="sct">
							
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">
							<h2>Volunteers Registration Deatils </h2> <?php /*?><?php echo $colcode ?><?php */?>
											
												<!--[if !IE]>start forms<![endif]--> 
														<!--[if !IE]>start forms<![endif]-->

<form id="volunteers" name="volunteers" method="post" action="">
<input type="text" size="100" readonly="true"  name="col_name" id="col_name" value="<?php echo $row['col_name']; ?>"  style="font:Arial, Helvetica, sans-serif;color:#D400AA;" /> <br/><br/>
<table id="tab" width="80%" border="0" cellspacing="1" cellpadding="1"> 
<tr height="90">
<td width="34%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style10">OC</span> <br/>
  <br/> <span class="style10">Male</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="10" maxlength="10" name="ocm" id="ocm" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td> 
<td width="28%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style10">SC </span><br/>
  <br/><input type="text" size="10" maxlength="10" name="scm" id="scm" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td> 
<td width="28%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style10">ST </span><br/>
  <br/><input type="text" size="10" maxlength="10" name="stm" id="stm" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td> 
<td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style10">Total </span><br/>
  <br/>
  <input type="text" size="10" maxlength="10" name="totm" id="totm" readonly="true" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td>
</tr> 
<tr height="90"> 
<td><span class="style10">Female</span> &nbsp;&nbsp;&nbsp;
  <input type="text" size="10" maxlength="10" name="ocf" id="ocf" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td> 
<td><input type="text" size="10" maxlength="10" name="scf" id="scf" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td> 
<td><input type="text" size="10" maxlength="10" name="stf" id="stf" style="font:Arial, Helvetica, sans-serif;color:#D400AA;" ></td>
<td><input type="text" size="10" maxlength="10" name="totf" id="totf" readonly="true" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td> 
</tr> 
</table> 
<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style10">Total</span> &nbsp;&nbsp;&nbsp;  
<input type="text" id="total" name="total" size="10" maxlength="10" readonly="true" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"> <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="submit" type="submit" class="style3" id="submit" onClick="return check();" value="submit" >
</form>
</body> 
</html> 


												
												
												
												
												
												<!--[if !IE]>end forms<![endif]-->	
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--[if !IE]>end section content top<![endif]-->
							<!--[if !IE]>start section content bottom<![endif]-->
							<span class="scb"><span class="scb_left"></span><span class="scb_right"></span></span>
							<!--[if !IE]>end section content bottom<![endif]-->
							
						</div>
						<!--[if !IE]>end section content<![endif]-->
					</div>
					<!--[if !IE]>end section<![endif]-->
<?php
require("footer.php");
?>
