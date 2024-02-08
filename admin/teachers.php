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
                           <li class="breadcrumb-item active">Teachers List</li>
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
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Special Code</th>
                                       <th>Category</th>
                                       <th>Email</th>
                                       <th>Mobile Number</th>
                                       <th>Address</th>                                       
                                       <th class="text-right">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	<?php 
                                 	$getstud = mysqli_query($link, "SELECT * FROM teachers WHERE school_id='$adminschid' ");
                                 	foreach ($getstud as $std) {
                                 	  $id = $std['id'];
	                                  $nm = $std['name'];
	                                  $scode = $std['scode'];
	                                  $cat = $std['category'];
	                                  $em = $std['email'];
						              $co = $std['phone'];
						              $add = $std['address'];
						              $cla = $std['class'];

	                                  echo "<tr>
	                                           <td>$id</td>
	                                           <td>$nm</td>
	                                           <td>$scode</td>
	                                           <td>$cat</td>
	                                           <td>$em</td>
	                                           <td>$co</td>
	                                           <td>$add</td>
	                                           <td class='text-right'>
                                          <div class='action'>
                                          <form action='viewteachers.php'>
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
               <p>Copyright © 2023 Tony Cheta Group Of Schools </p>
            </footer>
         </div>
      </div>