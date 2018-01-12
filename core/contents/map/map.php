<html>
	<head>
		<title><?= Wizard::getAppTitle(); ?></title>
		<?= Wizard::callAssets(array(Wizard::LIBRARY_JQUERY)); ?>
		<script src="core/contents/map/darkMapStyle.js"></script>
		<style>
			body {
				margin: 0px;
			}

			#map {
				height: 100%;
				width: 100%;
			}

			#dock {
				position: absolute;
				height: 100%;
				width: 75px;
				background-color: white;
				opacity: 0.5;
				z-index: 100;
				display: none;
			}

			#footer {
				position: absolute;
				/*background-color: white;*/
				z-index: 1000;
				bottom: 0px;
			}

			#centerFooter {
				display: flex;
				justify-content: center;
			}

			#footerLogo {
				height: 80px;
				width: 321px;
			}
		</style>
	</head>
	<body>
		<div id="container">
			<div id="dock">
				
			</div>
			<div id="centerFooter">
				<div id="footer">
					<!-- Transparent footer containing LibreHealth's logo -->
					<img id="footerLogo" src="https://librehealth.io/img/logo.png"/>
				</div>		
			</div>	
			<div id="map"></div>

			
			<script>
      			function initMap() {

      				/* Initialization of the map */

      				// if mapStyle is not defined, use default (but set variable to avoid errors)
      				if (typeof mapStyle === 'undefined') mapStyle = "";

        			var uluru = {lat: -25.363, lng: 131.044};
        			var map = new google.maps.Map(document.getElementById('map'), {
          				zoom: 3,
          				center: uluru,
          				styles: mapStyle
        			});

        			// this adds a marker to the map and creates an info window for it
        			function addMarker() {
	    				var marker = new google.maps.Marker({
	      					position: uluru,
	      					map: map,
	      					title: 'Australia',
	      					//draggable: true,
	      					animation: google.maps.Animation.DROP
	    				});

						var contentString = '<div id="content">'+
				      		'<h2>Australia Clinic</h1>'+
					      		'<div id="bodyContent">'+
						      		'<p><b>Distribution:</b> LibreEHR v2.0.0</p>'+
						      		'<p><b>Event:</b> West African Ebola outbreak</p>'+
						      		'<p><b>Number of Patients:</b> 128</p>'+
						      		'<p><b>Website:</b> <a href="http://www.google.com" target="_blank">www.google.com</a></p>'+
					      			'<p><b>Contacts:</b> australiaclinic@dummydata.net'+
					      		'</div>'+
				      		'</div>';

						var infoWindow = new google.maps.InfoWindow({
							content: contentString
						});

	    				marker.addListener('click', function() {
							infoWindow.open(map, marker);
	    				});

	    				google.maps.event.addListener(map, 'click', function(event) {
							infoWindow.close();
						});
    				}

    				// drop a marker each 
					function drop() {
					  	for (var i=0; i < 10; i++) {
					    	setTimeout(function() {
					    		addMarker();
					    	}, i * 200);
					  	}
					}

	    			drop();
        		}

    		</script>

    		<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= Wizard::getMapsAPIKey(); ?>&callback=initMap"></script>
		</div>
	</body>
</html>
