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
$dt=date('Y-m-d');
$status='Y';
if($_REQUEST['select_tbl']=="login")
{
$target_path = "temp/";
$target_path = $target_path . basename($_FILES['file_upload']['name']); 
move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_path);

$path_to_csv = $target_path;
$csv_delimiter = ",";	           
$testing_mode = 1;                 
$handle = fopen ($path_to_csv,"r"); 
$rsc=0;
while ($data = fgetcsv ($handle, 1000, $csv_delimiter))
{
if(($data[0]!='')&&($data[1]!='')&&($data[2]!='')&&($data[3]!='')&&($data[4]!=''))
{
    $rsc++;
	$col_code = $data[0];
	$col_name= $data[1];
	$log_name = mysql_escape_string($data[2]);
	$log_pass = base64_encode(mysql_escape_string($data[3]));
	$log_status = $data[4];
$update=mysql_query("INSERT INTO tbl_login (col_code,col_name,log_name,log_pass,log_status) VALUES ('$col_code','$col_name','$log_name','$log_pass','$log_status')")or die(mysql_error());
}
}
echo'<script language="javascript">alert("'.$rsc.' User(s) Added!");</script>';
fclose ($handle);
unlink($path_to_csv);
echo'<script language=javascript>window.location.href="loginsettings.php?msg=Success"</script>';
}

if($_REQUEST['select_tbl']=="internal")
{
$sc_dt=date("Y-m-d");
$target_path = "temp/";
$target_path = $target_path . basename($_FILES['file_upload']['name']); 
move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_path);

$path_to_csv = $target_path;
$csv_delimiter = ",";	           
$testing_mode = 1;                 
$handle = fopen ($path_to_csv,"r"); 
$rsc=0;
while ($data = fgetcsv ($handle, 1000, $csv_delimiter))
{
if(($data[0]!='')&&($data[1]!='')&&($data[2]!='')&&($data[3]!='')&&($data[4]!='')&&($data[5]!='')&&($data[6]!=''))
{
    $rsc++;
	$col_code = $data[0];
	$b_code= $data[1];
	$sub_code= $data[2];
	$sc_nos = $data[3];
	$sub_code = mysql_escape_string($data[4]);
	$sub_code = str_replace("|", ",", $sub_code);
	$sc_user = mysql_escape_string($data[5]);
	$sc_pass = base64_encode(mysql_escape_string($data[6]));
$update=mysql_query("INSERT INTO tbl_subcontinent (sc_user,sc_pass,col_code,b_code,sc_sem,sc_nos,sub_code,sc_dt,sc_status) VALUES ('$sc_user','$sc_pass','$col_code','$b_code','$sc_sem','$sc_nos','$sub_code','$sc_dt','$status')")or die(mysql_error());
}
}
echo'<script language="javascript">alert("'.$rsc.' User(s) Added!");</script>';
fclose ($handle);
unlink($path_to_csv);
echo'<script language=javascript>window.location.href="loginsettings.php?msg=Success"</script>';
}

if($_REQUEST['select_tbl']=="pm")
{
$target_path = "temp/";
$target_path = $target_path . basename($_FILES['file_upload']['name']); 
move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_path);

$path_to_csv = $target_path;
$csv_delimiter = ",";	           
$testing_mode = 1;                 
$handle = fopen ($path_to_csv,"r"); 
$rsc=0;
while ($data = fgetcsv ($handle, 1000, $csv_delimiter))
{
if(($data[0]!='')&&($data[1]!='')&&($data[2]!='')&&($data[3]!=''))
{
    $rsc++;
	$col_code = $data[0];
	$b_code= $data[1];
	$sub_code= $data[2];
	$pm_reg= $data[3];

$update=mysql_query("INSERT INTO tbl_practicalmark(col_id,b_code,sub_code,pm_reg,pm_date,pm_status) VALUES ('$col_code','$b_code','$sub_code','$pm_reg','$dt','$status')")or die(mysql_error());
}
}
echo'<script language="javascript">alert("'.$rsc.' Practical Mark(s) Added!");</script>';
fclose ($handle);
unlink($path_to_csv);
echo'<script language=javascript>window.location.href="index.php?msg=Success"</script>';
}
}
require("header.php");
?>
<script language="javascript" type="text/javascript">
function logval()
{
var f=document.add;
	if(f.select_tbl.value=="")
	{
	alert("Select Upload DB to which Table");
	f.select_tbl.focus();
	return false;
	}
    if(f.file_upload.value=="")
    {
	alert("Browse the uploaded file");
	f.file_upload.focus();
	return false;
	}
    if(f.file_upload.value!="")
    {
		var img=f.file_upload.value;
		var pos=img.lastIndexOf('.');
		if(pos<0)
		{
			alert("Unsupported file format");
			f.file_upload.focus();
			return false;
		}
		if(pos>=0)
		{
			var mainext=img.substr(pos+1);
			if((mainext!='csv')&&(mainext!='CSV'))
			{
				alert("Only Support CSV Format");
				f.file_upload.focus();
				return false;
			}
		 }
	}
}
</script>	
<form id="add" name="add" method="post" action="" enctype="multipart/form-data">
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
				
<table width="70%" border="0" cellpadding="6" cellspacing="6" class="table_wrapper">
  <tr>
    <td width="23%" align="right">Select Table</td>
    <td width="77%">
<select name="select_tbl" id="select_tbl">
<option value="">---Select Table---</option>
<option value="login">Login Table</option>
<option value="internal">Internal Login Table</option>
<option value="pm">Practical Marks Table</option>
</select>
</td>
  </tr>
  <tr class="content">
    <td align="right">Upload File  </td>
    <td><input type="file" name="file_upload" id="file_upload" accept="application/msexcel"/>&nbsp;&nbsp;&nbsp;*Note: Upload Only &ldquo;*.csv&rdquo; Files.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="update" id="update" value="Upload DB" onclick="return logval();" ></td>
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