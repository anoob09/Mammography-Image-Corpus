<?php 
require 'includes/db_connection.php';
  
  
if(!$_SESSION['email'])  
{  
  header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
}  

$case_query= "SELECT * FROM `case`";
$case_query_result=  mysqli_query($dbcon, $case_query) or die(mysqli_error($dbcon));
?>

<html>
    <head>
        <title>Case List</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min"></script> 
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="mic.css" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                padding-top:100px;
            }
            avatar
            {
                padding: 3px;
                margin: 3px;
                background-color: #006699;
                color: black;
                font-weight: bolder;
            }
        </style>
    </head>
    <body>  
        <?php include('includes/all_headers.php');
        if(!$_SESSION['email'])
        {
            header("Location: login.php");
        }
        $rad = $_SESSION['rad_id'];?>
        <div class="container">
            
            <table class="table table-responsive table-striped table-bordered table-hover">
                <tbody>
                    <tr><th>CASE ID</th><th>CASE NAMES</th><th>OTHER'S STATUS</th></tr>
                    <?php 
                      while($rows =  mysqli_fetch_assoc($case_query_result)){
                          $case = $rows['case_id'];
                    ?>
                    <tr>
                        <td> <?php echo $case;?></td>
                        <td><?php echo $rows['case_name'];?></td>
                        <td style="overflow : auto;"><?php $sql_query = "select `rad_id` from `lmlomasses` where `case_id` = ".$case." and NOT `rad_id` = ".$rad.
                                                                            " UNION
                                                                            SELECT `rad_id` from `rmlomasses` where `case_id` = ".$case." and NOT `rad_id` = ".$rad.
                                                                            " UNION
                                                                            select `rad_id` from `rccmasses` where `case_id` = ".$case." and NOT `rad_id` = ".$rad.
                                                                            " UNION
                                                                            SELECT `rad_id` from `lccmasses` where `case_id` = ".$case." and NOT `rad_id` = ".$rad;
                                                                            $sql_query_res = mysqli_query($dbcon, $sql_query) or die(mysqli_error($dbcon));
                                                                            while($sql = mysqli_fetch_assoc($sql_query_res))
                                                                            {
                                                                                $rad_name_sql = mysqli_query($dbcon, "select `name`, CONCAT(SUBSTR(name,1,1),'.',SUBSTR(name,LOCATE(' ',name)+1,1)) as init from `radiologists` where `rad_id` = ".$sql['rad_id']);
                                                                                $rad_name = mysqli_fetch_assoc($rad_name_sql);
                                                                                ?>
                            <span style="height: 18px; border-radius: 4px; width: 25px; background-color: #888888; padding: 3px; margin: 6px; text-align: center;">
                                <span style="font-weight: bolder; font-size: 15px;" onclick="window.location='enlarge1.php?case_id=<?php echo $case;?>&image=LMLO&type=view&view_id=<?php echo $sql['rad_id'];?>'"><?php echo $rad_name['init'];?></span>
                            </span> 
                                                                            <?php }?></td>
                    </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
        <?php include('includes/footer.php'); ?>
   </body> 
</html>  