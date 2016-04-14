jQuery(document).on("click", '.dayEvents', function(event) { 
	var dateTime = $(this).attr("datetime");		
	alert(dateTime);
});
	
	
jQuery(document).on("click", '.event', function(event) { 
	var idCalendarEvent = jQuery(this).children("event").attr("idCalendarEvent");
	alert(idCalendarEvent);
});