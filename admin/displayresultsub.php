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
                            <h5 class="form-title"><span> Viewing Students Subject Performance </span></h5>
                            </div>
                    <?php 
                    if (isset($_GET['subject'])) {
                        $stud_sess = $_GET['session'];
                        $stud_sem = $_GET['semester'];
                        $stud_trm = $_GET['term'];
                        $stud_sub = $_GET['subject'];
                        $stud_cla = $_GET['class'];    
                        $stud_cat = $_GET['category'];                       

                        echo "<b>SUBJECT: | $stud_sub SESSION : $stud_sess  |  TERM :  $stud_trm  |  CLASS : $stud_cla </b><hr>  ";

                        $fetch = mysqli_query($link, "SELECT * FROM resultdata WHERE subject_name='$stud_sub' && session='$stud_sess' && class='$stud_cla' && term='$stud_trm' && school_id='$adminschid' && category='$stud_cat' ");
                        echo "<table class='table table-inline'>
                             <tr> 
                                  <th> Student Name </th>
                                  <th> CA1 </th>
                                  <th> CA2 </th>
                                  <th> EXAM </th>                                   
                            </tr> ";
                        foreach ($fetch as $f) {
                            $studnm = $f['student'];
                            $ca1 = $f['ca1'];
                            $ca2 = $f['ca2'];
                            $exam = $f['exam'];

                            $rtotca1 += $ca1;
                            $rtotca2 += $ca2;
                            $rtotex  += $exam;


                            echo "<tr> 
                                    <td> $studnm </td>
                                    <td> $ca1 </td>
                                    <td> $ca2 </td>
                                    <td> $exam </td>
                            </tr>";
                            
                        }

                        
                        echo "<tr>
                        <td> </td> 
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        </tr>
                        
                        <tr>
                            <td> TOTAL=> </td> 
                            <td> $rtotca1 </td>
                            <td> $rtotca2 </td>
                            <td> $rtotex </td>
                            </tr>";
                       
                    }

                   

                    ?>
                </div>
               
                
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>
