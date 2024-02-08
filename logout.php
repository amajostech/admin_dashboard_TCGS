<?php 
session_start();
session_destroy();
unset($_SESSION['usercode']);
header("location:header.php");
?>