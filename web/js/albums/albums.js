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

});