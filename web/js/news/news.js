$(function(){
//	$.fx.speeds._default = 500;
//	$( "#dialog:ui-dialog" ).dialog( "destroy" );
//		$("#newForm").dialog({
//			autoOpen: false,
//			title: "Crear noticia",
//			width: "auto",
//			show:"fade",
//			hide: "fade",
//			draggable: false,
//			resizable:false,
//			modal: true,
//			buttons:{
//				"Crear Noticia":function(){
//					$("#newForm").children("form").submit();
//				},
//				"Cancelar" :function(){
//					$(this).dialog("close");
//				}
//			}
//			
//		});
	
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

	// start the pickers
	$('#advert_start_time').timepicker({
		// Options
		timeSeparator : ':', // The character to use to separate
		// hours and minutes. (default: ':')
		showLeadingZero : true, // Define whether or not to show a
		// leading zero for hours < 10.
		// (default: true)
		showMinutesLeadingZero : true, // Define whether or not to show a
		// leading zero for minutes < 10.
		// (default: true)
		showPeriod : false, // Define whether or not to show AM/PM
		// with selected time. (default: false)
		showPeriodLabels : true, // Define if the AM/PM labels on the
		// left are displayed. (default: true)
		defaultTime : '12:00', // Define a default time to use if
		// displayed inline or input is empty
		zIndex : null, // Overwrite the default zIndex used by
		// the time picker

		// trigger options
		showOn : 'focus', // Define when the timepicker is shown.
		// 'focus': when the input gets focus,
		// 'button' when the button trigger
		// element is clicked,
		// 'both': when the input gets focus and
		// when the button is clicked.
		button : null, // jQuery selector that acts as button
		// trigger. ex: '#trigger_button'

		// Localization
		hourText : 'Hora', // Define the locale text for "Hours"
		minuteText : 'Minuto', // Define the locale text for "Minute"
		amPmText : [ 'AM', 'PM' ], // Define the locale text for periods

	// Events
	});

	// start the pickers
	$('#advert_end_time').timepicker({
		// Options
		timeSeparator : ':', // The character to use to separate
		// hours and minutes. (default: ':')
		showLeadingZero : true, // Define whether or not to show a
		// leading zero for hours < 10.
		// (default: true)
		showMinutesLeadingZero : true, // Define whether or not to show a
		// leading zero for minutes < 10.
		// (default: true)
		showPeriod : false, // Define whether or not to show AM/PM
		// with selected time. (default: false)
		showPeriodLabels : true, // Define if the AM/PM labels on the
		// left are displayed. (default: true)
		defaultTime : '12:00', // Define a default time to use if
		// displayed inline or input is empty
		zIndex : null, // Overwrite the default zIndex used by
		// the time picker

		// trigger options
		showOn : 'focus', // Define when the timepicker is shown.
		// 'focus': when the input gets focus,
		// 'button' when the button trigger
		// element is clicked,
		// 'both': when the input gets focus and
		// when the button is clicked.
		button : null, // jQuery selector that acts as button
		// trigger. ex: '#trigger_button'

		// Localization
		hourText : 'Hora', // Define the locale text for "Hours"
		minuteText : 'Minuto', // Define the locale text for "Minute"
		amPmText : [ 'AM', 'PM' ], // Define the locale text for periods

	// Events
	});
	
	$("#show-image").click(function(){
		$("#pageBody").append("<div id='popup-overlay'></div>");
		$("#advert-image").show("slow");
	});
	
	$("#img-close").click(function(){
		$("#popup-overlay").remove();
		$("#advert-image").hide("slow");
	});
	
	$("#addNew").click(function() {
		$("#pageBody").append("<div id='popup-overlay'></div>");
		$("#new-form").show("slow");	
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
	
	
	//init the image pop up
	$("#simplePopUp").dialog({
		autoOpen: false,
		width: "auto",
		show:"fade",
		hide: "fade",
		draggable: true,
		resizable:true,
		modal: true,
		buttons:{
			"Cerrar" :function(){
				$(this).dialog("close");
			}
		}
		
	});
	
	$(".showImage").click(function(){
		$("#simplePopUp").html();
		$("#simplePopUp").html("<img src='" + $(this).children().attr("lang") + "'/>");
		$("#simplePopUp").dialog("open");
	});
});

