<?php 
  session_start();
  ob_start();
  if (!isset($_SESSION["usercode"])) {
    header("Location: login.php");
    exit();
  }
  else{
   include_once 'header.php';
  }
?>
<div class="container mt-0">
				<div class="row breadcrumb-bar">
					<div class="col-md-6">
						<h3 class="block-title">Quick Statistics</h3>
					</div>
					<div class="col-md-6">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="index.html">
									<span class="ti-home"></span>
								</a>
							</li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
					</div>
				</div>
			</div>
			<!-- /Page Title -->
			<!-- /Breadcrumb -->
			<!-- Main Content -->
			<div class="container home">
				<div class="row">
					<!-- Widget Item -->
					<div class="col-md-4">
						<div class="widget-area proclinic-box-shadow color-red">
							<div class="widget-left">
								<span class="ti-user"></span>
							</div>
							<div class="widget-right">
								<h4 class="wiget-title">Students</h4>
								<span class="numeric color-red">
								<?php 
								   $stud = mysqli_query($link, "SELECT * FROM stud_profile WHERE class='$class' && category='$category' && school_id='$schid' ");
								   $studcount = mysqli_num_rows($stud);
								   echo "$studcount";
								 ?> 
								</span>
								<span>Total Number of Students in your Class</span>
							</div>
						</div>
					</div>
					<!-- /Widget Item -->
					<!-- Widget Item -->
					<div class="col-md-4">
						<div class="widget-area proclinic-box-shadow color-green">
							<div class="widget-left">
								<span class="ti-bar-chart"></span>
							</div>
							<div class="widget-right">
								<h4 class="wiget-title">Notifications</h4>
								<span class="numeric color-green">
                                  <?php 
								   $prof = mysqli_query($link, "SELECT * FROM notifications WHERE school_id='$schid' ");
								   $profcount = mysqli_num_rows($prof);
								   echo "$profcount";
								 ?>
								</span><br>
								<span>All Notifications</span>
							</div>
						</div>
					</div>
					<!-- /Widget Item -->
					<!-- Widget Item -->
					<div class="col-md-4">
						<div class="widget-area proclinic-box-shadow color-yellow">
							<div class="widget-left">
								<span class="ti-book"></span>
							</div>
							<div class="widget-right">
								<h4 class="wiget-title">Subjects</h4>
								<span class="numeric color-yellow"> 
									<?php 
								   $sub = mysqli_query($link, "SELECT * FROM subjects WHERE category='$category' ");
								   $subcount = mysqli_num_rows($sub);
								   echo "$subcount";
								 ?>
								</span>
								<span> Subjects available for this class </span>
							</div>
						</div>
					</div>
					<!-- /Widget Item -->
				</div>