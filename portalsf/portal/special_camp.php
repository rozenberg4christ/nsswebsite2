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
$cspecial_camp=0;
if(isset($_SESSION['user_id_guest']))
{
$select=mysql_query("select * from tbl_login where log_id = '".$_SESSION['user_id_guest']."' and log_status='Y'") or die(mysql_error());
$num_rows = mysql_num_rows($select);
$row = mysql_fetch_array($select);
$cspecial_camp=1;
}

if(isset($_REQUEST['submit']))
{
$unit_no=$_REQUEST['unit_no'];
$from=$_REQUEST['from'];
$to=$_REQUEST['to'];
$venue=$_REQUEST['venue'];
$ocm=$_REQUEST['ocm'];
$scm=$_REQUEST['scm'];
$stm=$_REQUEST['stm'];
$ocf=$_REQUEST['ocf'];
$scf=$_REQUEST['scf'];
$stf=$_REQUEST['stf'];
$totm=$_REQUEST['totm'];
$totf=$_REQUEST['totf'];
$total=$_REQUEST['total'];

$query = "SELECT * FROM special_camp WHERE col_code = $colcode and status = 'N'";
$sqlsearch = mysql_query($query);
$resultcount = mysql_num_rows($sqlsearch);

/*if($total>50)
{
echo "<script>alert(\"Sorry, you are exceeded the total number of special_camp... Maximum 50 special_camp only allowed !!! Enter valid data ... \");</script>";
echo "<script type='text/javascript'> document.location = 'special_camp.php'; </script>";
exit(); 
}*/

if ($resultcount == 0) 
		{
		mysql_query("INSERT INTO `special_camp` (`col_code`,`col_name`,`unit_no`,`from`,`to`,`venue`,`ocm`,`ocf`,`scm`,`scf`,`stm`,`stf`,`totm`,`totf`,`total`,`status`) VALUES ('$colcode','$colname','$unit_no','$from','$to','$venue','$ocm','$ocf','$scm','$scf','$stm','$stf','$totm','$totf','$total','N')")   or die(mysql_error()); 
		echo'<script language=javascript>alert("special_camp Data entered successfully");</script>';
		 }
		else
		{

echo'<script language=javascript>alert("You have already entered special_camp details.. If any update plz contact Administrator. ");</script>';
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

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery-calendar.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('.calendarFocus').calendar();
			});
		</script>
		<link rel="stylesheet" href="js/jquery-calendar.css" />

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
	if(document.special_camp.unit_no.value=="")
	{
	alert("Enter the Unit No. ");
	document.special_camp.unit_no.focus();
	return false;
	}

	if(document.special_camp.from.value=="")
	{
	alert("Select the camp start date ");
	document.special_camp.from.focus();
	return false;
	}
	
	if(document.special_camp.to.value=="")
	{
	alert("Select the camp end date ");
	document.special_camp.to.focus();
	return false;
	}
	
	if(document.special_camp.venue.value=="")
	{
	alert("Enter the Camp Venue Name ");
	document.special_camp.venue.focus();
	return false;
	}
	
	if(document.special_camp.ocm.value=="")
	{
	alert("Enter the male count for OC ");
	document.special_camp.ocm.focus();
	return false;
	}
	
	if(document.special_camp.scm.value=="")
	{
	alert("Enter the male count for SC ");
	document.special_camp.scm.focus();
	return false;
	}
	
	if(document.special_camp.stm.value=="")
	{
	alert("Enter the male count for ST ");
	document.special_camp.stm.focus();
	return false;
	}
	
	if(document.special_camp.ocf.value=="")
	{
	alert("Enter the female count for OC ");
	document.special_camp.ocf.focus();
	return false;
	}
	
	if(document.special_camp.scf.value=="")
	{
	alert("Enter the female count for SC ");
	document.special_camp.scf.focus();
	return false;
	}
	
	if(document.special_camp.stf.value=="")
	{
	alert("Enter the female count for ST ");
	document.special_camp.stf.focus();
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
							<h2>Special camp Registration </h2> <?php /*?><?php echo $colcode ?><?php */?>
											
												<!--[if !IE]>start forms<![endif]--> 
														<!--[if !IE]>start forms<![endif]-->

<form id="special_camp" name="special_camp" method="post" action="">
<input type="text" size="100" readonly="true"  name="col_name" id="col_name" value="<?php echo $row['col_name']; ?>"  style="font:Arial, Helvetica, sans-serif;color:#D400AA;" /> <br/><br/>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center"><span class="style10">Unit Nos</span></div></td>
    <td><div align="center"><span class="style10">Camp Starts from</span></div></td>
    <td><div align="center"><span class="style10">Camp to</span></div></td>
    <td><div align="center"><span class="style10">Venue of Camp</span></div></td>
  </tr>
  <tr>
    <td><input name="unit_no" type="text" size="10" id="unit_no" style="font:Arial, Helvetica, sans-serif;color:#D400AA;">  </td>
    <td><input name="from" type="text" id="from" class="calendarFocus" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td>
    <td><input name="to" type="text" id="to" class="calendarFocus" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td>
    <td><input name="venue" type="text" size="30" id="venue" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td>
  </tr>
</table>

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
