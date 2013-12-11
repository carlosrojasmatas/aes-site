$(function() {

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
	
	$("#album-select").click(function(){
		var albumId = $(this).val()
		$.getJSON( "../albums/showResources?type=image&albumId=" + albumId, function( data ) {
			  if(data.length > 0 ){
				  	$(data).each(function(idx){
				  		$(".gallery").append("<li><a rel=\"prettyPhoto\" href='"+data[idx].path+"'><img src=\"" +data[idx].path+ "\"/></a></li>");
				  	});	
				  	console.log("the html" + $("a[rel^='prettyPhoto']").html())
				
//				  $( ".album-list" ).html( data );
			  }
			});
		
		
	  	$("a[rel^='prettyPhoto']").prettyPhoto();
	})

});