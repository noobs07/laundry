<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map" style="width:100%;height:380px;"></div>
	
	 
	<form action="" method="post">
	<input id="pac-input" style="width:90%" type="text" placeholder="Search Box">
    <input type="text" id="lat" name="lat" value="">
    <input type="text" id="lng" name="lng" value="">
	<button type="reset">RESET</button>
	
  </form>
	
  
    
  </body>
</html>