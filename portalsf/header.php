<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	require("config.php");
$qq=mysql_query("select * from tbl_settings") or die(mysql_error());
$rr=mysql_fetch_array($qq);
$title = $rr['set_title'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">	
<head>
	<title><?php echo $title; ?></title>
	<link href="stylesheet.css" rel="stylesheet">
<link rel="stylesheet" href="css/datepicker.css" type="text/css">
<script type="text/javascript" src="js/datepicker.js"></script>
</head>
<body>
 <!--onLoad="disp('document.practicalmark.college_code.value');disp1('document.practicalmark.br_code.value');disp2('document.practicalmark.sub_code.value');"-->
	<div id="header">
	<h1><?php echo $title; ?><br/> </h1>
</div>
	<div id="menu">
		<a href="home.php">Home</a>	</div>
	<div id="container">
		<div id="bar">
			<?php
				
				require("bar.php");
			?>
		</div>

		<div id="main" style="vertical-align:top;">
