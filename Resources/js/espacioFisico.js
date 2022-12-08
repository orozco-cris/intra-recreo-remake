$(document).ready(function(){

    function getEspacioFisico(id){
        var dat = {
            crud:"lisEspacioFisico",
            idEspacio:id
        };

        $.ajax({
            data: dat,
            url:"./Model/EspacioFisicoAjax.php",
            method: "POST",
            success: function(data){             
                $("#tblLocales").html(data);
                $('.zoom').hover(function() {
                    $(this).addClass('transition');
                }, function() {
                    $(this).removeClass('transition');
                });
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getEspacioFisico($("#tipo").val());



    function eliminarEspacioFisico(id_espacio){
        var dat = {
            crud: "eliminarEspacioFisico",
            espacio:id_espacio
            };
            console.log("datos",dat);
            $.ajax({
                data: dat,
                url: "./Model/EspacioFisicoAjax.php",
                method: "POST",
                success: function(response){
                    if (response == 0) {
                            toastr["success"]("Espacio fisico eliminado.", "Éxito");
                            setTimeout(() => {
                                window.location.reload();
                          }, 4000);
                      
                       
                    } else  if  (response == 1){
                        toastr["error"]("No se puede eliminar el espacio físico.", "Error");
                    }
                    else  if  (response == 2){
                        toastr["error"]("Espacio físico en arriendo.", "Error");
                    }

                }
                });
    }
    
  
     $(".class_espacio").click(function(e){
        e.preventDefault();
        e.alert($(this).attr("value"));
        alert($(this).attr("value"));
        console.log("Eliminar espacio fisico");
       //$id=$("#id_espacio").val();
       console.log(e.attr('id_espacio'));
         $id=$("#id_espacio").val($(this).attr('value'));
        console.log("id espacio", $id);
        eliminarEspacioFisico($id);     
    });   


  /*   function eliminar(id){
        console.log("Eliminar espacio fisico");
        eliminarEspacioFisico($id);     

    } */

	function filePreview(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.readAsDataURL(input.files[0]);
			reader.onload = function (e) {
				$('#imagen + img').remove();
				$('#imagen').after('<img src="' + e.target.result + '" style="width: 50% !important; height=15% !important"/>');
			}
		}
	}

    $("#file").change(function () {
		filePreview(this);
	});



    function createEspacioFisico(denominacion,ubicacion,medidas,tipo,estado,codigo,etapa,caracteristicas,foto){
        
        
        var formData = new FormData();
					var files = $('#file')[0].files[0];
					formData.append('file', files)
					$.ajax({
						url: './View/uploadEspacio.php'+'?foo='+denominacion,
						type: 'post',
						data: formData,
						contentType: false,
						processData: false,
						success: function (response) {
					//		console.log("respuesta", data);
							//if (response != 0) {
								console.log("response",response);
                                var dat = {
                                crud: "createEspacioFisico",
                                idEtapa:etapa,
                                denominacion:denominacion,
                                ubicacion:ubicacion,
                                medidas:medidas,
                                caracteristicas:caracteristicas,
                                foto:response,
                                tipo:tipo,
                                estado:estado,
                                codigo:codigo
                                };
                                console.log("datos a enviar",dat);
                                $.ajax({
                                    data: dat,
                                    url: "./Model/EspacioFisicoAjax.php",
                                    method: "POST",
                                    success: function(data){
                                        console.log("datos recibido del ingreso",data);
                                        if (data==1) {
                                            toastr["success"]("Espacio físico registado.", "Éxito");
                                                  setTimeout(() => {
                                                    window.location = "?page=HOME";
                                                }, 4000);
                                         } else if (data == 0)  {
                                            toastr["error"]("No se puede registrar el espacio fisico.", "Error");
                                        } 
                                    }
                                    });
                                }
                            });
                                    
                                    
    }



    function verificarDenominacion(denominacion){
        
        var dat = {
            crud: "verificarEspacioFisico",
             denominacion:denominacion,
            };
            console.log("datos a enviar",dat);
            $.ajax({
                data: dat,
                url: "./Model/EspacioFisicoAjax.php",
                method: "POST",
                success: function(data){
                    console.log("datos recibido",data);
                    if (data == 0) {
                        toastr["error"]("Denominacion ya registrada.", "Error");
                        $("#denominacion").val('');
                        $("#denominacion").focus();
                     } 
                }
                });
                                    
                                    
    }


    $("#crear").click(function(e){
		e.preventDefault();
        var filename = $('input[type=file]').val().split('\\').pop();
		createEspacioFisico($("#denominacion").val(),
                            $("#ubicacion").val(),
                            $("#medidas").val(),					    
                            $("#tipo").val(),
                            $("#estado").val(),
                            $("#codigo").val(),
                            $("#id_Etapa").val(),
                            $("#caracteristicas").val(),
                            filename);
	}); 


     $("#denominacion").blur(function(e){
        e.preventDefault();
        console.log("entro al evento");
       // $(this).css("background-color", "#FFFFCC");

        verificarDenominacion($("#denominacion").val());
    });
 








});
