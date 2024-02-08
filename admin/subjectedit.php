<?php 
include_once 'header.php';

  if (isset($_GET["delete"])) {
  	$delid = $_GET["delete"];
  	$delete = mysqli_query($link, "DELETE FROM subjects WHERE id='$delid' ");
  	if ($delete) {
  		echo "<div class='page-wrapper'><h3 class='text-danger'>Deleted</h3></div>);";
  	}
  }

?>
