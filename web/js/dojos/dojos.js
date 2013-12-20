var map;
var markersArray = new Array();
$(function() {
	$.fx.speeds._default = 400;
	$("#combo-regions").val("Argentina");

	// $("#new-dojo").click(function() {
	// $("#pageBody").append("<div id='popup-overlay'></div>");
	// $("#new-form").show("slow");
	// });
	//	
	$("#button-cancel").click(function() {
		window.location = "index"
	});

	// $("#map").dialog({
	// autoOpen : false,
	// width : "500",
	// height : "500",
	// show : "fade",
	// hide : "fade",
	// draggable : true,
	// resizable : false,
	// modal : true,
	// buttons : {
	// "Cerrar" : function() {
	// $(this).dialog("close");
	// }
	// }
	// });

	// $(".dojo-detail").dialog({
	// autoOpen : false,
	// title : "",
	// width : "auto",
	// show : "fade",
	// hide : "fade",
	// draggable : true,
	// resizable : false,
	// modal : true,
	// buttons : {
	// "Cerrar" : function() {
	// $(this).dialog("close");
	// }
	// }
	// });

	$("#combo-regions").change(function() {
		var region = $(this).val();
		$("#dojos-title").html("Dojos de " + region);
		// reload regions list
		var params = "?region=" + region.replace(" ", "%20") + "&ajax=true";
		
		$(".list-dojo").load("index" + params, function() {
			console.log("reloaded regions")
		})
	});

	// rebindControls();
	// startMaps();
	// locateRegion("Argentina");
});

function rebindControls() {
	$(".dojo-map-linker").each(
			function(index) {
				$(this).click(
						function() {
							$("#map").dialog("open");
							locateInMap($(this).attr("fullAddress"), $(this)
									.attr("address"), $(this).attr("dojo"),
									true);
							return false;
						});
			});
	// $(".dojo-photo").each(
	// function(index) {
	// $(this).click(function(){
	// $("#pageBody").append("<div id='popup-overlay'></div>");
	// $("#img-container").children("img").attr("src",$(this).children("img").attr("src"));
	// $("#img-container").show("slow");
	//						
	// });
	// });
	// $("#img-close").click(function() {
	//
	// $("#popup-overlay").remove();
	// $("#img-container").hide("slow");
	// });

}

function startMaps() {
	var myLatlng = new google.maps.LatLng(-34.595641, -58.393368);
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
	map = new google.maps.Map(document.getElementById("map"), myOptions);
	map.redraw = function() {
		gmOnLoad = true;
		if (gmOnLoad) {
			google.maps.event.trigger(map, "resize");
			gmOnLoad = false;
		}
	}

	$("#map").dialog( {
		autoOpen : false,
		modal : true,
		width : 555,
		height : 400,
		resizeStop : function(event, ui) {
			google.maps.event.trigger(map, 'resize')
		},
		open : function(event, ui) {
			google.maps.event.trigger(map, 'resize');
		}
	});
}

function locateRegion(region) {
	var geoCoder = new google.maps.Geocoder();
	geoCoder.geocode( {
		'address' : region + ",argentina"
	}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			map.panTo(results[0].geometry.location);
			if (region == "Argentina") {
				map.setZoom(4);
			} else if (region == "Capital Federal") {
				map.setZoom(8);

			} else {
				map.setZoom(6);
			}
			// clean up the markers
			if (markersArray) {
				for (i in markersArray) {
					markersArray[i].setMap(null);
				}
				markersArray.length = 0;
			}

			// load the dojos for the region
			$.getJSON("filterDojos?region=" + region, function(data) {
				$.each(data, function(key, dojo) {
					var name = dojo.name;
					var fullAddress = dojo.address + "," + dojo.city + ","
							+ dojo.province + ",Argentina";
					locateInMap(fullAddress, dojo.address, name);
				});

			});

		}
	});
}
function locateInMap(fullAddress, address, dojo, pan) {
	var geoCoder = new google.maps.Geocoder();
	geoCoder.geocode( {
		'address' : fullAddress
	}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			var marker = new google.maps.Marker( {
				map : map,
				position : results[0].geometry.location,
				icon : "/images/marker.png"
			});
			if (pan) {
				map.panTo(results[0].geometry.location);
				map.setZoom(16);
			}
			var infowindow = new google.maps.InfoWindow( {
				content : "<span><b>" + dojo + "</b></span><br><br>" + address
			});
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map, marker);
			});
			markersArray[markersArray.length] = marker;
		}
	});
}
