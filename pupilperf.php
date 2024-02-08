<?php 

  include_once 'header.php';
  include_once 'function.php';

?>
<div class="container mt-0">
					<div class="row breadcrumb-bar">
						<div class="col-md-6">
							<h3 class="block-title">  </h3>
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
							<p>	Select Pupil </p>
							<form action="" method="get">
						<?php
							echo "<div class='form-group row'>
								<select name='subject' class='col-sm-9 form-control'>";
							$gets = mysqli_query($link, "SELECT * FROM stud_profile WHERE category='$category' && school_id='$schid' && class='$class' ");
							foreach ($gets as $stu) {
								$sn = $stu['stud_name'];
								echo "<option value='$sn'>$sn</option>";
	}
	echo "</select></div> 
	  <div class='form-group row'>
	    <input type='submit' class='btn btn-primary' value='View Result'>
	  </div>
	  
	   ";

?>

<?php 
if(isset($_GET['subject'])){
	$subject = $_GET['subject'];
	
	$getstudents = mysqli_query($link, "SELECT * FROM resultdata WHERE category='$category' && class='$class' && session='$session' && term='$term' && school_id='$schid' && student='$subject' ");
	if(mysqli_num_rows($getstudents) == 0){
		echo "There is no Data Found ...";
	}else{
    echo "RESULT FOR $subject 
	    <table class='table table-inline'> 
        <tr> <th> Name </th> 
            <th> 1st CA </th>
            <th> 2nd CA </th> 
            <th> Exam </th> </tr> ";

            foreach ($getstudents as $s) {
            $pup = $s['subject_name']; 
            $ca1 = $s['ca1'];
            $ca2 = $s['ca2'];
            $exam = $s['exam'];
            $id = $s['id'];

            echo "<tr>
                <td>$pup</td>
                <td>$ca1</td>
                <td>$ca2</td>
                <td>$exam</td>
                </tr>
                ";
            } 
        }
}

?>

						</div>
					</div>
				</div> 
</div>
		