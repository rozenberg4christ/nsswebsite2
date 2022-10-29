<?php
	session_start();
	require("config.php");
$qq=mysql_query("select * from tbl_settings") or die(mysql_error());
$rr=mysql_fetch_array($qq);
$title = $rr['set_title'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">	
<head>
	<title><?php echo $title; ?></title>
	<link href="stylesheet.css" rel="stylesheet">
<link rel="StyleSheet" href="cal_styles.css" type="text/css" />
<SCRIPT src="cal_classes.js" type=text/javascript></SCRIPT>
</head>
<body>
	<div id="header">
	<h1><?php echo $title; ?></h1>
	</div>
	<div id="menu">
		<a href="<?php echo $config_basedir; ?>">Home</a>
	</div>
	<div id="container">
		<div id="main1">
