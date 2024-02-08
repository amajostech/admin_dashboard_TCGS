<html><?php 

include_once 'header.php';

?>
<div class="page-wrapper">
            <div class="content container">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title">Add Pupils</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="students.html">Pupils</a></li>
                           <li class="breadcrumb-item active">Add Pupils</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card">
                        <div class="card-body">

                           <form action="valreg.php" method='post' enctype="multipart/form-data" name='fileupload'>
                              <div class="row">
                                 <div class="col-12">
                                    <h5 class="form-title"><span>Pupil Information</span></h5>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Full Name</label>
                                       <input type="text" class="form-control" name="stud_name" placeholder="Firstname Surname Lastname" required>
                                    </div>
                                 </div>
                                
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Gender</label>
                                       <select class="form-control" name="gender" required>                                   
                                          <option>Male</option>
                                          <option>Female</option>                                          
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Date of Birth</label>
                                       <div>
                                          <input type="date" class="form-control" name="stud_dob" required>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Registration Number</label>
                                       <input type="text" class="form-control" name="stud_regno" required>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Religion</label>
                                       <select class="form-control" name="religion" required>
                                       	<option>Christainity</option>
                                       	<option>Islam</option>
                                       	<option>Traditional</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Mobile/Whatsapp Number</label>
                                       <input type="text" class="form-control" name="stud_cont" required>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Email Address</label>
                                       <input type="text" class="form-control" name="stud_email" required>
                                    </div>
                                 </div>

                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Student Image</label>
                                       <input type="file" class="btn-primary form-control" name="passport" required>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Place of Birth</label>
                                       <input type="text" class="form-control" name="pob" required>
                                    </div>
                                 </div>                                 
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Permanent Address</label>
                                       <textarea class="form-control" name="address" required></textarea>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Hometown Address</label>
                                       <input type="text" class="form-control" name="homeadd" required>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>State of Origin</label>
                                       <input type="text" class="form-control" name="stateorigin" required>
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Local Government Area</label>
                                       <input type="text" class="form-control" name="lga" required>
                                    </div>
                                 </div>                                 
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Brief Description</label>
                                       <input type="text" class="form-control" name="bio" required>
                                    </div>
                                 </div>
                                 <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Add Pupil</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
</body>

</html>
