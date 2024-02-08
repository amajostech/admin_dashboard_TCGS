<?php 
include 'header.php';
  if(isset($_GET['ca1']) && isset($_GET['ca2']) && isset($_GET['exam']) ){
    $ca1 = $_GET['ca1'];
	$ca2 = $_GET['ca2'];
	$exam = $_GET['exam'];
	$subject = $_GET['subject'];
	$name = $_GET['student'];


	$checkrecords = mysqli_query($link, "SELECT * FROM resultdata WHERE student = '$name' && class='$class' && category = '$category' && school_id = '$schid' && subject_name = '$subject' ");
     if (mysqli_num_rows($checkrecords) >= 1) {
		echo "<script> alert('The Record Already Exists. Try Another or Edit');
					 window.location.href='compile2.php?select=$subject' </script> ";	
		
	 }else{
		$insert = mysqli_query($link, "INSERT INTO `resultdata` (`id`, `school_id`, `student`, `subject_name`, `ca1`, `ca2`, `exam`, `term`, `session`, `class`, `category`) 
		                   VALUES (NULL, '$schid', '$name', '$subject', '$ca1', '$ca2', '$exam', '$term', '$session', '$class', '$category'); ");
		if($insert){
			echo "<script> window.location.href='compile2.php?select=$subject' </script> ";			
		}
	 }
  }
?>
