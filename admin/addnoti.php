<?php 
include_once 'header.php';
?>

<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Add Notifications</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="teachers.html">Notifications</a></li>
<li class="breadcrumb-item active">Add Notifications</li>
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
<div class="col-12 col-sm-12">
<div class="form-group">
<label>Notification Message</label>
<textarea placeholder="Enter Notification Here ..." class="form-control" name='notification' required></textarea>
</div>
</div>


<div class="col-12">
<button type="submit" class="btn btn-primary">Add Notification</button>
</div>
</div>
<?php 

if (isset($_GET['notification'])) {
	$nm = $_GET['notification'];
	$dt = date("Y-m-d");
	

	$check = mysqli_query($link, "SELECT * FROM notifications WHERE message='$nm'");
	if (mysqli_num_rows($check) == 1) {
		echo "<br><div class='form-control'><h4 class='text-danger'>Notification Already Exists</h4></div>";
	}else{
		$insert = mysqli_query($link, "INSERT INTO `notifications`(`id`, `school_id`, `message`,`date`) VALUES(NULL, '$adminschid', '$nm','$dt')");
		if ($insert) {
			echo "<br><div class='form-control'><h4 class='text-success'>Notification Added Successfully</h4></div>";
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