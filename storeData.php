<?php
require 'includes/db_connection.php';
$case_id = (int)$_POST['case_id'];
$rad = (int)$_POST['view_id'];
$start = $_POST['start_time'];
$image = $_POST['image'];
$submit_id = $_SESSION['rad_id'];
$response = "Failed";
if($_COOKIE['value_change']==='Yes')
{
$sql_res= mysqli_query($dbcon, "select `mass` from `".$image."masses` where `case_id` = ".$case_id." and `rad_id` = ".$rad);
if(mysqli_num_rows($sql_res)>0)
{
    $sql = "update `".$image."masses` set `mass` = '".$_COOKIE['masses']."', `shape` = '".$_COOKIE['shape']."', `margin` = '".$_COOKIE['margin']."', `density` = '".$_COOKIE['density']."',`submit_id` = '".$submit_id."' where `case_id` = ".$case_id." and `rad_id` = ".$rad;
}
else
{
    $sql = "insert into `".$image."masses`(`case_id`,`rad_id`,`mass`,`shape`,`margin`,`density`,`submit_id`) VALUES('".$case_id."','".$rad."','".$_COOKIE['masses']."','".$_COOKIE['shape']."','".$_COOKIE['margin']."','".$_COOKIE['density']."','".$submit_id."')";
}
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));


$sql_res=mysqli_query($dbcon, "select `calcification` from `".$image."calcification` where `case_id` = ".$case_id." and `rad_id` = ".$rad);
if(mysqli_num_rows($sql_res)>0)
{
    $sql = "update `".$image."calcification` set `calcification` = '".$_COOKIE['calcification']."', `typically` = '".$_COOKIE['typically']."', `suspicious` = '".$_COOKIE['suspicious']."', `distribution` = '".$_COOKIE['distribution']."',`submit_id` = '".$submit_id."' where `case_id` = ".$case_id." and `rad_id` = ".$rad;
}
else
{
    $sql = "insert into `".$image."calcification`(`case_id`,`rad_id`,`calcification`,`typically`,`suspicious`,`distribution`,`submit_id`) VALUES('".$case_id."','".$rad."','".$_COOKIE['calcification']."','".$_COOKIE['typically']."','".$_COOKIE['suspicious']."','".$_COOKIE['distribution']."','".$submit_id."')";
}
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));


$sql_res=mysqli_query($dbcon, "select `architectural` from `".$image."architectural` where `case_id` = ".$case_id." and `rad_id` = ".$rad);
if(mysqli_num_rows($sql_res)>0)
{
    $sql = "update `".$image."architectural` set `architectural` = '".$_COOKIE['architectural']."',`submit_id` = '".$submit_id."' where `case_id` = ".$case_id." and `rad_id` = ".$rad;
}
else
{
    $sql = "insert into `".$image."architectural`(`case_id`,`rad_id`,`architectural`,`submit_id`) VALUES('".$case_id."','".$rad."','".$_COOKIE['architectural']."','".$submit_id."')";
}
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));


$sql_res=mysqli_query($dbcon, "select `asymmetries` from `".$image."asymmetries` where `case_id` = ".$case_id." and `rad_id` = ".$rad);
if(mysqli_num_rows($sql_res)>0)
{
    $sql = "update `".$image."asymmetries` set `asymmetries` = '".$_COOKIE['asymmetries']."',`submit_id` = '".$submit_id."' where `case_id` = ".$case_id." and `rad_id` = ".$rad;
}
else
{
    $sql = "insert into `".$image."asymmetries`(`case_id`,`rad_id`,`asymmetries`,`submit_id`) VALUES('".$case_id."','".$rad."','".$_COOKIE['asymmetries']."','".$submit_id."')";
}
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));


$sql_res=mysqli_query($dbcon, "select `intramammary` from `".$image."intramammary` where `case_id` = ".$case_id." and `rad_id` = ".$rad);
if(mysqli_num_rows($sql_res)>0)
{
    $sql = "update `".$image."intramammary` set `intramammary` = '".$_COOKIE['intramammary']."',`submit_id` = '".$submit_id."' where `case_id` = ".$case_id." and `rad_id` = ".$rad;
}
else
{
    $sql = "insert into `".$image."intramammary`(`case_id`,`rad_id`,`intramammary`,`submit_id`) VALUES('".$case_id."','".$rad."','".$_COOKIE['intramammary']."','".$submit_id."')";
}
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));


$sql_res=mysqli_query($dbcon, "select `skin` from `".$image."skin` where `case_id` = ".$case_id." and `rad_id` = ".$rad);
if(mysqli_num_rows($sql_res)>0)
{
    $sql = "update `".$image."skin` set `skin` = '".$_COOKIE['skin']."',`submit_id` = '".$submit_id."' where `case_id` = ".$case_id." and `rad_id` = ".$rad;
}
else
{
    $sql = "insert into `".$image."skin`(`case_id`,`rad_id`,`skin`,`submit_id`) VALUES('".$case_id."','".$rad."','".$_COOKIE['skin']."','".$submit_id."')";
}
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));


$sql_res=mysqli_query($dbcon, "select `solitary` from `".$image."solitary` where `case_id` = ".$case_id." and `rad_id` = ".$rad);
if(mysqli_num_rows($sql_res)>0)
{
    $sql = "update `".$image."solitary` set `solitary` = '".$_COOKIE['solitary']."',`submit_id` = '".$submit_id."' where `case_id` = ".$case_id." and `rad_id` = ".$rad;
}
else
{
    $sql = "insert into `".$image."solitary`(`case_id`,`rad_id`,`solitary`,`submit_id`) VALUES('".$case_id."','".$rad."','".$_COOKIE['solitary']."','".$submit_id."')";
}
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));


$sql_res=mysqli_query($dbcon, "select `associated` from `".$image."associated` where `case_id` = ".$case_id." and `rad_id` = ".$rad);
if(mysqli_num_rows($sql_res)>0)
{
    $sql = "update `".$image."associated` set `associated` = '".$_COOKIE['associated']."',`submit_id` = '".$submit_id."' where `case_id` = ".$case_id." and `rad_id` = ".$rad;
}
else
{
    $sql = "insert into `".$image."associated`(`case_id`,`rad_id`,`associated`,`submit_id`) VALUES('".$case_id."','".$rad."','".$_COOKIE['associated']."','".$submit_id."')";
}
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));


$sql_res=mysqli_query($dbcon, "select `location` from `".$image."location` where `case_id` = ".$case_id." and `rad_id` = ".$rad);
if(mysqli_num_rows($sql_res)>0)
{
    $sql = "update `".$image."location` set `location` = '".$_COOKIE['location']."',`submit_id` = '".$submit_id."' where `case_id` = ".$case_id." and `rad_id` = ".$rad;
}
else
{
    $sql = "insert into `".$image."location`(`case_id`,`rad_id`,`location`,`submit_id`) VALUES('".$case_id."','".$rad."','".$_COOKIE['location']."','".$submit_id."')";
}
mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));
    
    $submit_query = mysqli_query($dbcon, "select sysdate() as `submit` from dual");
    $submit_res = mysqli_fetch_assoc($submit_query);
    $submit = $submit_res['submit'];
    
    $time_check_query = mysqli_query($dbcon, "select * from `timestamping` where `case_id`  = ".$case_id." and `rad_id` = ".$rad);
    if(mysqli_num_rows($time_check_query) >= 10)
    {
        $time_del = mysqli_query($dbcon, "select `case_id`,`rad_id`,min(`start_time`) as `time` from `timestamping` where `case_id` = ".$case_id." and `rad_id` = ".$rad );
        $time_del_res = mysqli_fetch_assoc($time_del);
        //echo 'del.time='.$time_del_res['time'];
        mysqli_query($dbcon, "delete from `timestamping` where `case_id` = ".$case_id." and `rad_id` = ".$rad." and `start_time` = '".$time_del_res['time']."'");
    }
    
    $time_query = "insert into `timestamping`(`case_id`,`rad_id`,`start_time`,`submit_time`,`submit_id`,`image`) VALUES('".$case_id."','".$rad."','".$start."','".$submit."','".$submit_id."','".$image."')";
    mysqli_query($dbcon, $time_query) or die(mysqli_error($dbcon));
    
    $response = $submit;
?>
<script>
    document.cookie = "value_change=No; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
</script>
<?php
    echo $response;
}
?>