<?php 
$scode = $_GET['admincode'];
include 'function.php';
$chkadmin = mysqli_query($link, "SELECT * FROM admin_login WHERE scode = '$scode' ");
if (mysqli_num_rows($chkadmin) >= 1) {
	session_start();
	$_SESSION['admincode'] = $scode;
	header("Location: index.php");
}else{
	echo "Unauthorized User.....";
}

?>