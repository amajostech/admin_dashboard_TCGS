<?php 

  include_once 'header.php';
  include_once 'function.php';

?>
<div class="container mt-0">
					
<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
                            <h3> Notifications </h3>
							
						<?php
							echo "<div class='form-group row'> 
                                <table class='table table-inline table-stripped'>";								
							$gets = mysqli_query($link, "SELECT * FROM notifications WHERE school_id='$schid' ");
							foreach ($gets as $stu) {
								$sn = $stu['message'];
                                $dt = $stu['date'];
								
                                echo "<tr class'form-control table-inline'> 
                                           <td> <h6>$sn </td> </h6> <td> $dt </td>
                                      </tr>
                                    ";
	}
	
?>

<?php 
if(isset($_GET['subject'])){
	$subject = $_GET['subject'];
	
	$getstudents = mysqli_query($link, "SELECT * FROM resultdata WHERE category='$category' && class='$class' && session='$session' && term='$term' && school_id='$schid' && student='$subject' ");
	if(mysqli_num_rows($getstudents) == 0){
		echo "There is no Data Found ...";
	}else{
    echo "RESULT FOR $subject 
	    <table class='table table-inline'> 
        <tr> <th> Name </th> 
            <th> 1st CA </th>
            <th> 2nd CA </th> 
            <th> Exam </th> </tr> ";

            foreach ($getstudents as $s) {
            $pup = $s['subject_name']; 
            $ca1 = $s['ca1'];
            $ca2 = $s['ca2'];
            $exam = $s['exam'];
            $id = $s['id'];

            echo "<tr>
                <td>$pup</td>
                <td>$ca1</td>
                <td>$ca2</td>
                <td>$exam</td>
                </tr>
                ";
            } 
        }
}

?>

						</div>
					</div>
				</div> 
</div>
		