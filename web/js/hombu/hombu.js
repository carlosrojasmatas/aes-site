// Can also be used with $(document).ready222
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
  startMaps();
  
});


function startMaps() {
	var myLatlng = new google.maps.LatLng(-34.599118,-58.443509);
	var myOptions = {
		zoom : 16,
		center : myLatlng,
		mapTypeId : google.maps.MapTypeId.ROADMAP,
		overviewMapControl : true,
		mapTypeControl : false,
		panControl : true,
		streetViewControl : false,
		zoomControl : true,
		zoomControlOptions : {
			style : google.maps.ZoomControlStyle.LARGE
		}
	}
	map = new google.maps.Map(document.getElementById("hombu-map"), myOptions);
	
	var marker = new google.maps.Marker({
	    position: myLatlng,
	    title:"AES Honbu Dojo"
	});
	
	marker.setMap(map);
	
	map.redraw = function() {
		gmOnLoad = true;
		if (gmOnLoad) {
			google.maps.event.trigger(map, "resize");
			gmOnLoad = false;
		}
	}
	
}