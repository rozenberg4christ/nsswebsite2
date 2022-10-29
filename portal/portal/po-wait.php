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

$selemail=mysql_query("SELECT * FROM principal_details WHERE col_code = ".$_SESSION['colcode']."");
$row=mysql_num_rows($selemail);
$result=mysql_fetch_assoc($selemail);
$number_of_unit=$result['unit'];
$college_name=$result['col_name'];
$college_code=$result['col_code'];
echo $number_of_unit;

?>

<?php
require("header.php");

?>



<!--
	/*
	* Add edit delete rows dynamically using jquery and php
	* http://www.amitpatil.me/
	*
	* @version
	* 2.0 (4/19/2014)
	* 
	* @copyright
	* Copyright (C) 2014-2015 
	*
	* @Auther
	* Amit Patil
	* Maharashtra (India)
	*
	* @license
	* This file is part of Add edit delete rows dynamically using jquery and php.
	* 
	* Add edit delete rows dynamically using jquery and php is freeware script. you can redistribute it and/or 
	* modify it under the terms of the GNU Lesser General Public License as published by
	* the Free Software Foundation, either version 3 of the License, or
	* (at your option) any later version.
	* 
	* Add edit delete rows dynamically using jquery and php is distributed in the hope that it will be useful,
	* but WITHOUT ANY WARRANTY; without even the implied warranty of
	* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	* GNU General Public License for more details.
	* 
	* You should have received a copy of the GNU General Public License
	* along with this script.  If not, see <http://www.gnu.org/copyleft/lesser.html>.
	*/
-->
<?php
	require_once("ajax_table.class.php");
	$obj = new ajax_table();
	$records = $obj->getRecords();
	//echo phpinfo();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title>College PO Details</title>
  <script>
	 // Column names must be identical to the actual column names in the database, if you dont want to reveal the column names, you can map them with the different names at the server side.
	 var columns = new Array("col_code","po_name","contact","email","trained");
	 var placeholder = new Array("Enter Code","Enter PO Name","Enter contact No","Enter Email","");
	 var inputType = new Array("text","text","text","text","select");
	 var table = "tableDemo";
	 var selectOpt = new Array("Yes","No");;


	 // Set button class names 
	 var savebutton = "ajaxSave";
	 var deletebutton = "ajaxDelete";
	 var editbutton = "ajaxEdit";
	 var updatebutton = "ajaxUpdate";
	 var cancelbutton = "cancel";
	 
	 var saveImage = "images/save.png"
	 var editImage = "images/edit.png"
	 var deleteImage = "images/remove.png"
	 var cancelImage = "images/back.png"
	 var updateImage = "images/save.png"

	 // Set highlight animation delay (higher the value longer will be the animation)
	 var saveAnimationDelay = 3000; 
	 var deleteAnimationDelay = 1000;
	  
	 // 2 effects available available 1) slide 2) flash
	 var effect = "flash"; 
  
  </script>
  <script src="js/jquery-1.11.0.min.js"></script>	
  <script src="js/jquery-ui.js"></script>	
  <script src="js/script.js"></script>	
  <link rel="stylesheet" href="css/style.css">
 </head>
 <body>

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
							<h2 style="font:bold; color:#FF0000;">Insert <?php echo $number_of_unit; ?> Members only </h2>
							* Enter the <?php echo $number_of_unit; ?> number of PO details as mentioned above.  <br/>
							 * Don't enter more than <?php echo $number_of_unit; ?> number/s of PO details.<br/>
							 * Edit and delete option is also possible. Use edit option if any spelling mistakes. How ever avoid to use delete option.<br/> * Delete option given only for any accidental mistakes.<br/><br/>
							
											
												<!--[if !IE]>start forms<![endif]--> 
														<!--[if !IE]>start forms<![endif]-->




<table border="0" class="tableDemo bordered">
		<tr class="ajaxTitle">
			<th width="2%">SI.No</th>
			<th width="6%">College Code</th>
			<!--<th width="36%">College Name</th>-->
			<th width="12%">PO Name</th>
			<th width="10%">Contact No</th>
			<th width="20%">email</th>			
			<th width="3%">trained</th>
			<th width="14%">Action</th>
		</tr>
		<?php
		if(count($records)){
		 $i = 1;	
		 $eachRecord= 0;
		 foreach($records as $key=>$eachRecord){
		?>
		<tr id="<?=$eachRecord['id'];?>">
			<td><?=$i++;?></td>
			<td class="col_code"><?=$eachRecord['col_code'];?></td>
			<?php /*?><td class="col_name"><?=$eachRecord['col_name'];?></td><?php */?>
			<td class="po_name"><?=$eachRecord['po_name'];?></td>
			<td class="contact"><?=$eachRecord['contact'];?></td>
			<td class="email"><?=$eachRecord['email'];?></td>
			<td class="trained"><?=$eachRecord['trained'];?></td>
			<td>
				<a href="javascript:;" id="<?=$eachRecord['id'];?>" class="ajaxEdit"><img src="" class="eimage" ></a>
				<a href="javascript:;" id="<?=$eachRecord['id'];?>" class="ajaxDelete"><img src="" class="dimage" ></a>
			</td>
		</tr>
		<?php }
		}
		?>
	</table> 
												
												
												
												
												
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
