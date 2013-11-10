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
	var date= new Date();
	loadsEventsForCurrentYear(options);

});

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
								 width: 500, // Overrides width set by CSS (but no max-width!)
							     height: 200 
							}
						});
					}
			});
		
}