<?php 
include_once 'header.php';
?>

<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Add Teachers</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="teachers.html">Teachers</a></li>
<li class="breadcrumb-item active">Add Teachers</li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<form>
<div class="row">
<div class="col-12">
<h5 class="form-title"><span>Basic Details</span></h5>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Full Name</label>
<input type="text" class="form-control" name='name' required>
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Contact</label>
<input type="number" class="form-control" name='contact' required>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name='email' required>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Address</label>
<input type="text" class="form-control" name='address' required>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Category</label>
<select name='category' class='form-control' required>
<?php 
	   $getcat = mysqli_query($link, "SELECT * FROM category WHERE school_id='$adminschid' ");
	   foreach ($getcat as $cl) {
		$cat = $cl['category'];
		  echo "<option value='$cat'> $cat </option> ";
	   }
	  ?>
   </select>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Class</label>
<select name='class' class='form-control' required>
      <?php 
	   $getclass = mysqli_query($link, "SELECT * FROM class WHERE school_id='$adminschid' ");
	   foreach ($getclass as $cl) {
		$cla = $cl['class'];
		  echo "<option value='$cla'> $cla </option> ";
	   }
	  ?>
</select> 
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Special Code</label>
<input class="form-control" type="text" name='code' required>
</div>
</div>

</div>

<div class="col-12">
<button type="submit" class="btn btn-primary">Add Teacher</button>
</div>
</div>
<?php 

if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['contact']) && isset($_GET['address'])) {
	$nm = $_GET['name'];
	$ph = $_GET['contact'];
	$em = $_GET['email'];
	$ad = $_GET['address'];
	$cl = $_GET['class'];
	$ct = $_GET['category'];
	$sc = $_GET['code'];

	$check = mysqli_query($link, "SELECT * FROM teachers WHERE name='$nm' && email='$em' && phone='$ph' && class='$cl' && category='$ct' && address='$ad' ");
	if (mysqli_num_rows($check) == 1) {
		echo "<div class='form-control'><h4 class='text-danger'>Teacher Already Exists</h4></div>";
	}else{
		$insert = mysqli_query($link, "INSERT INTO `teachers`(`id`, `school_id`,`name`,`email`,`phone`,`address`,`category`,`class`,`scode`) VALUES(NULL, '$adminschid', '$nm','$em','$ph','$ad', '$ct','$cl','$sc' )");
		if ($insert) {
			echo "<div class='form-control'><h3 class='text-success'>Teacher Added Successfully</h3></div>";
		}else{
			echo "<div class='form-control'><h3 class='text-danger'>There was an Error while trying to store the details</h3></div>";
		}
	}
}


?>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

</div>