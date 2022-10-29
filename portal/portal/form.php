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
$prl_name=$_REQUEST['prl_name'];
$add1=$_REQUEST['add1'];
$add2=$_REQUEST['add2'];
$add3=$_REQUEST['add3'];
$add4=$_REQUEST['add4'];
$prl_email=$_REQUEST['prl_email'];
$prl_mobile=$_REQUEST['prl_mobile'];
$col_std=$_REQUEST['col_std'];
$col_phone=$_REQUEST['col_phone'];
$col_fax=$_REQUEST['col_fax'];

$query = "SELECT * FROM principal_details WHERE col_code = $colcode and status = 'Y'";
$sqlsearch = mysql_query($query);
$resultcount = mysql_num_rows($sqlsearch);
if ($resultcount > 0) 
		{
		mysql_query("UPDATE principal_details SET prl_name='$prl_name',add1='$add1',add2='$add2',add3='$add3',add4='$add4',prl_email='$prl_email',prl_mobile='$prl_mobile',col_std='$col_std',col_phone='$col_phone',col_fax='$col_fax',status='N' WHERE col_code = '$colcode' and status = 'Y'")   or die(mysql_error()); 
		echo'<script language=javascript>alert("Data Updaed successfully");</script>';
		 }
		else
		{

echo'<script language=javascript>alert("You have already entered your details.. If any update plz contact Administrator. ");</script>';
}
}
?>
<?php
require("header.php");

?>
<script language="javascript" type="text/javascript">
function check()
{
	if(document.principal.add1.value=="")
	{
	alert("Enter The College address field 1");
	return false;
	}
	if(document.principal.add2.value=="")
	{
	alert("Enter The College address field 2");
	
	return false;
	}
	if(document.principal.add3.value=="")
	{
	alert("Enter the College address field 3");
	
	return false;
	}
	if(document.principal.add4.value=="")
	{
	alert("Enter the College address field 4");
	
	return false;
	}
	
	if(document.principal.prl_name.value=="")
	{
	alert("Enter the Name of the Principal");
	return false;
	}
	
	 {
         var y = document.principal.prl_mobile.value;
		  if(y=="")
		{
			alert("Enter the Principal Mobile Number..");
			return false;
		}
           if(isNaN(y)||y.indexOf(" ")!=-1)
           {
              alert("Mobile Number shoud be numeric only..")
              return false; 
           }
           if (y.length<10)
           {
                alert("Mobile number should have 10 or 11 digits..");
                return false;
           }
        }

       {
         var x = document.principal.col_std.value;
		  if(x=="")
		{
			alert("Enter the college STD Number ...");
			return false;
		}
           if(isNaN(x)||x.indexOf(" ")!=-1)
           {
              alert("STD Number shoud be numeric only..")
              return false; 
           }
        }

		{
         var z = document.principal.col_phone.value;
		  if(z=="")
		{
			alert("Enter the college Phone Number ...");
			return false;
		}
           if(isNaN(z)||z.indexOf(" ")!=-1)
           {
              alert("Phone Number shoud be numeric only..")
              return false; 
           }
        }

		{
         var w = document.principal.col_fax.value;
		  if(w=="")
		{
			alert("Enter the college Fax Number ... If fax number is not availabe enter as 0000 ");
			return false;
		}
           if(isNaN(w)||w.indexOf(" ")!=-1)
           {
              alert("Fax Number shoud be numeric only. If fax number is not availabe enter as 0000..")
              return false; 
           }
        }

	if(document.principal.prl_email.value=="")
	{
	alert("Enter the Principal Email Address");
	return false;
	}
	{
	var x=document.forms["principal"]["prl_email"].value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  		{
  	alert("Not a valid e-mail address !!! Please enter valid Email...");
  	return false;
  		} }





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
							<h2>Principal's & College Deatils</h2> <?php /*?><?php echo $colcode ?><?php */?>
											
												<!--[if !IE]>start forms<![endif]--> 
														<!--[if !IE]>start forms<![endif]-->

<form id="principal" name="principal" method="post" action="">
<table width="99%" border="0">
  <tr> 
      <td width="5%"><span class="style10">1.</span></td>
    <td colspan="2"><span class="style10">Name of the College :</span> </td>
    <td width="55%">  <input type="text" size="100" readonly="true"  name="col_name" id="col_name" value="<?php echo $row['col_name']; ?>"  style="font:Arial, Helvetica, sans-serif;color:#D400AA;" />	 </td>
    <td width="0%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style10">2.</span></td>
    <td width="22%"> <span class="style10">College Address: </span></td>
    <td width="18%"><span class="style10">Address 1 : </span></td>
    <td><input type="text" size="50" maxlength="500" name="add1" id="add1" value="" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="right"></div></td>
    <td> <span class="style10"> Address 2 :</span> </td>
    <td><input type="text" size="50" maxlength="100" name="add2" id="add2" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="right"></div></td>
    <td><span class="style10"> Address 3 :</span></td>
    <td><input type="text" size="50" maxlength="100" name="add3" id="add3" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="right"> </div></td>
    <td><span class="style10">Address 4 : </span></td>
    <td><input type="text" size="50" maxlength="100" name="add4" id="add4" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
     <td>&nbsp;</td>
     <td colspan="2">&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
    <td><span class="style10">5.</span></td>
    <td colspan="2"><span class="style10">Name of the Principal : </span></td>
    <td><input type="text" size="30" maxlength="100" name="prl_name" id="prl_name" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td><span class="style10">6.</span></td>
    <td colspan="2"><span class="style10">Principal's Mobile Number :</span> </td>
    <td><input type="text" size="11" maxlength="11" name="prl_mobile" id="prl_mobile" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"></td>
	<td>&nbsp;</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td><span class="style10">7.</span></td>
    <td colspan="2"><span class="style10">College STD Code : </span></td>
    <td><input type="text" size="10" maxlength="10" name="col_std" id="col_std" style="font:Arial, Helvetica, sans-serif;color:#D400AA;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style2">(i.e) 04147</span></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td><span class="style10">9.</span></td>
    <td colspan="2"><span class="style10">College Phone Number : </span></td>
    <td><input type="text" size="20" maxlength="20" name="col_phone" id="col_phone" style="font:Arial, Helvetica, sans-serif;color:#D400AA;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="style2">(i.e) 24478564 </span></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td><span class="style10">10.</span></td>
    <td colspan="2"><span class="style10">College Fax Number : </span></td>
    <td><input type="text" size="20" maxlength="20" name="col_fax" id="col_fax" style="font:Arial, Helvetica, sans-serif;color:#D400AA;">
      &nbsp;&nbsp;&nbsp;&nbsp;<span class="style2">&nbsp;(i.e) 24478650</span> <span class="style3">(if fax number not available enter &quot;00000&quot; ) </span></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td><span class="style10">11.</span></td>
    <td colspan="2"><span class="style10">Principal's Official email Id : </span></td>
    <td><input type="text" size="60" maxlength="60" name="prl_email" id="prl_email" style="font:Arial, Helvetica, sans-serif;color:#D400AA;"> </td>
    <td>&nbsp;</td>
  </tr>
 
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
