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
                success: function(datos){
                    if (datos != 0) {
                            toastr["success"]("ESPACIO FÍSICO ELIMINADO.", "Éxito");
                            setTimeout(() => {
                                window.location.reload();
                          }, 4000);
                      
                       
                    } else {
                        toastr["error"]("No se puedo ELIMINAR el espacio físico.", "Error");
                    }
                }
                });
    }
    
  
     $("#id_espacio").click(function(e){
        e.preventDefault();
        console.log("Eliminar espacio fisico");
       // $id=$("#id_espacio").val();
        /* $id=$("#id_espacio").val($(this).attr('value'));
        console.log("id espacio", $id);
        eliminarEspacioFisico($id);     */
    });  


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
        var dat = {
            crud: "createEspacioFisico",
            idEtapa:etapa,
            denominacion:denominacion,
            ubicacion:ubicacion,
            medidas:medidas,
            caracteristicas:caracteristicas,
            foto:foto,
            tipo:tipo,
            estado:estado,
            codigo:codigo
            };
            console.log("datos",dat);
            $.ajax({
                data: dat,
                url: "./Model/EspacioFisicoAjax.php",
                method: "POST",
                success: function(datos){
                    console.log("datos1",datos);
                    if (datos != 0) {
                         toastr["success"]("ESPACIO FÍSICO REGISTRADO.", "Éxito");
                              setTimeout(() => {
                                window.location = "?page=home";
                            }, 4000); 
                    } else {
                        toastr["error"]("No se puedo registrar el espacio físico.", "Error");
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




    function getEspacioFisicoArriendo(){
        var dat = {
            crud:"lisEspacioArriendo"
        };

        $.ajax({
            data: dat,
            url:"./Model/EspacioFisicoAjax.php",
            method: "POST",
            success: function(data){             
                $("#listDenominacion").html(data);
               
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getEspacioFisicoArriendo();


});
