<?php
session_start();
ob_start();
require("config.php");

if(!isset($_SESSION['userid']) && !isset($_SESSION['user_id_guest']))
{
header("location:login.php");
}
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

?>
<?php
require("header.php");

?>
	

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
	font-size: 14px;
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
							
							<table width="90%" border="1" bordercolor="#0062C4" cellspacing="1" cellpadding="1"><tr ><td><h3 style="font-size:19px; color:#D76B00" ><span class="style11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to -   </span> <?php echo $row['col_code']; ?> </h3>
							<h2 style="font-size:19px; color:#0000DD">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['col_name']; ?></h2>
							</td></tr></table><br/>
							<table width="90%" border="1" bordercolor="#0062C4" cellspacing="1" cellpadding="1">
  <tr>
    <td><ul>
	  <p class="style16">Read the Following Carefully : </p>
		  <li class="style13">
        <div align="justify">The web portal is designed and deveoped for NSS, Anna University, Chennai - 25. </div>
      </li> 
      <div align="justify"><span class="style13"><br/>
        </span>
      </div>
      <li class="style13">
        <div align="justify">In order to avoid the routine paper works we decided to use electronic data for all our communications were ever is possible.</div>
      </li> 
      <div align="justify"><span class="style13"><br/>
        </span>
      </div>
      <li class="style13">
        <div align="justify">Fill the activities organised in your College (both FU &amp; SF units) using respective menu available in the left menu bar. Period of the activities should be from 1st April 2014 to 31st March 2015. </div>
      </li> 
	  <div align="justify"><span class="style13"><br/>
        </span>
      </div>
      <li class="style13">
        <div align="justify">Fill the activities Participated by your College  (both FU &amp; SF units) using respective menu available in the left menu bar. Period of the activities should be from 1st April 2014 to 31st March 2015.</div>
      </li> 
      <div align="justify"><br/>
        </div>
		
		<li class="style13">
        <div align="justify">Fill about your College PO details (Only for FU) using respective menu . More information read instruction menu.</div>
      </li> 
	  <div align="justify"><span class="style13"><br/>
        </span>
      </div>
      <li class="style13">
        <div align="justify">Fill up the basic communication detailes about your college for urgent correspondence using &quot;College Details form&quot; menu available in the left menu bar. </div>
      </li> 
      <div align="justify"><br/>
        </div>
		<li class="style13">
        <div align="justify">Fill the details about Volunteers in your college (Only for FU)</div>
      </li>
	  <div align="justify"><br/>
        </div>
		<li class="style13">
        <div align="justify">Fill the details about Special Camp conducted in your college (Only for FU)</div>
      </li>
	  <div align="justify"><br/>
        </div>
		<li class="style13">
        <div align="justify">Make sure that you are entering correct informations. Once you submitted you can not edit the forms. For any accidental mistakes, please contact our system adminisrator.</div>
      </li> 
      <div align="justify"><br/>
        </div>
		<li class="style13">
        <div align="justify">Before proceed with forms read the instruction carefully in the left menu bar. </div>
      </li> 
      <div align="justify"><br/>
        </div>
			<li class="style13">
        <div align="justify">If you find any difficulty / Technical Issues please contact : 044 - 2235 8409 / 8410.   </div>
      </li> 
      <div align="justify"><br/>
        </div>
			<li class="style13">
        <div align="justify">Your kind cooperation in this regard will be highly appreciated.</div>
      </li> 
      <div align="justify"><br/>
        </div>
    </ul></td>
   </tr>
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
