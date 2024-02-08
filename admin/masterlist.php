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

                    <form action="viewmasterlist.php" method='get'>
                        <div class="row">
                            <div class="col-12">
                            <h5 class="form-title"><span> Select Class and Subject  </span></h5>
                            </div>
 
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                <label for="">Select a Category</label>
                                <select name="category" class="form-control">
                                   <option value="Junior">Junior</option>
                                   <option value="Senior">Senior</option> 
                                 </select>
                               </div>
                           </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                <label for=""> Class </label>
                                    <select name="class" id="" class="form-control">
                                    <option value="JSS1">JSS1</option>
                                    <option value="JSS2">JSS2</option>
                                    <option value="JSS3">JSS3</option>
                                    <option value="SSS1">SSS1</option>
                                    <option value="SSS2">SSS2</option>
                                    <option value="SSS3">SSS3</option>
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
                            <?php 
                            echo "<input type='' hidden='' name='schoolId' value='$adminschid'> "

                            ?>
                            
                            <div class="col-12">
                            <button type="submit" class="btn btn-primary"> Generate Master List </button>
                            </div>                            
                        </div>
                    </form>
                </div>
               