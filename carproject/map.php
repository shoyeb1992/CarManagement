<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <title>Car Management</title>
  <link rel="stylesheet" href="css/mapstyle.css">
</head>
<body>
    
  <div id="map"></div>

  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCAWXD0g0fbXbEkEmGP8_tJDDPtYt8S4DE&sensor=false"></script>
  <script>
		if(typeof(EventSource)!==undefined)
		{
			
			var source = new EventSource('server-data.php');
			source.onmessage = function(event)
			{
				var map = new google.maps.Map(document.getElementById("map"), {
				center: new google.maps.LatLng(19.075984, 72.877656),
				zoom: 12,
				mapTypeId: google.maps.MapTypeId.ROADMAP
				});
				
				var json = JSON.parse(event.data);
				console.log(json);
				var infoWindow = new google.maps.InfoWindow();
				
				var image = 'uploads/car-icon.png';
				for (var i = 0, length = json.length; i < length; i++) 
				{
					var data = json[i],
					latLng = new google.maps.LatLng(data.lat, data.lng);
					var marker = new google.maps.Marker({
					position: latLng,
					map: map,
					title: data.car_number,
					icon:image
					});
					(function(marker, data) {
						google.maps.event.addListener(marker, "click", function(e) {
							infoWindow.setContent(data.car_number+'<br>'+data.car_type);
							infoWindow.open(map, marker);
						});
					})(marker, data);

				}
			}
			
		}else{
			document.getElementById('map').innerHTML='Sorry your browser does not support  server sent event';
		}	
</script>

</body>
</html>