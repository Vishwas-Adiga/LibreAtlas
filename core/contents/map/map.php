<html>
	<head>
		<title><?= Wizard::getAppTitle(); ?></title>
		<?= Wizard::callAssets(array(Wizard::LIBRARY_JQUERY)); ?>
		<style>
			body {
				margin: 0px;
			}
			
			#map {
				height: 100%;
				width: 100%;
			}
		</style>
	</head>
	<body>
		<div id="container">
			<div id="map">
				
			</div>
			<script>
      			function initMap() {
        			var uluru = {lat: -25.363, lng: 131.044};
        			var map = new google.maps.Map(document.getElementById('map'), {
          				zoom: 4,
          				center: uluru
        			});
        			var marker = new google.maps.Marker({
          				position: uluru,
          				map: map
        			});
      			}
    		</script>
    		<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= Wizard::getMapsAPIKey(); ?>&callback=initMap"></script>
		</div>
	</body>
</html>
