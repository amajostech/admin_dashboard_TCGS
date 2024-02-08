<?php 
include_once 'header.php';
?>
<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">View Students Results</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="teachers.html">Results</a></li>
<li class="breadcrumb-item active">View Results</li>
</ul>
</div>
</div>
</div>

<?php 

if(isset($_GET['category'])){

$term = $_GET['term'];
$sess = $_GET['session'];
$class = $_GET['class'];
$cat = $_GET['category'];

# echo $term .$sess .$class .$cat;
$compstud = mysqli_query($link, "SELECT * FROM stud_profile WHERE category='$cat' && class='$class'");
if(mysqli_num_rows($compstud) >= 1){
  echo "<div class='col-12 col-sm-6'>
       <form action='../viewresult.php' method='get'>
       <div class='form-group'>
         <select name='stud_name' class='form-control' class='btn btn-primary'>";
  foreach ($compstud as $cs) {
  	$name = $cs['stud_name'];
      echo "<option value='$name'>$name</option>";
  }
  echo "</select ></div>
        <div class='col-12 col-sm-6'>
        <input type='' hidden='' value='$sess' name='session'>
        <input type='' hidden='' value='$class' name='class'>
        <input type='' hidden='' value='$term' name='term'>
        <input type='' hidden='' value='$cat' name='category'>
        <center>
        <input type='submit' value='View Result' class='form-control btn btn-primary'>
        </center>
        </form>";
	
}
}

?>