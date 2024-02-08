<?php 
include_once 'header.php';

if (isset($_GET['view'])) {
	$id = $_GET['view'];
	$fetch = mysqli_query($link, "SELECT * FROM stud_profile WHERE id='$id' ");
      foreach ($fetch as $std) {
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
	              $gen = $std['gender'];
	              $rel = $std['religion'];
	              $bio = $std['bio'];
	              $lg = $std['lga'];
	              $sta = $std['stateorigin'];
	              $add = $std['homeadd'];
      echo "

<div class='page-wrapper'>
<div class='content container'>
<div class='page-header'>
<div class='row'>
<div class='col-sm-12'>
<h3 class='page-title'>Student Details</h3>
<ul class='breadcrumb'>
<li class='breadcrumb-item'><a href='students.php'>Student</a></li>
<li class='breadcrumb-item active'>Student Details</li>
</ul>
</div>
</div>
</div>
<div class='card'>
<div class='card-body'>
<div class='row'>
<div class='col-md-12'>
<div class='about-info'>
<h4>About Student</h4>
<div class='media mt-3'>
<img src='admin/upload/$pass' width='150' height='150' class='mr-3' alt='...'>
<div class='media-body'>
<ul>
<li>
<span class='title-span'>Full Name : </span>
<span class='info-span'>$nm</span>
</li>
<li>
<span class='title-span'>Department : </span>
<span class='info-span'>$scat</span>
</li>
<li>
<span class='title-span'>Mobile : </span>
<span class='info-span'>$co</span>
</li>
<li>
<span class='title-span'>Email : </span>
<span class='info-span'>$em</span>
</li>
<li>
<span class='title-span'>Gender : </span>
<span class='info-span'>$gen</span>
</li>
<li>
<span class='title-span'>Religion : </span>
<span class='info-span'>$rel</span>
</li>
<li>
<span class='title-span'>DOB : </span>
<span class='info-span'>$dob</span>
</li>
</ul>
</div>
</div>
<div class='row mt-3'>
<div class='col-md-12'>
<p>$bio</p>
</div>
<hr>
<div class='col-md-12'>
<h5>Permanent Address</h5>
<p>$add</p>
</div>
</div>
<div class='row mt-2'>
<div class='col-md-12'>
<h5>Origin Address</h5>
<p>$lg LGA in $sta State, Nigeria</p>
</div>
</div>
</div>
</div>
</div>
<hr>
<footer>
<p>Copyright © 2023 Tony Cheta Group Of Schools </p>
</footer>
</div>
</div>
</div>
</div>

</div>
</div>



</div>

</div>
";


   }
}

if (isset($_GET['delete'])) {
	$delid = $_GET['delete'];
	echo "$id";
	$delete = mysqli_query($link, "DELETE FROM stud_profile WHERE id='$delid' ");
	if ($delete) {
		echo "<div class='page-wrapper'>
        <div class='content container-fluid'>
        <div class='page-header'>
        <div class='row'>
        <div class='col-sm-12'><div class='form-control'> Student has been Deleted </div>
        <div class='form-control btn btn-primary'><a href='students.php'>Return to Students List</a></div>";
	}else{
		echo "<div class='form-control'> Student Record could not be found or has been previously deleted </div> ";
	}
}

if(isset($_GET['edit'])){
     $editid = $_GET['edit'];

	 echo $editid;

	 $getedit = mysqli_query($link, "SELECT * FROM stud_profile WHERE id='$editid' ");
	 foreach ($getedit as $st) {
		$id = $st['id'];
		$nm = $st['stud_name'];
		$reg = $st['reg_no'];
		$c = $st['class'];
		$em = $st['email'];
		$dob = $st['dob'];
		$pob = $st['pob'];
		$co = $st['phone'];
		$scat = $st['category'];
		$pass = $st['passport'];
		$add = $st['homeadd'];
		$gen = $st['gender'];
		$rel = $st['religion'];
		$bio = $st['bio'];
		$lg = $st['lga'];
		$sta = $st['stateorigin'];

	}
	
echo "<div class='page-wrapper'>
			<div class='content container'>
			<div class='page-header'>
			<div class='row'>
			<div class='col-sm-12'>
			<h3 class='page-title'>Student Details</h3>
			<ul class='breadcrumb'>
			<li class='breadcrumb-item'><a href='students.php'>Student</a></li>
			<li class='breadcrumb-item active'>Student Details</li>
			</ul>
			</div>
			</div>
			<div class='row'>
                  <div class='col-sm-12'>
                     <div class='card'>
                        <div class='card-body'>

                           <form action='editstudents.php' method='post' enctype='multipart/form-data'>
                              <div class='row'>
                                 <div class='col-12'>
                                    <h5 class='form-title'><span>Pupil Information</span></h5>
                                 </div>
								 <input type='' hidden='' name='editid' value='$editid'>
                                 <div class='col-12 col-sm-6'>
                                    <div class='form-group'>
                                       <label>Full Name</label>
                                       <input type='text' value='$nm' class='form-control' name='stud_name' placeholder='Firstname Surname Lastname' >
                                    </div>
                                 </div>
                                    <div class='col-12 col-sm-6'>
                                    <div class='form-group'>
                                       <label>Gender</label>
                                       <select class='form-control' name='gender' >                                   
                                          <option value='$gen'> $gen </option>   
										  <option value='Male'> Male </option>  
										  <option value='Female'> Female </option>                          
                                       </select>
                                    </div>
                                 </div>
                                 <div class='col-12 col-sm-6'>
                                    <div class='form-group'>
                                       <label>Date of Birth</label>
                                       <div>
                                          <input type='date' value='$dob' class='form-control' name='stud_dob' >
                                       </div>
                                    </div>
                                 </div>
                                 <div class='col-12 col-sm-6'>
                                    <div class='form-group'>
                                       <label>Registration Number</label>
                                       <input type='text' value='$reg' class='form-control' name='stud_regno' >
                                    </div>
                                 </div>
                                 <div class='col-12 col-sm-6'>
                                    <div class='form-group'>
                                       <label>Religion</label>
                                       <select class='form-control' name='religion' >
                                       	<option value='$rel'>$rel</option>
										<option value='Christainity'> Christainity </option>
                                       	<option>Islam</option>
                                       	<option>Traditional</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class='col-12 col-sm-6'>
                                    <div class='form-group'>
                                       <label>Mobile/Whatsapp Number</label>
                                       <input type='text' value='$co' class='form-control' name='stud_cont' >
                                    </div>
                                 </div>
                                 <div class='col-12 col-sm-6'>
                                    <div class='form-group'>
                                       <label>Email Address</label>
                                       <input type='text' value='$em' class='form-control' name='stud_email' >
                                    </div>
                                 </div>

                                 <div class='col-12 col-sm-6'>
                                    <div class='form-group'>
                                       <label>Student Image</label>
                                       <input type='file' class='btn-primary form-control' name='passport' >
                                    </div>
                                 </div>
                                 <div class='col-12 col-sm-6'>
                                    <div class='form-group'>
                                       <label>Place of Birth</label>
                                       <input type='text' value='$pob' class='form-control' name='pob' >
                                    </div>
                                 </div>                                 
                                 <div class='col-12 col-sm-6'>
                                    <div class='form-group'>
                                       <label>Permanent Address</label>
                                       <textarea class='form-control' name='address' >$add</textarea>
                                    </div>
                                 </div>
                                 <div class='col-12 col-sm-6'>
                                    <div class='form-group'>
                                       <label>State of Origin</label>
                                       <input type='text' value='$sta' class='form-control' name='stateorigin' >
                                    </div>
                                 </div>
                                 <div class='col-12 col-sm-6'>
                                    <div class='form-group'>
                                       <label>Local Government Area</label>
                                       <input type='text' value='$lg' class='form-control' name='lga' >
                                    </div>
                                 </div>                                 
                                 <div class='col-12 col-sm-6'>
                                    <div class='form-group'>
                                       <label>Brief Description</label>
                                       <input type='text' value='$bio' class='form-control' name='bio' >
                                    </div>
                                 </div>
                                 <div class='col-12'>
                                    <button type='submit' class='btn btn-primary'>Update Profile</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
</div>";

}	
?>

