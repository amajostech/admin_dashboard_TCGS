<?php 

error_reporting(0);
error_log(0);
session_start();
include 'function.php';
   
    $admin = $_SESSION['admincode'];
    $findschID = mysqli_query($link, "SELECT * FROM admin_login WHERE scode = '$admin' ");
    if(mysqli_num_rows($findschID) == 0){
      echo "No School regsitered with this user name";
    }else{
      foreach ($findschID as $fs) {
         $adminschid = $fs['school_id'];
         $adminschname = $fs['sch_name'];
      }
      $_SESSION['adminschid'] = $adminschid;
      $_SESSION['adminschname'] = $adminschname;
    }

   $class = "Primary 1C";

  $fetch_students = mysqli_query($link, "SELECT * FROM stud_profile WHERE class='$class' ");
  $getcount = mysqli_num_rows($fetch_students);

?>

<noprint>
   
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title> Scratch Card View </title>
      <link rel="icon" href="assets/img/favicon.png" type='icon'>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body onload="print()" >
   <style>
      
      .background-container{
          background: #ffe;
          background-size: cover;
          width: 100vw;
          height: 100vh;
          flex-wrap: wrap;
          justify-content: space-around;
          align-items: center;

      } 
      .card-design {
         postion: absolute;
         width: 500px;
         height: 350px;
         margin: 0px;
         border-radius: 5px;

      }
      .card-design img {
         width: 100%;
         height: 100%;
         padding: 15px;
         object-fit: cover;

      }
      .card-text {
         position: absolute;            
         top: 15%;
         left: 30%;
         width: 100%;
         margin: 10px;
         padding: auto;
         color: white;
         text-align: none;
         font-size: 18px;
      }

      .card-text h2 {
         text-align: none;
         font-size: 24px;
         margin-bottom: 10px;
      }

      .card-text span{
        font-size: 11pt;
      }

      h1{
         font-family: Courier New ; 
         letter-spacing: 0.0.9em;
         font-weight: bold;
      }
      

   </style>

<div class="row">
                  <div class="col-sm-12">
                     <div class="card">
                              <div class="row">

                              <?php 
                              foreach ($fetch_students as $fs) {
                                 $nm = $fs['stud_name'];
                                 $cla = $fs['class'];
                                 $schid = $fs['school_id'];

                                 echo "
                                 <div class='col-12 col-sm-6'>
                                 <div class='form-group'>                                    
                                    <div class='col-12 col-sm-6 card-design'>  
                                    <div class='card-design'>
                                       <img src='assets/img/pixel.png' alt='car'>
                                       <div class='card-text'>
                                          <h6> $adminschname </h6>
                                          <br> 
                                          <h1> $nm </h1>
                                           <br>
                                          <h4>$nm</h4>
                                          <h5><b>$cla</b></h5>
                                          <span> https://tcis.com.ng/result/secondary/ </span>
                                       </div>
                                    </div>
                                 </div>  
                               </div>
                           </div>";
                              }

                              ?>
                                 