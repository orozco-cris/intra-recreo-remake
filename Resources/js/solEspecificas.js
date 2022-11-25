$(document).ready(function(){

	function obtenerPermiso(id_comunicado, id_estado){
        var dat = {
            crud:"permisoDeterminado",
			comunicado: id_comunicado
        };

        //console.log("datos",dat);
		console.log("estado",id_estado);
				var revi= $("#id_revision_comunicado").val();
        $.ajax({
            data: dat,
            url:"./Model/ComunUsuaAjax.php",
            method: "POST",
            success: function(data){
				
                $("#permisoDeterminado").html(data);
				 if(id_estado == 0)
				{
					$("#id_comentar").removeClass("d-none");
					$("#id_aceptar").removeClass("d-none");
				} 
				 if(revi==2)
				{
					$("#id_modificar").removeClass("d-none");
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

	function retroalimentarPermiso(id_comunicado)
	{
		var dat = {
			crud: "retroalimentarPermiso",
			id_comunicado: id_comunicado,
			mensaje: $("#id_input_retroalimentacion").val()
		};
		$.ajax({
			data: dat,
			url: "./Model/ComunUsuaAjax.php",
			method: "POST",
			success: function(datos){
				if(datos == 0)
				{
					toastr["error"]("No se puedo retroalimentar el permiso.", "Error");
				}
				else
				{
					toastr["success"]("Permiso retroalimentado.", "Éxito");
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

	$("#id_retro_permiso").click(function(e){
		e.preventDefault();
		retroalimentarPermiso(atob($("#id_comunicado_especifico").val()))
	})



	function getPermisoModificar(id_comunicado){
        var dat = {
            crud:"permisoAModificar",
			comunicado: id_comunicado
        };
        $.ajax({
            data: dat,
            url:"./Model/ComunUsuaAjax.php",
            method: "POST",
            success: function(data){
				console.log(data);
                $("#permisoAModificar").html(data);
				 
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }


		getPermisoModificar(atob($("#id_comunicado_especifico").val()));
	

		function filePreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.readAsDataURL(input.files[0]);
				reader.onload = function (e) {
					$('#imagen + img').remove();
					$('#imagen').after('<img src="' + e.target.result + '" style="width: 65% !important; height=15% !important"/>');
				}
			}
		}
	
		$("#file").change(function () {
			filePreview(this);
		});

		
	var myEditor;

	ClassicEditor
		.create(document.querySelector("#descripcion"))
		.then(editor => {
			myEditor = editor;
		})
		.catch(err => {
			console.error(err.stack);
		});

		function modificarPermiso(id,de, para, asunto, image, descripcion,codigo) {
			var formData = new FormData();
				var files = $('#file')[0].files[0];
				formData.append('file', files);
				$.ajax({
					url: './View/upload.php',
					type: 'post',
					data: formData,
					contentType: false,
					processData: false,
					success: function (response) {
				//		console.log("respuesta", data);
						 if(response) {
							response=codigo+'.jpg';
							}
							console.log("response",response);
							var dat = {
								crud: "updatePermiso",
								id_comunicado:id,
								de_comunicado: de,
								para_comunicado: para,
								asunto_comunicado: asunto,
								foto_comunicado: response,
								detalle_comunicado: descripcion
							};
							console.log("datos",dat);
							$.ajax({
								data: dat,
								url: "./Model/ComunicadoAjax.php",
								method: "POST",
								success: function (datos) {
									console.log("datos1", datos);
									if (datos != 0) {
									/*toastr["success"]("SOLICITUD MODIFICADA.", "Éxito");
									setTimeout(() => {
										window.location = "?page=menuCliente";
									}, 4000);*/
								} else {
									/*toastr["error"]("No se puedo modificar la solicitud.", "Error");*/
								}
					}
				});

			/* } else {
				toastr["error"]("Imagen no permitida.", "Error")
			} */
		}
	});
}
$("#id_modificarPermiso").click(function (e) {
	e.preventDefault();
	var desc = myEditor.getData();
	var filename = $('input[type=file]').val().split('\\').pop();
	modificarPermiso($("#id_comunicado").val(),
		$("#de").val(),
		$("#para").val(),
		$("#asunto").val(),
		filename,
		desc,
		//$("#descripcion").val(),
		$("#codigo").val());

});


});