<?php 
  include_once 'header.php';
  
?>

<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Class</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="teachers.html">Edit</a></li>
<li class="breadcrumb-item active">Edit Classes </li>
</ul>
</div>
</div>
</div>

<?php
  if (isset($_GET['edit'])) {
    $gid = $_GET['edit'];
    $getdetails = mysqli_query($link, "SELECT * FROM class WHERE id = '$gid' ");
    foreach($getdetails as $d){
        $catnm = $d['class'];
    }
   echo "<form method='post'>
            <div class='row'>
              <div class='col-md-8'>
                <input type='text' class='form-control' value='$catnm' name='class'>
              </div>
              <div class='col-md-4'>
               <input type='submit' value='Update' class='btn btn-primary'>
              </div>
              <input type='hidden' name='gid' value='$gid'>              
            </div>
          </div>
          </form>
         </div>" ;
  }
  if(isset($_GET['delete'])){
    $gid = $_GET['delete'];
    $del = mysqli_query($link, "DELETE FROM class WHERE id = '$gid' ");
    if($del){
        echo "<script> alert('Category Deleted'); </script>";
    }
  }

  if(isset($_POST['class'])){
    $cat = $_POST['class'];
    $gid = $_POST['gid'];
   $update = mysqli_query($link, "UPDATE `class` SET `class` = '$cat' WHERE `class`.`id` = $gid; ");
    if($update){
        echo " <script> window.location.href='class.php'; </script>";
    }
  }
?>