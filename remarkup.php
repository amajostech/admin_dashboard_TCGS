<html>
<head> 
<?php 
  include_once 'header.php';
?>
<div class="container">
<?php 

require 'function.php';

if (isset($_GET['studname'])) {
	$studnm = $_GET['studname'];
	$studcat = $_GET['category'];
	$studcla = $_GET['class'];
	$sess = $_GET['session'];
	$term = $_GET['term'];

	$updateq = mysqli_query($link, "SELECT * FROM resultdata WHERE student = '$studnm' && class = '$studcla' && session = '$sess' && category = '$studcat' && term = '$term' ");
	echo "<form class='form-group' method='get' action='admfinal.php'>
	      <div class='form-control'>
	      <label>You ar currently Entering the remark of <b> $studnm</b> of <b>$category Category</b> in <b>$class Class</b></label><br>
	      ";
	echo "<table class='table table-responsive' style='width: 70%'> 
	<tr> <th> Subject </th>
	     <th> First CA </th>
	     <th> Second CA </th>
	     <th> Exam </th>
	     <th> Total </th> </tr>
	     <tr>";
	if (mysqli_num_rows($updateq) == 0) {
		echo "No Result for this guy";
	}else{
		foreach ($updateq as $q) {
			$sub = $q['subject_name'];
			$ca1 = $q['ca1'];
			$ca2 = $q['ca2'];
			$exam = $q['exam'];
			$tot = $ca1 + $ca2 + $exam;

			echo "<td>$sub</td>
			      <td>$ca1</td>
			      <td>$ca2</td>
			      <td>$exam</td>
			      <td>$tot</td>
			      </tr>";
		}
	}
	echo "</table></div><br>";
}

require 'domaindetails.php';
echo " <input type='' hidden='' value='$term' name='term'>
       <input type='' hidden='' value='$studnm' name='student'>
       <input type='' hidden='' value='$class' name='class'>
       <input type='' hidden='' value='$session' name='session'>
       <input type='' hidden='' value='$category' name='category'>
       <br>
      <center>
      <input type='submit' class='btn btn-success' value='Enter Details'>
      </center>
      <br> ";

?>

     

     
     </form>
</div>