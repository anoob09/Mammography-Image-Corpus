<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dictionary</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var availableTags = [
      "BREAST COMPOSITION",
      "Entire Fatty",
      "Scattered areas of fibrogandular density",
      "Heterogeneously dense, which may obscure masses",
      "Extremely dense, which lowers sensitivity",
      "Mass",
      "Shape",
      "oval",
      "round",
      "irregular",
      "Margin-",
      "circumscribed",
      "obscured",
      "microlobulated",
      "indistinct",
      "spiculated",
      "Density-",
      "fat",
      "low",
      "equal",
      "high",
      "ASYMMETRTY",
      "assymetry",
      "global",
      "focal",
      "developing",
      "ARCHITECTURAL DISTORTION:",
      "distorted parenchyma with no visible mass",
      "CALCIFICATIONS:",
      "Morphology",
      "typically benign",
      "Suscpicious",
      "amorphous",
      "coarse heterogeneous",
      "fine pleiomorphic",
      "fine linear or fine linear branching",
      "Distribution",
      "diffuse",
      "regional",
      "grouped",
      "linear",
      "segemental",
      "ASSOCIATED FEATURES:",
      "skin retraction",
      "nipple retraction",
      "skin thickening",
      "trabecular thickening",
      "axillary adenopathy",
      "architectural distortion",
      "calcifications"
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#tags" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );
  </script>
</head>
<body>
 
<div class="ui-widget">
    <label for="tags">Notes </label>
    <input id="tags" size="50">
</div>
    
</body>
</html>