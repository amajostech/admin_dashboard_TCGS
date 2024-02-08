<?php 
session_start();
include_once 'function.php';
if (isset($_GET["code"])) {
	$code = $_GET["code"];
    $chkuser = mysqli_query($link, "SELECT * FROM teachers WHERE scode='$code' ");
    if (mysqli_num_rows($chkuser) == 1) {
    	$_SESSION["usercode"] = $code; 
    	header("Location: index.php");
    	exit();
    }else{
    	echo "No User with this Special code was found";
    }
}

?>
