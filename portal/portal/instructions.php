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

if(isset($_REQUEST['submit']))
{
$col_name=$_REQUEST['col_name'];
$add1=$_REQUEST['add1'];
$add2=$_REQUEST['add2'];
$add3=$_REQUEST['add3'];
$add4=$_REQUEST['add4'];
$chairman=$_REQUEST['chairman'];
$trust=$_REQUEST['trust'];
$prl_name=$_REQUEST['prl_name'];
$prl_mobile=$_REQUEST['prl_mobile'];
$col_std=$_REQUEST['col_std'];
$prl_phone=$_REQUEST['prl_phone'];
$col_phone=$_REQUEST['col_phone'];
$col_fax=$_REQUEST['col_fax'];
$prl_email=$_REQUEST['prl_email'];
$query = "SELECT * FROM principal_details WHERE col_name = '$col_name'";
$sqlsearch = mysql_query($query);
$resultcount = mysql_num_rows($sqlsearch);
if ($resultcount > 0) 
		{
		mysql_query("UPDATE principal_details SET col_name='$col_name',add1='$add1',add2='$add2',add3='$add3',add4='$add4',chairman='$chairman',trust='$trust',prl_name='$prl_name',prl_mobile='$prl_mobile',col_std='$col_std',prl_phone='$prl_phone',col_phone='$col_phone',col_fax='$col_fax',prl_email='$prl_email',status='Y' WHERE col_name = '$col_name'")   or die(mysql_error()); 
		echo'<script language=javascript>alert("Data Updaed successfully");</script>';
		 }
		else
		{
		mysql_query("insert INTO principal_details (col_name, add1, add2, add3, add4, chairman, trust, prl_name, prl_mobile, col_std, prl_phone, col_phone, col_fax, prl_email,status) VALUES('$col_name','$add1','$add2','$add3','$add4','$chairman','$trust','$prl_name','$prl_mobile','$col_std','$prl_phone','$col_phone','$col_fax','$prl_email','Y')") or die(mysql_error());  
echo'<script language=javascript>alert("Data entered successfully");</script>';
}
}
?>
<?php
require("header.php");

?>
<script language="javascript" type="text/javascript">
function check()
{
	if(document.principal.col_name.value=="")
	{
	alert("Choose the College Name");
	return false;
	}
	if(document.principal.add1.value=="")
	{
	alert("Enter The College address field 1");
	return false;
	}
	if(document.principal.add2.value=="")
	{
	alert("Enter The College address field 2");
	
	return false;
	}
	if(document.principal.add3.value=="")
	{
	alert("Enter the College address field 3");
	
	return false;
	}
	if(document.principal.add4.value=="")
	{
	alert("Enter the College address field 4");
	
	return false;
	}
	if(document.principal.chairman.value=="")
	{
	alert("Enter the Name of the Chairman");
	
	return false;
	}
	if(document.principal.trust.value=="")
	{
	alert("Enter the Name of the Trust");
	return false;
	}
	if(document.principal.prl_name.value=="")
	{
	alert("Enter the Name of the Principal");
	<!--document.setting.prl_name.value();-->
	return false;
	}
	
	 {
          var y = document.principal.prl_mobile.value;
		  if(y=="")
		{
			alert("Enter the Principal Mobile Number..");
			return false;
		}
           if(isNaN(y)||y.indexOf(" ")!=-1)
           {
              alert("Enter numeric value Only..")
              return false; 
           }
           if (y.length<10)
           {
                alert("Mobile number should have 10 or 11 digits..");
                return false;
           }
        }
	
	if(document.principal.col_std.value=="")
	{
	alert("Enter the STD Number");
	return false;
	}

	if(document.principal.prl_phone.value=="")
	{
	alert("Enter the Principal Phone Number");
	return false;
	}
	 
		
	{
	var x= document.principal.col_phone.value;
	if(x=="")
	{
	alert("Enter the College Phone Number");
	return false;
	}
	 if(isNaN(x)||x.indexOf(" ")!=-1)
           {
              alert("Enter numeric value Only..")
              return false; 
           }
	
	}
		
		
	{
	var x= document.principal.col_fax.value;
	if(x=="")
	{
	alert("Enter the College Fax Number");
	return false;
	}
	 if(isNaN(x)||x.indexOf(" ")!=-1)
           {
              alert("Enter numeric value Only..")
              return false; 
           }
	
	}
		if(document.principal.prl_email.value=="")
	{
	alert("Enter the Principal Email Address");
	return false;
	}


	{
	var x=document.forms["principal"]["prl_email"].value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  		{
  	alert("Not a valid e-mail address");
  	return false;
  		} }


{
var extensions = new Array("jpg","jpeg","gif","png","bmp");
var image_file = document.principal.image.value;
var image_length = document.principal.image.value.length;
var pos = image_file.lastIndexOf('.') + 1;
var ext = image_file.substring(pos, image_length);
var final_ext = ext.toLowerCase();
for (i = 0; i < extensions.length; i++)
{
    if(extensions[i] == final_ext)
    {
    return true;
    }
}
alert(" Upload an image file with one of the following extensions: "+ extensions.join(', ') +".");
return false;
}




}
</script>	

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
	font-size: 15px;
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
							<table width="90%" border="1" bordercolor="#0062C4" cellspacing="1" cellpadding="1">
  <tr>
    <td><ul>
	  <p class="style16">Instructions for filling Activities Organised form (For both Funded & Self Financing Unit) </p>
		  <div class="style13"><div align="justify">Fill the activities organised in your College using respective menu available in the left menu bar. <br/>Period of the activities organised should be from 1st April 2014 to 31st March 2015. <br/>
		  Make sure that you have entered data, in order to avoid the repitation.</div>
      </div> 
      
	  <p class="style16">Instructions for filling Activities Participated form (For both Funded & Self Financing Unit) </p>
		  <div class="style13"><div align="justify">Fill the activities participated by your College using respective menu available in the left menu bar. <br/>Period of the activities participated should be from 1st April 2014 to 31st March 2015. <br/>
		  Make sure that you have entered data, in order to avoid the repitation.</div>
      </div> 
      
	   <p class="style16">Instructions for filling PO Details form (For both Funded & Self Financing Unit) </p>
		  <div class="style13"><div align="justify">Fill the PO details of your College using respective menu available in the left menu bar. <br/>Approved nos. of PO of your College is given in the top of respective page in red color. <br/>Don't enter more than number/s of PO details mentioned above.  <br/> Edit and delete option is also possible. Use edit option if any spelling mistakes. How ever avoid to use delete option. <br/>Delete option given only for any accidental mistakes.</div>
      </div> 
      
	  <p class="style16">Instructions for filling the College Details Form (For Funded Unit only) </p>
		  <div class="style13">
        <div align="justify">Fill the College mailing particulars using "College details form" menu</div>
      </div> 
      
      <div class="style13">
        <div align="justify">All the fields are mandatory.</div>
      </div> 
      <div class="style13">
        <div align="justify">If fax number is not available mention as '0000'. </div>
      </div> 
		<p class="style16">Instructions for Filling Volunteers Details Form (For Funded Unit only) </p>
		<div class="style13">
        <div align="justify">Fill the Volunteers details of your College using respective menu available in the left menu bar. <br/>Make sure that you are entered valid data. <br/> Once you are submited the form you cannot edit the form.
		</div>
      </div> 
	  
	  <p class="style16">Instructions for Filling Special Camp Details Form (For Funded Unit only) </p>
		<div class="style13">
        <div align="justify">Fill the Special Camp details of your College using respective menu available in the left menu bar. <br/>Make sure that you are entered valid data. <br/> Once you are submited the form you cannot edit the form.
		</div>
      </div> 
		
    </ul></td>
   </tr>
</table>  <br/> <br/>

														
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
