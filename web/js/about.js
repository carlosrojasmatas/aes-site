$(document).ready(function(){
	
	 
	$(".about-section").hide("fast");
	$("#about-section").show("slow");
	
	$("#cssmenu a").click(function(){
		var id = $(this).attr("id");
		var sect= id.split("-")
		var section= $("#" + sect[0] + "-section")
		if( section.is(":visible") == false){
			$(".about-section").hide("fast");
			section.show("slow")
		}
		if (sect[0] == "locationhombu"){
			startMaps();
		}
		
		if (sect[0] == "fotoshombu"){
			$('.flexslider').flexslider({
			    animation: "slide"
			  });
		}
		
	})
	
	 
	
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