$(document).ready(function($){	
	 	
	 var sendAjax = function() {
	 
	        $.post($ruta_nueva_pagina, { pregunta: $pregunta_id},function(data, textStatus) {
                   $('#todas-las-respuestas').append(data).fadeIn();
            }); 
	     } 
	 
         setInterval(sendAjax(), 5000);
        
	});		