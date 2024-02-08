<?php 

  include_once 'header.php';
  include_once 'function.php';

?>

<div class="container mt-0">
	<div class="row breadcrumb-bar">
		<div class="col-md-6">
			<h3 class="block-title">Edit Results</h3>
		</div>
		<div class="col-md-6">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.html">
						<span class="ti-home"></span>
					</a>
				</li>
				<li class="breadcrumb-item">Results</li>
				<li class="breadcrumb-item active"> View Result </li>
			</ol>
		</div>
	</div>
</div>
<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<p>	Select Student </p>
							<form action="viewresult.php" method="get">
						<?php
							echo "<div class='form-group row'>
								<select name='stud_name' class='col-sm-9 form-control'>";
							$gets = mysqli_query($link, "SELECT * FROM stud_profile WHERE category='$category' && school_id='$schid' && class = '$class' ");
							foreach ($gets as $stu) {
								$sn = $stu['stud_name'];
								echo "<option value='$sn'>$sn</option>";
	}
	echo "</select> 
	  <div class='form-group row'>
	  <input type='' hidden='' name='class' value='$class'>
	  <input type='' hidden='' name='category' value='$category'>
	  <input type='' hidden='' name='term' value='$term'>
	  <input type='' hidden='' name='session' value='$session'>
	  <input type='' hidden='' name='school_id' value='$schid'>
	    <input type='submit' class='btn btn-primary' value='View Result'>
	  </div>
	  </div>
	   ";

?>
