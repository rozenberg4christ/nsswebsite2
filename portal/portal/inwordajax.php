<?php
session_start();
ob_start();
require("config.php");
if(!isset($_SESSION['userid']) && !isset($_SESSION['user_id_guest']))
{
header("location:login.php");
exit;
}
$insert=mysql_query("UPDATE tbl_practicalmark SET pm_mark='".$_REQUEST["q"]."' where pm_id='".$_REQUEST["id"]."'");
function convert_number($number) 
{ 
if($number=="-1")
{
return "<font color='#CC0000'>Absent</font>";
break;
}
    if (($number < 0) || ($number > 999999999)) 
    { 
    throw new Exception("Number is out of range");
    } 

    $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
    $number -= $Hn * 100; 
    $Dn = floor($number / 10);       /* Tens (deca) */ 
    $n = $number % 10;               /* Ones */ 
    $res = ""; 

    if ($Hn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($Hn) . " Zero Zero"; 
    } 

    $ones = array("Zero", "One", "Two", "Three", "Four", "Five", "Six", 
        "Seven", "Eight", "Nine", "One Zero", "One One", "One Two", "One Three", 
        "One Four", "One Five", "One Six", "One Seven", "One Eight", 
        "One Nine"); 
    $tens = array("", "", "Two", "Three", "Four", "Five", "Six", 
        "Seven", "Eight", "Nine"); 

    $tens1 = array("", "", "Two Zero", "Three Zero", "Four Zero", "Five Zero", "Six Zero", 
        "Seven Zero", "Eight Zero", "Nine Zero"); 

    if ($Dn || $n) 
    { 
        if ($Dn < 2) 
        { 
            $res .= $ones[$Dn * 10 + $n]; 
        } 
        else 
        { 
			if($n==0)
			{
            $res .= $tens1[$Dn]; 
			}
			else
			{
            $res .= $tens[$Dn]; 
			}


            if ($n) 
            { 
                $res .= " " . $ones[$n]; 
            } 
        } 
    } 

    if (empty($res)) 
    { 
        $res = "Zero"; 
    } 

    return $res; 
}
$brc1=$_REQUEST["brc1"];
$suc1=$_REQUEST["suc1"];
$coc1=$_REQUEST["coc1"];
$sel_fm1=mysql_query("select * from tbl_practicalmark where b_code='".$brc1."' and sub_code='".$suc1."' and col_id='".$coc1."' and pm_mark='' and pm_status='Y'");
$row_fm1=mysql_num_rows($sel_fm1);
if($row_fm1==0)
{
$sdesc="not in";
}
else
{
$no="";
while($rfm1=mysql_fetch_array($sel_fm1))
{
$no.=$rfm1['pm_reg'];
$no.=",";
}
$ln=strlen($no);
$no=substr($no,0,$ln-1);
$cnt=strlen($no); 
if($cnt>70)
{
$tt=substr($no,0,73);
$sdesc=$tt."...";
}
else
{
$sdesc=$no;
}
}

echo $sdesc."|".convert_number($_REQUEST["q"]);
?>