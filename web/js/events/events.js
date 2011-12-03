var eventsBuffer = new Array();

$(function() {
	var options = {
		height : 600,
		width : 800,
		navHeight : 10,
		calendarStartDate:new Date(),
		labelHeight : 25,
		navLinks: {
			enableToday: true,
			enableNextYear: true,
			enablePrevYear: true,
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
        onMonthChanging: function(dateIn) {
        	alert(dateIn);
			//this could be an Ajax call to the backend to get this months events
			//var events = [ 	{ "EventID": 7, "StartDate": new Date(2012, 1, 1), "Title": "10:00 pm - EventTitle1", "URL": "#", "Description": "This is a sample event description", "CssClass": "Birthday" },
			//				{ "EventID": 8, "StartDate": new Date(2012, 1, 2), "Title": "9:30 pm - this is a much longer title", "URL": "#", "Description": "This //is a sample event description", "CssClass": "Meeting" }
//			];
//			$.jMonthCalendar.ReplaceEventCollection(events);
			return true;
		}
	};
	$.jMonthCalendar.Initialize(options, null);

});