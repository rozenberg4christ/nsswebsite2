<?php
session_start();
ob_start();
require("config.php");
if(!isset($_SESSION['userid']))
{
header("location:login.php");
}
$redir=base64_decode($_REQUEST['redir']);
$logid= base64_decode($_REQUEST['id']);
if(isset($_REQUEST['update']))
{
$update=mysql_query("update tbl_finalmark set col_id='".$_REQUEST['col_code']."',b_code='".$_REQUEST['b_code']."',sub_code='".$_REQUEST['sub_code']."',fm_status='".$_REQUEST['fm_status']."' where fm_id='".$logid."'")or die(mysql_error());
	if(isset($_REQUEST['redir']))
	{
	echo'<script language=javascript>window.location.href="'.$redir.'"</script>';
	}
	else
	{
	echo'<script language=javascript>window.location.href="finalmarklist.php?msg=Success"</script>';
	}
}
require("header.php");
$query=mysql_query("select * from tbl_finalmark where fm_id='".$logid."'") or die(mysql_error());
$result=mysql_fetch_array($query);
?>
<script language="javascript" type="text/javascript">
function logval()
{
	if(document.setting.col_code.value=="")
	{
	alert("Enter The College Code");
	document.setting.col_code.focus();
	return false;
	}
	if(document.setting.b_code.value=="")
	{
	alert("Enter The Branch Code");
	document.setting.b_code.focus();
	return false;
	}
	if(document.setting.sub_code.value=="")
	{
	alert("Enter The Subject Code");
	document.setting.sub_code.focus();
	return false;
	}
}
</script>	
<form id="setting" name="setting" method="post" action="">
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
    <td align="right">College Code </td>
    <td><input type="text"  name="col_code" id="col_code" value="<?php echo $result['col_id']; ?>" class="medium_input"></td>
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
    <td>Status</td>
    <td><select name="fm_status" id="fm_status">
								<?php 
									if($result['fm_status']=="Y")
									{
								?>
								<option value="Y" selected="selected">Active</option>
								<option value="N">Inactive</option>
								<?php
									}
									else
									{
								?>
								<option value="Y">Active</option>
								<option value="N" selected="selected">Inactive</option>
								<?php
									}
								?>
							</select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="update" id="update" value="Update" onclick="return logval();" ></td>
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