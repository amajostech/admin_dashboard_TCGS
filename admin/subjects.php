<?php 
include_once 'header.php';
?>
<div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title">Subjects</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                           <li class="breadcrumb-item active">Subjects</li>
                        </ul>
                     </div>
                     <div class="col-auto text-right float-right ml-auto">
                        <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
                        <a href="add-subject.html" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                       <th>Category</th>
                                       <th class="text-right">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	<?php 
                                      $fetch = mysqli_query($link, "SELECT * FROM subjects WHERE school_id = '$adminschid' ");
                                      foreach ($fetch as $f) {
                                      	$id = $f['id'];
                                      	$nm = $f['subject_name'];
                                      	$cat = $f['category'];

                                      	echo "<tr>
                                      	        <td>$id</td>
                                      	        <td>$nm</td>
                                      	        <td>$cat</td>
                                      	        <td class='text-right'>
                                      	           <div class='actions'>
                                      	           <form action='subjectedit.php'>
                                                    <button type='submit' class='btn btn-sm bg-danger-light' name='delete' value='$id'>
                                                    <i class='fas fa-trash'></i></button>
                                                    </a>
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