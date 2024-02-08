<?php 
include_once 'header.php';
?>
<div class="container mt-0">
					<div class="row breadcrumb-bar">
						<div class="col-md-6">
							<h3 class="block-title">Reports | Complaints</h3>
						</div>
						<div class="col-md-6">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.html">
										<span class="ti-home"></span>
									</a>
								</li>
								<li class="breadcrumb-item">Reports</li>
								<li class="breadcrumb-item active">Make a report</li>
							</ol>
						</div>
					</div>
  </div>
<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<form action='reports.php' method='get'>
                      <div class='form-group'>
                      	<div class='col-12 col-sm-12'>
                      		<input type='text' class='form-control' name='subject' placeholder='Reports Subject'>
                      	</div>
                      </div>

                      <div class='form-group'>
                      	<div class='col-12 col-sm-12'>
                      		<textarea class='form-control' name='body' placeholder='Subjects body'></textarea>
                      	</div>
                      </div>
                      <div class='form-group'>
                      	<div class='col-12 col-sm-3'>
                      		<input type='submit' class='form-control btn btn-primary' value='Submit Report'>
                      	</div>
                      </div>
                         </form>
                     
                     <?php 
                     echo "$teacher";
                     if (isset($_GET['subject']) && isset($_GET['body'])) {
                     	$sub = $_GET['subject'];
                     	$bd = $_GET['body'];
                     	
                     	$check = mysqli_query($link, "SELECT * FROM reports WHERE subj='$sub' && body='$bd' ");
                     	if (mysqli_num_rows($check) == 1 ) {
                     		echo "<div class='text-danger'>This Report has been filed before. Please await response</div>";
                     	}else{
                     		$insert = mysqli_query($link, "INSERT INTO `reports`(`id`,`name`,`subj`,`body`) VALUES(NULL,'$teacher','$sub','$bd')  ");
                     		if ($insert) {
                     			echo "<div class='text-success'>Your Report has been Delivered</div>";
                     		}
                     	}
                     }

                     ?> 
                 </div> 
                </div>
             </div>

