<!DOCTYPE html>
<html>
<head>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- themify icons CSS -->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Animations CSS -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- morris charts -->
	<link rel="stylesheet" href="charts/css/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="css/jquery-jvectormap.css">
	<link rel="stylesheet" href="datatable/dataTables.bootstrap4.min.css">

	<script src="js/modernizr.min.js"></script>
</head>
<style>
	body{
		border: 2px solid black;
		margin-left: 50px;
		margin-right: 50px;
	}
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

<body onload="window.print()">

<?php

include_once 'function.php'; 

	$stdnm = $_GET['stud_name'];
	$trm = $_GET['term'];
	$sess = $_GET['session'];
	$categ = $_GET['category'];
	$class = $_GET['class'];
	$schid = $_GET['school_id'];
	
	$getstuddetails = mysqli_query($link, "SELECT * FROM stud_profile WHERE stud_name='$stdnm' ");
	foreach($getstuddetails as $st){
		$stud_dob = $st['dob'];
		$regno = $st['reg_no'];
	}

$getdom = mysqli_query($link, "SELECT * FROM details WHERE student='$stdnm' && term = '$term' && session = '$sess' && category = '$categ' && class='$class' ");
     foreach ($getdom as $d) {
     	$hard = $d['Hardwork'];
		$flu = $d['Fluency'];
		$games = $d['Games and Sport'];
		$pun = $d['Punctuality'];
		$pol = $d['Politeness'];
		$hon = $d['Honesty'];
		$self = $d['Self_control'];
		$neat = $d['Neatness'];
		$resp = $d['Responsibilty'];
		$att = $d['Attentiveness'];
		$init = $d['Initiative'];
		$t_o = $d['times_open'];
		$t_p = $d['time_present'];
		$t_a = $d['time_absent'];
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
 $catotal = $sumca1 + $sumca2;
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
	$gender = $ind['gender'];
	$school_id = $ind['school_id']; 
	$profile = $ind['passport'];

	$getschoolname = mysqli_query($link, "SELECT sch_name FROM admin_login WHERE school_id = '$school_id' ");
	foreach($getschoolname as $sch){
		$schnm = $sch['sch_name'];
	}

	echo "
	<div class='container-fluid '>
      <h1 style='position: center; text-align: center; margin: 15px; border: none; padding: 10px' > $schnm </h1>        
	</div></div>";

}

echo "<div class='container'>
<center> <h5><b> $sess  $trm TERM REPORT SHEET. </h5> </b></center> 
<hr>
     <div class='row'> 
	   <div class='col-md-8'>	
	   <center>	     
			 <table class='table table-inline'>
			 <tr>  
			 <td></td>
			   <td>NAME:   <b> $indnm</td> 
			   <td>SEX:    <b>$gender</td>
			   <td>DOB:    <b>$stud_dob</td>			 
			 </tr> 
			 <tr>
			 <td></td><td></td>
			 <td> ADMISSION No: <b> $regno </td> 
			 <td>CLASS:   <b>$class </b></td> 
			 </tr> 
			 </table>
		</center>
		</div>
		<div class='col-md-4'>
	      <center><img src='admin/upload/$profile' width='100' height='100'><br></center>
       </div> 
	  </div>
		 <center> <h6><b> AFFECTIVE PERFORMANCE (COGNITIVE DOMAIN) REPORT </h5></b> </center> 
		 <hr>
";   

echo "<table class='special' style='border: 2px solid black;' >
        <tr style='padding: -10px; margin: -5px; border: 2px solid black;'>
           <th> SUBJECTS </th>
           <th> First CA (20%) </th>
           <th> Second CA (20%) </th>
		   <th style='color: blue'> CA Total (40%) </th>
           <th> Exam (60%) </th>
           <th style='color: blue'> Total (100%)</th>
           <th> Remark </th>
           </tr>
           <tr>";

foreach ($getres as $gr) {
	$rsub = $gr['subject_name'];
	$rca1 = $gr['ca1'];
	$rca2 = $gr['ca2'];
	$rex = $gr['exam'];
	$catot = $rca1 + $rca2;
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
	  <td style='text-align: center; color: blue; '>$catot</td>
      <td style='text-align: center; '>$rex</td>
      <td style='text-align: center; color: blue;'>$tot</td>
      <td>$rem</td> </tr>
	  ";

  }

  echo "<tr> 
       <td style='center; color: red; '> TOTAL </td> 
	   <td style='text-align: center; color: red; '> $sumca1 </td> 
	   <td style='text-align: center; color: red; '> $sumca2 </td> 
	   <td style='text-align: center; color:red'> $catotal </td>
	   <td style='text-align: center; color: blue; '> $sumexam </td>
	   <td style='text-align: center; color: blue; '> $rtot </td>
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
       <tr><td>TOTAL OBTAINED _  <b> $rtot / $gtot</b></td>
       <td> AVERAGE _ <b> $avg% </b></td>
	   <td> OVERALL GRADE _ <b>$grem</b> </td> 
	   <td> No. of Students _ <b>$Ns</b> </td> 
      </table>
           
      </div>
      
 </div>";

          
?>
<div class='container'>
   <div class='row'>
     <table class="table table-inline">
		<?php 
		echo "
		<tr>
			<td>Hardwork</td><td>$hard</td>
			<td>Politeness</td><td>$pol</td>
			<td>Reponsibility</td><td>$resp</td>			
		</tr>
		<tr>
			<td>Fluency</td><td>$flu</td>
			<td>Honesty</td><td>$hon</td>
			<td>Attentiveness</td><td>$att</td>			
		</tr>
		<tr>
			<td> Games & Sports </td><td>$games</td>
			<td>Self Control</td><td>$self</td>
			<td>Initiative</td><td>$init</td>			
		</tr>
		<tr>
			<td>Punctuality</td><td>$pun</td>
			<td>Neatness</td><td>$neat</td>						
		</tr>
		<tr>
			<td>Times School Open</td><td>$t_o</td>
			<td>Times Present</td><td>$t_p</td>
			<td>Times Absent</td><td>$t_a</td>			
		</tr>";
		?>

	 </table>
	</div>
	<center> <h6> Resumption Date will be communicated. </h6> </center>
	
	<?php 
	echo " <table class='table table-inline'>
	<tr>
	<td><b>Class Teacher's Comment     : </b>   $Fm</td>			
    </tr>
	<tr>
	<td><b> Principal's Comment     : </b>    $Pm</td> 
	<td><b>Signature :   </td>		
    </tr> </table> ";

	?>
	</div>

</div>
</html>