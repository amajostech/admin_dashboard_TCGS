<?php 
 include_once 'header.php';
 include_once '../function.php';


?>
<div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title">Students</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Admin Dashboard</a></li>
                           <li class="breadcrumb-item active">Students List</li>
                        </ul>
                     </div>
                     
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card card-table">
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table table-hover table-center mb-0 datatable">
                                 <thead>
                                    <tr>
                                       <th>Reg No</th>
                                       <th>Name</th>
                                       <th>Class</th>
                                       <th>Category</th>
                                       <th>DOB</th>
                                       <th>Email</th>
                                       <th>Mobile Number</th>
                                       <th>Address</th>                                       
                                       <th class="text-right">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	<?php 
                                 	$getstud = mysqli_query($link, "SELECT * FROM stud_profile");
                                 	foreach ($getstud as $std) {
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

	                                  echo "<tr>
	                                           <td>$reg</td>
	                                           <td>
	                                             <h2 class='table-avatar'>
	                                                <a href='viewstudents.php' class='avatar avatar-sm mr-2'>
	                                                <img class='avatar-img rounded-circle' src='upload/$pass' alt='$nm Passport'></a>
	                                                <a href='#'>$nm</a>
	                                             </h2>
	                                           </td>
	                                           <td>$c</td>
	                                           <td>$scat</td>
	                                           <td>$dob</td>
	                                           <td>$em</td>
	                                           <td>$co</td>
	                                           <td>$add</td>
	                                           <td class='text-right'>
                                          <div class='action'>
                                          <form action='viewstudents.php'>
                                             <button type='submit' name='view' value='$id' class='btn btn-sm bg-success-light mr-2'>
                                             <i class='fas fa-eye'></i>
                                             </a>
                                             <button type='submit' name='delete' value='$id' class='btn btn-sm bg-danger-light'>
                                             <i class='fas fa-trash'></i>
                                             </a>
                                             </form>
                                          </div>
                                       </td>
	                                        </tr>";

                                 	}

                                 	?>
                                    
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <footer>
               <p>Copyright © 2022 Queen AD Schools.</p>
            </footer>
         </div>
      </div>