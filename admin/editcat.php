<?php 
  include_once 'header.php';
  
?>

<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Categories</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="teachers.html">Categories</a></li>
<li class="breadcrumb-item active">Edit Categories</li>
</ul>
</div>
</div>
</div>

<?php
  if (isset($_GET['edit'])) {
    $gid = $_GET['edit'];
    $getdetails = mysqli_query($link, "SELECT * FROM category WHERE id = '$gid' ");
    foreach($getdetails as $d){
        $catnm = $d['category'];
    }
   echo "<form method='post'>
            <div class='row'>
              <div class='col-md-8'>
              <input type='text' class='form-control' value='$catnm' name='category'>
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
    $del = mysqli_query($link, "DELETE FROM category WHERE id = '$gid' ");
    if($del){
        echo "<script> alert('Category Deleted');
        window.location.href='category.php'; </script>";
    }
  }

  if(isset($_POST['category'])){
    $cat = $_POST['category'];
    $gid = $_POST['gid'];
   $update = mysqli_query($link, "UPDATE `category` SET `category` = '$cat' WHERE `category`.`id` = $gid; ");
    if($update){
        echo "<script> window.location.href='category.php';
        window.location.href='category.php'; </script>";
    }
  }
?>


