<?php 

  include_once 'header.php';

?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Add Subject</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="subjects.html">Subject</a></li>
<li class="breadcrumb-item active">Add Subject</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<form method="get">
<div class="row">
<div class="col-12">
<h5 class="form-title"><span>Subject Information</span></h5>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Subject Name</label>
<input type="text" class="form-control" name="subject">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Category</label>
<select name='category' class="form-control col-sm-12 " required>
<?php 
			$fetchcategory = mysqli_query($link, "SELECT * FROM category WHERE school_id='$adminschid' ");
			if(mysqli_num_rows($fetchcategory) == 0){
				echo "<script> alert('There is no Category or Class Yet. Add a class before before continuing...'); 
							window.location.href='category.php'; </script> ";
			}else{
				
				foreach ($fetchcategory as $f) {
				$catname = $f['category'];
				
				echo "<option value='$catname'> $catname </option> ";
				}
			}
																				
	?>
</select>
</div>
</div>
<div class="col-12">
<button type="submit" class="btn btn-primary">Add Subject</button>
</div>
</div>
</form>
<?php 

  if (isset($_GET['subject'])) {
  	$sub = $_GET['subject'];
  	$cat = $_GET['category'];

  	$check = mysqli_query($link, "SELECT * FROM `subjects` WHERE school_id='$adminschid' && subject_name='$sub' && category='$cat' ");
  	if (mysqli_num_rows($check) == 1) {
  		echo "<br> 
  		        <label class='form-control btn btn-warning'> The Subject Already Exists. Try Entering Another One </label>
  		     ";
  	}else{
  		$ins = mysqli_query($link, "INSERT INTO `subjects`(`id`, `school_id`, `subject_name`,`category`) VALUES(NULL, '$adminschid', '$sub', '$cat') ");
  		if ($ins) {
  			echo "<br> 
  		        <label class='form-control btn btn-success text-white'> The Subject <b>$sub</b></sub> Has been Added for <b>$cat</b> Category </label>";
  		}
  	}
  }

?>
</div>
</div>
</div>
</div>
</div>
</div>