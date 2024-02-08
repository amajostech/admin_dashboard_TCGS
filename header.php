<?php 
error_reporting(0);
include 'function.php';
session_start();
  if (!isset($_SESSION["usercode"])) {
  	header("location:login.php");
  }
  else{
    $userc = $_SESSION['usercode'];
    $getIDofSch = mysqli_query($link, "SELECT * FROM teachers WHERE scode = '$userc' ");
    if(mysqli_num_rows($getIDofSch) == 0){
      echo "You are not registered with any school";
    }else{
      foreach($getIDofSch as $gt){
        $schid = $gt['school_id'];
      }
      $getname = mysqli_query($link, "SELECT * FROM admin_login WHERE school_id = '$schid' ");
      foreach($getname as $gn) {
        $schname = $gn['sch_name'];
      }
      $SESSION['schoolid'] = $schid;
      
    }
   include_once 'top.php';
  }
?>