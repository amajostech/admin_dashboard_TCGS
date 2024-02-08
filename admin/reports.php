<?php 
 include_once 'header.php';
 include_once '../function.php';


?>
<div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title">Reports/Complaints</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.php">Admin Dashboard</a></li>
                           <li class="breadcrumb-item active">Reports List</li>
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
                                       <th>Reporter</th>
                                       <th>Subject</th>
                                       <th>Body</th>
                                       <th class='text-right'>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	<?php 
                                 	$getstud = mysqli_query($link, "SELECT * FROM reports");
                                 	foreach ($getstud as $std) {
                                 	  $id = $std['id'];
	                                  $nm = $std['name'];
	                                  $subj = $std['subj'];
	                                  $bd = $std['body'];
	                                  

	                                  echo "<tr>
	                                           <td>$id</td>
	                                           <td>$nm</td>
	                                           <td>$subj</td>
	                                           <td>$bd</td>
	                                           
	                                           <td class='text-right'>
                                          <div class='action'>
                                          <form action='reports.php'>
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

      <?php 
         if (isset($_GET['delete'])) {
         	$get = $_GET['delete'];
         	$delete = mysqli_query($link, "DELETE FROM reports WHERE id='$get'");
         	if ($delete) {
         		echo "<script>
         		    var al = alert('Deleted');
         		    </script>";
         	}
         }
      ?>