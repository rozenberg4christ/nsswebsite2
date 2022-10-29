<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "welcome123";
$dbdatabase = "nss";
$config_basedir = "https://www.annauniv.edu/nss";
	$db = mysql_connect($dbhost, $dbuser, $dbpassword);
	mysql_select_db($dbdatabase, $db);

?>
