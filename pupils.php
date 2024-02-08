<?php 

include_once 'header.php';

?>

<div class="container">
                  <div class="col-sm-12">
                     <div class="card card-table">
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table table-hover table-center mb-0 datatable">
                                 <thead>
                                    <tr>
                                       <th>Reg No</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Contact</th>
                                       <th>Action</th> 
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <img src="" alt="">
                                 	<?php 
                                 	$getstud = mysqli_query($link, "SELECT * FROM stud_profile WHERE category='$category' && class='$class' && school_id='$schid' ");
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

	                                           <td> <img src='./admin/upload/$pass' width='50' height='50'/>  $nm</td>
	                                           <td>$em</td>
	                                           <td>$co</td>
                                              <td>
                                              <div class='action'>
                                          <form action='viewpupil.php'>
                                             <button type='submit' name='view' value='$id' class='btn btn-sm bg-success-light mr-2'>
                                             <i class='ti-eye'></i>
                                             </a>
                                             <button type='submit' name='edit' value='$id' class='btn btn-sm bg-success-light mr-2'>
                                             <i class='ti-pencil-alt'></i>
                                             </a>
                                             <button type='submit' name='delete' value='$id' class='btn btn-sm bg-danger-light'>
                                             <i class='ti-trash'></i>
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