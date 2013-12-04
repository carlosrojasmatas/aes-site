var eventsBuffer = new Array();


var options = {
	height : 600,
	width : 800,
	navHeight : 10,
	calendarStartDate:new Date(),
	labelHeight : 25,
	navLinks: {
		enableToday: true,
		enableNextYear: false,
		enablePrevYear: false,
		p:'&lsaquo; Ant', 
		n:'Sig &rsaquo;', 
		t:'Hoy'
	},
	locale: {
		days: ["Domingo", "Lunes", "Martes", "Mi&eacute;rcoles", "Jueves", "Viernes", "S&aacute;bado", "Domingo"],
		daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"],
		daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
		months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
		monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
		weekMin: 'sm'
	},
	onDayLinkClick: function(dateIn) { 
    },
    onEventLinkClick: function(event) {
		return false; 
	},
    onMonthChanging: function(dateIn) {
    	var year= dateIn.getFullYear();
    	var date= new Date();
    	var currYear= date.getFullYear();
    	if(year != currYear){
    		alert("Solo es posible acceder a eventos del año en curso.");
    	}
		return false;
	}
};

$(function() {
	
	$('#advert_start_time').timepicker();
	$('#advert_end_time').timepicker();
	
	
	var date= new Date();
	loadsEventsForCurrentYear(options);
	
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
	
	//initialize tinymce
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
		var date = new Date();
		var year= date.getFullYear();
		$.getJSON("../events/filterByRegion/?year=" + year + "&region="+region,
			function(data) {
					$.jMonthCalendar.Initialize(options,data);
					
					for(ev in data){
						var id= data[ev].EventID;
						var selector= "#Event_"+ id;
						var description= data[ev].Description.substring(0,400) + "...";
						$(selector).qtip({
							content: "<h3>" + data[ev].Title + "</h3> <br>" + description,
							show: {
								delay:1000,
							},
							style: { 
								classes:'qtip-red qtip-shadow',
								 width: 500, // Overrides width set by CSS
												// (but no max-width!)
							     height: 200 
							}
						});
					}
			});
	})
}


function loadsEventsForCurrentYear(options){
		var date = new Date();
		var year= date.getFullYear();
		$.getJSON("../events/fetchEvents2/?year=" + year,
			function(data) {
					$.jMonthCalendar.Initialize(options,data);
					
					for(ev in data){
						var id= data[ev].EventID;
						var selector= "#Event_"+ id;
						var description= data[ev].Description.substring(0,400) + "...";
						$(selector).qtip({
							content: "<h3>" + data[ev].Title + "</h3> <br>" + description,
							show: {
								delay:1000,
							},
							style: { 
								classes:'qtip-red qtip-shadow',
								 width: 500, // Overrides width set by CSS
												// (but no max-width!)
							     height: 200 
							}
						});
					}
			});
		
}