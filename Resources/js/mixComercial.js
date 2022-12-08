$(document).ready(function(){

    function getMixComerciales(){
        var dat = {
            crud:"listMixComerciales"
        };

        $.ajax({
            data: dat,
            url:"./Model/mixComercialAjax.php",
            method: "POST",
            success: function(data){               
                $("#tblMixComercial").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getMixComerciales();

    function createMix(nombre,descripcion){
        var dat = {
            crud: "createMixComercial",
            nombre_mix: nombre,
            descripcion_mix:descripcion,
            };
            console.log("datos",dat);
            $.ajax({
                data: dat,
                url: "./Model/mixComercialAjax.php",
                method: "POST",
                success: function(datos){
                    console.log("datos1",datos);
                    if (datos != 0) {
                        toastr["success"]("Categoría creada.", "Éxito");
                              setTimeout(() => {
                                window.location = "?page=mixComercial";
                            }, 4000); 
                    } else {
                        toastr["error"]("No se puede crear la categoria.", "Error");
                    }
                }
                });
    }

    $("#id_aceptar").click(function(e){
		e.preventDefault();
		createMix(	$("#nombre").val(),
					$("#descripcion").val());

	}); 

    function getMixComercialId(id){
        var dat = {
            crud:"mixComercialPorId",
            idMix:id
        };
        console.log("id mix", dat);
        $.ajax({
            data: dat,
            url:"./Model/mixComercialAjax.php",
            method: "POST",
            success: function(data){       
                console.log(data);
                $("#editarMixComercial").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }   
//obtener id y mostrar la modal
    $('#editar').on('show.bs.modal', function(e) {
        var id = e.relatedTarget.dataset.yourparameter;
        getMixComercialId(id);
      });

      function modificarMix(id,nombre,descripcion){
        var dat = {
            crud: "modificarMixComercial",
            id_mix:id,
            nombre_mix: nombre,
            descripcion_mix:descripcion,
            };
            console.log("datos",dat);
            $.ajax({
                data: dat,
                url: "./Model/mixComercialAjax.php",
                method: "POST",
                success: function(datos){
                    console.log("datos1",datos);
                    if (datos != 0) {
                        toastr["success"]("Categoría modificada.", "Éxito");
                              setTimeout(() => {
                                window.location = "?page=mixComercial";
                            }, 4000); 
                    } else {
                        toastr["error"]("No se puede modificar la categoría.", "Error");
                    }
                }
                });
    }

//modificar
$("#modificar").click(function(e){
    e.preventDefault();
    console.log("prueba");
    modificarMix($("#id_mix").val(),
                $("#nombreMix").val(),
                $("#descripcionMix").val());

}); 
     



});