$(function() {
	
	$("a[rel^='prettyPhoto']").prettyPhoto();
//	$("a[rel^='prettyPhoto']").prettyPhoto({
//		animation_speed: 'normal', /* fast/slow/normal */
//		horizontal_padding: 20, /* The padding on each side of the picture */
//		autoplay_slideshow:true,
//		ie6_fallback: true,
//		social_tools: true
//	});

	$("#add-photo").click(function() {
		$("#pageBody").append("<div id='popup-overlay'></div>");
		$("#new-photo-form").show("slow");
	});

	$("#button-cancel-photo").click(function() {
		$("#popup-overlay").remove();
		$("#new-photo-form").hide("slow");
	});

});

function initGallery(){
	$("ul.gallery li").hover(function() {
		$(this).animate({boxShadow: '0 0 30px #969696'},'fast'); 
		
	} , function() { 
		$(this).stop().animate({boxShadow: '0 0 0 0'},'fast');
	});

	$('a.media').media();
	
	$("#add-resource").button().click(function() {
		$("#pageBody").append("<div id='popup-overlay'></div>");
		$("#new-form").show("slow");
	});

	$("#button-cancel").click(function() {
		$("#popup-overlay").remove();
		$("#new-form").hide("slow");
	});

	var galleries = $('.ad-gallery').adGallery({
		loader_image : '/images/loader.gif',
		width : 700, // Width of the image, set to false and it will read the
		// CSS width
		height : 400, // Height of the image, set to false and it will read
		// the CSS height
		thumb_opacity : 0.7, // Opacity that the thumbs fades to/from, (1
		// removes fade effect)
		// Note that this effect combined with other effects might be resource
		// intensive
		// and make animations lag
		start_at_index : 0, // Which image should be displayed at first? 0 is
		// the first image
		description_wrapper : false, // Either false or a jQuery
		// object, if you want the
		// image descriptions
		// to be placed somewhere else than on top of the image
		animate_first_image : false, // Should first image just be displayed,
		// or animated in?
		animation_speed : 400, // Which ever effect is used to switch images,
		// how long should it take?
		display_next_and_prev : true, // Can you navigate by clicking on the
		// left/right on the image?
		display_back_and_forward : true, // Are you allowed to scroll the
		// thumb list?
		scroll_jump : 0, // If 0, it jumps the width of the container
		slideshow : {
			enable : true,
			autostart : false,
			speed : 5000,
			start_label : 'Reproducir',
			stop_label : 'Detener',
			stop_on_scroll : true, // Should the slideshow stop if the user
			// scrolls the thumb list?
			countdown_prefix : '(', // Wrap around the countdown
			countdown_sufix : ')',
			onStart : function() {
				// Do something wild when the slideshow starts
			},
			onStop : function() {
				// Do something wild when the slideshow stops
			}
		},
		effect : 'slide-hori', // or 'slide-vert', 'resize', 'fade', 'none' or
		// false
		enable_keyboard_move : false, // Move to next/previous image with
		// keyboard arrows?
		cycle : true, // If set to false, you can't go from the last image to
		// the first, and vice versa
		// All callbacks has the AdGallery objects as 'this' reference
		callbacks : {
			// Executes right after the internal init, can be used to choose
			// which images
			// you want to preload
			init : function() {
				// preloadAll uses recursion to preload each image right after
				// one another
				// this.preloadAll();
			},
			// This gets fired right after the new_image is fully visible
			afterImageVisible : function() {
				
				if(this.current_index +1 < this.images.length){
					var context = this;
					this.loading(true);
					
					
					this.preloadImage(this.current_index + 1, function() {
						// This function gets executed after the image has been
						// loaded
						context.loading(false);
					});
				}

			},
			// This gets fired right before old_image is about to go away, and
			// new_image
			// is about to come in
			beforeImageVisible : function(new_image, old_image) {
				// Do something wild!
			}
		}
	});

	// Change effect on the fly
	if(galleries[0]){
		galleries[0].settings.effect = 'fade';
	}
	
}