<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


ob_start();
require("config.php");
?>
<table class='visible' width='100%'cellspacing=2 cellpadding=5>
<tr><th class='visible'>Login details</th>
</tr>
<!--<tr><td style="background-color:#F9F9F9;">-->
<tr><td style="background:#CEE7FF">
<?php
if(isset($_SESSION['userid']) or isset($_SESSION['user_id_guest']))
{
if(isset($_SESSION['userid']))
{
$userid=$_SESSION['userid'];
}
else
{
$userid=$_SESSION['user_id_guest'];
}
$selectusertype=mysql_query("select * from tbl_login where log_id = '".$userid."'") or die(mysql_error());
$resultusertype=mysql_fetch_array($selectusertype);
$finaltype= "".$resultusertype['type']."" ;
$selectuser=mysql_query("select * from tbl_login where log_id = '".$userid."'") or die(mysql_error());
$resultuser=mysql_fetch_array($selectuser);
echo "Logged in as <h3> <strong > " . $resultuser['log_name'] . " <br /> " . $resultuser['col_name'] . " </strong> </h3>";
if(isset($_SESSION['userid']))
{
echo "<a href='settings.php'>Setting's</a> - ";
}
echo "<a href='logout.php'>Logout</a>";
}
?>
</td></tr>
</table>
<br />
<?php
if(isset($_SESSION['userid']))
{
?>
<table class='visible' width='100%'cellspacing=2 cellpadding=5>
<tr><th class='visible'>College details</th></tr>
<tr><td style="background-color:#CEE7FF;"><a href="colleges.php">College's</a></td></tr>
<?php /*?><tr><td style="background-color:#CEE7FF;"><a href="branchs.php">Branch's</a></td></tr><?php */?>
<!--<tr><td><a href="fees.php">College's Fees</a></td></tr>
<tr><td><a href="print_fees.php">College's Fees Print</a></td></tr>
-->
</table>
<br />
<?php
}
?>
<?php
if(isset($_SESSION['userid']))
{
?>
<table class='visible' width='100%'cellspacing=2 cellpadding=5>
<tr><th class='visible'>Login settings</th></tr>
<tr><td style="background-color:#CEE7FF;"><a href="loginsettings.php">Login CPanel</a></td></tr>
<!--<tr><td style="background-color:#CEE7FF;"><a href="vol_settings.php">Volunteers CPanel</a></td></tr>
<tr><td style="background-color:#CEE7FF;"><a href="volunteer_export_excel.php">volunteer_export_excel</a></td></tr>-->
</table>
<br />
<?php
}
?>
<table class='visible' width='100%'cellspacing=2 cellpadding=5>
<tr><th class='visible'>Form details</th></tr>
<?php
if(isset($_SESSION['userid']) or isset($_SESSION['user_id_guest']))
{
?>
<tr><td style="background-color:#CEE7FF;"><a href="home.php">Home</a></td></tr>
<tr><td style="background-color:#CEE7FF;"><a href="instructions.php">Instruction </a></td></tr>
<tr><td style="background-color:#CEE7FF;"><a href="organised.php">Activities Organised</a></td></tr>
<tr><td style="background-color:#CEE7FF;"><a href="participated.php">Activities Participated</a></td></tr>


<?php
}
if(isset($_SESSION['userid']) or isset($_SESSION['user_id_guest']) and $finaltype == 'FU')
{
?>
<tr><td style="background-color:#CEE7FF;"><a href="po.php">PO Details Form</a></td></tr>
<tr><td style="background-color:#CEE7FF;"><a href="form.php">College Details Form</a></td></tr>
<tr><td style="background-color:#CEE7FF;"><a href="volunteers.php">Volunteers Form</a></td></tr>
<tr><td style="background-color:#CEE7FF;"><a href="special_camp.php">Special Camp Form</a></td></tr>
<?php
}
?>
</table>
<br />
<?php
if(isset($_SESSION['userid']))
{
?>
<!--<table class='visible' width='100%'cellspacing=2 cellpadding=5>
<tr><th class='visible'>Database</th></tr>
<tr><td style="background-color:#CEE7FF;"><a href="uploaddb.php">Upload Database</a></td></tr>
</table>-->
<table class='visible' width='100%'cellspacing=2 cellpadding=5>
<tr><th class='visible'>Database Export</th></tr>
<!--<tr><td style="background-color:#CEE7FF;"><a href="uploaddb.php">Upload Database</a></td></tr>-->
<tr><td style="background-color:#CEE7FF;"><a href="college_details_export_excel.php">College Details Export</a></td></tr>
<tr><td style="background-color:#CEE7FF;"><a href="po_details_export_excel.php">PO Details Export </a></td></tr>
<tr><td style="background-color:#CEE7FF;"><a href="activities_organised_export_excel.php">Activities Organised Export</a></td></tr>
<tr><td style="background-color:#CEE7FF;"><a href="activities_participated_export_excel.php">Activities Participated Export</a></td></tr>
<tr><td style="background-color:#CEE7FF;"><a href="volunteer_export_excel.php">Volunteers Export</a></td></tr>
<tr><td style="background-color:#CEE7FF;"><a href="special_camp_export_excel.php">Special Camp Export </a></td></tr>

</table>
<br />
<?php
}
?>
<?php
if(isset($_SESSION['user_id_guest']))
{
?>
<!--<table class='visible' width='100%'cellspacing=0 cellpadding=5>
<tr><th class='visible'>EXTERNAL EXAMINER</th></tr>
<tr valign="top" style="background-color:#F9F9F9;"><td height="130px" align="center"><table width="90px" cellspacing="2" cellpadding="2" style="border:1px solid #999999;">
  <tr>
    <td align="center"><img src="images/facultyimages/<?php echo $resultuser['external_id']; ?>.png" width="90" height="90"/></td>
  </tr>
</table>
<span style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:11px;font-weight:bold;"><?php echo ucfirst($resultuser['external_fname']); ?> <?php echo ucfirst($resultuser['external_lname']); ?></span>
</td>
</tr>
</table>
<br />
<table class='visible' width='100%'cellspacing=0 cellpadding=5>
<tr><th class='visible'>INTERNAL EXAMINER</th></tr>
<tr valign="top" style="background-color:#F9F9F9;"><td height="130px" align="center"><table width="90px" cellspacing="2" cellpadding="2" style="border:1px solid #999999;">
  <tr>
    <td align="center"><img src="images/facultyimages/<?php echo $resultuser['internal_id']; ?>.png" width="90" height="90"/></td>
  </tr>
</table>
<span style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:11px;font-weight:bold;"><?php echo ucfirst($resultuser['internal_fname']); ?> <?php echo ucfirst($resultuser['internal_lname']); ?></span></td>
</tr>
</table>
<br />-->
<?php
}
?>