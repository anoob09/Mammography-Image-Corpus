<!DOCTYPE html>
<html style="background-color: #111;">
    <head>
        <title>Left MLO</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="dist/js/jquery.min.js"></script>
        <script type="text/javascript" src="dist/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.annotate.js"></script>
        <script type="text/javascript" src="zoom.js"></script>
        
        <link rel="stylesheet" href="mic.css" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
           body{
                padding-top:50px;
                background-color: #111;
            }
            .column_s{
                border:2px solid #000;
            }
            .caption{
                text-align: center;
            }
            .sidenav {
                height: 100%;
                width: 18%;
                z-index: 1;
                top: 0;
                left: 0;
                right:0;
                background-color: #111;
                overflow-x: hidden;
            }
            .sidenav h3 {
                text-decoration: none;
                font-size: 11px;
                color: #818181;
                display: block;
            }
            .sidenav table{
                font-size: 12px;
            }
            .sidenav h3:hover {
                color: #f1f1f1;
            }
            
            .sidenav th{
                font-size:8px;
                background-color: #f5f5f5;
            }
            @media (max-height: 450px) {
                .sidenav {padding-top: 15px;}
                .sidenav h3 {font-size: 12px;}
            }
            @media (max-width: 992px) {
                .sidenav th {font-size: 9px;}
                .sidenav tr {font-size: 9px;}
            }
             .rightbar{
                height: 100%;
                z-index: 1;
                top: 0px;
                background-color: #111;
                overflow-x: hidden;
                padding: 42px 0px 0px 0px;
                text-decoration: none;
                font-size: 15px;
                color: #818181;
                display: block;
            }
            .container1 {
	-webkit-appearance: none;
	background-color: #111;
	padding: 2px;
	display: inline-block;
	position: relative;
        font-family: sans-serif;
}
.container1:checked {
        font-family: sans-serif;
	background-color: #e9ecee;
	color: #99a1a7;
}        </style>
    </head>
    <?php
    require 'includes/db_connection.php';
    if(!$_SESSION['email'])  
    {  
        header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
    }
    $case_id = "";
    if (isset($_GET['case_id'])) {
        $case_id = $_GET['case_id'];
//$_SESSION['case_id']=$_GET['case_id'];
        $sql = "SELECT * FROM `case` WHERE `case_id`=" . $case_id ;
        $sql_res = mysqli_query($dbcon, $sql)or die("Unable to Select the Images");
        $row = mysqli_fetch_assoc($sql_res);
        
        
        $case_query= "SELECT case_id,case_name FROM `case`";
        $case_query_result= mysqli_query($dbcon, $case_query);
        
    ?>
    <body>
        <?php include('includes/all_headers.php');?>
       
        <div class="sidenav col-lg-2 col-md-2 col-sm-2 col-xs-2" style="position :fixed;border-right:1px solid white; padding-left: 4px;">
            <div style="padding-top:40px;">
                <h3>Name : <?php echo $row['case_name']; ?></h3>
                <h3>Age : <?php echo $row['age']; ?></h3>
                <h3>Parity : <?php echo $row['parity']; ?></h3>
                <h3>Family History : <?php echo $row['family_history']; ?></h3>
                <h3>Contact : <?php echo $row['contact_no']; ?></h3>
            </div>
            <div>
                <table class="table table-responsive table-bordered table-hover" id="table" style= "height:70%; overflow: auto;">
                    <tbody>
                        <tr id="tab"><th>CASE ID</th><th>CASE NAMES</th><th>STATUS</th></tr>
                        <?php 
                          while($rows =  mysqli_fetch_assoc($case_query_result)){
                        ?>
                        <tr  onclick="window.location='enlarge1.php?case_id=<?php echo $rows['case_id'];?>'" 
                          style="background-color:<?php if($case_id == $rows['case_id']){echo "#f1f1f1";} else {echo "#111";}?>;">
                            <td> <?php echo $rows['case_id'];?></td>
                            <td><?php echo $rows['case_name'];?></td>
                        
                            <td></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <center>
                <h4 style="color:#f5f5f5">
                  LEFT CC
                </h4>
                
                <img src="<?php echo $row["imgLCC"]?>" alt="LEFT CC" classs="img-fluid img-responsive" id="toAnnotate"  style="border:2px solid black;">
     
                <div><br></div>

                <button id="btn_click" class="btn btn-danger" style="width:120px;font-size:20px;font-color:black;">Add Note</button>
                </center>  
                </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="padding-top: 3%;">
                                <img id='myImg' class="images" src="<?php echo $row["imgLMLO"] ?>" alt="LEFT MLO" height="70px" width="100%"
                                     onclick="window.location='enlarge1.php?case_id=<?php echo $row['case_id'];?>'">
                                    <h5 style="font-size:12px; color: #f5f5f5;"><?php echo $row["case_name"]; ?> LEFT MLO</h5>
                               
                                <img class="images" src="<?php echo $row["imgRMLO"] ?>" alt="RIGHT MLO" height="70px" width="100%"
                                     onclick="window.location='enlarge2.php?case_id=<?php echo $row['case_id'];?>'">
                                    <h5 style="font-size:12px;color: #f5f5f5;"><?php echo $row["case_name"]; ?> RIGHT MLO</h5>


                                <img class="images" src="<?php echo $row["imgLCC"] ?>" alt="LEFT CC" height="70px" width="100%"
                                     onclick="window.location='enlarge3.php?case_id=<?php echo $row['case_id'];?>'">
                                    <h5 style="font-size:12px;color: #f5f5f5;"><?php echo $row["case_name"]; ?> LEFT CC</h5>
                                    
                                <img class="images" src="<?php echo $row["imgRCC"] ?>" alt="RIGHT CC" height="70px" width="100%"
                                     onclick="window.location='enlarge4.php?case_id=<?php echo $row['case_id'];?>'">
                                    <h5 style="font-size:12px;color: #f5f5f5;"><?php echo $row["case_name"]; ?> RIGHT CC</h5>
        </div>
        
           <?php
        $squery = "SELECT * FROM `case` WHERE `case_id`='" . $case_id . "'";
        $query = mysqli_query($dbcon, $squery)or die("Unable to Select the Images");
        $row = mysqli_fetch_assoc($query);
        $a = $row["birad"];
        $c = explode(",", $a);
        ?>
                <div class="rightbar col-lg-6 col-md-6 col-sm-6 col-xs-6" style="position: fixed;left: 50%;border-left:1px solid white;">
                    <div class="container1" style="width:100%">
                                <center>
                                    <h5>BI-RAD SELECTION</h5>
                                    <form method="POST">
                                          <label class="container1"> Level 1
                                              <input type="checkbox" name="birad[]" value="Level 1" 
                                        <?php
                                        if (in_array("Level 1", $c)) {
                                            echo "checked";
                                        }
                                        ?>>
                                              <span class="checkmark"></span></label>
                                        <label class="container1"> Level 2
                                        <input type="checkbox" name="birad[]" value="Level 2" 
                                        <?php
                                               if (in_array("Level 2", $c)) {
                                                   echo "checked";
                                               }
                                               ?>>
                                        
                                        <span class="checkmark"></span></label>
                                               <label class="container1"> Level 3
                                        <input type="checkbox" name="birad[]" value="Level 3" 
                                        <?php
                                               if (in_array("Level 3", $c)) {
                                                   echo "checked";
                                               }
                                               ?>>
                                        <span class="checkmark"></span></label> 
                                       
                                               <label class="container1"> Level 4
                                        <input type="checkbox" name="birad[]" value="Level 4" 
                                        <?php
                                               if (in_array("Level 4", $c)) {
                                                   echo "checked";
                                               }
                                               ?>>
                                        <span class="checkmark"></span></label>
                                               <label class="container1"> Level 5
                                        <input type="checkbox" name="birad[]" value="Level 5" 
                                        <?php
                                               if (in_array("Level 5", $c)) {
                                                   echo "checked";
                                               }
                                               ?>>
                                        <span class="checkmark"></span></label>
                                               <label class="container1"> Level 6
                                        <input type="checkbox" name="birad[]" value="Level 6" 
                                        <?php
                                               if (in_array("Level 6", $c)) {
                                                   echo "checked";
                                               }
                                               ?>>
                                        <span class="checkmark"></span></label>
                                        <center>
                                            <button class="button button1" type="submit" value='submit' name='submit'>Submit</button>                                               
                                        </center>
                                    </form>
                                          </center>
                <?php
                    if (isset(filter_input_array(INPUT_POST)["submit"])) {
                    $birad = filter_input_array(INPUT_POST)["birad"];
                    $b = implode(",", $birad);
                    $sql = "update `case` set `birad`='" . $b . "' WHERE `case_id`='" . $case_id . "'";
                    $sql_res = mysqli_query($dbcon, $sql)or die("Unable to execute");
                }
                ?>
                            </div>
                    <div class="col-xs-3"></div>
                    <div class="col-xs-9" style="padding-left: 7px;background-color: #111;">
                        <?php
                            $email = $_SESSION['email'];
                            $rad_querry = mysqli_query($dbcon, "select `rad_id` from `radiologists` where `email` = '".$email."'") or die(mysqli_error($dbcon));
                            $radiologist = mysqli_fetch_assoc($rad_querry); 
                            $_SESSION['rad_id'] = $radiologist['rad_id'];
                            $rad = $_SESSION['rad_id'];
                            $ques_query = "select lccmasses.mass, 
                                lccmasses.shape, 
                                lccmasses.margin, 
                                lccmasses.density, 
                                lcccalcification.calcification, 
                                lcccalcification.typically, 
                                lcccalcification.suspicious, 
                                lcccalcification.distribution, 
                                lccarchitectural.architectural, 
                                lccasymmetries.asymmetries, 
                                lccintramammary.intramammary, 
                                lccskin.skin, 
                                lccsolitary.solitary, 
                                lccassociated.associated, 
                                lcclocation.location
                                from
                                `lccmasses`,
                                `lcccalcification`, 
                                `lccarchitectural`,
                                `lccasymmetries`, 
                                `lccintramammary`, 
                                `lccskin`, 
                                `lccsolitary`, 
                                `lccassociated`, 
                                `lcclocation`
                                 where  
                                lccmasses.case_id=".$case_id." 
                                and 
                                lcccalcification.case_id=".$case_id." 
                                and 
                                lccarchitectural.case_id=".$case_id."  
                                and
                                lccasymmetries.case_id=".$case_id."  
                                and
                                lccintramammary.case_id=".$case_id."  
                                and
                                lccskin.case_id=".$case_id."  
                                and
                                lccsolitary.case_id=".$case_id."
                                and
                                lccassociated.case_id=".$case_id."
                                and
                                lcclocation.case_id=".$case_id."
                                and
                                lccmasses.rad_id = ".$rad."
                                and
                                lcccalcification.rad_id= ".$rad." 
                                and
                                lccarchitectural.rad_id= ".$rad."
                                and
                                lccasymmetries.rad_id= ".$rad."
                                and
                                lccintramammary.rad_id= ".$rad."
                                and
                                lccskin.rad_id= ".$rad."
                                and
                                lccsolitary.rad_id= ".$rad."
                                and
                                lccassociated.rad_id= ".$rad."
                                and
                                lcclocation.rad_id= ".$rad;
                            $ques_arr = mysqli_query($dbcon, $ques_query) or die(mysqli_error($dbcon));
                            $ques = mysqli_fetch_assoc($ques_arr);
                            include 'Questions.php';
                        ?>
            </div>
                </div>
        <script>
            $('#btn_click').on('click', function() { window.location = "annotation.php?case_id="+<?php echo $row['case_id'];?>+"&image=LCC"; });
        </script>
     
<?php
}
    
?>
    </body>
    <script language="javascript">
            wheelzoom(document.querySelectorAll('img'), {maxZoom: 2})
    </script>
</html>