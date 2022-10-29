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
$event=$_REQUEST['event'];
$organiser=$_REQUEST['organiser'];
$venue=$_REQUEST['venue'];
$from=$_REQUEST['from'];
$to=$_REQUEST['to'];
$tot_days=$_REQUEST['tot_days'];
$tot_vol=$_REQUEST['tot_vol'];
$desc=$_REQUEST['desc'];
$location=$_REQUEST['location'];

mysql_query("INSERT INTO `participated` (`col_code`,`col_name`,`event`,`organiser`,`venue`,`from`,`to`,`tot_days`,`tot_vol`,`desc`,`location`) VALUES ('$colcode','$colname','$event','$organiser','$venue','$from','$to','$tot_days','$tot_vol','$desc','$location')")   or die(mysql_error()); 
echo'<script language=javascript>alert("participated Data Entered successfully");</script>';
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

<script language="javascript" type="text/javascript">
function check()
{
	if(document.participated.event.value=="")
	{
	alert("Enter the event name");
	document.participated.event.focus();
	return false;
	}
	
	if(document.participated.organiser.value=="")
	{
	alert("Enter the organiser name");
	document.participated.organiser.focus();
	return false;
	}
	
	if(document.participated.venue.value=="")
	{
	alert("Enter the venue name");
	document.participated.venue.focus();
	return false;
	}
	if(document.participated.from.value=="")
	{
	alert("Select from date");
	document.participated.from.focus();
	return false;
	}
	if(document.participated.to.value=="")
	{
	alert("Select to date");
	document.participated.to.focus();
	return false;
	}
	
	if(document.participated.tot_days.value=="")
	{
	alert("Enter the No. of days");
	document.participated.tot_days.focus();
	return false;
	}
	if(document.participated.tot_vol.value=="")
	{
	alert("Enter the Number of Volunteers");
	document.participated.tot_vol.focus();
	return false;
	}
		
	if(document.participated.desc.value=="")
	{
	alert("Enter the Description");
	document.participated.desc.focus();
	return false;
	}
	
	if(document.participated.location.value=="")
	{
	alert("Select the location");
	document.participated.location.focus();
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
	
					<div class="section" style="vertical-align:top;">
						<!--[if !IE]>start section content<![endif]-->
						<div class="section_content">
							<!--[if !IE]>start section content top<![endif]-->
							<div class="sct">
							
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">
							<h2>Activities Participated Details</h2> <?php /*?><?php echo $colcode ?><?php */?>
											
												<!--[if !IE]>start forms<![endif]--> 
														<!--[if !IE]>start forms<![endif]-->

<form id="participated" name="participated" method="post" action="">
<table width="99%" border="0">
  <tr> 
      <td width="6%"><span class="style10">1.</span></td>
    <td colspan="2"><span class="style10">Name of the College :</span> </td>
    <td width="70%">  <input type="text" size="100" readonly="true"  name="col_name" id="col_name" value="<?php echo $row['col_name']; ?>"  style="font:Arial, Helvetica, sans-serif;color:#D400AA;" />	 </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td><span class="style10">2.</span></td>
    <td colspan="2"><span class="style10">Name of the Event : </span></td>
    <td><input type="text" size="30" maxlength="100" name="event" id="event" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<tr>
    <td><span class="style10">3.</span></td>
    <td colspan="2"><span class="style10">Name of the Organiser : </span></td>
    <td><input type="text" size="30" maxlength="100" name="organiser" id="organiser" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr>
    <td><span class="style10">4.</span></td>
    <td colspan="2"><span class="style10">Venue :</span> </td>
    <td><input type="text" size="30" maxlength="100" name="venue" id="venue" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td>
	</tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
     <tr>
    <td><span class="style10">5.</span></td>
    <td colspan="2"><span class="style10">From Date :</span> </td>
    <td><input type="text" size="20" maxlength="20" name="from" id="from" class="calendarFocus" style="font:Arial, Helvetica, sans-serif;color:#D400AA;">&nbsp;&nbsp;&nbsp;<span class="style3">* from 1st April 2014 onwards</span> </td>
	</tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
     <tr>
    <td><span class="style10">6.</span></td>
    <td colspan="2"><span class="style10">To date :</span> </td>
    <td><input type="text" size="20" maxlength="20" name="to" id="to" class="calendarFocus" style="font:Arial, Helvetica, sans-serif;color:#D400AA;">&nbsp;&nbsp;&nbsp;<span class="style3">* On or before 31st March 2015</span></td>
	</tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td height="30"><span class="style10">7.</span></td>
    <td colspan="2"><span class="style10">No of Days : </span></td>
    <td><input type="text" size="10" maxlength="10" name="tot_days" id="tot_days" style="font:Arial, Helvetica, sans-serif;color:#D400AA;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style2"></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
   <tr>
    <td><span class="style10">8.</span></td>
    <td colspan="2"><span class="style10">No of Volunteers involved : </span></td>
    <td><input type="text" size="10" maxlength="10" name="tot_vol" id="tot_vol" style="font:Arial, Helvetica, sans-serif;color:#D400AA;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style2"></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<tr>
    <td><span class="style10">9.</span></td>
    <td colspan="2"><span class="style10">Description : </span></td>
    <td><textarea name="desc" id="desc" cols="80" rows="10" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></textarea></td>
    </tr>
 
    <tr>
      <td>&nbsp;</td>
      <td width="13%">&nbsp;</td>
      <td width="7%">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<tr>
    <td><span class="style10">10.</span></td>
    <td colspan="2"><span class="style10">Location of Proposed Activity: </span></td>
    <td><select name="location" id="location">
			  <option value="">-- Within the --</option>
<option value="Region">Region</option>
<option value="State">State</option>
<option value="University">University</option>
<option value="Other State">Other State</option>
</select><span class="style2"></span></td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td width="13%">&nbsp;</td>
      <td width="7%">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" id="submit" value="submit" onclick="return check();" ></td>
    </tr>
</table>
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
