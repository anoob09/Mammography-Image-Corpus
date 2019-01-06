<!DOCTYPE html>
<html>
    <head>
        <title>Case Details</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <link rel="stylesheet" href="mic.css" type="text/css">
        <script>
            function biradval()
            {
                if(document.form.birad.value=="")
            {
                alert("Choose birad");
                document.form.state.focus();
                return false;
            }
            }
        </script>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                padding-top:75px;
            }
            
            .caption{
                text-align: center;
                
            }
            .jumbotron{
                height: 150px;
                padding-bottom: 10px !important;
                background-color:#222 !important;
            
            }
             
        </style>
        <style>

</style>
    </head>
<?php
require 'includes/db_connection.php';
if(!$_SESSION['email'])  
{  
  header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
} 
$case_id="";
if(isset($_GET['case_id']))
{
    $case_id=$_GET['case_id'];
//$_SESSION['case_id']=$_GET['case_id'];
$sql= "SELECT * FROM `case` WHERE `case_id`='".$case_id."'";
$sql_res=  mysqli_query($dbcon, $sql)or die("Unable to Select the Images");
$row=  mysqli_fetch_assoc($sql_res);
if($row)
{
?>
    <body>
      
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand">Mammography Image Corpus</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Hello, <?php echo @$_SESSION['user_name']; ?></a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div></div>
        <div>
        <div class="container">
            <div class="col-lg-4 col-md-5 col-sm-4 col-xs-2"></div>
            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-6 jumbotron" style="margin-bottom:40px">
                <center>
                <h1 style="font-size:40px; color:white; "><?php 
                    echo $row["case_name"];
                    ?>
                </h1>
                    </center>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-4 col-xs-2"></div>
        </div>
        <div class="col-lg-3 col-md-2 col-sm-2 col-xs-2"></div>
        <div class="container">
            <a href="enlarge1.php"><div class="col-lg-3 col-md-5 col-sm-5 column_s">
                <img id='myImg' class="images" src="<?php echo $row["imgLMLO"]?>" alt="LEFT MLO" height="450px" width="100%">
                <div class="caption">
                    <h3><?php echo $row["case_name"]; ?> LEFT MLO</h3>
                </div>
                </div> </a>

            
            <a href="enlarge2.php"><div class="col-lg-3 col-md-5 col-sm-5 column_s">
                <img class="images" src="<?php echo $row["imgRMLO"]?>" alt="RIGHT MLO" height="450px" width="100%">
                <div class="caption">
                    <h3><?php echo $row["case_name"]; ?> RIGHT MLO</h3>
                </div>
            </div> </a>
        </div>
        <div id="boxedit"></div>
        <div class="col-lg-3 col-md-2 col-sm-2 col-xs-2"></div>
        <div class="container">
           <a href="enlarge3.php"> <div class="col-lg-3 col-md-5 col-sm-5 column_s">
                   <img class="images" src="<?php echo $row["imgLCC"]?>" alt="" height="450px" width="100%">
                <div class="caption" >
                    <h3><?php echo $row["case_name"]; ?> LEFT CC</h3>
            </div>
            </div></a>
            <a href="enlarge4.php"><div class="col-lg-3 col-md-5 col-sm-5 column_s">
                <img class="images" src="<?php echo $row["imgRCC"]?>" alt="" height="450px" width="100%">
                <div class="caption">
                    <h3><?php echo $row["case_name"]; ?> RIGHT CC</h3>
                </div>
            </div> </a>
        </div>
        </div>
        
        <div class="container"><br></div>
        <div class="container"><br></div>
        <div class="container"><br></div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-2"></div>
        <div class="container col-lg-6 col-md-6 col-sm-4 col-xs-6">
            
            <form method="POST" action="birad_script.php" onsubmit="return biradval()">
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="food" value="coffee" > coffee
                    </label>
            </div>
            <button class='btn btn-primary' type="submit" value='Submit' name='submit'>Submit</button>
        </form>
            </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-2"></div>
    </body>
    
</html>

<?php
}
}
include 'includes/footer.php';
?>


