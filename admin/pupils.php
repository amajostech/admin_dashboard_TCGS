<?php 
 include_once 'header.php';
 include_once '../function.php';


?>
<div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title">Students</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Admin Dashboard</a></li>
                           <li class="breadcrumb-item active">Students List</li>
                        </ul>
                     </div>
                     
                  </div>
               </div>
               <div class="row">
                
<?php 
echo "<hr><b> Choose a category to see the Classes inside </b><hr> <br>
  <form action='' method='get'> ";
  $getcat = mysqli_query($link, "SELECT * FROM class WHERE school_id = '$adminschid' ");

  foreach ($getcat as $ct) {
    $id = $ct['id'];
    $nm = $ct['class'];

    echo " <input type='submit' value='$nm' name='fetchclass' style='margin:5px;' class='btn btn-primary'> ";
  }
  echo "</form>"; 
  
  if(isset($_GET['fetchclass'])){
    $ft = $_GET['fetchclass'];
    $querydb = mysqli_query($link, "SELECT * FROM stud_profile WHERE school_id='$adminschid' && class='$ft' ");
   if(mysqli_num_rows($querydb) == 0){
    echo "There are no pupils yet in the class";
   }else{
    echo "<b>" . mysqli_num_rows($querydb) . " Pupil(s) Found </b>
           <table class='table table-inline '> <tr> <th> Classes </th></tr>  ";
    foreach ($querydb as $q) {
        $nm = $q['stud_name'];
        $reg = $q['reg_no'];
        $cid = $q['id'];
        echo "        
        
        <form action='viewstudents.php'> 
              <tr><td> $nm </td>
              <td> $reg </td>
              <td class='text-right'>
              <div class='action'>
              <button type='submit' name='view' value='$cid' class='btn btn-sm bg-primary-light mr-2'>
                 <i class='fas fa-eye'></i>
                 </a>
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
