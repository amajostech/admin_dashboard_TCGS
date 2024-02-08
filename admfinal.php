<link href='css/bootstrap.css' rel='stylesheet' type='text/css'>

<?php 
include 'header.php';
require 'function.php';

if (isset($_GET['Punctuality'])) {

	// Affective Domain
	$hard = $_GET['Hardwork'];
	$pol = $_GET['Politeness'];
    $resp = $_GET['Responsibilty'];
	$flu = $_GET['Fluency'];
	$hon = $_GET['Honesty'];
	$att = $_GET['Attentiveness'];
	$gam = $_GET['Games'];
	$sel = $_GET['self_control'];
	$int = $_GET['Initiative'];
	$pun = $_GET['Punctuality'];
	$neat = $_GET['Neatness'];

	

	// Comments
    $times_open = $_GET['time_open'];
	$t_pr = $_GET['time_present'];
	$t_ab = $_GET['time_absent'];
	$FTComm = $_GET['FT_comm'];
	$P_rem = $_GET['principal_rem'];
	$stud = $_GET['student'];
	$class = $_GET['class'];
	$sess = $_GET['session'];
	$trm = $_GET['term'];
	$cat = $_GET['category'];

	// Some databa se queries
     
     $chkdet = mysqli_query($link, "SELECT * FROM details WHERE student='$stud' && term = '$trm' && session = '$sess' && class='$class' && category='$cat' ");
     
     // Check for Error 'String'
     if ($FTComm == '' || $P_rem == '') {
      	header("location:remarks.php");
      }elseif (mysqli_num_rows($chkdet) == 1) {
      	echo "<h1> Data Already Exists </h1>";
      }
      else{       

      	# details 
      $insert =	mysqli_query($link, "INSERT INTO `details` (`id`, `school_id`, `student`, `class`, `term`, `session`, `category`, `FT_comment`, `Principal_rem`, `Hardwork`, `Fluency`, `Games and Sport`, `Punctuality`, `Politeness`, `Honesty`, `Self_control`, `Neatness`, `Responsibilty`, `Attentiveness`, `Initiative`, `times_open`, `time_present`, `time_absent`)
	                        VALUES (NULL, '$schid', '$stud', '$class', '$trm', '$sess', '$cat', '$FTComm', '$P_rem', '$hard', '$flu', '$gam', '$pun', '$pol', '$hon', '$sel', '$neat', '$resp', '$att', '$int', '$times_open', '$t_pr', '$t_ab');");

	  
	  if ($insert) {
				echo "Result Details Added";
				echo "<script> alert('Psychomotor and Affective Domain for Pupil Updated. Try next person'); 
				              window.location.href='remarks.php'; </script>";
			 }       	
      }
}



?>