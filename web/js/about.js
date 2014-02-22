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
});