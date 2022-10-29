<?php
require("config.php");
$q=$_REQUEST["q"];
$selemail=mysql_query("select * from tbl_subject where sub_code='".$q."'");
$row=mysql_num_rows($selemail);
$result=mysql_fetch_assoc($selemail);
if($row==0)
{
echo "not exist";
}
else
{
echo $result['sub_name'];
}
?>