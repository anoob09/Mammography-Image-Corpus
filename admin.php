<?php 
require 'includes/db_connection.php';
  
  
if(!$_SESSION['admin_email'])  
{  
  header("Location: admin_login.php");//redirect to login page to secure the welcome page without login access.  
}  

$user_query= "SELECT * FROM `radiologists`";
$user_query_result=  mysqli_query($dbcon, $user_query) or die(mysqli_error($dbcon));
?>

<html>  
    <head>
        <title>Login</title>
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
        </style>
    </head>
    <body>  
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand">Mammography Image Corpus</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>Howdy <?php echo @$_SESSION['admin_name'];?></a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            
            <table class="table table-responsive table-striped table-bordered table-hover">
                <tbody>
                    <tr><th>DOC_ID</th><th>DOCTORS</th></tr>
                    <?php 
                      while($rows =  mysqli_fetch_assoc($user_query_result)){
                    ?>
                    <tr onclick="window.location='reviewed.php?case_id=<?php echo $rows['rad_id'];?>'">
                        <td> <?php echo $rows['rad_id'];?></td>
                        <td> Dr. <?php echo $rows['name'];?></td>
                    </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
        <?php include('includes/footer.php'); ?>
   </body> 
</html>  