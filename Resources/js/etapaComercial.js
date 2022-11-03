$(document).ready(function(){

    function selectEtapaComercial(){
        var dat = {
            crud:"listEtapaComercial"
        };
    
        $.ajax({
            data: dat,
            url:"./Model/EtapaComercialAjax.php",
            method: "POST",
            success: function(data){
                console.log("data",data);
                $("#listEtapa").html(data);
                
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }
    selectEtapaComercial();


    function getEtapaComercial(){
        var dat = {
            crud:"listEtapas"
        };
    
        $.ajax({
            data: dat,
            url:"./Model/EtapaComercialAjax.php",
            method: "POST",
            success: function(data){
                console.log("data",data);
                $("#etapaComercial").html(data);
                
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }
    getEtapaComercial();

    function createEtapaComercial(nombre,descripcion){
        var dat = {
            crud: "createEtapaComercial",
            nombre_etapa: nombre,
            descripcion_etapa:descripcion,
            };
            console.log("datos",dat);
            $.ajax({
                data: dat,
                url: "./Model/EtapaComercialAjax.php",
                method: "POST",
                success: function(datos){
                    console.log("datos1",datos);
                    if (datos != 0) {
                        toastr["success"]("ETAPA COMERCIAL.", "Éxito");
                              setTimeout(() => {
                                window.location = "?page=etapaComercial";
                            }, 4000); 
                    } else {
                        toastr["error"]("No se puedo crear la etapa comercial.", "Error");
                    }
                }
                });
    }

    $("#id_crear").click(function(e){
		e.preventDefault();
		createEtapaComercial($("#nombre").val(),
					$("#descripcion").val());

	}); 


    function etapaComercialPorId(id){
        var dat = {
            crud:"etapaComercialPorId",
            idEtapa:id
        };
        console.log("id mix", dat);
        $.ajax({
            data: dat,
            url:"./Model/EtapaComercialAjax.php",
            method: "POST",
            success: function(data){       
                console.log(data);
                $("#editarEtapaComercial").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }   
//obtener id y mostrar la modal
    $('#editar').on('show.bs.modal', function(e) {
        var id = e.relatedTarget.dataset.yourparameter;
        etapaComercialPorId(id);
      });



      function modificarEtapaComercial(id,nombre,descripcion){
        var dat = {
            crud: "modificarEtapaComercial",
            id_etapa:id,
            nombre_etapa: nombre,
            descripcion_etapa:descripcion,
            };
            console.log("datos",dat);
            $.ajax({
                data: dat,
                url: "./Model/EtapaComercialAjax.php",
                method: "POST",
                success: function(datos){
                    console.log("datos1",datos);
                    if (datos != 0) {
                         toastr["success"]("ETAPA COMERCIAL MODIFICADA.", "Éxito");
                              setTimeout(() => {
                                window.location = "?page=etapaComercial";
                            }, 4000);  
                    } else {
                        toastr["error"]("No se puedo MODIFICAR la etapa comercial.", "Error");
                    }
                }
                });
    }

//modificar
$("#modificar").click(function(e){
    e.preventDefault();
    console.log("prueba");
    modificarEtapaComercial($("#id_etapa").val(),
                $("#nombreEtapa").val(),
                $("#descripcionEtapa").val());

}); 

    
    });