<!DOCTYPE html>
<html>
<head>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- themify icons CSS -->
	<link rel="stylesheet" href="../css/themify-icons.css">
	<!-- Animations CSS -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="../css/responsive.css">
	<!-- morris charts -->
	<link rel="stylesheet" href="../charts/css/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="../css/jquery-jvectormap.css">
	<link rel="stylesheet" href="../datatable/dataTables.bootstrap4.min.css">

	<script src="js/modernizr.min.js"></script>
</head>
<body onload='print()';>
<style>
	table.special{
		width: 100%;
		padding: 5px;
		
	}
	table.special th{
		border: 2px solid black;
		font-size: 14pt;
		font-weight: bold;
		margin: 25px;
		padding: 20px;
		}
	
	table.special td{
		border-right: 2px solid black;
		font-size: 12pt;
		padding-right: 25px;
		font-weight: bold;
		margin: 5px;
		padding: 5px;
	}
	table.special tr{
		border: 2px solid black;
		padding: 5px;
		margin: 5px;
		
	}
	table.special.table.table-inline td{
		border: 2px solid black;
		margin: 5px;
	}
	
</style>
	<?php $tit = $_GET['stud_name']; ?>
	<title><?php echo "$tit 's Result"; ?></title>
</head>
<div class="container-fluid">

</body>

<?php

include_once 'function.php'; 

	$stdnm = $_GET['stud_name'];
	$trm = $_GET['term'];
	$sess = $_GET['session'];
	$categ = $_GET['category'];
	$class = $_GET['class'];
	$schid = $_GET['school_id'];

$getdom = mysqli_query($link, "SELECT * FROM details WHERE student='$stdnm' && term = '$term' && session = '$sess' && category = '$categ' && class='$class' ");
     foreach ($getdom as $d) {
     	$Pt = $d['Punctuality'];
     	$Nt = $d['Neatness'];
     	$Hy = $d['Honesty'];
     	$Cp = $d['Coop'];
     	$Lp = $d['Leadership'];
     	$Hp = $d['Help'];
     	$El = $d['Emotional'];
     	$Ae = $d['Attitude'];
     	$Pe = $d['Perseverance'];
     	$Hg = $d['Handwriting'];
     	$Vl = $d['Verbal'];
     	$Gs = $d['Games'];
     	$Ss = $d['Sports'];
     	$Hlg = $d['Handling'];
     	$Dt = $d['Drawpaint'];
     	$Ml = $d['Musical'];
     	$Pm = $d['Principal_rem'];
     	$Fm = $d['FT_comment'];
     }

	 
# Parameters student, subject, ca1, ca2, exam, term, session, class, category
$getres = mysqli_query($link, "SELECT * FROM resultdata WHERE student = '$stdnm' && term = '$trm' && session = '$sess' ");

$getsumca1 = mysqli_query($link, "SELECT SUM(ca1) AS totalsum FROM resultdata WHERE student = '$stdnm' && term = '$trm' && session = '$sess' ");
 $row1 = mysqli_fetch_assoc($getsumca1);
 $sumca1 = $row1['totalsum'];


 $getsumca2 = mysqli_query($link, "SELECT SUM(ca2) AS totalsum2 FROM resultdata WHERE student = '$stdnm' && term = '$trm' && session = '$sess' ");
 $row2 = mysqli_fetch_assoc($getsumca2);
 $sumca2 = $row2['totalsum2'];

 $getsumexam = mysqli_query($link, "SELECT SUM(exam) AS totalsumexam FROM resultdata WHERE student = '$stdnm' && term = '$trm' && session = '$sess' ");
 $rowex = mysqli_fetch_assoc($getsumexam);
 $sumexam = $rowex['totalsumexam'];

 $rtot = $sumca1 + $sumca2 + $sumexam;
  $cumm = floor($rtot / 16);

$getnm = mysqli_query($link, "SELECT * FROM stud_profile WHERE stud_name = '$stdnm' && class='$class' ");
$getstudnumber = mysqli_query($link, "SELECT * FROM stud_profile WHERE class='$class' && school_id='$schid' ");
$Ns = mysqli_num_rows($getstudnumber);

foreach ($getnm as $ind) {
	$indnm = $ind['stud_name'];
	$indcl = $ind['class'];
	$indct = $ind['category'];
	$indrg = $ind['reg_no'];
	$school_id = $ind['school_id']; 
	$profile = $ind['passport'];

	$getschoolname = mysqli_query($link, "SELECT sch_name FROM admin_login WHERE school_id = '$school_id' ");
	foreach($getschoolname as $sch){
		$schnm = $sch['sch_name'];
	}

	echo "
	<div class='container-fluid '>
      <h1 style='position: center; text-align: center; margin: 15px; border: none; padding: 10px' > $schnm </h1>        
	</div></div><br>";

}


echo "<div class='container'>
     <div class='row'> 
	   <div class='col-md-4'>
	      <center><img src='upload/$profile' width='150' height='150' style='position: center'><br></center>
       </div> <br>
	   <div class='col-md-8'>	
	   <center>	     
			 <table class='table table-inline'>
			 <tr>  
			   <th>TERM</th> 
			   <td> $trm </td>

			   <th>YEAR</th> 
			   <td> $sess </td>
			
			<th>CLASS</th> 
			   <td> $class</td>
			 
			 </tr> 
			  
			 <tr>
			 <th> COGNITIVE DOMAIN </th> 
			 <td> 4 </td> 

			 <th>CUMMULATIVE</th> 
			   <td> $cumm </td>
			 
		   
			 </tr>
			 </table>
			 </center>
		</div>
	  </div>
		  <br>
";   

echo "<table class='special' style='border: 3px solid black;' >
        <tr style='padding: -10px; margin: -5px; border: 2px solid black;'>
           <th>SUBJECTS</th>
           <th>First CA (20%)</th>
           <th>Second CA (20%)</th>
           <th>Exam (60%)</th>
           <th>Total</th>
           <th>Remark</th>
           </tr>
           <tr>";

foreach ($getres as $gr) {
	$rsub = $gr['subject_name'];
	$rca1 = $gr['ca1'];
	$rca2 = $gr['ca2'];
	$rex = $gr['exam'];
	$tot = $rca1 + $rca2 + $rex;

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
      <td style='text-align: center; '>$rca1</td>
      <td style='text-align: center; '>$rca2</td>
      <td style='text-align: center; '>$rex</td>
      <td style='text-align: center; '>$tot</td>
      <td>$rem</td></tr>";

  }

  echo "<tr> 
       <td> TOTAL </td> 
	   <td> $sumca1 </td> 
	   <td> $sumca2 </td> 
	   <td> $sumexam </td>
	   <td> $rtot </td>
	   <td></td>";

  $rtot = $sumca1 + $sumca2 + $sumexam;
  $countfetch = mysqli_num_rows($getres);
  $avg = round(($rtot/$countfetch),1);
  if ($avg >= 80) {
     		$grem = "Distinction";
     	}elseif ($avg >= 70 ) {
     		$grem = "Upper Credit";
     	}elseif ($avg >= 60 ) {
     		$grem = "Lower Credit";
     	}elseif ($avg >= 50 ) {
     		$grem = "Merit";
     	}elseif ($avg >= 40 ) {
     		$grem = "Pass";
     	}else{
     		$grem = "Fail";
     	}
     	$gtot = $countfetch * 100;
     


      echo "</table>";

echo "</div><br>
     <div class='container'>
       <table class='table table-responsive'>
       <tr><td>TOTAL OBTAINED _  <b>$rtot / $gtot</b></td>
       <td> AVERAGE _ <b>$avg </b></td>
	   <td> OVERALL GRADE _ <b>$grem</b> </td> 
      </table>
           
      </div>
      
 </div>";

          
?>
<div class='container'>
   <div class='row'>

   <div class="col-md-7">
       <table class='table table-inline'>
	   <tr> <td> <b> Number of Students </b> </td> <td> <?php echo "$Ns"; ?> </td> </tr> 
          <tr> <td> <b> Class Teacher's Comment </b> </td> <td> <?php echo "$Fm"; ?> </td> </tr> 
		  <tr> <td> <b> Principal's Comment </b> </td> <td> <?php echo "$Pm"; ?> </td> </tr> 
		  <tr> <td> <b> Class Teacher's Signature </b> </td> <td> </td> </tr> 
		  <tr> <td> <b> Head Teacher's Comment </b> </td> <td> </td> </tr> 
	   </table>
	</div>

	<!-- Psychomotor Domain -->
	<div class="col-md-2">
       <table >
		 <tr style='padding: 15px;'>
			<th>AFFECTIVE DOMAIN</th>
			<th></th>
		</tr>
			<?php 
			echo " 
			<tr style='padding: 10px;'><td>Punctuality</td><td>$Pt</td> </tr>
	        <tr style='padding: 10px;'><td>Neatness</td><td>$Nt</td></tr>
	        <tr style='padding: 10px;'><td>Honesty</td><td>$Hy</td></tr>
	        <tr style='padding: 10px;'> <td>Sports</td><td>$Ss</td></tr>
	        <tr style='padding: 10px;'><td>Co-operation with others</td> <td> $Cp </td> </tr>
	        <tr style='padding: 10px;'><td>Leadership</td><td>$Lp</td></tr>
	        <tr style='padding: 10px;'><td>Helping others</td><td>$Hp</td> </tr> 
	        <tr style='padding: 10px;'><td>Emotional Stability</td><td>$El</td></tr>
	        <tr style='padding: 10px;'><td>Attitude to School Work</td><td>$Ae</td></tr>
	        <tr style='padding: 10px;'><td>Perseverance</td><td>$Pe</td></tr>
			   ";
			?>
		 </tr>
	   </table>
	</div>

	
	<!-- Affective Domain -->
	<div class="col-md-3">
	<table class='table-responsive table table-inline''>
		 <tr>
			<th>PSYCHOMOTOR DOMAIN</th>
			<th></th>
		</tr>
			<?php 
			echo " 
			<tr> <td>Handwriting</td><td>$Hg</td></tr>
	        <tr> <td>Verbal Fluency</td><td>$Vl</td></tr>
	        <tr> <td>Games</td><td>$Gs</td></tr>
	        <tr> <td>Sports</td><td>$Ss</td></tr>
	        <tr> <td>Handling tools</td><td>$Hlg</td> </tr>
	        <tr> <td>Drawing and painting</td><td>$Dt</td></tr>
	        <tr> <td>Musical Skills</td><td>$Ml</td></tr> 
			   ";
			?>
		 </tr>
	   </table>
	</div>

	
	<!-- Complaints -->
	

	</div>


	
</div>
</html>