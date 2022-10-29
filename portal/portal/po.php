<?php
session_start();
ob_start();
require("config.php");

if(!isset($_SESSION['userid']) && !isset($_SESSION['user_id_guest']))
{
header("location:login.php");
}

?>
<?php
require("header.php");
$college_code = "'".$_SESSION['colcode']."'";
$query1=mysql_query("select * from principal_details where col_code=$college_code") or die(mysql_error());
$results=mysql_fetch_array($query1);

?>

<?php
	require_once("ajax_table.class.php");
	$obj = new ajax_table();
	$records = $obj->getRecords();
	//echo phpinfo();
?>


  <script>
	 // Column names must be identical to the actual column names in the database, if you dont want to reveal the column names, you can map them with the different names at the server side.
	 var columns = new Array("col_code","po_name","contact","email","trained");
	 var placeholder = new Array("Enter First code","Enter Last PO Name","Enter the Contact","Enter Email","");
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
	

<!--[if !IE]>start section<![endif]-->
<style type="text/css">
<!--
.style11 {color: #008000}
.style12 {
	color: #804000;
	font-weight: bold;
}
.style13 {
	color: #640064;
	font-weight: bold;
	font-size: 16px;
}
.style15 {
	color: #804000;
	font-size: 30px;
	font-weight: bold;
}
.style16 {
	font-size: 18px;
	font-weight: bold;
	color: #A60000;
}
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
							<h2 align="center" class="style15">ONLINE WEB PORTAL </h2>
							
							<h2 style="font:bold; color:#FF0000;">Insert <?php echo $results['unit']; ?> Members only </h2>
							* Enter the <?php echo $results['unit']; ?> number/s of PO details as mentioned above.  <br/>
							 * Don't enter more than <?php echo $results['unit']; ?> number/s of PO details.<br/>
							 * Edit and delete option is also possible. Use edit option if any spelling mistakes. How ever kindly avoid to use delete option.<br/> * Delete option given only for committed any accidental mistakes in rare situation.<br/><br/>
							
							
							<br/>
							<table border="0" class="tableDemo bordered" width="98%">
		<tr class="ajaxTitle">
			<th width="2%">Sr</th>
			<th width="16%">Code</th>
			<th width="16%">PO Name</th>
			<th width="12%">Contact</th>
			<th width="20%">Email</th>
			<th width="18%">Trained</th>
			<th width="18%">Action</th>
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
			<td class="po_name"><?=$eachRecord['po_name'];?></td>
			<td class="contact"><?=$eachRecord['contact'];?></td>
			<td class="email"><?=$eachRecord['email'];?></td>
			<td class="trained"><?=$eachRecord['trained'];?></td>
			<td>
				<a href="javascript:;" id="<?=$eachRecord['id'];?>" class="ajaxEdit"><img src="" class="eimage"></a>
				<a href="javascript:;" id="<?=$eachRecord['id'];?>" class="ajaxDelete"><img src="" class="dimage"></a>			</td>
		</tr>
		<?php }
		}
		?>
	</table> 
							  <br/> <br/>

														
												<!--[if !IE]>start forms<![endif]-->
														<!--[if !IE]>start forms<![endif]-->


							



												
												
												
												
												
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
