$(function() {
	
	$("#send-resource").button().click(function(){
		var albumId = $("#album-select").val()
		$("#album_resource_parent_id").val(albumId)
		console.log("album: " + albumId)
		$(".resource-form").submit();
	});
	
	$("ul.gallery li").hover(function() {
		$(this).animate({
			boxShadow : '0 0 30px #969696'
		}, 'fast');

	}, function() {
		$(this).stop().animate({
			boxShadow : '0 0 0 0'
		}, 'fast');
	});

	$.fx.speeds._default = 400;

	$("#create-album").button().click(function() {
		$("#pageBody").append("<div id='popup-overlay'></div>");
		$("#new-form").show("slow");
	});
	
	$("#button-cancel").click(function() {
		$("#popup-overlay").remove();
		$("#new-form").hide("slow");
	});
	
	$("#add-photo").button().click(function() {
		$("#pageBody").append("<div id='popup-overlay'></div>");
		$("#new-photo-form").show("slow");
	});

	$("#button-cancel-photo").click(function() {
		$("#popup-overlay").remove();
		$("#new-photo-form").hide("slow");
	});
	
	$("#album-select").click(function(){
		var albumId = $(this).val()
		$.getJSON( "../albums/showResources?type=image&albumId=" + albumId, function( data ) {
			$(".image-container").html("")
			  if(data.length > 0 ){
				  	$(data).each(function(idx){
				  		$(".image-container").append("<a  rel=\"prettyPhoto[gallery1]\"  href='"+data[idx].path+"'><img height=\"60\" src=\"" +data[idx].path+ "\" /></a>");
				  	});	
			  }
			}).always(function(){
				$("a[rel^='prettyPhoto']").prettyPhoto(
						{
							animation_speed: 'normal', /* fast/slow/normal */
							horizontal_padding: 20, /* The padding on each side of the picture */
							autoplay_slideshow:true,
							ie6_fallback: true,
							social_tools: false
						}		
				)
			});
		
	  	
	})

});

function alert1(){
	alert("yes again")
}