<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

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

$selemail=mysql_query("SELECT * FROM principal_details WHERE col_code = $colcode");
$row=mysql_num_rows($selemail);
$result=mysql_fetch_assoc($selemail);
$number_of_unit=$result['unit'];
echo $number_of_unit;

$entered_po=mysql_query("SELECT * FROM po_details WHERE col_code = $colcode");
$entered_po_rows = mysql_num_rows($entered_po);
$entered_po_array = mysql_fetch_array($entered_po);
$entered=mysql_fetch_assoc($entered_po);

?>

<?php
if(isset($_REQUEST['submit']))
{
$po_name=$_REQUEST['po_name'];
$po_contact=$_REQUEST['po_contact'];
$po_mail=$_REQUEST['po_mail'];
$trained=$_REQUEST['trained'];
$query = "SELECT * FROM po_details WHERE col_code = $colcode";
$sqlsearch = mysql_query($query);
$resultcount = mysql_num_rows($sqlsearch);
if ($resultcount < $number_of_unit) 
		{
		mysql_query("INSERT INTO po_details (col_code,po_name,contact,email,trained) VALUES ('$colcode','$po_name','$po_contact','$po_mail','$trained')")   or die(mysql_error()); 
		echo'<script language=javascript>alert("Data entered successfully");</script>';
		 }
		else
		{
echo'<script language=javascript>alert("You have entered all the PO details.. If any update plz contact Administrator. ");</script>';
}
}
?>



<?php
require("header.php");

?>
<script language="javascript" type="text/javascript">
function check()
{
	if(document.po.po_name.value=="")
	{
	alert("Enter the PO Name ");
	document.po.po_name.focus();
	return false;
	}
	if(document.po.po_contact.value=="")
	{
	alert("Enter the PO Contact No. ");
	document.po.po_contact.focus();
	return false;
	}
	if(document.po.po_mail.value=="")
	{
	alert("Enter the PO Mail ");
	document.po.po_mail.focus();
	return false;
	}
	if(document.po.trained.value=="")
	{
	alert("Select the trained ");
	return false;
	}
	
}
</script>	

<!--[if !IE]>start section<![endif]-->
<style type="text/css">
<!--
.style10 {
	font-size: 16px;
	font-weight: bold;
	color: #0000DD;
}
.style10 {font-size: 14px; font-weight: bold; color: #3333FF; }
.style11 {font-size: 12px; font-weight: bold; color: #006600; }
.style12 {font-size: 12px; font-weight: bold; color: #FF3333; }
.style14 {font-size: 20}
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
							<h2>PO Deatils</h2>	<br/>
							<span class="style11"> Totally <span class="style14">"<?php echo $number_of_unit; ?>"</span> No / Nos. of PO Details only allowed to enter your College </span>  <br/> 
							<span class="style12">You have entered <span class="style14">"<?php echo $entered_po_rows; ?>"</span> No / Nos. of PO details</span>
											  <!--[if !IE]>start forms<![endif]--> 
														<!--[if !IE]>start forms<![endif]-->

<form id="po" name="po" method="post" action="">
  <table width="90%" border="0">
    <tr>
      <td class="style10">&nbsp;</td>
      <td >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr>
      <td width="12%" class="style10">&nbsp;</td>
      <td ><span class="style10">Name of the College :</span> </td>
      <td ><input type="text" size="50" readonly="true"  name="col_name" id="col_name" value="<?php echo $_SESSION['colname'] ?>"  style="font:Arial, Helvetica, sans-serif;color:#D400AA;" />      </td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="style10">Name of the PO</td>
      <td><input type="text" size="20" maxlength="20" name="po_name" id="po_name" style="font:Arial, Helvetica, sans-serif;color:#D400AA;" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="34">&nbsp;</td>
      <td class="style10">Contact No</td>
      <td><input type="text" size="20" maxlength="20" name="po_contact" id="po_contact" style="font:Arial, Helvetica, sans-serif;color:#D400AA;" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="style10">Email</td>
      <td><input type="text" size="50" maxlength="50" name="po_mail" id="po_mail" style="font:Arial, Helvetica, sans-serif;color:#D400AA;" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="style10">trained</td>
      <td><select name="trained" id="trained" style="font:Arial, Helvetica, sans-serif;color:#D400AA;" />
          <option value="Yes">Yes</option>
          <option value="No">No</option>      </td>
    </tr>
    <tr>
    
      <td width="12%"></td>
      <td width="22%"></td>
      <td width="66%"></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="22%">&nbsp;</td>
      <td width="66%"><input type="submit" name="submit" id="submit" value="submit" onclick="return check();" /></td>
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

