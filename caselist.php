<?php 
require 'includes/db_connection.php';
  
  
if(!$_SESSION['email'])  
{  
  header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
}  

$case_query= "SELECT * FROM `case`";
$case_query_result=  mysqli_query($dbcon, $case_query) or die(mysqli_error($dbcon));

include('includes/all_headers.php');
        if(!$_SESSION['email'])
        {
            header("Location: login.php");
        }
        $rad = $_SESSION['rad_id'];
?>

<html>
    <head>
        <title>Case List</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min"></script> 
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="mic.css" type="text/css">
        <meta charset="UTF-8">
      
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
            tr:nth-child(even) {
    background-color: #191919 !important;
}
             tr:nth-child(odd) {
    background-color: #111 !important;
}
        </style>
    </head>
    <body  style= "background: linear-gradient(#111, #111); color: #f1f1f1;">  
        <div class="container">
            
            <table class="table table-responsive table-striped table-bordered table-hover" style="background-color : #111;">
                <tbody >
                    <tr style="background-color: #111; color:	#A9A9A9;"><th>CASE ID</th><th>CASE NAMES</th><?php if($role==='radiologist' || $role==='scientific admin'){?><th>YOUR STATUS</th><?php }?><th>OTHER'S STATUS</th></tr>
                    <?php 
                      while($rows =  mysqli_fetch_assoc($case_query_result)){
                          $case = $rows['case_id'];
                    ?>
                    <tr style="background-color: #111; color:	#A9A9A9;">
                        <td ><B><?php echo $case;?></B> </td>
                        <td><B><?php echo $rows['case_name'];?></B></td>
                        <?php if($role==='radiologist' || $role==='scientific admin'){?><td><span style="color : 
                        <?php $sql_query = "select `rad_id` from `lmlomasses` where `case_id` = ".$case." and `rad_id` =".$rad.
                                            " UNION SELECT `rad_id` from `rmlomasses` where `case_id` = ".$case." and `rad_id` =".$rad.
                                            " UNION select `rad_id` from `rccmasses` where `case_id` = ".$case." and `rad_id` =".$rad.
                                            " UNION SELECT `rad_id` from `lccmasses` where `case_id` = ".$case." and `rad_id` = ".$rad;
                                                                            $sql_query_res = mysqli_query($dbcon, $sql_query) or die(mysqli_error($dbcon));
                                                                            if(mysqli_num_rows($sql_query_res)>0)
                                                                            {
                                                                                echo 'green';
                                                                                $status = 1;
                                                                            }
                                                                            else
                                                                            {
                                                                                echo 'red';
                                                                                $status = 0;
                                                                            }?>;" onclick="window.location='enlarge1.php?case_id=<?php echo $case;?>&image=LMLO&type=report&view_id=<?php echo $rad;?>'">
                        <?php if($status === 1) echo 'Edit Reoprt'; else echo 'Start Reporting';?></span></td><?php }?>
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
                                                                                $rad_name_sql = mysqli_query($dbcon, "select `name`, SUBSTR(name,1,1) as init from `radiologists` where `rad_id` = ".$sql['rad_id']);
                                                                                $rad_name = mysqli_fetch_assoc($rad_name_sql);
                                                                                ?>
                            <em title="<?php
                            echo "Name : Dr. ".$rad_name['name'];
                            echo "\n";
                            echo "ID"." : ".$sql['rad_id'] ;?>  " class= "jump-response" 
                                style=" 
 display:inline-block;
  font-size:1em;
  width:1.5em;
  height:1.5em;
  line-height:1.5em;
  text-align:center;
  border-radius:50%;
  vertical-align:middle;
  margin-left:3px;
  color:#111;">
                                <span  style="font-weight: bolder; font-size: 15px;" onclick="window.location='enlarge1.php?case_id=<?php echo $case;?>&image=LMLO&type=<?php if($role === 'scientific admin') echo 'report'; else echo 'view';?>&view_id=<?php echo $sql['rad_id'];?>'"><?php echo $rad_name['init'];?></span>
                            </em> 
                                                                            <?php }?></td>
                    </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
        <script type="text/javascript">
            $(function() {
    $(".jump-response").each(function() {
        var hue = 'rgb(' + (Math.floor((256-199)*Math.random()) + 200) + ',' + (Math.floor((256-199)*Math.random()) + 200) + ',' + (Math.floor((256-199)*Math.random()) + 200) + ')';
         $(this).css("background-color", hue);
    });
});
        </script>
        
        <script>
            document.cookie = "value_change=No; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
        </script>
        <?php include('includes/footer.php'); ?>
   </body> 
</html>  