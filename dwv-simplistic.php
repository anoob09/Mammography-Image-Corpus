<html>
    <head>
        <script type="text/javascript" src="dist/js/jquery.min.js"></script>
            <script type="text/javascript">
            jQuery.noConflict();
            </script>
            <script type="text/javascript" src="annotorious.min.js"></script>
            <link type="text/css" rel="stylesheet" href="css/theme-dark/annotorious-dark.css" />
            <link type="text/css" rel="stylesheet" href="mic.css">
            <script type="text/javascript" src="dwv-0.23.4.min.js"></script>
            <link type="text/css" rel="stylesheet" href="mic.css">
  
    </head>
    <body >
        <div id="dwv" style="width: 100px; height: 100px;">
    <div class="layerContainer">
        <canvas class="imageLayer"></canvas>
    </div>
</div>
    </body>
    <script>
        dwv.image.decoderScripts = {
    "jpeg2000": "node_modules/dwv/decoders/pdfjs/decode-jpeg2000.js",
    "jpeg-lossless": "node_modules/dwv/decoders/rii-mango/decode-jpegloss.js",
    "jpeg-baseline": "node_modules/dwv/decoders/pdfjs/decode-jpegbaseline.js"
};
    dwv.gui.getElement = dwv.gui.base.getElement;
dwv.gui.displayProgress = function (percent) {};

// create the dwv app
var app = new dwv.App();
// initialise with the id of the container div
app.init({
    "containerDivId": "dwv"
});
// load dicom data
app.loadURLs(["http://localhost/0002.DCM"]);    
    </script>
    
</html>