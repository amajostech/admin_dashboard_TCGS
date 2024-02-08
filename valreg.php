<?php 

include_once 'function.php';
include 'header.php';

if(isset($_POST['stud_name'])){
$studnm = $_POST['stud_name'];
$studcat = $_POST['category'];
$studcla = $_POST['class'];
$studem = $_POST['stud_email'];
$studcon = $_POST['stud_cont'];
$studdob = $_POST['stud_dob'];
$regno = $_POST['stud_regno'];
$address = $_POST['address'];
$religion = $_POST['religion'];
$gender = $_POST['gender'];
$pob = $_POST['pob'];
$homeadd = $_POST['homeadd'];
$stateorigin = $_POST['stateorigin'];
$lga = $_POST['lga'];
$bio = $_POST['bio'];


$chkexist = mysqli_query($link, "SELECT * FROM stud_profile WHERE stud_name='$studnm' && reg_no='$regno' && school_id='$adminschid' ");

if(mysqli_num_rows($chkexist) >= 1) {
	echo "<script> alert('Pupil with these record has been uploaded');
		       window.location.href='add-pupil.php'; </script>";

}elseif(isset($_FILES['passport']['name'])) {
	$filename = $_FILES['passport']['name'];
	$pix = $_FILES['passport']['name'];
	$saveto = "admin/upload/" . $filename;
	$tmp = $_FILES['passport']['tmp_name'];
	
	$dt = date("Y-m-d");
	echo "$dt";
	echo $filename;

	move_uploaded_file($tmp, $saveto);

	$insert = mysqli_query($link, "INSERT INTO `stud_profile` (`id`, `school_id`, `stud_name`, `phone`, `class`, `reg_no`, `gender`, `religion`, `homeadd`, `stateorigin`, `lga`, `pob`, `email`, `bio`, `category`, `dob`, `passport`) 
	                       VALUES (NULL, '$schid', '$studnm', '$studcon', '$class', '$regno', '$gender', '$religion', '$homeadd', '$stateorigin', '$lga', '$pob', '$studem', '$bio', '$category', '$dt', '$filename' )");
	
      if ($insert) {
      	echo "<script> alert('Pupil has been added. Passport has been Uploaded.');
		                window.location.href='add-pupil.php'; </script>";
      }else{
		echo "<script> alert('We encountered difficulty Uploading the records'); </script>";
      }
    }else{
    	echo "Can't Perfom Operation";
    }


}