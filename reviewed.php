<?php 
require 'includes/db_connection.php';
  
  
if(!$_SESSION['admin_email'])  
{  
  header("Location: admin_login.php");//redirect to login page to secure the welcome page without login access.  
}  

$case_query= "SELECT * FROM `case`";
$case_query_result=  mysqli_query($dbcon, $case_query) or die(mysqli_error($dbcon));

$u_query="SELECT * FROM `user`";
$u_query_result= mysqli_query($dbcon, $u_query) or die(mysqli_error($dbcon));
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">Reviewed Cases</a>
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
                    <tr><th>CASE ID</th><th>CASE NAMES</th><th>STATUS</th></tr>
                    <?php 
                      while($rows =  mysqli_fetch_assoc($case_query_result)){
                    ?>
                    <tr onclick="window.location='reviewed.php?case_id=<?php echo $rows['case_id'];?>'">
                        <td> <?php echo $rows['case_id'];?></td>
                        <td><?php echo $rows['case_name'];?></td>
                        <td></td>
                    </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
        <?php include('includes/footer.php'); ?>
   </body> 
</html>  