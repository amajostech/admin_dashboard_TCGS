<?php 
  error_reporting(0);
  include_once 'header.php';
  include_once 'function.php';

?>

<div class="container mt-0">
	<div class="row breadcrumb-bar">
		<div class="col-md-6">
			<h3 class="block-title">Compile Results</h3>
		</div>
		<div class="col-md-6">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.html">
						<span class="ti-home"></span>
					</a>
				</li>
				<li class="breadcrumb-item">Results</li>
				<li class="breadcrumb-item active">Compile</li>
			</ol>
		</div>
	</div>
				</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="widget-area-2 proclinic-box-shadow">
				<p>	Select Subject </p>
				<form action="compile2.php" method="get" id="input-form">
			<?php
				echo "<div class='form-group row'>
					<select name='select' class='col-sm-9 form-control'>";
				$gets = mysqli_query($link, "SELECT * FROM subjects WHERE category='$category' && school_id='$schid' ");
				foreach ($gets as $stu) {
					$sn = $stu['subject_name'];
					echo "<option value='$sn'>$sn</option>";
}
	echo "</select> 
	  <div class='form-group row'>
	    <input type='submit' class='btn btn-primary' value='Compile'>
	  </div>
	  </div>
	   ";

?>