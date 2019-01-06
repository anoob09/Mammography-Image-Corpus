<?php
require 'includes/db_connection.php';
    $birad0 = $_POST['birad0'];
    $birad1 = $_POST['birad1'];
    $birad2 = $_POST['birad2'];
    $birad3 = $_POST['birad3'];
    $birad4a = $_POST['birad4a'];
    $birad4b = $_POST['birad4b'];
    $birad4c = $_POST['birad4c'];
    $birad5 = $_POST['birad5'];
    $birad6 = $_POST['birad6'];
    $case_id = (int) $_POST['case_id'];
    $rad = (int)$_POST['view_id'];
    $submit_id = $_SESSION['rad_id'];
    $sql_res= mysqli_query($dbcon, "select `birad0` from `birad` where `case_id` = ".$case_id." and `rad_id` = ".$rad);
if(mysqli_num_rows($sql_res)>0)
{
    $sql = "update `birad` set `birad0` = '".$birad0."',`birad1` = '".$birad1."',`birad2` = '".$birad2."',`birad3` = '".$birad3."',`birad4a` = '".$birad4a."',`birad4b` = '".$birad4b."',`birad4c` = '".$birad4c."',`birad5` = '".$birad5."' , `birad6` = '".$birad6."', `submit_id` = '".$submit_id."' where `case_id` = ".$case_id." and `rad_id` = ".$rad;
}else{
    $sql = "insert into `birad`(`case_id`,`rad_id`,`birad0`,`birad1`,`birad2`,`birad3`,`birad4a`,`birad4b`,`birad4c`,`birad5`,`birad6`,`submit_id`) VALUES('".$case_id."','".$rad."','".$birad0."','".$birad1."','".$birad2."','".$birad3."','".$birad4a."','".$birad4b."','".$birad4c."','".$birad5."','".$birad6."','".$submit_id."')";
}
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));
?>