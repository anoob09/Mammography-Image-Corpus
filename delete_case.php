<!DOCTYPE html>
<html style="background-color: #111;">
<head>
    <title>Delete Case</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="mic.css" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php
function delete_directory($dirname) {
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
     if (!$dir_handle)
          return false;
     while($file = readdir($dir_handle)) {
           if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                     unlink($dirname."/".$file);
                else
                     delete_directory($dirname.'/'.$file);
           }
     }
     closedir($dir_handle);
     rmdir($dirname);
     return true;
}
?>
    <style>
        .btn
        {
            background-color:#1677CB !important;
            border-color:#080808 !important;
        }
        .sidenav {
            padding-top: 100px;
            height: 100%;
            width: 18%;
            z-index: 1;
            overflow-x: hidden;
        }
        .sidenav h3{
            font-size: 16px;
            color :#818181
        }
        .sidenav h3:hover{
            color :#f1f1f1;
        }
    </style>
</head>
<body>
    <?php
    require 'includes/db_connection.php';
    if(!isset($_SESSION['email']))
    {
        header('Location:index.php');
    }
    include 'includes/all_headers.php';
    if(isset($_SESSION['role']))
    {
        $role = $_SESSION['role'];
        if($role === 'scientific admin' || $role === 'it admin')
        {
    ?>
    <div class="sidenav col-xs-2"></div>
    <div class="container col-xs-8" style="padding-top:50px;">
        <div class="row">
                <div class="col-xs-1 col-md-2 col-lg-3"></div>
                    <div class="col-xs-10 col-md-8 col-lg-6">
                        <h2 style="color:#eee"><b>DELETE CASE</b></h2>
                        <form method="POST" action="delete_case.php" >                   

                            <input type="text" name="case_name" placeholder="Case Name" id="case_name" class="form-control" ><br>
                       
                            <input type="text" name="case_id" placeholder="Case ID"  id="case_id" class="form-control" required="true" ><br>
                            
                            <input  type="submit" value="Delete" name="btn_upload" id="submit" class="btn-info btn"/>
                        </form>
                    </div>
                <?php 
                if(isset($_POST['btn_upload'])){
                    $case_id = $_POST['case_id'];
                    $case_name = $_POST['case_name'];
                    $dirname = "mammos/".$case_name;
                    if (file_exists("mammos/".$case_name)) {
                        delete_directory($dirname);
                    }
                    $sql_case = "delete from `case` where `case_id`=".$case_id;
                    if(mysqli_query($dbcon, $sql_case)){
                        echo "<script> alert('Case has been deleted.')</script>";
                    }
                    else{
                        echo "<script>alert('Failed to delete.')</script>";
                    }
                    
                }
                ?>
                <div class="col-xs-1 col-md-2 col-lg-3"></div>
            </div>
    </div>

    <div class="col-xs-2"></div>
    <?php }
    else{
        header('Location:index.php');
        }
    }?>
</body>
</html>