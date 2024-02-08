<?php 
include_once 'header.php';
?>

<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Results</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="#"> Pupils Results </a></li>
<li class="breadcrumb-item active"> View Results </li>
</ul>
</div>
</div>
</div> <h3> Pick Result References </h3><br>
<form action="" method="get">
<div class='container row'>    
    
     <div class="col-md-6">
      <label for="">Select a Category</label>
        <?php 
         $getcat = mysqli_query($link, "SELECT * FROM category WHERE school_id = '$adminschid' ");
         if(mysqli_num_rows($getcat) == 0){
            echo "<script>  prompt('No Existing Category Yet. Create a New Category'); 
                            window.location.href='category.php'; </script>";
         }else{
            echo "<select name='category' class='form-control' > ";
            foreach ($getcat as $gt) {
                $catnm = $gt['category'];
                echo "<option value='$catnm'> $catnm </option> ";
            }
            echo "</select></div>";
         }
        ?>
        
     <div class="col-md-6">
      <label for=""> Class </label>
        <select name="class" id="" class="form-control">
           <?php 
            $getcla = mysqli_query($link, "SELECT * FROM class WHERE school_id = '$adminschid' ");
            foreach ($getcla as $g) {
              $clanm = $g['class'];
              echo "<option value='$clanm'> $clanm </option> ";
          }
           ?>
        </select>
     </div>

     <div class="col-md-6">
      <label for=""> Session </label>
        <select name="session" id="" class="form-control">
           <option value="2023/2024">2023/2024</option>          
           </option>
        </select>
     </div>

     <div class="col-md-6">
      <label for=""> Term </label>
        <select name="term" id="" class="form-control">
           <option value="First">First</option>
           <option value="Second">Second</option>
           <option value="Third">Third</option>
        </select>
     </div>

     <div class="col-md-2">
      <label for=""></label>
        <input type="submit" value='Get Results' class="form-control btn btn-primary">
     </div>
    </div>

 </form>

 <?php
  if (isset($_GET['category']) && isset($_GET['class'])) {
    $sess = $_GET['session'];
    $trm = $_GET['term'];
    $cat = $_GET['category'];
    $cla = $_GET['class'];

    $getstudents = mysqli_query($link, "SELECT * FROM stud_profile WHERE class='$cla' && school_id='$adminschid' ");
    if (mysqli_num_rows($getstudents) == 0) {
      echo "No Students yet In Class";
    }else{
      echo "<hr> <label> </label> <h4> Select A Pupil to view their result </h4> 
      <form action='viewresults.php'>
        <select name='stud_name' class='form-control'> ";
      foreach ($getstudents as $fr) {
         $name = $fr['stud_name'];
         
         echo " 
                 <option value='$name'> $name </option>             
                ";
            }
       echo "</select> 
       <input type='' hidden='' name='class' value='$cla'>
       <input type='' hidden='' name='category' value='$cat'>
       <input type='' hidden='' name='term' value='$term'>
       <input type='' hidden='' name='session' value='$sess'>
       <input type='' hidden='' name='school_id' value='$adminschid'>
            <input type='submit' class='btn btn-primary'> 
            </form>
         ";
    }
  }
 ?> 

 