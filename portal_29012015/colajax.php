<?php
require("config.php");
$q=$_REQUEST["q"];
$selemail=mysql_query("select * from tbl_colleges where col_code='".$q."'");
$row=mysql_num_rows($selemail);
$result=mysql_fetch_assoc($selemail);
if($row==0)
{
echo "not exist";
}
else
{
?>
<div class="row">
<label>College Code:</label>
<div style="float: left;width: 520px;font-weight:bold;">
<span><?php echo $result['col_code']; ?><input name="col_code" id="col_code" type="hidden" value="<?php echo $result['col_code']; ?>" readonly="true"/></span>
</div>
</div>
<div class="row">
<label>College Name:</label>
<h3><?php echo $result['col_name']; ?></h3>
<label>Address:</label> <?php echo $result['col_address']; ?>
</div>
<?php
}
?>