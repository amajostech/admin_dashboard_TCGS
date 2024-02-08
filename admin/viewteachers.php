<?php 
include_once 'header.php';

if (isset($_GET['view'])) {
	$id = $_GET['view'];
	$fetch = mysqli_query($link, "SELECT * FROM teachers WHERE id='$id' ");
      foreach ($fetch as $std) {
        $id = $std['id'];
	              $nm = $std['name'];
	              $cla = $std['class'];
	              $em = $std['email'];
	              $co = $std['phone'];
			      $scat = $std['category'];
	              $scode = $std['scode'];
	              $add = $std['address'];
      echo "

<div class='page-wrapper'>
<div class='content container-fluid'>
<div class='page-header'>
<div class='row'>
<div class='col-sm-12'>
<h3 class='page-title'>Teacher Details</h3>
<ul class='breadcrumb'>
<li class='breadcrumb-item'><a href='teachers.php'>Teachers</a></li>
<li class='breadcrumb-item active'>Teacher Details</li>
</ul>
</div>
</div>
</div>
<div class='card'>
<div class='card-body'>
<div class='row'>
<div class='col-md-12'>
<div class='about-info'>
<h4>About Teacher</h4>
<div class='media mt-3'>
<img src='assets/img/user2.png' class='mr-3' alt='...'>
<div class='media-body'>
<ul>
<li>
<span class='title-span'>Full Name : </span>
<span class='info-span'>$nm</span>
</li>
<li>
<span class='title-span'>Class : </span>
<span class='info-span'>$cla</span>
</li>
<li>
<span class='title-span'>Special Code : </span>
<span class='info-span'>$scode</span>
</li>
<li>
<span class='title-span'>Contact : </span>
<span class='info-span'>$co</span>
</li>
<li>
<span class='title-span'>Email : </span>
<span class='info-span'>$em</span>
</li>
</ul>
</div>
</div>
<div class='row mt-3'>

<hr>
<div class='col-md-12'>
<h5>Permanent Address</h5>
<p>$add</p>
</div>
</div>


</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>

<footer>
<p>Copyright © 2022 QAD.</p>
</footer>

</div>

</div>
";


   }
}

if (isset($_GET['delete'])) {
	$delid = $_GET['delete'];
	echo "$id";
	$delete = mysqli_query($link, "DELETE FROM teachers WHERE id='$delid' ");
	if ($delete) {
		echo "<div class='page-wrapper'>
        <div class='content container-fluid'>
        <div class='page-header'>
        <div class='row'>
        <div class='col-sm-12'><div class='form-control'> Student has been Deleted </div>
        <div class='form-control btn btn-primary'><a href='students.php'>Return to Students List</a></div>";
	}else{
		echo "<div class='form-control'> Student Record could not be found or has been previously deleted </div> ";
	}
}
?>

