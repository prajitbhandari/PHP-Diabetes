<?php
session_start();
session_destroy();
setcookie('docEmail',null,time()-1);
header('location:doctorlogin.php');
?>
