<!DOCTYPE html>
<!-- <html manifest="cache.manifest"> -->
<?php require 'includes/db_connection.php';
    if(!$_SESSION['email']) { header('Location:index.php');}
    if (isset($_GET['case_id']) && isset($_GET['image']) && isset($_GET['type']) && isset($_GET['view_id']))
    {
    $role = $_SESSION['role'];
    $rad_id = $_SESSION['rad_id'];
    $case_id = $_GET['case_id'];
    $type = $_GET['type'];
    $image = $_GET['image'];
    $view_id = $_GET['view_id'];
    if((($role === 'it admin' || $role === 'user') && ($type === 'report')) || ($role === 'radiologist'  && $type === 'report' && !($rad_id === $view_id)))
    {
        header('Location:caselist.php');
    }?>
<html>

<head>
<title>Annotation <?php echo $_GET['image'];?></title>
<meta charset="UTF-8">
<meta name="description" content="Medical viewer using DWV (DICOM Web Viewer) and jQuery UI.">
<meta name="keywords" content="DICOM,HTML5,JavaScript,medical,imaging,DWV">
<meta name="theme-color" content="#3ba22f"/>
<link rel="manifest" href="resources/manifest.json">
<link type="text/css" rel="stylesheet" href="css/style.css">
<link type="text/css" rel="stylesheet" href="ext/jquery-ui/themes/ui-darkness/jquery-ui-1.12.1.min.css">
<link rel="stylesheet" href="dist/css/annotate.min.css" type="text/css"/>

<style type="text/css" >
.ui-widget-content { background-color: #222; background-image: url();}
</style>
<!-- mobile web app -->
<meta name="mobile-web-app-capable" content="no" />
<!-- apple specific -->
<meta name="apple-mobile-web-app-capable" content="no" />
<!-- Third party (dwv) -->
<script type="text/javascript" src="node_modules/i18next/i18next.min.js"></script>
<script type="text/javascript" src="node_modules/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="node_modules/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="node_modules/jszip/dist/jszip.min.js"></script>
<script type="text/javascript" src="node_modules/konva/konva.min.js"></script>
<script type="text/javascript" src="node_modules/magic-wand-js/js/magic-wand-min.js"></script>
<!-- Third party (viewer) -->
<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="ext/jquery-ui/jquery-ui-1.12.1.min.js"></script>
<script type="text/javascript" src="ext/flot/jquery.flot.min.js"></script>
<!-- decoders -->
<script type="text/javascript" src="node_modules/dwv/decoders/pdfjs/jpx.js"></script>
<script type="text/javascript" src="node_modules/dwv/decoders/pdfjs/util.js"></script>
<script type="text/javascript" src="node_modules/dwv/decoders/pdfjs/arithmetic_decoder.js"></script>
<script type="text/javascript" src="node_modules/dwv/decoders/pdfjs/jpg.js"></script>
<script type="text/javascript" src="node_modules/dwv/decoders/rii-mango/lossless-min.js"></script>
<!-- dwv -->
<script type="text/javascript" src="node_modules/dwv/dist/dwv.min.js"></script>
<!-- Launch the app -->
<?php if($type === 'report') { ?>
<script type="text/javascript" src="src/appgui.js"></script>
<?php }
else { ?>
<script type="text/javascript" src="src/appgui_view.js"></script>
<?php } ?>
<script type="text/javascript" src="src/applauncher.js"></script>

<!-- State Files Reloader -->
<!--<script type="text/javascript" src="node_modules/dwv/src/app/application.js"></script>-->
<script type="text/javascript" src="node_modules/dwv/src/app/drawController.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/app/infoController.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/app/state.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/app/toolboxController.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/app/viewController.js"></script>

<!-- Tools -->
<script type="text/javascript" src="node_modules/dwv/src/tools/arrow.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/draw.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/drawCommands.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/editor.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/ellipse.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/filter.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/floodfill.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/freeHand.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/livewire.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/protractor.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/rectangle.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/roi.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/ruler.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/scroll.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/toolbox.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/undo.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/windowLevel.js"></script>
<script type="text/javascript" src="node_modules/dwv/src/tools/zoomPan.js"></script>


</head>

<body>     
    
    
<!-- DWV -->
<div id="dwv">

<div id="pageHeader">

<!-- Title -->
<h1 style="cursor:pointer;" onclick="window.location='caselist.php';">Mammography Image Corpus<!--<span class="dwv-version"></span>--></h1>

<!-- Toolbar -->
<div class="toolbar"></div>

</div><!-- /pageHeader -->

<div id="pageMain">

<!-- Open file -->
<div class="openData" title="File">
<div class="loaderlist"></div>
<div id="progressbar"></div>
</div>




<!-- Toolbox -->
<div class="toolList" title="Toolbox"></div>

<!-- History -->
<div class="history" title="History"></div>

<!-- Tags -->
<div class="tags" title="Tags"></div>

<!-- DrawList -->
<div class="drawList" title="Draw list"></div>

<!-- Help -->
<div class="help" title="Help"></div>

<!-- Layer Container -->
<div class="layerDialog" title="Image">
<div class="dropBox"></div>
<div class="layerContainer">
<canvas class="imageLayer">Only for HTML5 compatible browsers...</canvas>
<div class="drawDiv"></div>
<div class="infoLayer">
<div class="infotl"></div>
<div class="infotc"></div>
<div class="infotr"></div>
<div class="infocl"></div>
<div class="infocr"></div>
<div class="infobl"></div>
<div class="infobc"></div>
<div class="infobr" style="bottom: 64px;"></div>
<div class="plot"></div>
</div><!-- /infoLayer -->
</div><!-- /layerContainer -->
</div><!-- /layerDialog -->

</div><!-- /pageMain -->
</div><!-- /dwv -->
<?php } ?>
        <script>
        jQuery(document).ready(function(){
            jQuery(".loaderlist").hide();});
        </script>

        <script>
            document.cookie = "value_change=No; expires= Sat, 18 Dec 2018 12:00:00 UTC; path=/";
        </script>
</body>
</html>
