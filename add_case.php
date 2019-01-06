<!DOCTYPE html>
<html style="background-color: #111;">
<head>
    <title>Add Case</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="mic.css" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <h2 style="color:#eee"><b>ADD CASE</b></h2>
                        <form method="POST" action="add_case.php" enctype="multipart/form-data">                   

                            <input type="text" name="case_name" placeholder="Case Name" id="case_name" class="form-control" ><br>
                       
                            <input type="text" name="age" placeholder="Age"  id="age" class="form-control" required="true" ><br>
                            
                            <input type="text" name="parity" placeholder="Parity" id="parity" class="form-control" required="true" ><br>

                            <input type="text" name="contact" placeholder="Contact Number" id="contact" class="form-control" required="true" ><br>

                            <input type="text" name="family_history" placeholder="Family History" id="famlily_history" class="form-control" required="true" >

                        <h3>Upload Images</h3>

                        <label><b>LMLO</b></label> <input type="file" name="imageLMLO" id="imageLMLO" class="form-control" required="true" style="width: 55%">
                        <label><b>RMLO</b></label> <input type="file" name="imageRMLO" id="imageRMLO" class="form-control"   required="true" style="width: 55%">
                        <label><b>LCC</b></label> <input type="file" name="imageLCC" id="imageLCC"    class="form-control" required="true" style="width: 55%">
                        <label><b>RCC</b></label> <input type="file" name="imageRCC" id="imageRCC"    class="form-control"required="true"  style="width: 55%">
                        <br>
                            <input  type="submit" value="Upload" name="btn_upload" id="submit" class="btn-info btn"/>
                        </form>
                    </div>
                <?php 
                if(isset($_POST['btn_upload'])){
                    $age = $_POST['age'];
                    $case_name = $_POST['case_name'];
                    $parity = $_POST['parity'];
                    $contact = $_POST['contact'];
                    ini_set('post_max_size', '64M');
                    ini_set('upload_max_filesize', '64M');
                    $family_history = $_POST['family_history'];
                    $filetmpLMLO = $_FILES["imageLMLO"]["tmp_name"];
                    $filetmpRMLO = $_FILES["imageRMLO"]["tmp_name"];
                    $filetmpLCC = $_FILES["imageLCC"]["tmp_name"];
                    $filetmpRCC = $_FILES["imageRCC"]["tmp_name"];
                    $filenameLMLO = $_FILES["imageLMLO"]["name"];
                    $filenameRMLO = $_FILES["imageRMLO"]["name"];
                    $filenameLCC = $_FILES["imageLCC"]["name"];
                    $filenameRCC = $_FILES["imageRCC"]["name"];
                    if (!file_exists("mammos/".$case_name)) {
                    mkdir("mammos/".$case_name,0777,false);    
                    }
                    $dicomLMLO = "mammos/".$case_name."/".$filenameLMLO;
                    $dicomRMLO = "mammos/".$case_name."/".$filenameRMLO;
                    $dicomLCC = "mammos/".$case_name."/".$filenameLCC;
                    $dicomRCC = "mammos/".$case_name."/".$filenameRCC;
                    move_uploaded_file($filetmpLMLO,$dicomLMLO);
                    move_uploaded_file($filetmpRMLO,$dicomRMLO);
                    move_uploaded_file($filetmpLCC,$dicomLCC);
                    move_uploaded_file($filetmpRCC,$dicomRCC);
                    $sql_case = "insert into `case` (age,parity,family_history,contact_no,case_name,imgLMLO,imgRMLO,imgLCC,imgRCC) VALUE ('$age', '$parity', '$family_history', '$contact', '$case_name', '$dicomLMLO', '$dicomRMLO', '$dicomLCC', '$dicomRCC')";
                    if(mysqli_query($dbcon, $sql_case)){
                        echo "<script> alert('Case has been uploaded')</script>";
                    }
                    else{
                        echo "<script>alert('Failed to upload case')</script>";
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