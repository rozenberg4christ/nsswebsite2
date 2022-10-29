<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

ob_start();
session_unset();
session_destroy();
echo '<script language="javascript">alert("Thank you !!! You are succesfully logged out !!!"); window.location = "login.php"; </script>';
?>