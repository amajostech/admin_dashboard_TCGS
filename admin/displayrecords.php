<html><?php 

include_once 'header.php';

?>
<div class="page-wrapper">
            
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                <div class="col-12">
                            <h5 class="form-title"><span> Viewing Students Payment Record </span></h5>
                            </div>
                    <?php 
                    if (isset($_GET['view'])) {
                        $stud_sess = $_GET['session'];
                        $stud_sem = $_GET['semester'];
                        $stud_trm = $_GET['term'];
                        $stud_nm = $_GET['name'];
                        $stud_cla = $_GET['class'];    
                        $id = $_GET['view']; 

                        echo "<b> STUDENT : $stud_nm  |  SESSION : $stud_sess  |  TERM :  $stud_trm  |  CLASS : $stud_cla </b><hr>  ";

                        $fetch = mysqli_query($link, "SELECT * FROM payments WHERE stud_id='$id' && session='$stud_sess' && class='$stud_cla' && term='$stud_trm' && school_id='$adminschid' ORDER BY id DESC  ");
                        echo "<table class='table table-responsive'>
                             <tr> 
                                  <th> Payment Made </th>
                                  <th> Date of Payment </th>
                                  <th> </th>
                            </tr> ";
                        foreach ($fetch as $f) {
                            $delid = $f['id'];
                            $nm = $f['stud_name'];
                            $se = $f['session'];
                            $trm = $f['term'];
                            $amt = $f['payment'];
                            $tot = $f['price_tage'];
                            $dt = $f['date'];
                            $cla = $f['class'];

                            $rtot += $amt;

                            echo "<tr> 
                             <td> $amt </td>
                             <td> $dt </td>
                             <form action=''method='get'>
                             <td> <button type='submit' name='delete' value='$delid' class='btn btn-sm bg-success-light mr-2'> 
                             <i class='fas fa-trash'></i> 
                             </td>
                            </tr>";
                            
                        }
                       
                        echo "</table> 
                           <label></label><hr>
                            SCHOOL FEES : <b> $tot </b> |  TOTAL PAID : <b> $rtot </b> ;
                           ";
                    }

                   

                    ?>
                </div>
               
                
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    if (isset($_GET['delete'])) {
        $delid = $_GET['delete'];
       $delete = mysqli_query($link, " DELETE FROM `payments` WHERE `payments`.`id` = $delid ");
       if($delete){
        echo "<script> history.back(); </script>";
       }
       

    }

    ?>

</body>

</html>
