<?php
session_start();
ob_start();
require("config.php");
require_once("CSSPagination.class.php"); 
if(!isset($_SESSION['userid']))
{
header("location:login.php");
}
function getOwnURL() 
  { 
  $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; 
  $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; 
  $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
  return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI']; 
  } 
  
function strleft($s1, $s2) 
  { 
  return substr($s1, 0, strpos($s1, $s2)); 
  }
$cont=getOwnURL();
if(isset($_REQUEST['search']))
{
$usr=$_REQUEST['userid'];
echo'<script language=javascript>window.location.href="loginsettings1.php?uid='.base64_encode($usr).'"</script>';
}
$userid= base64_decode($_REQUEST['uid']);
$qqqq=mysql_query("select * from tbl_settings") or die(mysql_error());
$rrrr=mysql_fetch_array($qqqq);
$StartRow = 0;
$StartRow1 = 0;
$sql1="select * from tbl_login where log_name='".$userid."'";
$rowsperpage = $rrrr['set_page'];
$website = $_SERVER['PHP_SELF']."?action=college";
$pagination = new CSSPagination($sql1, $rowsperpage, $website); 
$pagination->setPage($_GET[page]); 
$qsql1 = @mysql_query($sql1, $db) or die("failed");

/*$sql3="select * from tbl_login where log_status='N'";
$rowsperpage1 = $rrrr['set_page'];
$website1 = $_SERVER['PHP_SELF']."?action1=college";
$pagination1 = new CSSPagination1($sql3, $rowsperpage1, $website1); 
$pagination1->setPage1($_GET[page1]); 
$qsql3 = @mysql_query($sql3, $connection) or die("failed");

function editrecord($thetable,$values,$theid) 
{ 
	$deleteSQL = sprintf("update %s set %s WHERE log_id='%s'",$thetable,$values,$theid);
	$Result1 = mysql_query($deleteSQL) or die(mysql_error());
} 

if(isset($_REQUEST['typea']))
{
	$i=1;
	while($i<=$rowsperpage)
	{
		$status='N';
		if($_REQUEST['selecta'.$i]!="")
		{
			//you don't need to have a redirect page if you don't want 
			$erecord=$_REQUEST['selecta'.$i];
			$sql=mysql_query("select * from tbl_login where log_id='".$erecord."'")or die(mysql_error());
			$fetch=mysql_fetch_array($sql);
			$values="log_status='".$status."'";
			editrecord("tbl_login",$values,$erecord); 
		}
		$i++;
	} 
	echo'<script language=javascript>alert("Selected rows updated successfully");</script>';
	echo'<script language=javascript>window.location.href="view_event.php"</script>';
}
if(isset($_REQUEST['typeu']))
{
	$i=1;
	while($i<=$rowsperpage)
	{
		$status='Y';
		if($_REQUEST['selectu'.$i]!="")
		{
			//you don't need to have a redirect page if you don't want 
			$erecord=$_REQUEST['selectu'.$i];
			$sql=mysql_query("select * from tbl_login where log_id='".$erecord."'")or die(mysql_error());
			$fetch=mysql_fetch_array($sql);
			$values="log_status='".$status."'";
			editrecord("tbl_login",$values,$erecord); 
		}
		$i++;
	} 
	echo'<script language=javascript>alert("Selected rows updated successfully");</script>';
	echo'<script language=javascript>window.location.href="view_event.php"</script>';
}*/
?>
<?php
require("header.php");
$query=mysql_query("select * from tbl_settings") or die(mysql_error());
$result=mysql_fetch_array($query);
?>
<script language="javascript" type="text/javascript">
function serval()
{
	if(document.ser.userid.value=="")
	{
	alert("Enter The Userid");
	document.ser.userid.focus();
	return false;
	}
}
</script>	
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
												
												<form action="" method="post" name="ser" id="ser" enctype="text/plain">
												<fieldset class="hid">
												<!--[if !IE]>start table_wrapper<![endif]-->
												<div class="table_wrapper">
													<div class="table_wrapper_inner">
	<?php
	if(isset($_REQUEST['msg']))
	{
	?>
<div style="border:1px solid #efdcb1; font-family:Verdana, Arial, Helvetica, sans-serif; background-color:#A6FFA6; text-align:center; padding-top:5px; padding-bottom:5px;width:50%; font-size:12px; display:block;"><strong>Updated!</strong> Successfully</div><br>

<?php
}
?>

				<table width="100%" border="0">
					<?php
					$RecordCount = mysql_num_rows($qsql1);
					if($RecordCount==0)
					{
					?>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
				  </tr>
					<?php
					 }
					 else
					 {	
					?>
				  <tr>
					<td>
					<table width="100%" border="1">
  <tr>
    <td width="11%">Search User ID : </td>
    <td width="14%"><input style="border: 1px solid #cecece;font-size:14px;background: #fefefe url(css/layout/site/forms/input_text2.gif) repeat-x;width: 94px; height:20px;margin: 0px 8px 0 0;" name="userid"  id="userid"/></td>
    <td width="75%"><input type="submit" name="add" id="add" value="Search" onclick="return serval();" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="all" id="all" value="Show All User(s)" onclick="window.location.href='loginsettings.php';" /></td>
  </tr>
</table>
													
													<table cellpadding="0" cellspacing="0" width="100%">
														<tbody><tr>
															<th width="27">No.</th>
															<th width="105">College Code </th>
															<th width="470">College Name</th>
															<th width="150">User Name</th>
															<th width="150">Password</th>
															<th width="76">Status</th>
															<th width="61" style="width: 56px;">Actions</th>
														</tr>
														<?php
														$sno=$pagination->getLimit() + 1;
														$sql2 = $sql1." limit " . $pagination->getLimit() . ", ". $rowsperpage; 
														$res2 = @mysql_query($sql2, $db) or die("failed");
														$i = 1;	
														$c=1;
														$k=0;		
														while($res=mysql_fetch_array($res2))
														{
														$exp_fm_dt=explode("-",$res['log_dt']);
														$eventdt=$exp_fm_dt[2]."/".$exp_fm_dt[1]."/".$exp_fm_dt[0];
														?>
														<tr <?php if($k==0) { echo 'class="first"';  } else { echo 'class="second"'; } ?> id="row<?php echo $i;?>">														
															<td><?php echo $sno;?>.</td>
															<td><?php echo $res['col_code'];?>&nbsp;</td>
															<td><?php echo $res['col_name'];?>&nbsp;</td>
															<td><?php echo $res['log_name'];?></td>
															<td><?php echo base64_decode($res['log_pass']);?></td>
															<td>
															<?php
															if($res['log_status']=='Y')
															{
															?>
															<span class="approved">Active</span>
															<?php
															}else{
															?>
															<span class="inactive">Inactive</span>
															<?php
															}
															?></td>
															<td style="width: 56px;">
																<div class="actions">
																	<ul>
																		<li><a class="details" href="#">1</a></li>
																		<li><a class="edit" href="editlogin.php?id=<?php echo base64_encode($res['log_id']); ?>">2</a></li>
																		<li><a class="delete" href="#">3</a></li>
																	</ul>
																</div>															</td>
														</tr>
													  <?php
														$c++;
														$i++;
														$k++;	
														$sno++;
														if($k==2)
														{
														$k=0;
														}
														}
														$totle=$RecordCount;
														if(isset($_REQUEST['page']))
														{$stotle=$rowsperpage*$_REQUEST['page'];}else{$stotle=1;}
														if($_REQUEST['page']==1)
														{$stotle=1;}														
														if($totle<$stotle)
														{$stotle=$totle;}														
														?>
													</tbody></table>
						</td>
				  </tr>
                        <?php
						}
						?>
			</table>
													</div>
												</div>
												<!--[if !IE]>end table_wrapper<![endif]-->
												
												<!--[if !IE]>start table menu<![endif]-->
												<div class="table_menu"><!--[if !IE]>start pagination<![endif]-->
													<ul class="right">
														<li><?php echo $pagination->showPage(); ?></li>
													</ul>
												<!--[if !IE]>end pagination<![endif]-->
												</div>
												<!--[if !IE]>start pagination<![endif]-->
												<div class="pagination">
													<span class="page_no">Page <?php echo $stotle; ?> of <?php echo $totle; ?></span>
												</div>
												<!--[if !IE]>end pagination<![endif]-->
												<!--[if !IE]>end table menu<![endif]-->
												</fieldset>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--[if !IE]>end section content top<![endif]-->
							<!--[if !IE]>start section content bottom<![endif]-->
							<!--[if !IE]>end section content bottom<![endif]-->
						</div>
						<!--[if !IE]>end section content<![endif]-->
					</div>

<?php
require("footer.php");

?>