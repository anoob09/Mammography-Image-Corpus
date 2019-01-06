<?php require ('includes/db_connection.php');
$rad = $_GET['view_id'];
$image = $_GET['image'];
$case_id = $_GET['case_id'];
$anno_text = $_POST['anno_text'];
$submit_id = $_SESSION['rad_id'];
$anno_x = (double) $_POST['anno_x'];
$anno_y = (double) $_POST['anno_y'];
$anno_width = (double) $_POST['anno_width'];
$anno_height = (double) $_POST['anno_height'];
$anno_x = round($anno_x, 16);
$anno_y = round($anno_y, 16);
$anno_height = round($anno_height, 16);
$anno_width = round($anno_width, 16);
$sql = "update `".$image."notes` set `note` = '".$anno_text."', `submit_id` = '".$submit_id."' where `case_id` = ".$case_id." and `rad_id`= ".$rad." and `x_coor` = '".$anno_x."' and `y_coor` = '".$anno_y."' and `width` = '".$anno_width."' and `height` = '".$anno_height."'";
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));
?>