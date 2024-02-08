<?php 
 include_once 'header.php';
 include_once '../function.php';


?>
<div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title">Notifications</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Admin Dashboard</a></li>
                           <li class="breadcrumb-item active">Notifications List</li>
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
                                       <th>Notification</th>
                                       <th>Date Posted</th>
                                       <th class="text-right">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	<?php 
                                 	$getstud = mysqli_query($link, "SELECT * FROM notifications ORDER BY id DESC");
                                 	foreach ($getstud as $std) {
                                 	  $id = $std['id'];
	                                  $nm = $std['message'];
	                                  $scode = $std['date'];
	                                  

	                                  echo "<tr>
	                                           <td>$id</td>
	                                           <td>$nm</td>
	                                           <td>$scode</td>
	                                           
	                                           <td class='text-right'>
                                          <div class='action'>
                                          <form action='viewnoti.php'>
                                             <button type='submit' value='$id' class='btn btn-sm bg-success-light mr-2'>
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