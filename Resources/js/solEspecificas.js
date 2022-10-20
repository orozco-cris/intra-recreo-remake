$(document).ready(function(){

	function obtenerPermiso(id_usuario, id_estado){
        var dat = {
            crud:"permisoDeterminado",
			usuario: id_usuario
        };

        //console.log("datos",dat);
		console.log(id_estado);
        $.ajax({
            data: dat,
            url:"./Model/ComunUsuaAjax.php",
            method: "POST",
            success: function(data){
				
                $("#permisoDeterminado").html(data);
				if(id_estado == 0)
				{
					$("#id_aceptar").removeClass("d-none");
				}
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    obtenerPermiso(atob($("#id_comunicado_especifico").val()), $("#id_estado_comunicado").val());

	function aceptarPermiso(id_comunicado)
	{
		var dat = {
			crud: "aceptarPermiso",
			id_comunicado: id_comunicado
		};
		$.ajax({
			data: dat,
			url: "./Model/ComunUsuaAjax.php",
			method: "POST",
			success: function(datos){
				if(datos == 0)
				{
					toastr["error"]("No se puedo aceptar el permiso.", "Error");
				}
				else
				{
					toastr["success"]("Permiso aceptado.", "Éxito");
					setTimeout(() => {
						window.location = "?page=permisos";
					}, 4000);
				}
			},
			error: function(error){
				console.log(error);
			}
		});
	}

	$("#id_aceptar").click(function(e){
		e.preventDefault();
		aceptarPermiso(atob($("#id_comunicado_especifico").val()));
	}); 
});