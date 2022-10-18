$(document).ready(function(){

    function getPermisosClientes(){
        //console.log("entro");
        var dat = {
            crud:"listPermisosParaCliente",
        };

        $.ajax({
            data: dat,
            url:"./Model/ComunicadoAjax.php",
            method: "POST",
            success: function(data){
                $("#tblAuditadasRep").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getPermisosClientes();

	function crearSolicitud(de, para, asunto, mensaje, imagen, descripcion,tipo,fecha)
	{
		var formData = new FormData();
		var files = $('#file')[0].files[0];
		formData.append('file',files);
		$.ajax({
			url: './View/upload.php',
			type: 'post',
			data: formData,
			contentType: false,
			processData: false,
				success: function(response) {
					console.log("respuesta",response);
						if (response != 0) {							
							$(".card-img-top").attr("src", response);
							var today = new Date();
							var dat = {
								crud: "createSolicitudPermiso",
								de_comunicado: de,
								para_comunicado:para,
								asunto_comunicado:asunto,
								mensaje_comunicado:mensaje,
								foto_comunicado:imagen,
								detalle_comunicado:descripcion,
								tipo_comunicado:tipo,
								fecha_comunicado:today
								};
								$.ajax({
									data: dat,
									url: "./Model/ComunicadoAjax.php",
									method: "POST",
									success: function(datos){
										if (datos != 0) {
											toastr["success"]("SOLICITUD CREADA.", "Éxito");
												/*  setTimeout(() => {
													window.location = "?page=menuCliente";
												}, 4000);  */
										} else {
											toastr["error"]("No se puedo crear la solicitud.", "Error");
										}
									}
									});
								
						} else {
							toastr["error"]("Imagen no permitida.", "Error")
						}
					}
			});
	}

	$("#id_aceptar").click(function(e){
		e.preventDefault();
		//var desc = CKEDITOR.instances['descripcion'].getData();
		var desc=myEditor.getData();
		var filename = $('input[type=file]').val().split('\\').pop();
		crearSolicitud(	$("#de").val(),
						$("#para").val(),
						$("#asunto").val(),
						$("#mensaje").val(),
						filename,
						desc,
						$("#tipo").val(),
						$("#fechacaducidad").val());

	}); 


	var myEditor;

    ClassicEditor
        .create( document.querySelector( "#descripcion" ) )
        .then( editor => {
           myEditor = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );

	function filePreview(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.readAsDataURL(input.files[0]);
			reader.onload = function (e) {
				$('#imagen + img').remove();
				$('#imagen').after('<img src="'+e.target.result+'" style="width: 65% !important; height=15% !important"/>');
			}
		}
	}
		   
	$("#file").change(function () {
			filePreview(this);
		});

});