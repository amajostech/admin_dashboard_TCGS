<?php 
  include 'header.php';
  echo "<div class='container mt-0'>
					<div class='row breadcrumb-bar'>
						<div class='col-md-6'>
							<h3 class='block-title'>Search Results</h3>
						</div>
						<div class='col-md-6'>
							<ol class='breadcrumb'>
								<li class='breadcrumb-item'>
									<a href='index.php'>
										<span class='ti-home'></span>
									</a>
								</li>
								<li class='breadcrumb-item'>Results</li>
								<li class='breadcrumb-item active'>Search</li>
							</ol>
						</div>
					</div>
				</div>
				<div class='container'>
				<div class='row'>
					<div class='col-md-12'>
						<div class='widget-area-2 proclinic-box-shadow'>
							
							
					";

  if (isset($_GET['s'])) {
  	 $s = $_GET['s'];


  	 if ($s == "") {
  	 	header("Location: index.php");
  	 }else{
  	 	$fetch = mysqli_query($link, "SELECT * FROM stud_profile WHERE stud_name LIKE '%$s%' OR email LIKE '%$s% && school_id = $schid' ");
  	 	$fetchno = mysqli_num_rows($fetch);
  	 	if($fetchno >= 1){
  	 	     echo "
  	 	             <table class='table table-responsive'>
                     <tr>
                     <th>ID</th>
                     <th>Student Name</th>
                     <th>Reg. No</th>
                     <th>Class</th>
                     <th>Email</th>
                     <th>DOB</th>
                     <th>Phone</th>
                     <th>Gender</th>
                     <th>Religion</th>
                     </tr>
  	 	           ";
  	 		foreach ($fetch as $std) {
             	  $id = $std['id'];
                  $nm = $std['stud_name'];
                  $reg = $std['reg_no'];
                  $c = $std['class'];
                  $em = $std['email'];
		          $dob = $std['dob'];
	              $co = $std['phone'];
			      $scat = $std['category'];
                  $pass = $std['passport'];
                  $add = $std['homeadd'];
                  $ge = $std['gender'];
                  $re = $std['religion'];

                  echo "<tr>
                          <td>$id</td>
                          <td>$nm</td>
                          <td>$reg</td>
                          <td>$c</td>
                          <td>$em</td>
                          <td>$dob</td>
                          <td>$co</td>
                          <td>$ge</td>
                          <td>$re</td>
                       </tr>";
              }
              echo "</div></div></div>";
          }
          }
      }
?>