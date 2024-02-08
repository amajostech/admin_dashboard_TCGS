<?php 
 include_once 'header.php';
?>

<div class="container mt-0">
					<div class="row breadcrumb-bar">
						<div class="col-md-6">
							<h3 class="block-title">Individual Termly Reports </h3>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.html">
										<span class="ti-home"></span>
									</a>
								</li>
								<li class="breadcrumb-item">Reports</li>
								<li class="breadcrumb-item active">Termly Reports</li>
							</ol>
						</div>
					</div>
</div>

<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<p>
								Select the subjects to view the scores for each students
							</p>
							<form action="termreport.php" method="get">
			<?php 
                              

	

	echo "<div class='form-group row'>
	      <select name='subject' class='form-control col-sm-12'>";
	$getsub = mysqli_query($link, "SELECT * FROM subjects WHERE category='$category'");
	foreach ($getsub as $sub) {
		$sb = $sub['subject'];
		echo "<option value='$sb'>$sb</option>";
	}
	echo "
	   
	   <input type='submit'  value='Get Result Details' class='btn btn-success form-control'>
	   </div>
	   </form>";

	

?>
<div id='valid'>
	<?php 

    if (isset($_GET['subject'])) {
    	$sub = $_GET['subject'];
    	$getdetail = mysqli_query($link, "SELECT * FROM resultdata WHERE subject='$sub' && category='$category' && class='$class' && term='$term' && session='$session' ");
    	echo "<br><b>$sub</b> for <b>$class</b>";
   	  echo "<table class='table table-responsive container'>
   	  <tr>
   	  <th>Student Name</th>
   	  <th>First CA</th>
   	  <th>Second CA</th>
   	  <th>Exam</th>
   	  <th>Total</th>
   	  <th>Grade</th>
   	  <th>Remark</th>
   	  </tr>
   	  ";
      foreach ($getdetail as $gr) {
      	$rsub = $gr['student'];
	$rca1 = $gr['ca1'];
	$rca2 = $gr['ca2'];
	$rex = $gr['exam'];
	$tot = $rca1 + $rca2 + $rex;
	$rtot += $tot;

if ($tot >= 80) {
		$rem = 'Distinction';
		$grd = 'A1';
	}
	elseif ($tot >= 70) {
		$rem = 'Excellent';
		$grd = 'B2';
	}
	elseif ($tot >= 65) {
		$rem = 'V Good';
		$grd = 'B3';
	}
	elseif ($tot >= 60) {
		$rem = 'Good';
		$grd = 'C4';
	}
	elseif($tot >= 55){
		$rem = 'Upper Credit';
		$grd = 'C5';
	}
	elseif ($tot >= 50) {
		$rem = 'Lower Credit';
		$grd = 'C6';
	}
	elseif ($tot >= 46) {
		$rem = 'Pass';
		$grd = 'D7';
	}
	elseif ($tot >= 40) {
		$rem = 'Pass';
		$grd = 'E8';
	}
	else{
       $grd = 'F9';
       $rem = 'Fail';
       	}



# Display Results

echo "<td>$rsub</td>
      <td>$rca1</td>
      <td>$rca2</td>
      <td>$rex</td>
      <td>$tot</td>
      <td>$grd</td>
      <td>$rem</td></tr>";

  }

    }

	?> 
	</div>
	  </div>
		</div> 
</div>