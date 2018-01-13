<script>
	function initMap() {

		/* Initialization of the map */

		// if mapStyle is not defined, use default (but set variable to avoid errors)
		if (typeof mapStyle === 'undefined') mapStyle = "";

		<?= Wizard::callMarkersArray(); ?>

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
		  			'<p><span style="font-size: 11px">ID: 142</span></p>'+
		  			'<p><span style="font-size: 11px">Last Updated: 13/02/2019 00:15</span></p>'+
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
