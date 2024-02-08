<html><?php 

include_once 'header.php';

?>
<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
    <div class="col">
    <h3 class="page-title">Add Payment Records</h3>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="students.html">Payments</a></li>
        <li class="breadcrumb-item active">Add Payment Payments</li>
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
                </div>

                <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label> Select a Class: </label>
                    <select name='class' class='form-control' required>

                        <?php 
                        $fetchcla = mysqli_query($link, "SELECT * FROM class WHERE school_id='$adminschid' ");
                        
                            foreach ($fetchcla as $f) {
                            $catname = $f['class'];
                            
                            echo "<option value='$catname'> $catname </option> ";
                            }
                                                                                                            
                        ?>
                    </select>
                 </div>
                </div>
                
                
                <div class="col-12">
                <button type="submit" class="btn btn-primary"> Fetch Students Records </button>
                </div>
            </div>
        </form>
      </div>
                    </div>
      <?php 
        if (isset($_GET['class'])) {
            $cla = $_GET['class'];
            echo $cla;

            $getcat = mysqli_query($link, "SELECT category FROM class WHERE class = '$cla' && school_id='$adminschid' ");
            foreach ($getcat as $f) {
                $ct = $f['category'];
            }
            

            $getfee = mysqli_query($link, "SELECT amount FROM school_fees WHERE category='$ct' && term='$term' && session='$session' && school_id='$adminschid' ");
            foreach ($getfee as $g) {
                $gt = $g['amount'];
            }


            echo "<h4> School Fees is &#8358; $gt </h4>"; 

            $fetch = mysqli_query($link, "SELECT * FROM stud_profile WHERE class='$cla' && school_id='$adminschid'  ");
            echo "<table class='table table-responsive'> <tr> <th> Name </th> <th> Amount to be paid </th> </tr> ";
            foreach($fetch as $ft){
                $names = $ft['stud_name'];
                $stdid = $ft['id'];

                echo "<tr>
                 <form method='get' action=''>
                       <td> $names </td> 
                       <td> <input type='text' class='form-control' name='amount_paid'> </td>
                       <td> <input type='submit' class='btn btn-primary' value='Enter'> </td>
                       <input type='text' hidden='' name='cla' value='$cla'> 
                       <input type='text' hidden='' name='stdid' value='$stdid'>
                       <input type='text' hidden='' name='name' value='$names'>
                       <input type='text' hidden='' name='amount' value='$gt'>
                 </form> 
                </tr> ";
            }


        }
      ?> 

<!-- Enter The Records Into The Database -->
   <?php 
     if (isset($_GET['amount_paid']) && isset($_GET['cla'])) {
        $class = $_GET['cla'];
        $amtpd = $_GET['amount_paid'];
        $sid = $_GET['stdid'];
        $name = $_GET['name'];
        $amt = $_GET['amount'];
        $dt = date("Y-m-d");

        $check = mysqli_query($link, "INSERT INTO `payments` (`id`, `school_id`, `stud_name`, `stud_id`, `payment`, `price_tage`, `term`, `class`, `session`, `date`) 
        VALUES (NULL, '$adminschid', '$name', '$sid', '$amtpd', '$amt', '$term', '$class', '$session', '$dt'); ");
        if($check){
            echo "<script> alert('Payment Added.'); 
                          window.location.href='add_payment.php?class=$class'; </script> ";
        }else{
            echo "<script> alert('Can't perform operation.'); 
                          window.location.href='add_payment.php?class=$class'; </script> ";
        }
     }
   ?>



    </div>
</div>
</div>
</div>
</div>
</body>

</html>
