<?php
    require 'includes/db_connection.php';
    if(!$_SESSION['email'])  
    {  
        $page = "login.php";
        fnx($page);
    }
    $case_id = "";
    if (isset($_GET['case_id']) && isset($_GET['image']) && isset($_GET['type']) && isset($_GET['type'])) {
        
        $role = $_SESSION['role'];
        $type = $_GET['type'];
        $view_id = $_GET['view_id'];
        $rad = $_SESSION['rad_id'];
        if((($role==='it admin' || $role==='user') && !($type==='view')) || ($role === 'radiologist' && $type === 'report' && !($view_id === $rad)))
        {
            $page = "caselist.php";
            fnx($page);
        }
        
        $case_id = $_GET['case_id'];
        $image = $_GET['image'];
        $view_id = $_GET['view_id'];
        
        $_SESSION['view_id'] = $view_id;      
        $_SESSION['case_id'] = $case_id;
        $_SESSION['image'] = $image;
        
        $sql = "SELECT * FROM `case` WHERE `case_id`=" . $case_id ;
        $sql_res = mysqli_query($dbcon, $sql)or die("Unable to Select the Images!\nKindly Login Again!");
        $row = mysqli_fetch_assoc($sql_res);
        
        $time_query = mysqli_query($dbcon, "select max(`submit_time`) as `time` from `timestamping` where `case_id` = ".$case_id." and `rad_id` = ".$rad);
        if(mysqli_num_rows($time_query)>0)
        {
            $time_res = mysqli_fetch_assoc($time_query);
            $time = $time_res['time'];
        }
        else
        {
            $time = "Not Reported";
        }
        $case_query= "SELECT case_id,case_name FROM `case`";
        $case_query_result= mysqli_query($dbcon, $case_query);
        include('includes/all_headers.php');
        
        $url = "http://localhost/MIC/";
        $main_url = $url.$row['img'.$image];
        $url1 = $url.$row['imgLMLO'];
        $url2 = $url.$row['imgRMLO'];
        $url3 = $url.$row['imgLCC'];
        $url4 = $url.$row['imgRCC'];
        ?>
<!DOCTYPE html>
<html style="background-color: #111;">
    <head>
        <title><?php echo $_GET['image'];?></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="dist/js/jquery.min.js"></script>
        <script type="text/javascript" src="dist/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.annotate.js"></script>
        <script type="text/javascript" src="dwv-0.23.4.min.js"></script>
        
        <link rel="stylesheet" href="mic.css" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
           body{
                padding-top:50px;
                background-color: #111;
            }
            .sidenav {
                height: 100%;
                width: 18%;
                z-index: 1;
                top: 0;
                left: 0;
                right:0;
                overflow-x: hidden;
            }
            .sidenav h3 {
                text-decoration: none;
                font-size: 11px;
                color: #818181;
                display: block;
            }
            .sidenav table{
                font-size: 11px;
            }
            .sidenav h3:hover {
                color: #f1f1f1;
            }
            
            .sidenav th{
                font-size:8px;
                background-color: #444444;
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
                overflow-x: hidden;
                padding: 42px 0px 0px 0px;
                text-decoration: none;
                font-size: 15px;
                color: #818181;
                display: block;
            }
            .rightbar label{font-size:13px;}
            .container1 {
	-webkit-appearance: none;
	padding: 2px;
	display: inline-block;
	position: relative;
        font-family: sans-serif;
        }
        .container1:checked {
                font-family: sans-serif;
                background-color: #e9ecee;
                color: #99a1a7;
        }
        .response{
            color : #999;
        }
        /*tr:nth-child(even) {
    background-color: #191919 !important;
}
             tr:nth-child(odd) {
    background-color: #111 !important;
}*/
        </style>
    </head>
    <body>
        <div id="urls" style="display:none">
            <p id="main_url"><?php echo $main_url;?></p>
            <p id="url1"><?php echo $url1;?></p>
            <p id="url2"><?php echo $url2;?></p>
            <p id="url3"><?php echo $url3;?></p>
            <p id="url4"><?php echo $url4;?></p>
        </div>
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
                        <tr style="color: #818181;"id="tab"><th><b>CASE ID</b></th><th><b>CASE NAMES</b></th><?php if($type === 'report') {?><th><b>STATUS</b></th><?php }?></tr>
                        <?php 
                          while($rows =  mysqli_fetch_assoc($case_query_result)){
                        ?>
                        <tr onclick="window.location='<?php echo 'enlarge1.php?case_id='.$rows['case_id'].'&image=LMLO&type='.$type.'&view_id='.$view_id;?>'" 
                          style="color: #818181; background-color:<?php if($case_id == $rows['case_id']){echo "#444444";} else {echo "#111";}?>;">
                            <td style="color: #818181;"> <?php echo $rows['case_id'];?></td>
                            <td style="color: #818181;"><?php echo $rows['case_name'];?></td>
                        
                            <?php if($type === 'report') { $case = $rows['case_id'];?><td><span style="color : 
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
                                                                            }?>;" >
                        <?php if($status === 1) echo 'Edit Report'; else echo 'Start Reporting';?></span></td><?php }?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <center>
                <h4 style="color:#818181">
                  <?php echo $image;?>
                </h4>
                
                <!--<img src="<?php// echo $row["img".$image]?>" alt="<?php// echo $image;?>" class="img-fluid img-responsive" id="toAnnotate"  style="border:2px solid black;">-->
                <div id="dwv" style="width:100%;">
                    <div class="layerContainer">
                        <canvas class="imageLayer" id="imageCanvas"></canvas>
                    </div>
                </div>
                <div><br></div>

                <button id="btn_click" class="btn btn-danger" style="width:120px;font-size:16px;background-color:#36383a!important;border-color: #36383a;"><?php if($type === 'report') echo 'Add Note';
                                                                                                                    else echo 'Annotations';;?></button>
                <?php if($type === 'report') {?>
            <button id='submitbutton' class="btn btn-danger" style="width:120px;font-size:16px;background-color:#36383a!important;border-color: #36383a;">Submit</button>
                <?php }?>
            <br/><br />
            <div class="response">Last updated on : <span id="response"><?php echo $time;?></span></div>
                </center>
                </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="padding-top: 3%;">
                        <?php if ($row['imgLMLO']!=NULL) {?>
                                <div onclick="window.location='<?php echo 'enlarge1.php?case_id='.$row['case_id'].'&image=LMLO&type='.$type.'&view_id='.$view_id;?>'">
                                    <div id="dwv1" style="width:100%;">
                                        <div class="layerContainer">
                                            <canvas class="imageLayer" id="imageCanvas1"></canvas>
                                        </div>
                                        <h5 style="font-size:12px; color: #818181;"><?php echo $row["case_name"]; ?> LEFT MLO</h5>
                                    </div>
                                </div>
                        <?php }?>
                        <?php if($row['imgRMLO'] != NULL) {?>
                                    <div onclick="window.location='<?php echo 'enlarge1.php?case_id='.$row['case_id'].'&image=RMLO&type='.$type.'&view_id='.$view_id;?>'">
                                        <div id="dwv2" style="width:100%;">
                                            <div class="layerContainer">
                                                <canvas class="imageLayer" id="imageCanvas2"></canvas>
                                            </div>
                                            <h5 style="font-size:12px;color: #818181;"><?php echo $row["case_name"]; ?> RIGHT MLO</h5>
                                        </div>

                                </div>
                        <?php }?>
                        <?php if($row['imgLCC'] != NULL) {?>
                                    <div onclick="window.location='<?php echo 'enlarge1.php?case_id='.$row['case_id'].'&image=LCC&type='.$type.'&view_id='.$view_id;?>'">
                                        <div id="dwv3" style="width:100%;">
                                            <div class="layerContainer">
                                                <canvas class="imageLayer" id="imageCanvas3"></canvas>
                                            </div>
                                            <h5 style="font-size:12px;color: #818181;"><?php echo $row["case_name"]; ?> LEFT CC</h5>
                                        </div>
                                    </div>
                        <?php }?>
                        <?php if($row['imgRCC'] != NULL) {?>
                                    <div onclick="window.location='<?php echo 'enlarge1.php?case_id='.$row['case_id'].'&image=RCC&type='.$type.'&view_id='.$view_id;?>'">
                                        <div id="dwv4" style="width:100%;">
                                            <div class="layerContainer">
                                                <canvas class="imageLayer" id="imageCanvas4"></canvas>
                                            </div>
                                            <h5 style="font-size:12px;color: #818181;"><?php echo $row["case_name"]; ?> RIGHT CC</h5>
                                        </div>
                                    </div>
                        <?php }?>
        </div>
        
           <?php
        $squery = "SELECT * FROM `birad` WHERE `case_id`='" . $case_id . "'";
        $query = mysqli_query($dbcon, $squery)or die("Unable to Select the Images");
        $row = mysqli_fetch_assoc($query);
        $b0 = $row['birad0'];
        $b1 = $row['birad1'];
        $b2 = $row['birad2'];
        $b3 = $row['birad3'];
        $b4a = $row['birad4a'];
        $b4b = $row['birad4b'];
        $b4c = $row['birad4c'];
        $b5 = $row['birad5'];
        $b6 = $row['birad6'];
        ?>
                <div class="rightbar col-lg-6 col-md-6 col-sm-6 col-xs-6" style="position: fixed;left: 50%;border-left:1px solid white;padding-top: 2%;">
                 <?php include 'birad.php'?>
                    <div class="col-xs-3"></div>
                    <div class="col-xs-9" style="padding-left: 7px;background-color: #111;">
                        <?php
                        
        $ques_query = "select ".$image."masses.mass, ".$image."masses.shape, ".$image."masses.margin, ".$image."masses.density, ".$image."calcification.calcification, ".$image."calcification.typically, ".$image."calcification.suspicious, ".$image."calcification.distribution, ".$image."architectural.architectural, ".$image."asymmetries.asymmetries, ".$image."intramammary.intramammary, ".$image."skin.skin, ".$image."solitary.solitary, ".$image."associated.associated, ".$image."location.location
                       from `".$image."masses`,`".$image."calcification`, `".$image."architectural`, `".$image."asymmetries`, `".$image."intramammary`, `".$image."skin`, `".$image."solitary`, `".$image."associated`, `".$image."location`
                            where
                            ".$image."masses.case_id=".$case_id." 
                            and 
                            ".$image."calcification.case_id=".$case_id." 
                            and 
                            ".$image."architectural.case_id=".$case_id."  
                            and
                            ".$image."asymmetries.case_id=".$case_id."  
                            and
                            ".$image."intramammary.case_id=".$case_id."  
                            and
                            ".$image."skin.case_id=".$case_id."  
                            and
                            ".$image."solitary.case_id=".$case_id."
                            and
                            ".$image."associated.case_id=".$case_id."
                            and
                            ".$image."location.case_id=".$case_id."
                            and
                            ".$image."masses.rad_id = ".$view_id."
                            and
                            ".$image."calcification.rad_id= ".$view_id." 
                            and
                            ".$image."architectural.rad_id= ".$view_id."
                            and
                            ".$image."asymmetries.rad_id= ".$view_id."
                            and
                            ".$image."intramammary.rad_id= ".$view_id."
                            and
                            ".$image."skin.rad_id= ".$view_id."
                            and
                            ".$image."solitary.rad_id= ".$view_id."
                            and
                            ".$image."associated.rad_id= ".$view_id."
                            and
                            ".$image."location.rad_id= ".$view_id;
                                    $ques_arr = mysqli_query($dbcon, $ques_query) or die("Could not connect to server!\nKindly Login Again!");
                            $ques = mysqli_fetch_assoc($ques_arr);
                        
                            if($type === 'report')
                            {
                                include 'Questions.php';
                            }
                            else
                            {
                                include 'QuestionsReview.php';
                            }
                        ?>
            </div>
                </div>
        <script language="javascript">
            <?php $state_query = mysqli_query($dbcon, "select `path` from `annotations` where `case_id` = ".$case_id." and `rad_id` = ".$view_id." and `image` = '".$image."'") or die(mysqli_error($dbcon));
            if (mysqli_num_rows($state_query)==0) {?>
                $('#btn_click').on('click', function() { window.location = "<?php echo 'annotation.php?input='.$main_url.'&case_id='.$case_id.'&image='.$image.'&type='.$type.'&view_id='.$view_id;?>"; });
            <?php } 
            else{
                $state_row = mysqli_fetch_assoc($state_query);
                $state = $state_row['path']; ?>
                $('#btn_click').on('click', function() { window.location = "<?php echo 'annotation.php?input='.$main_url.'&state='.$state.'&case_id='.$case_id.'&image='.$image.'&type='.$type.'&view_id='.$view_id;?>"; });
            <?php }?>
        </script>
        
            <script>
        var main_url = document.getElementById('main_url').innerHTML;
        var url1 = document.getElementById('url1').innerHTML;
        var url2 = document.getElementById('url2').innerHTML;
        var url3 = document.getElementById('url3').innerHTML;
        var url4 = document.getElementById('url4').innerHTML;
        
        // base function to get elements
        dwv.gui.getElement = dwv.gui.base.getElement;
        dwv.gui.displayProgress = function (percent) {};
        
        
        // create the dwv app
        var app = new dwv.App();
        // initialise with the id of the container div
        app.init({
            "containerDivId": "dwv",
            "tools" : ["ZoomAndPan"]
        });
        // load dicom data
        app.loadURLs([main_url]);

                // create the dwv app
                var app1 = new dwv.App();
                // initialise with the id of the container div
                app1.init({
                    "containerDivId": "dwv1",
                    "tools" : ["ZoomAndPan"]
                });
                // load dicom data
                app1.loadURLs([url1]);
                
        // create the dwv app
        var app2 = new dwv.App();
        // initialise with the id of the container div
        app2.init({
            "containerDivId": "dwv2",
            "tools" : ["ZoomAndPan"]
        });
        // load dicom data
        app2.loadURLs([url2]);
        
        // create the dwv app
        var app3 = new dwv.App();
        // initialise with the id of the container div
        app3.init({
            "containerDivId": "dwv3",
            "tools" : ["ZoomAndPan"]
        });
        // load dicom data
        app3.loadURLs([url3]);
        
        // create the dwv app
        var app4 = new dwv.App();
        // initialise with the id of the container div
        app4.init({
            "containerDivId": "dwv4",
            "tools" : ["ZoomAndPan"]
        });
        // load dicom data
        app4.loadURLs([url4]);
        
    </script>
    
<?php
    }
    else
    {
        $page = "caselist.php";
        fnx($page);
    }
?>
    </body>
</html>
<?php 
function fnx($page) {
    header("Location: ".$page);
}
?>