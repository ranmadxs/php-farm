jQuery(document).on("click", '.dayEvents', function(event) { 
    var dateTime = $(this).attr("datetime");
    var htmlDialog = "";
    var request = jQuery.ajax({
            method: "GET",
            url : "EventController.php", 
            data: { action: "addEvent", fecha : dateTime },
            dataType: "html",
            async : false
        });
    request.done(function( html ) {
        htmlDialog = html;
    });
    $.alerts.popup(htmlDialog, "Agregar Evento");
});
jQuery(document).on("click", '#popup_ok', function(event) { 

    var nombre = jQuery("#nombre").val();
    var descripcion = jQuery("#descripcion").val();
    var fecha = jQuery("#fecha").val();
    jQuery.ajax({
            method: "POST",
            url : "EventController.php", 
            data: { action: "saveEvent", fecha : fecha, nombre : nombre, descripcion : descripcion},
            dataType: "text",
            async : true,
            success : function (data){
                var dayArray = fecha.split("-");
                var obj = jQuery.parseJSON(data);
                jQuery("#td_calendar_"+dayArray[2]).append("<div class='event'><event idcalendarevent='"+obj.id+"'>"+nombre+"</event></div>");
                $.alerts._hide();
            }
    });

    
});

	
jQuery(document).on("click", '.event', function(event) { 
	var idCalendarEvent = jQuery(this).children("event").attr("idCalendarEvent");
	alert(idCalendarEvent);
});