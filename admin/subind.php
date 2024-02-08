<html><?php 

include_once 'header.php';

?>
<div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title"> Master List </h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="students.html"> Master List </a></li>
                           <li class="breadcrumb-item active"> Subject Resports /  List </li>
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
                            <h5 class="form-title"><span> Select Class and Subject  </span></h5>
                            </div>
 
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                <div class="col-md-6">
                                <label for="">Select a Category</label>
                                <select name="category" class="form-control">
                                    <?php 
                                    $getcat = mysqli_query($link, "SELECT * FROM category WHERE school_id = '$adminschid' ");
                                    
                                        foreach ($getcat as $gt) {
                                            $catnm = $gt['category'];
                                            echo "<option value='$catnm'> $catnm </option> ";
                                        }
                                echo "</select></div>";
                                    
                                    ?>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                <label for=""> Class </label>
                                    <select name="class" id="" class="form-control">
                                    <?php 
                                        $getcla = mysqli_query($link, "SELECT * FROM class WHERE school_id = '$adminschid' ");
                                        foreach ($getcla as $g) {
                                        $clanm = $g['class'];
                                        echo "<option value='$clanm'> $clanm </option> ";
                                    }
                                    ?>
                                    </select>
                                </div>
                                </div>
                            

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                <label for=""> Session </label>
                                    <select name="session" id="" class="form-control">
                                    <option value="2023/2024">2023/2024</option>          
                                    </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                <label for=""> Term </label>
                                    <select name="term" id="" class="form-control">
                                    <option value="First">First</option>
                                    <option value="Second">Second</option>
                                    <option value="Third">Third</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-12">
                            <button type="submit" class="btn btn-primary"> Search </button>
                            </div>                            
                        </div>
                    </form>
                </div>
                <?php 
                if(isset($_GET['session']) && isset($_GET['term'])){

                    $stud_sess = $_GET['session'];
                    $stud_sem = $_GET['semester'];
                    $stud_trm = $_GET['term'];
                    $stud_cat = $_GET['category'];
                    $stud_cla = $_GET['class'];

                    
                    echo "Students That Match The Search  : CLASS : $stud_cla";
                    $fetch = mysqli_query($link, " SELECT * FROM stud_profile WHERE class='$stud_cla' && school_id='$adminschid' ");
                    echo "<table class='table table-responsive'>
                         <tr> <th> Name </th> 
                              <th>  </th>  </tr>
                         ";
                    foreach ($fetch as $f) {
                        $id = $f['id'];
                        $pupil = $f['stud_name'];

                        echo "<tr> <td> $pupil </td> 
                         <td>              
                          <form action='displayresultind.php'>
                           <button type='submit'  class='btn btn-sm bg-success-light mr-2'>
                           <input type='' hidden='' class='' name='session' value='$stud_sess'>
                           <input type='' hidden='' class='' name='term' value='$stud_trm'>
                           <input type='' hidden='' class='' name='class' value='$stud_cla'>
                           <input type='' hidden='' class='' name='name' value='$pupil'>
                           <input type='' hidden='' class='' name='category' value='$stud_cat'>

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
