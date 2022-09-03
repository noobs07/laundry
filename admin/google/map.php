<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Tutorial Google Map - Petani Kode</title>
  
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCRwIYrKAO9xO6Dcug1bUtcrzGVvM051ws"></script>
<script>
// variabel global marker
var marker;
  
function taruhMarker(peta, posisiTitik){
    
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
		
      });
    }
  
     // isi nilai koordinat ke form
    document.getElementById("lat").value = posisiTitik.lat();
    document.getElementById("lng").value = posisiTitik.lng();
    
}
  
function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(-0.8610555,134.0489265),
    zoom:19,
    streetViewControl: false,
	fullscreenControl: false,
	mapTypeControl: false
  };
  
  var marker = new google.maps.Marker({
			position: new google.maps.LatLng(-0.8608811760973081, 134.04887017361068),
			map: peta,
			animation: google.maps.Animation.DROP,
			title: 'Erbe Laundry'

		});
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta, marker);
  
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });

}


// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
  

</script>
  
</head>
<body>

  <div id="googleMap" style="width:100%;height:380px;"></div>
  
  <form action="" method="post">
    <input type="text" id="lat" name="lat" value="">
    <input type="text" id="lng" name="lng" value="">
  </form>
  
</body>
</html>