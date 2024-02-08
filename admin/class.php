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
<li class="breadcrumb-item"><a href="#"> Categories </a></li>
<li class="breadcrumb-item active">Add / Edit / View Categories</li>
</ul>
</div>
</div>
</div> <h3> Add Class .. </h3><br>
<form action="" method="post">
<div class='container row'>    
    
     <div class="col-md-5">
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
     <div class="col-md-5">
      <label for="">Enter the name: </label>
        <input type="text" name="class" placeholder="Class.." class="form-control">
     </div>
     <div class="col-md-2">
        <input type="submit" value='Add Class' class="form-control btn btn-primary">
     </div>
    </div>
 </form>

 <?php
  if (isset($_POST['category']) && !empty($_POST['category']) && isset($_POST['class'])) {
    $cat = $_POST['category'];
    $cla = $_POST['class'];
    $suk = mysqli_query($link, "INSERT INTO `class` (`id`, `school_id`, `category`, `class`) VALUES (NULL, '$adminschid', '$cat', '$cla'); ");
    if ($suk) {
        echo "<script> alert('Class has been added successfully'); 
              window.location.href='class.php'; </script> ";
    }
  }


?>

<?php 
echo "<hr><b> Choose a category to see the Classes inside </b><hr> 
  <form action='' method='get'> ";
  foreach ($getcat as $ct) {
    $id = $ct['id'];
    $nm = $ct['category'];

    echo " <input type='submit' value='$nm' name='fetchclass' class='btn btn-primary'> ";
  }
  echo "</form>";

  if(isset($_GET['fetchclass'])){
    $ft = $_GET['fetchclass'];
    $querydb = mysqli_query($link, "SELECT * FROM class WHERE school_id='$adminschid' && category='$ft' ");
   if(mysqli_num_rows($querydb) == 0){
    echo "There are no classes yet in the program";
   }else{
    echo "<b>" . mysqli_num_rows($querydb) . " Classes Found </b>
           <table class='table table-inline '> <tr> <th> Classes </th> </tr>  ";
    foreach ($querydb as $q) {
        $nm = $q['class'];
        $cid = $q['id'];
        echo "<form action='editcla.php'> 
              <tr><td> $nm </td>
              <td class='text-right'>
              <div class='action'>
              <form action='editcat.php'>
                 <button type='submit' name='edit' value='$cid' class='btn btn-sm bg-success-light mr-2'>
                 <i class='fas fa-pencil-alt'></i>
                 </a>
                 <button type='submit' name='delete' value='$cid' class='btn btn-sm bg-danger-light'>
                 <i class='fas fa-trash'></i>
                 </a>
                 </form>
              </div>
             </td>   
              </tr>";
    }
    echo "</form></table>";
   }
}
?>