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
</div> <h3> Add Category .. </h3><br>
<form action="" method="post">
<div class='container row'>    
    
     <div class="col-md-8">
        <input type="text" name="category" placeholder="Pre-Nursery" class="form-control">
     </div>
     <div class="col-md-3">
        <input type="submit" class="form-control btn btn-primary">
     </div>
    </div>
 </form>

<?php 
  $getcate = mysqli_query($link, "SELECT * FROM category WHERE school_id = '$adminschid' ");
  if(mysqli_num_rows($getcate) == 0){
      echo "Category is empty... Try Adding More ...";
  }else{
    echo "
           <table class='table table-respomsive'>
              <tr><th>Existing Categories</th></tr>";
    foreach($getcate as $gt){
        $nm = $gt['category'];
        $gid = $gt['id'];

        echo "<tr>
             <td>$nm<td> 
             <td class='text-right'>
             <div class='action'>
             <form action='editcat.php'>
                <button type='submit' name='edit' value='$gid' class='btn btn-sm bg-success-light mr-2'>
                <i class='fas fa-pencil-alt'></i>
                </a>
                <button type='submit' name='delete' value='$gid' class='btn btn-sm bg-danger-light'>
                <i class='fas fa-trash'></i>
                </a>
                </form>
             </div>
            </td>
             </tr>";
    }
    echo "</table></div>";
  }

  if (isset($_POST['category']) && !empty($_POST['category'])) {
    $cat = $_POST['category'];
    $suk = mysqli_query($link, "INSERT INTO `category` (`id`, `school_id`, `category`) VALUES (NULL, '$adminschid', '$cat'); ");
    if ($suk) {
        echo "<script> alert('Category has been added successfully'); 
              window.location.href='category.php'; </script> ";
    }
  }
?>