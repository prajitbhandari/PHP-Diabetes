<?php
session_start();
session_destroy();
setcookie('email',null,time()-1);
header('location:userlogin.php');
?>
