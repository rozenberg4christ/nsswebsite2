<?php
require("config.php");
$q=$_REQUEST["q"];
$sele_pm=mysql_query("select * from tbl_practicalmark where col_id='".$q."'");
$pmr=mysql_fetch_array($sele_pm);
$selemail=mysql_query("select * from tbl_colleges where col_code='".$pmr['col_id']."'");
$row=mysql_num_rows($selemail);
$result=mysql_fetch_assoc($selemail);
if($row==0)
{
echo "not exist";
}
else
{
echo $result['col_name'];
}
?>