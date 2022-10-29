<?php
session_start();
ob_start();
require("config.php");
if(!isset($_SESSION['userid']))
{
header("location:login.php");
}

if(isset($_REQUEST['update']))
{
$update=mysql_query("update tbl_settings set set_title='".$_REQUEST['set_title']."',set_year='".$_REQUEST['set_year']."',set_page='".$_REQUEST['set_page']."' where set_id='1'")or die(mysql_error());
header("Location:settings.php?msg=Success");
}
require("header.php");
$query=mysql_query("select * from tbl_settings") or die(mysql_error());
$result=mysql_fetch_array($query);
?>
<script language="javascript" type="text/javascript">
function logval()
{
	if(document.setting.set_title.value=="")
	{
	alert("Enter The Title");
	document.setting.set_title.focus();
	return false;
	}
	if(document.setting.set_year.value=="")
	{
	alert("Enter The Current Year");
	document.setting.set_year.focus();
	return false;
	}
	if(document.setting.set_page.value=="")
	{
	alert("Enter The Pageing Size");
	document.setting.set_page.focus();
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
  <tr>
    <th colspan="3" style="background-color:#CCCCCC;border: 1px solid #999999;">Setting's</th>
  </tr>
  <tr class="content">
    <td width="17%" align="right">Site Title</td>
    <td width="83%"><input type="text" name="set_title" id="set_title" value="<?php echo $result['set_title']; ?>" class="medium_input" size="70"></td>
  <tr class="content">
    <td align="right">Year</td>
    <td><input type="text"  name="set_year" id="set_year" value="<?php echo $result['set_year']; ?>" class="medium_input"></td>
  </tr>
  <tr class="content">
    <td align="right">Pageing Size</td>
    <td><input type="text"  name="set_page" id="set_page" value="<?php echo $result['set_page']; ?>" class="medium_input"></td>
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