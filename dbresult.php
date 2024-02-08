<?php

require 'header.php';
require 'function.php';

   if(isset($_GET['student'])){
   	$stud = $_GET['student'];
   	$subj = $_GET['subject'];
   	$ca1 = $_GET['ca1'];
   	$ca2 = $_GET['ca2'];
   	$exam = $_GET['exam'];

   
   }
   echo "<div class='container'>";

   	$chkdet = mysqli_query($link, "SELECT * FROM resultdata WHERE student = '$stud' && subject = '$subj' && term = '$term'");
   	if(mysqli_num_rows($chkdet) == 1){
   		echo "<h4> Data Already Exists </h4>";
   		echo "<button type='submit' class='btn btn-primary'><a href='compile.php'>Add another Record</a></button>";
   	}else{
   		mysqli_query($link, "INSERT INTO resultdata(id,student,subject,ca1,ca2,exam,term,session,class,category) VALUES(NULL, '$stud', '$subj', '$ca1', '$ca2', '$exam', '$term', '$session','$class', '$category')");
   		echo "Records updated Sucessfully<br>";
   		echo "<button type='submit' class='btn btn-primary'><a href='compile.php'>Add another Record</a></button>";
   	}
   	  $all = mysqli_query($link, "SELECT * FROM resultdata WHERE subject='$subj' && term='$term' && session='$session' && class='$class' ");
   	  echo "<br><b>$subj</b> for <b>$class</b>";
   	  echo "<table class='table table-responsive container'>
   	  <tr>
   	  <th>Student Name</th>
   	  <th>First CA</th>
   	  <th>Second CA</th>
   	  <th>Exam</th>
   	  <th>Total</th>
   	  <th>Grade</th>
   	  <th>Remark</th>
   	  </tr>
   	  ";
      foreach ($all as $gr) {
      	$rsub = $gr['student'];
	$rca1 = $gr['ca1'];
	$rca2 = $gr['ca2'];
	$rex = $gr['exam'];
	$tot = $rca1 + $rca2 + $rex;
	$rtot += $tot;

if ($tot >= 80) {
		$rem = 'Distinction';
		$grd = 'A1';
	}
	elseif ($tot >= 70) {
		$rem = 'Excellent';
		$grd = 'B2';
	}
	elseif ($tot >= 65) {
		$rem = 'V Good';
		$grd = 'B3';
	}
	elseif ($tot >= 60) {
		$rem = 'Good';
		$grd = 'C4';
	}
	elseif($tot >= 55){
		$rem = 'Upper Credit';
		$grd = 'C5';
	}
	elseif ($tot >= 50) {
		$rem = 'Lower Credit';
		$grd = 'C6';
	}
	elseif ($tot >= 46) {
		$rem = 'Pass';
		$grd = 'D7';
	}
	elseif ($tot >= 40) {
		$rem = 'Pass';
		$grd = 'E8';
	}
	else{
       $grd = 'F9';
       $rem = 'Fail';
       	}



# Display Results

echo "<td>$rsub</td>
      <td>$rca1</td>
      <td>$rca2</td>
      <td>$rex</td>
      <td>$tot</td>
      <td>$grd</td>
      <td>$rem</td></tr>";

  }
      
  

	?>