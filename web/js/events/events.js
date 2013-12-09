var eventsBuffer = new Array();


var options = {
		editable: true,
        theme: false,
		weekmode:'liquid',
		contentHeight:400,
		allDayText: "Dia completo",
		header: {
			left: 'prev,next today',
			center: 'title',
			right: '',
		},
		eventClick: function(calEvent, jsEvent, view) {

		},
		dayRender: function(date,cell){
		}
	}

function yearLoader(start,end, callback) {
	var date = new Date();
	var year= date.getFullYear();
	var date = new Date();
	var year= date.getFullYear();
	$.getJSON("../events/fetchEvents2?year=" + year,
			function(data) {
					var events = []
					$(data).each(function(idx){
						var startDate = data[idx].start_date +"T" + data[idx].start_time
						events.push({
							title: data[idx].title,
							start: startDate,
							url: data[idx].url
						});
					});
					callback(events)
			});
}

var regionLoader = function(start,end, callback) {
	var date = new Date();
	var year= date.getFullYear();
	var region = $("#regions").val()
	$.getJSON("../events/filterByRegion?year=" + year + "&region="+region,
			function(data) {
					var events = []
					$(data).each(function(idx){
						var startDate = data[idx].start_date +"T" + data[idx].start_time
						events.push({
							title: data[idx].title,
							start: startDate,
							url: data[idx].url
						});
					});
					callback(events)
			});
}


$(function() {
	
	$('#advert_start_time').timepicker();
	$('#advert_end_time').timepicker();
	
	
	loadsEventsForCurrentYear(options,yearLoader);
	
	bindRegionCombo();
	
	$("#addNew").click(function() {
		$("#pageBody").append("<div id='popup-overlay'></div>");
		$("#new-form").show("slow");	
		$("#new-form").css("z-index","999999");	
	});
	
	$("#button-cancel").click(function(){
		$("#popup-overlay").remove();
		$("#new-form").hide("slow");
	});
	
	$(".deleteButton").click(function(){
			var attrId= $(this).prop("id");
			var id= attrId.substr(attrId.indexOf("_")+1,attrId.length);
			$("#form_" + id).submit();
	});
	
	// initialize tinymce
	$('textarea').tinymce({
		// Location of TinyMCE script
		script_url : '/js/tiny_mce/tiny_mce.js',
		
		// General options
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
		width: 700,
		height:500,
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,insertdate,inserttime,|,forecolor,backcolor",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js"
		
	});
	$("#advert_type").change(function(){
		if($(this).val()=="event"){
			$("#event-details").show("slow");
		}else{
			$("#event-details").hide("slow");
		}
	});
	
	$("#advert_start_date").datepicker({
		showOtherMonths : true,
		selectOtherMonths : true,
		changeMonth : true,
		changeYear : true,
		showButtonPanel : true,
		dateFormat : 'yy-mm-dd'
	});

	$("#advert_end_date").datepicker({
		showOtherMonths : true,
		selectOtherMonths : true,
		changeMonth : true,
		changeYear : true,
		showButtonPanel : true,
		dateFormat : 'yy-mm-dd'
	});
	$("#advert_start_date").datepicker('setDate', new Date());
	$("#advert_end_date").datepicker('setDate', new Date());
	
});

function bindRegionCombo(){
	
	$("#regions").click(function(){
		var region = $(this).val()
		var loader = region == "Argentina"?yearLoader:regionLoader
		loadsEventsForCurrentYear(options, loader)
		
	})
}


function loadsEventsForCurrentYear(options,loader){
	
		$('#calendar').fullCalendar('destroy');
		options.events = loader
		$('#calendar').fullCalendar(options);
	
		
}