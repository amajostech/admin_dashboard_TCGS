<?php 
include_once 'header.php';


if (isset($_GET['delete'])) {
	$delid = $_GET['delete'];
	echo "$id";
	$delete = mysqli_query($link, "DELETE FROM notifications WHERE id='$delid' ");
	if ($delete) {
		echo "<div class='page-wrapper'>
        <div class='content container-fluid'>
        <div class='page-header'>
        <div class='row'>
        <div class='col-sm-12'><div class='form-control'> Notification has been Deleted </div>
        <div class='form-control btn btn-primary'><a href='notifications.php'>Return to Notifications</a></div>";
	}else{
		echo "<div class='form-control'> Student Record could not be found or has been previously deleted </div> ";
	}
}
?>

