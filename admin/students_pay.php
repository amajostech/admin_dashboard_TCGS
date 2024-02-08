<?php 
include_once 'header.php';
?>

<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Students Payment Records</h3>
<ul class="breadcrumb">

<li class="breadcrumb-item active"></li>
</ul>
</div>
</div> 
 <form action="" method="post">
<div class='container row'>    
     <div class="col-md-5">
        <?php 
         $getcat = mysqli_query($link, "SELECT * FROM class WHERE school_id = '$adminschid' ");
         if(mysqli_num_rows($getcat) == 0){
            echo "<script>  alert('No Existing Class Yet. Create a New Category'); 
                            window.location.href='category.php'; </script>";
         }else{
            echo " <label> Select a Class </label> 
             <select name='class' class='form-control' > ";
            foreach ($getcat as $gt) {
                $catnm = $gt['class'];
                echo "<option value='$catnm'> $catnm </option> ";
            } 

            echo "</select> </div>";
         }
        ?>

     <div class="col-md-2">
        <label for=""></label>
        <input type="submit" value='Fetch Records' class="form-control btn btn-primary">
     </div>
    </div>
 </form>
<div><br></div>
 <?php 
  if (isset($_POST['class'])) {
    $class = $_POST['class'];

    $fetchdata = mysqli_query($link, "SELECT * FROM stud_profile WHERE school_id = '$adminschid' && class = '$class' ");
    if (mysqli_num_rows($fetchdata) >= 1) {
        echo "<h5> Displaying Data For $class ";
        echo "<table class='table table-responsive'> 
           <tr>
              <th> Pupil's Names </th>
              <th> Passport </th>
              <th> Status </th>
           </tr>";

           foreach($fetchdata as $fd){
              $name = $fd['stud_name'];
              $reg = $fd['reg_no'];
              $cid = $fd['id'];
              $pix = $fd['passport'];

              echo "<tr> 
                     <td> $name </td> 
                     <td> <img src='upload/$pix' width='40px' alt='50px' alt=''></td>
                     <td> 
                     <form action='students_pay_history.php'> 
                     
                     <button type='submit' name='view' value='$cid' class='btn btn-sm bg-primary-light mr-2'>
                     <i class='fas fa-eye'></i>
                     </a>
                     <button type='submit' name='edit' value='$cid' class='btn btn-sm bg-success-light mr-2'>
                     <i class='fas fa-pencil-alt'></i>
                     </a>
                     
                     </form>
                  </div> 
                  </td>
                     </tr>";

           }
    }
  }
 ?>