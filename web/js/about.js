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
		
	})
//
//  $('#cssmenu > ul > li:has(ul)').addClass("has-sub");
//
//  $('#cssmenu > ul > li > a').click(function() {
//    var checkElement = $(this).next();
//    
//    $('#cssmenu li').removeClass('active');
//    $(this).closest('li').addClass('active');	
//    
//    
//    if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
//      $(this).closest('li').removeClass('active');
//      checkElement.slideUp('normal');
//    }
//    
//    if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
//      $('#cssmenu ul ul:visible').slideUp('normal');
//      checkElement.slideDown('normal');
//    }
//    
//    if (checkElement.is('ul')) {
//      return false;
//    } else {
//      return true;	
//    }		
//  });

});