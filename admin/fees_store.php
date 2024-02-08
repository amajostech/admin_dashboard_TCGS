<html><?php 

include_once 'header.php';

?>
<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
    <div class="col">
    <h3 class="page-title">Set School Fees</h3>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="students.html">School Fees</a></li>
        <li class="breadcrumb-item active">School Fees Settings</li>
    </ul>
    </div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
    <div class="card">
    <div class="card-body">

        <form action="" method='get'>
            <div class="row">
                <div class="col-12">
                <h5 class="form-title"><span> Enter School Fees Payment </span></h5>
                <h5><?php echo "<b>Current Session</b> $session  | <b> $term </b> Term"; ?></h5><br>
                </div>
                
                <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Select Category</label>
                    <select name='category' class='form-control' required>
                        <?php 
                        $fetchcategory = mysqli_query($link, "SELECT * FROM category WHERE school_id='$adminschid' ");
                        if(mysqli_num_rows($fetchcategory) == 0){
                            echo "<script> alert('There is no Category or Class Yet. Add a class before before continuing...'); 
                                        window.location.href='category.php'; </script> ";
                        }else{
                            foreach ($fetchcategory as $f) {
                            $catname = $f['category'];
                            
                            echo "<option value='$catname'> $catname </option> ";
                            }
                        }                                                                                     
                        ?>
                    </select>
                </div>
                </div>
                
                <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label>Set Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control">
                </div>
                </div>
                
                <div class="col-12">
                <button type="submit" class="btn btn-primary"> Set School Fees </button>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
</div> 

<?php
  if (isset($_GET['category']) && isset($_GET['amount'])) {
    $amt = $_GET['amount'];
    $cat = $_GET['category'];

        $checkresult = mysqli_query($link, "SELECT * FROM school_fees WHERE session='$session' && term='$term' && amount='$amount' && category='$cat' && school_id='$adminschid' ");
    if (mysqli_num_rows($checkresult) >= 1) {
        echo "<h6 class='text-danger'>The School Fees for this Particular Session has been set already</h6>";
    }else{
        $insert = mysqli_query($link, "INSERT INTO `school_fees` (`id`, `school_id`, `category`, `session`, `term`, `amount`) VALUES (NULL, '$adminschid', '$cat', '$session', '$term', '$amt') ");
        if ($insert) {
            echo "<script> alert('School Fees for $cat category for this Term and Session has been Set'); 
                            window.location.href='fees_store.php';  </script>";
         }else{
            echo "<h6 class='text-danger'> The School Fees could not be set.. </h6>";
  
        }
    }

  }
?>
<?php 
     $checksess = mysqli_query($link, "SELECT * FROM school_fees WHERE school_id='$adminschid' ");
     echo "<table class='table table-inline'> 
     <tr> <td>Category</td>
          <td>Session</td>
          <td>Term</td>
          <td>Amount</td> </tr> 
        ";
     foreach ($checksess as $s) {
        $t = $s['term'];
        $amt = $s['amount'];
        $se = $s['session'];
        $ct = $s['category'];

        echo "<tr> <td> $ct </td> <td> $se </td> <td> $t </td> <td> $amt </td> </tr>";
     }
echo "</table>";
?>

</div>
</body>

</html>
