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
								<li class="breadcrumb-item active">Edit</li>
							</ol>
						</div>
					</div>
				</div>
<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<p>	Select Subject </p>
							<form action="edit.php" method="get">
						<?php
							echo "<div class='form-group row'>
								<select name='subject' class='col-sm-9 form-control'>";
							$gets = mysqli_query($link, "SELECT * FROM subjects WHERE category='$category' && school_id='$schid' ");
							foreach ($gets as $stu) {
								$sn = $stu['subject_name'];
								echo "<option value='$sn'>$sn</option>";
	}
	echo "</select> 
	  <div class='form-group row'>
	    <input type='submit' class='btn btn-primary' value='Edit'>
	  </div>
	  </div>
	   ";

?>
<div id='valid'>
	

<?php 

if(isset($_GET['subject'])){
	$subject = $_GET['subject'];
	
	$getstudents = mysqli_query($link, "SELECT * FROM resultdata WHERE category='$category' && class='$class' && session='$session' && term='$term' && school_id='$schid' && subject_name='$subject' ");
	if(mysqli_num_rows($getstudents) == 0){
		echo "There are no Students Found Offering this Subject in this class";
	}else{
		echo "<table class='table table-inline'> 
			<tr> <th> Name </th> 
				<th> 1st CA </th>
				<th> 2nd CA </th> 
				<th> Exam </th> </tr> 
				 ";

				foreach ($getstudents as $s) {
				$pup = $s['student']; 
				$ca1 = $s['ca1'];
				$ca2 = $s['ca2'];
				$exam = $s['exam'];
				$id = $s['id'];

				echo "<form method='get' action=''>
				   <tr>				
					<td>$pup</td>
					<td><input type='number' class='form-control' name='ca1' value='$ca1' max='20'></td>
					<td><input type='number' class='form-control' name='ca2' max='20' value='$ca2'></td>
					<td><input type='number' class='form-control' name='exam' max='60' value='$exam'></td>
					<input type='' hidden='' name='id' value='$id'>
					<input type='' hidden='' name='sub' value='$subject'>
					<td><button type='submit' class='btn btn-primary'><i class='ti-pencil-alt'></i></button></td>
					</tr> 
					</form>
					";
				}
	}
}

?>

<!--#Getting the Values and Using them-->
<?php 
       if(isset($_GET['ca1']) && isset($_GET['ca2']) && isset($_GET['exam']) ){
		$ca1 = $_GET['ca1'];
		$ca2 = $_GET['ca2'];
		$exam = $_GET['exam'];
		$id = $_GET['id'];
		$sub = $_GET['sub'];
        
		$updateca1 = mysqli_query($link, "UPDATE `resultdata` SET `ca1` = '$ca1' WHERE `resultdata`.`id` = $id;");
		$updateca2 = mysqli_query($link, "UPDATE `resultdata` SET `ca1` = '$ca2' WHERE `resultdata`.`id` = $id;");
		$updateca3 = mysqli_query($link, "UPDATE `resultdata` SET `exam` = '$exam' WHERE `resultdata`.`id` = $id;");

		if($updateca1 && $updateca2 && $updateca3){
			echo "Record Updated!";
			echo "<script> history.go(-1); </script>";
		}

	}
	?>

						</div>
					</div>
				</div> 
</div>