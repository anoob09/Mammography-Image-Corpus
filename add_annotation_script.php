<?php
require ('includes/db_connection.php');
$myJSON = $_POST['myJSON'];
$rad_id = $_SESSION['rad_id'];
$image = $_SESSION['image'];
$case_id = $_SESSION['case_id'];
$view_id = $_SESSION['view_id'];
if (!file_exists("anno/".$rad_id)) {
    mkdir("anno/".$rad_id,0777,false);    
}
$path = "C:/wamp64/www/MIC/anno/".$rad_id."/".$image.$case_id.".json";
$f = fopen($path, "w+");
fwrite($f, json_decode($myJSON));
fclose($f);
chmod($path, 0777);
$save_path = "http://localhost/MIC/anno/".$rad_id."/".$image.$case_id.".json";
$sql_res= mysqli_query($dbcon, "select * from `annotations` where `case_id` = ".$case_id." and `rad_id` = ".$view_id." and `image` = '".$image."'");
if(mysqli_num_rows($sql_res)==0)
{
$sql_anno = "insert into `annotations`(`case_id`,`rad_id`,`image`,`path`,`submit_id`) VALUES('".$case_id."','".$view_id."','".$image."','".$save_path."','".$rad_id."')";
mysqli_query($dbcon, $sql_anno) or die(mysqli_error($dbcon));
}
?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

