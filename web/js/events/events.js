var eventsBuffer = new Array();

$(function() {
	$("#month").change(function() {
		var month = $(this).val();
		var dataString = "month=" + month;
		$("#event-list").load("fetchEvents?"+dataString,function() {
		})
	});
	$("#add-new").click(function() {
		$("#pageBody").append("<div id='popup-overlay'></div>");
		$("#new-form").show("slow");
	});
	$("#button-cancel").click(function() {
		
		$("#popup-overlay").hide("remove");
		$("#new-form").hide("slow");
	});
	
	$(".show-image").each(function(index){
		$(this).click(function(){
			$("#pageBody").append("<div id='popup-overlay'></div>");
			var image= $(this).attr("mainimage");
			$("#event-image").children("img").attr("src",image);
			$("#event-image").show("slow");
		});
	});
	$("#event-img-close").click(function(){
		$("#popup-overlay").remove();
		$("#event-image").hide("slow");
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
});

function initCalendar() {
	// initialize tinymce
	$('textarea')
			.tinymce(
					{
						// Location of TinyMCE script
						script_url : '/js/tiny_mce/tiny_mce.js',

						// General options
						theme : "advanced",
						plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

						// Theme options
						theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect",
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

	$.fx.speeds._default = 500;
	$("#dialog:ui-dialog").dialog("destroy");
	$("#newForm").dialog({
		autoOpen : false,
		title : "Crear Evento",
		width : "auto",
		show : "fade",
		hide : "fade",
		draggable : false,
		resizable : false,
		modal : true,
		buttons : {
			"Crear Evento" : function() {
				$("#newForm").children("form").submit();
			},
			"Cancelar" : function() {
				$(this).dialog("close");
			}
		}

	});

	var isAdmin = $("#eventDetails").attr("isAdmin");

	if (isAdmin) {
		$("#eventDetails").dialog({
			autoOpen : false,
			width : "500px",
			show : "fade",
			hide : "fade",
			draggable : true,
			resizable : false,
			modal : true,
			buttons : {
				"Borrar Evento" : function() {
					$("#deleteEventForm").submit();
					refreshEvents();
				},
				"Cerrar" : function() {
					$(this).dialog("close");
				}
			}

		});
	} else {
		$("#eventDetails").dialog({
			autoOpen : false,
			width : "500px",
			show : "fade",
			hide : "fade",
			draggable : true,
			resizable : false,
			modal : true,
			buttons : {
				"Cerrar" : function() {
					$(this).dialog("close");
				}
			}

		});
	}

	$("#BtnCreateEvent").button().click(function() {
		$("#newForm").dialog("open").effect("fadeIn");

	});

	/**
	 * Initialize with current year and date. Returns reference to plugin
	 * object.
	 */
	var jfcalplugin = $("#calendar").jFrontierCal({
		date : new Date(),
		agendaClickCallback : agendaClickHandler,
		dragAndDropEnabled : false
	}).data("plugin");
	refreshEvents();
	/**
	 * Get the date (Date object) of the day that was clicked from the event
	 * object
	 */
	jfcalplugin.setAspectRatio("#calendar", 0.5);

	$("#dateSelect").datepicker({
		showOtherMonths : true,
		selectOtherMonths : true,
		changeMonth : true,
		changeYear : true,
		showButtonPanel : true,
		dateFormat : 'yy-mm-dd'
	});

	// init date fields
	$("#dateSelect").datepicker('setDate', new Date());
	$("#dateSelect").bind(
			'change',
			function() {
				var selectedDate = $("#dateSelect").val();
				var dtArray = selectedDate.split("-");
				var year = dtArray[0];
				// jquery datepicker months start at 1 (1=January)
				var month = dtArray[1];
				// strip any preceeding 0's
				month = month.replace(/^[0]+/g, "")
				var day = dtArray[2];
				// plugin uses 0-based months so we subtrac 1
				jfcalplugin.showMonth("#calendar", year, parseInt(month - 1)
						.toString());
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

	$("#BtnPreviousMonth").button();
	$("#BtnPreviousMonth").click(
			function() {
				jfcalplugin.showPreviousMonth("#calendar");
				// update the jqeury datepicker value
				var calDate = jfcalplugin.getCurrentDate("calendar"); // returns
																		// Date
				// object
				var cyear = calDate.getFullYear();
				// Date month 0-based (0=January)
				var cmonth = calDate.getMonth();
				var cday = calDate.getDate();
				// jquery datepicker month starts at 1 (1=January) so we add 1
				$("#dateSelect").datepicker("setDate",
						cyear + "-" + (cmonth + 1) + "-" + cday);
				refreshEvents();
				return false;
			});

	function refreshEvents() {
		var calDate = jfcalplugin.getCurrentDate("calendar");
		var month = calDate.getMonth();
		$.getJSON("../events/fetchEvents/?month=" + (month + 1),
				function(data) {
					var bufferedData = eventsBuffer[month];
					if (bufferedData && bufferedData[0].id == data[0].id) {
						return;
					}
					eventsBuffer[month] = data;
					$.each(data, function(key, value) {
						var startDate = new Date(value.start_date);
						startDate.setDate(startDate.getDate() + 1);
						var endDate = new Date(value.end_date);
						endDate.setDate(endDate.getDate() + 1);
						var startHour = value.start_time.substring(0,
								value.start_time.indexOf(":"));
						var startMin = value.start_time.substring(
								value.start_time.indexOf(":") + 1,
								value.start_time.length);
						var endHour = value.end_time.substring(0,
								value.end_time.indexOf(":"));
						var endMin = value.end_time.substring(value.end_time
								.indexOf(":") + 1, value.end_time.length);

						startDate.setHours(startHour);
						startDate.setMinutes(startMin);
						endDate.setHours(endHour);
						endDate.setMinutes(endMin);
						jfcalplugin.addAgendaItem("#calendar", value.title,
								new Date(startDate), new Date(endDate), false,
								{
									id : value.id,
									title : value.title,
									description : value.description,
									startDate : value.start_date,
									startTime : value.start_time,
									endDate : value.end_date,
									endTime : value.end_time,
									place : value.place,
									image : value.resized_image_path,
								}, {
									backgroundColor : "#FF0000",

								});
					});
				});
	}

	$("#BtnNextMonth").button();
	$("#BtnNextMonth").click(
			function() {
				jfcalplugin.showNextMonth("#calendar");
				// update the jqeury datepicker value
				var calDate = jfcalplugin.getCurrentDate("#calendar"); // returns
																		// Date
				// object
				var cyear = calDate.getFullYear();
				// Date month 0-based (0=January)
				var cmonth = calDate.getMonth();
				var cday = calDate.getDate();
				// jquery datepicker month starts at 1 (1=January) so we add 1
				$("#dateSelect").datepicker("setDate",
						cyear + "-" + (cmonth + 1) + "-" + cday);
				refreshEvents();
				return false;
			});

	/**
	 * Get the agenda item that was clicked.
	 */
	function agendaClickHandler(eventObj) {
		var agendaId = eventObj.data.agendaId;
		var agendaItem = jfcalplugin.getAgendaItemById("#calendar", agendaId);
		var data = agendaItem.data;
		$("#eventId").val(data["id"]);
		$("#eventTitle").html(data["title"]);
		$("#startDate").html(data["startDate"]);
		$("#startTime").html(data["startTime"]);
		$("#endDate").html(data["endDate"]);
		$("#endTime").html(data["endTime"]);
		$("#eventImg").attr("src", data["image"]);
		$("#eventDescription").html(data["description"]);
		$("#eventDetails").dialog("open").effect("fadeIn");
	}
	;

	function applyToolTip(divElm, agendaItem) {

		// Destroy currrent tooltip if present
		if (divElm.data("qtip")) {
			divElm.qtip("destroy");
		}

		var displayData = "";

		var title = agendaItem.title;
		var startDate = agendaItem.startDate;
		var endDate = agendaItem.endDate;
		var data = agendaItem.data;
		displayData += "<br><b>" + title + "</b><br><br>";
		displayData += "<b>Fecha de Inicio:</b> " + data["startDate"] + "<br>"
				+ "<b>Fecha de Fin:</b> " + data["endDate"] + "<br><br>";
		displayData += "<b>Hora de Inicio:</b> " + data["startTime"] + "<br>"
				+ "<b>Hora de Fin:</b> " + data["endTime"] + "<br><br>";
		displayData += "<p style='float:left'><b>Descripci&oacute;n:</b> "
				+ data["description"] + "</p><br>"
		displayData += "<img src='" + data["image"] + "'</img>"
		// apply tooltip
		divElm.qtip({
			content : displayData,
			position : {
				corner : {
					tooltip : "rigthMiddle",
					target : "leftMiddle"
				},
				adjust : {
					mouse : true,
					x : -280,
					y : 30
				},
				target : "mouse"
			},
			show : {
				delay : 800,
				when : {
					event : 'mouseover'
				}
			},
			hide : {
				delay : 800,
				fixed : true
			},
			style : {
				border : {
					width : 2,
					radius : 10,
					color : '#B8B8B8'

				},
				padding : 10,
				textAlign : "left",
				width : 500,
				height : 500,
				tip : false,
				name : "light"
			}
		});
	}
	;

}