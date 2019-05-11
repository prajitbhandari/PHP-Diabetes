<?php
session_start();
session_destroy();
setcookie('adminName',null,time()-1);
header('location:adminlogin.php');
?>
