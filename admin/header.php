<!DOCTYPE html>
<html lang="en">


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
   ?>
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title> TCGS Management System </title>
      <link rel="icon" href="assets/img/favicon.png" type='icon'>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <div class="main-wrapper">
         <div class="header">
            <div class="header-left">
               <a href="index.php" class="logo">
               <h4> TCGS </h4>
               
               </a>
               <a href="index.php" class="logo logo-small">
               <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
               </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-align-left"></i>
            </a>
            <div class="top-nav-search">
               <form>
                  <input type="text" class="form-control" placeholder="Search here">
                  <button class="btn" type="submit"><i class="fas fa-search"></i></button>
               </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
            </a>
            <ul class="nav user-menu">
               <li class="nav-item dropdown noti-dropdown">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <i class="far fa-bell"></i> <span class="badge badge-pill">2+</span>
                  </a>
                  <div class="dropdown-menu notifications">
                     <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                     </div>
                     <div class="noti-content">
                        <ul class="notification-list">
                           <li class="notification-message">
                              <a href="#">
                                 <div class="media">
                                    
                                    <div class="media-body">
                                    	<?php 
                                    	include_once '../function.php';
                                    	$getnoti = mysqli_query($link, "SELECT * FROM notifications ORDER BY id DESC ");
                                    	foreach ($getnoti as $n) {
                                    		$message = $n["message"];
                                    		$date = $n["date"];

                                    		echo "<p class='noti-details'><span class='noti-title'>$message
                                       <p class='noti-time'><span class='notification-time'>$date</span></p><hr>";
                                    	}
 
                                    	?>
                                    	
                                    </div>
                                 </div>
                              </a>
                           </li>
                           
                     <div class="topnav-dropdown-footer">
                        <a href="notifications.php">View all Notifications</a>
                     </div>
                  </div>
               </li>
               <li class="nav-item dropdown has-arrow">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <span class="user-img"><img class="rounded-circle" src="assets/img/favicon.png" width="31" alt="Tony Cheta Group of Schools Logo"></span>
                  </a>
                  <div class="dropdown-menu">
                     <div class="user-header">
                        
                        <div class="user-text">
                           <h6> TCGS </h6>
                           <p class="text-muted mb-0">Admin</p>
                        </div>
                     </div>
                     <a class="dropdown-item" href="profile.php">Profile</a>
                     <a class="dropdown-item" href="logout.php">Logout</a>
                  </div>
               </li>
            </ul>
         </div>
         <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
               <div id="sidebar-menu" class="sidebar-menu">
                  <ul>
                     <li class="menu-title">
                        <span>Main Menu</span>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-home"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                        <li><a href="index.php"> Admin </a></li>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-user-graduate"></i> <span> Students </span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="pupils.php">Student List</a></li>
                           <li><a href="add-student.php">Add Student</a></li>
                           
                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="teachers.php">Teacher List</a></li>                           
                           <li><a href="add-teacher.php">Teacher Add</a></li>
                           </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-building"></i> <span> Classes and Categories </span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="class.php">Classes</a></li>
                           <li><a href="category.php">Category</a></li>
                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-book"></i> <span> Results </span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="results.php">Students Results</a></li>
                           <li><a href="scratchcard.php">ScratchCard </a></li>
                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-book-reader"></i> <span> Subjects </span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="subjects.php">Subject List</a></li>
                           <li><a href="add-subject.php">Subject Add</a></li>                           
                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-money-bill"></i> <span> Finance </span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="pay_data.php">Students Payment Records</a></li>
                           <li><a href="fees_store.php"> Set School Fees </a></li>   
                           <li><a href="add_payment.php"> Add Payment </a></li>                           
                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-book"></i> <span> WAEC / NECO Result  </span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="submit_ssce.php">Submit Record</a></li>
                           <li><a href="fetch_ssce.php"> Fetch Collection Records </a></li>            
                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-book-open"></i> <span> Master List  </span> <span class="menu-arrow"></span></a>
                           <ul>
                             <li><a href="masterlist.php"> View Master List </a></li>
                           </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-bell"></i> <span> Notifications</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="addnoti.php">Add Notifications</a></li>
                           <li><a href="notifications.php">Notifications List</a></li>
                           
                        </ul>
                     </li>
                      
                    </ul>
               </div>
            </div>
         </div>
         <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
      <script src="assets/plugins/apexchart/chart-data.js"></script>
      <script src="assets/js/script.js"></script>