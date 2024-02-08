
<?php 
include_once 'header.php';

?>

<div class="container">
	


<?php
include_once 'function.php';


        	$getstud = mysqli_query($link, "SELECT * FROM stud_profile WHERE category = '$category' && class='$class' ");
        	echo "<form class='form-control' action='remarkup.php' method='get'>
			<h4> Select A Student </h4>
        	         <select name='studname' class='form-control'>";
        	if(mysqli_num_rows($getstud) == 0){
        		echo "No Students Data Yet in this class";
        	}else{
        		foreach ($getstud as $stud) {
        			$studname = $stud['stud_name'];

        			echo "<option value='$studname'>$studname </option>";

        		}
        		echo " </option></select><br>
        		    <input type='submit' value='Select Pupil' class='btn btn-success'>    			
        			<input type='' hidden='' value='$term' name='term'>
        			<input type='' hidden='' value='$session' name='session'> 
        			<input type='' hidden='' value='$category' name='category'>
        			<input type='' hidden='' value='$class' name='class'>" ;
        		echo "</table></form>";        	
        	}


?>

</html>