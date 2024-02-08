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

<?php 
  if (isset($_GET['select'])) {
	$subject = $_GET['select'];
	echo $subject;
	$findstudent = mysqli_query($link, "SELECT * FROM stud_profile WHERE class='$class' && school_id='$schid' ");
	if(mysqli_num_rows($findstudent) == 0){
       echo "No Students Found";
	}else{
		echo "<table class='table table-inline'> 
			<tr> <th> Name </th> 
				<th> 1st CA </th>
				<th> 2nd CA </th> 
				<th> Exam </th> 
				<th> </th> </tr> 

				 ";

				foreach ($findstudent as $s) {
				$pup = $s['stud_name']; 

				echo "
				        <tr>
						<form action='insertrecord.php' method='get'>
						<td> $pup </td>
						<td> <input type='number' max='20' name='ca1' class='form-control' required> </td> 
						<td> <input type='number' max='20' name='ca2' class='form-control' required > </td> 
						<td> <input type='number' max='60' name='exam' class='form-control' required> </td> 
						<input type='text' hidden='' name='student' value='$pup'>
						<input type='text' hidden='' name='school_id' value='$schid' >
						<input type='' hidden='' name='class' value='$class'>
						<input type='' hidden='' name='category' value='$category'>
						<input type='' hidden='' name='subject' value='$subject'>


						<td><button type='submit' class='btn btn-primary'><i class='ti-pencil-alt'></i></button></td>						
				    </form> 
				     
				  "; 

	}
  }
}

if(isset($_GET['ca1']) && isset($_GET['ca2']) && isset($_GET['exam']) ){
    $ca1 = $_GET['ca1'];
	$ca2 = $_GET['ca2'];
	$exam = $_GET['exam'];
	$subject = $_GET['select'];
	$name = $_GET['student'];


	$checkrecords = mysqli_query($link, "SELECT * FROM resultdata WHERE student = '$name' && class='$class' && category = '$category' && school_id = '$schid' && subject_name = '$subject' ");
     if (mysqli_num_rows($checkrecords) == 1) {
		echo "Results has been entered before";
	 }else{
		$insert = mysqli_query($link, "INSERT INTO `resultdata` (`id`, `school_id`, `student`, `subject_name`, `ca1`, `ca2`, `exam`, `term`, `session`, `class`, `category`) 
		                   VALUES (NULL, '$schid', '$name', '$subject', '$ca1', '$ca2', '$exam', '$term', '$session', '$class', '$category'); ");
		if($insert){
			echo "Record Inserted";	
			echo "<script> window.location.href='compile.php?select=$subject'; </script> " ;		
		}
	 }
  }
?>


