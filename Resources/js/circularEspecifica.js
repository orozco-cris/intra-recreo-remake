$(document).ready(function(){

	function obtenerCircular(id_circular){
        var dat = {
            crud:"usuariosCirculares",
			circular: id_circular
        };

        $.ajax({
            data: dat,
            url:"./Model/ComunicadoAjax.php",
            method: "POST",
            success: function(data){
				
                $("#usuariosCirculares").html(data);
				
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    obtenerCircular(atob($("#id_circular_especifica").val()));




        function obtenerDetalleCircular(id_circular){
            var dat = {
                crud:"permisoDeterminado",
                comunicado: id_circular
            };
            $.ajax({
                data: dat,
                url:"./Model/ComunUsuaAjax.php",
                method: "POST",
                success: function(data){
                    
                    $("#circularEspecifica").html(data);
                    
                },
        
                error: function(error){
                    console.error(error);
                }
                
            });
        }
    
        obtenerDetalleCircular(atob($("#id_circular_especifica").val()));

 


});