<?php
session_start();
ob_start();
require("config.php");
if(!isset($_SESSION['userid']))
{
header("location:login.php");
}
$logid= base64_decode($_REQUEST['id']);
if(isset($_REQUEST['update']))
{
$log_fname=$_REQUEST['log_fname'];
$log_name=$_REQUEST['log_name'];
$log_pass=base64_encode($_REQUEST['log_pass']);
$col_code=$_REQUEST['col_code'];
$b_code=$_REQUEST['b_code'];
$sub_code=$_REQUEST['sub_code'];
$log_status='Y';
$query_ck=mysql_query("select * from tbl_login where col_code='".$col_code."' and b_code='".$b_code."' and sub_code='".$sub_code."' and log_status='Y'") or die(mysql_error());
$row_chk=mysql_num_rows($query_ck);
if($row_chk==0)
{
$update=mysql_query("INSERT INTO tbl_login (log_fname,log_name,log_pass,col_code,b_code,sub_code,log_status) VALUES ('$log_fname','$log_name','$log_pass','$col_code','$b_code','$sub_code','$log_status')")or die(mysql_error());
echo'<script language="javascript">alert("User Added Successfully!");</script>';
echo'<script language=javascript>window.location.href="loginsettings.php?msg=Success"</script>';
}
else
{
echo'<script language="javascript">alert("User already Exist!");</script>';
}
}
require("header.php");
?>
<script language="javascript" type="text/javascript">
function logval()
{
	if(document.add.log_fname.value=="")
	{
	alert("Enter The Full Name");
	document.add.log_fname.focus();
	return false;
	}
	if(document.add.log_name.value=="")
	{
	alert("Enter The User Name");
	document.add.log_name.focus();
	return false;
	}
	if(document.add.log_pass.value=="")
	{
	alert("Enter The Password");
	document.add.log_pass.focus();
	return false;
	}
	if(document.add.col_code.value=="")
	{
	alert("Enter The College Code");
	document.add.col_code.focus();
	return false;
	}
	if(document.add.b_code.value=="")
	{
	alert("Enter The Branch Code");
	document.add.b_code.focus();
	return false;
	}
	if(document.add.sub_code.value=="")
	{
	alert("Enter The Subject Code");
	document.add.sub_code.focus();
	return false;
	}
}
</script>	
<form id="add" name="add" method="post" action="">
	<?php
	if(isset($_REQUEST['msg']))
	{
	?>
<div style="border:1px solid #efdcb1; font-family:Verdana, Arial, Helvetica, sans-serif; background-color:#A6FFA6; text-align:center; padding-top:5px; padding-bottom:5px;width:50%; font-size:12px; display:block;"><strong>Updated!</strong> Successfully</div><br>

<?php
}
?>
<div class="section table_section">
						<!--[if !IE]>start title wrapper<![endif]-->
						<!--[if !IE]>end title wrapper<![endif]-->
						<!--[if !IE]>start section content<![endif]-->
						<div class="section_content">
							<!--[if !IE]>start section content top<![endif]-->
							<div class="sct">
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">
												<fieldset>
												<!--[if !IE]>start table_wrapper<![endif]-->
												<div class="table_wrapper">
													<div class="table_wrapper_inner">
				
<table width="70%" border="0" cellpadding="3" cellspacing="5" class="table_wrapper">
  
  <tr class="content">
    <td width="17%" align="right">Name</td>
    <td width="83%"><input type="text" name="log_fname" id="log_fname" value="<?php echo $result['log_fname']; ?>" class="medium_input" size="70"></td>
  </tr>
  <tr class="content">
    <td width="17%" align="right">User Name </td>
    <td width="83%"><input type="text" name="log_name" id="log_name" value="<?php echo $result['log_name']; ?>" class="medium_input"></td>
  </tr>
  <tr class="content">
    <td align="right">Password</td>
    <td><input type="text"  name="log_pass" id="log_pass" value="<?php echo base64_decode($result['log_pass']); ?>" class="medium_input"></td>
  </tr>
  <tr class="content">
    <td align="right">College Code </td>
    <td><input type="text"  name="col_code" id="col_code" value="<?php echo $result['col_code']; ?>" class="medium_input"></td>
  </tr>
  <tr class="content">
    <td align="right">Branch Code </td>
    <td><input type="text"  name="b_code" id="b_code" value="<?php echo $result['b_code']; ?>" class="medium_input"></td>
  </tr>
  <tr class="content">
    <td align="right">Subject Code </td>
    <td><input type="text"  name="sub_code" id="sub_code" value="<?php echo $result['sub_code']; ?>" class="medium_input"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="update" id="update" value="Add User" onclick="return logval();" ></td>
  </tr>
</table>				
													</div>
												</div>
												<!--[if !IE]>end table_wrapper<![endif]-->
												<!--[if !IE]>end table menu<![endif]-->
												</fieldset>
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


</form>
<?php
require("footer.php");

?>