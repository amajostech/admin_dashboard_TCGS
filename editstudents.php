<?php 

include_once 'function.php';
include 'header.php';

if(isset($_POST['stud_name'])){
    $editid = $_POST['editid'];
$studnm = $_POST['stud_name'];
$studem = $_POST['stud_email'];
$studcon = $_POST['stud_cont'];
$studdob = $_POST['stud_dob'];
$regno = $_POST['stud_regno'];
$address = $_POST['address'];
$religion = $_POST['religion'];
$gender = $_POST['gender'];
$pob = $_POST['pob'];
$homeadd = $_POST['homeadd'];
$stateorigin = $_POST['stateorigin'];
$lga = $_POST['lga'];
$bio = $_POST['bio'];


if (!empty($_FILES['passport']['name'])) {
    $filename = $_FILES['passport']['name'];
	$pix = $_FILES['passport']['name'];
	$saveto = "upload/" . $filename;
	$tmp = $_FILES['passport']['tmp_name'];
    $dt = date("Y-m-d"); 

    move_uploaded_file($tmp, $saveto);

    $update_nm = mysqli_query($link, "UPDATE `stud_profile` SET `stud_name` = '$studnm' WHERE `stud_profile`.`id` = $editid;");
    $update_ph = mysqli_query($link, "UPDATE `stud_profile` SET `phone` = '$studcon' WHERE `stud_profile`.`id` = $editid;");
    $update_si = mysqli_query($link, "UPDATE `stud_profile` SET `school_id` = '$schid' WHERE `stud_profile`.`id` = $editid;");
    $update_em = mysqli_query($link, "UPDATE `stud_profile` SET `email` = '$studem' WHERE `stud_profile`.`id` = $editid;");
    $update_rg = mysqli_query($link, "UPDATE `stud_profile` SET `reg_no` = '$regno' WHERE `stud_profile`.`id` = $editid;");
    $update_gn = mysqli_query($link, "UPDATE `stud_profile` SET `gender` = '$gender' WHERE `stud_profile`.`id` = $editid;");
    $update_rl = mysqli_query($link, "UPDATE `stud_profile` SET `religion` = '$rel' WHERE `stud_profile`.`id` = $editid;");
    $update_so = mysqli_query($link, "UPDATE `stud_profile` SET `stateorigin` = '$stateorigin' WHERE `stud_profile`.`id` = $editid;");
    $update_lg = mysqli_query($link, "UPDATE `stud_profile` SET `lga` = '$lga' WHERE `stud_profile`.`id` = $editid;");
    $update_bi = mysqli_query($link, "UPDATE `stud_profile` SET `bio` = '$bio' WHERE `stud_profile`.`id` = $editid;");
    $update_db = mysqli_query($link, "UPDATE `stud_profile` SET `dob` = '$studdob' WHERE `stud_profile`.`id` = $editid;");
    $update_pp = mysqli_query($link, "UPDATE `stud_profile` SET `passport` = '$filename' WHERE `stud_profile`.`id` = $editid;");

    if ($update_bi || $update_nm || $update_ph || $update_pp) {
        echo "<script> alert('Students Record Updated'); </script> ";
    }
}else {
    $update_nm = mysqli_query($link, "UPDATE `stud_profile` SET `stud_name` = '$studnm' WHERE `stud_profile`.`id` = $editid;");
    $update_ph = mysqli_query($link, "UPDATE `stud_profile` SET `phone` = '$studcon' WHERE `stud_profile`.`id` = $editid;");
    $update_si = mysqli_query($link, "UPDATE `stud_profile` SET `school_id` = '$schid' WHERE `stud_profile`.`id` = $editid;");
    $update_em = mysqli_query($link, "UPDATE `stud_profile` SET `email` = '$studem' WHERE `stud_profile`.`id` = $editid;");
    $update_rg = mysqli_query($link, "UPDATE `stud_profile` SET `reg_no` = '$regno' WHERE `stud_profile`.`id` = $editid;");
    $update_gn = mysqli_query($link, "UPDATE `stud_profile` SET `gender` = '$gender' WHERE `stud_profile`.`id` = $editid;");
    $update_rl = mysqli_query($link, "UPDATE `stud_profile` SET `religion` = '$rel' WHERE `stud_profile`.`id` = $editid;");
    $update_so = mysqli_query($link, "UPDATE `stud_profile` SET `stateorigin` = '$stateorigin' WHERE `stud_profile`.`id` = $editid;");
    $update_lg = mysqli_query($link, "UPDATE `stud_profile` SET `lga` = '$lga' WHERE `stud_profile`.`id` = $editid;");
    $update_bi = mysqli_query($link, "UPDATE `stud_profile` SET `bio` = '$bio' WHERE `stud_profile`.`id` = $editid;");
    $update_db = mysqli_query($link, "UPDATE `stud_profile` SET `dob` = '$studdob' WHERE `stud_profile`.`id` = $editid;");

    if ($update_bi || $update_nm || $update_ph || $update_pp) {
        echo "<script> alert('Students Record Updated'); </script> ";
    }
}

}

?>