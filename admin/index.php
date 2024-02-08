<?php 
session_start();
if (!isset($_SESSION["admincode"])) {
	header("location:login.php");
}
include_once 'header.php';

?>
<div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row">
                     <div class="col-sm-12">
                        <h3 class="page-title">Welcome <?php echo $adminschname ?> </h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-one w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-user-graduate"></i>
                              </div>
                              <div class="db-info">
                              	<?php 
                              	include_once 'function.php';
                              	$studno = mysqli_query($link, "SELECT * FROM stud_profile WHERE school_id='$adminschid' ");
                              	$studcount = mysqli_num_rows($studno);
                              	
                                 echo "<h3>$studcount</h3>";
                                 ?>
                                 <h6> Students </h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-two w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-user"></i>
                              </div>
                              <div class="db-info">
                              	<?php
                                 $teano = mysqli_query($link, "SELECT * FROM teachers WHERE school_id = '$adminschid' ");
                              	$teacount = mysqli_num_rows($teano);
                              	
                                 echo "<h3>$teacount</h3>";
                                 ?>
                                 <h6>Teachers</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-three w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-book-open"></i>
                              </div>
                              <div class="db-info">
                                 <h3>3</h3>
                                 <h6>Categories</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-four w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-building"></i>
                              </div>
                              <div class="db-info">
                                 <h3>20+</h3>
                                 <h6>Classes</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
               <p>Copyright © 2023 Tony Cheta Group of Schools</p>
            </footer>
         </div>
      </div>
      
   </body>
   
</html>