<html><?php 

include_once 'header.php';

?>
<div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title"> Academic Records </h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#"> Records </a></li>
                           <li class="breadcrumb-item active"> View Individual Records </li>
                        </ul>
                     </div>
                  </div>
               </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                <div class="card-body">

                    <form action="" method='get'>
                        <div class="row">
                            <div class="col-12">
                            <h5 class="form-title"><span> Search Payment History</span></h5>
                            </div>

                            <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label> Enter Name </label>
                                <input type="text" name="search" id="" class="form-control">
                            </div>
                            </div>
                            
                            <div class="col-12">
                            <button type="submit" class="btn btn-primary"> Search </button>
                            </div>                            
                        </div>
                    </form>
                </div>
                <?php 
                if(isset($_GET['search'])){
                    $s = $_GET['search'];
                    echo "Search Results for " . $s;
                    $fetch = mysqli_query($link, "SELECT * FROM stud_profile WHERE stud_name LIKE '%$s%' && school_id = '$adminschid' ");
                    echo "<table class='table table-responsive'>
                         <tr> <th> Names </th> 
                              <th> Class </th>
                              <th>  </th>  </tr>
                         ";
                    foreach ($fetch as $f) {
                        $id = $f['id'];
                        $pupil = $f['stud_name'];
                        $class = $f['class'];

                        echo "<tr> <td> $pupil </td> 
                         <td>              
                          <form action='displayrecords.php'>
                         <button type='submit' name='view' value='$id' class='btn btn-sm bg-success-light mr-2'>
                         <i class='fas fa-eye'></i>
                         </a>
                         </form> 
                         </tr>";

                    }
                }

                ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
