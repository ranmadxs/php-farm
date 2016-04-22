jQuery(document).on("click", '.dayEvents', function(event) { 
    var dateTime = $(this).attr("datetime");
    var htmlDialog = "";
    var request = jQuery.ajax({
            type: "GET",
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

function imageIsLoaded(e) { 
    $("#file").css("color","green");
    $('#image_preview').css("display", "block");
    $('#previewing').attr('src', e.target.result);
    $('#previewing').attr('width', '250px');
    $('#previewing').attr('height', '230px');
};

jQuery(document).on("change", '#file', function(event) {
    $("#message").empty();         // To remove the previous error message
    var file = this.files[0];
    var imagefile = file.type;
    var match= ["image/jpeg","image/png","image/jpg"];	
    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
        $('#previewing').attr('src','noimage.png');
	$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
	return false;
    }
    else{
        var reader = new FileReader();	
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
    }		

});


jQuery(document).on("submit", '#formAlert', function(event) { 
    event.preventDefault();
    var fecha = jQuery("#fecha").val();
    var nombre = jQuery("#nombre").val();
    jQuery.ajax({            
            url : "EventController.php", 
            type: "POST",
            data:  new FormData(this),          
            contentType: false,
            cache: false,
            processData:false,
            dataType: "text",
            async : false,
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