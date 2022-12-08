$(document).ready(function(){


    function getArriendos(){
        var dat = {
            crud:"listArriendos"
        };
    
        $.ajax({
            data: dat,
            url:"./Model/ArriendoAjax.php",
            method: "POST",
            success: function(data){
                console.log("data",data);
                $("#tblArriendos").html(data);
                
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }
    getArriendos();


    function getDenominacionId(id){
        var dat = {
            crud:"getDenominacionId",
            idEspacio:id
        };
        console.log("datos a enviar", dat);
        $.ajax({
            data: dat,
            url:"./Model/EspacioFisicoAjax.php",
            method: "POST",
            success: function(data){
                console.log("data",data);
                $("#nombreDenominacion").val(data);
               //$("#nombreDenominacion").html(data);
                
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }
   
    function getEmpresaId(id){
        var dat = {
            crud:"nombreEmpresaPorId",
            idEmpresa:id
        };
        console.log("datos a enviar", dat);
        $.ajax({
            data: dat,
            url:"./Model/EmpresaAjax.php",
            method: "POST",
            success: function(data){
                console.log("data",data);
                $("#nombreEmpresa").val(data);
               //$("#nombreDenominacion").html(data);
                
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }
 


    $("#id_aceptarE").click(function(e){
		e.preventDefault();
        $idEspacio=$('input:checkbox[id=id_empresa]:checked').val();
        //$idEmpresa=$('input:radio[id=id_empresa]:checked').val();

		//$("#id_empresa").val();
        getEmpresaId($idEspacio);
        console.log("empresa",$idEspacio);
        $("#idEmpresa").val($idEspacio);
        
    $('#empresa').modal('hide');
       // $('body').removeClass('modal-open');
        $('.modal-backdrop').remove(); 
	}); 

    $("#id_aceptarD").click(function(e){
		e.preventDefault();
        $idEspacio=$('input:checkbox[id=id_denominacion]:checked').val();
        getDenominacionId($idEspacio);
        
        console.log("espacio",$idEspacio);
        $("#idDenominacion").val($idEspacio);
        $('#denominacion').modal('hide');
//$('body').removeClass('modal-open');
        $('.modal-backdrop').remove(); 

       
	}); 
    
    function registrarArriendo(empresa,denominacion,vendedor,tipo,costo,descuento,fechar, fechav, observacion){
        var dat = {
            crud: "createArriendo",
            idEspacioFisico:denominacion,
            idEmpresa:empresa,
            vendedor: vendedor,
            tipoContrato:tipo,
            costo:costo,
            descuento:descuento,
            fechaVencimiento:fechav,
            observacion:observacion
            };
            console.log("datos",dat);
            $.ajax({
                data: dat,
                url: "./Model/ArriendoAjax.php",
                method: "POST",
                success: function(datos){
                    console.log("datos1",datos);
                    if (datos != 0) {
                         toastr["success"]("Arriendo registrado.", "Éxito");
                              setTimeout(() => {
                                window.location = "?page=arriendos";
                            }, 4000); 
                    } else {
                        toastr["error"]("No se puedo registrar el arriendo.", "Error");
                    }
                }
                });
    }


    
    $("#cancelarArriendo").click(function(e){
        window.location = "?page=home";
    });

    $("#registrarArriendo").click(function(e){
		e.preventDefault();
		registrarArriendo(	$("#idEmpresa").val(),
                        $("#idDenominacion").val(),
                        $("#vendedor").val(),					    
                        $("#tipoContrato").val(),
                        $("#costo").val(),
                        $("#descuento").val(),
                        $("#fecharegistro").val(),
                        $("#fechavencimiento").val(),
                        $("#observacion").val());

	}); 



    
    function getArriendoPorId(id){
        var dat = {
            crud:"arriendoPorId",
            idArriendo:id
        };
        console.log("datos a enviar", dat);
        $.ajax({
            data: dat,
            url:"./Model/ArriendoAjax.php",
            method: "POST",
            success: function(data){
                console.log("data",data);
                $("#detalleArriendo").html(data);
                
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }
    getArriendoPorId(atob($("#id_arriendo_especifico").val()));





    function eliminarArriendo(id_arriendo){
        var dat = {
            crud: "eliminarArriendo",
            arriendo:id_arriendo
            };
            console.log("datos",dat);
            $.ajax({
                data: dat,
                url: "./Model/ArriendoAjax.php",
                method: "POST",
                success: function(datos){
                    if (datos != 0) {
                       toastr["success"]("Arriendo eliminado.", "Éxito");
                              setTimeout(() => {
                                window.location = "?page=arriendos";
                            }, 4000);
                    } else {
                        toastr["error"]("No se puedo eliminar el arriendo.", "Error");
                    }
                }
                });
    }
    
    //modificar
    $("#eliminar_arriendo").click(function(e){
        e.preventDefault();
        eliminarArriendo(atob($("#id_arriendo_especifico").val()));    
        }); 
    


        function getArriendoEditar(id){
            var dat = {
                crud:"editarArriendo",
                idArriendo:id
            };
            console.log("datos a enviar", dat);
            $.ajax({
                data: dat,
                url:"./Model/ArriendoAjax.php",
                method: "POST",
                success: function(data){
                    console.log("data",data);
                    $("#arriendoEditar").html(data);
                    
                },
        
                error: function(error){
                    console.error(error);
                }
                
            });
        }
        getArriendoEditar(atob($("#id_arriendo_especifico").val()));



      



        function modificarArriendo(arriendo,empresa,denominacion,vendedor,tipo,costo,descuento,fechar,fechav,observacion){
            var dat = {
                crud: "modificarArriendo",
                idArriendo:arriendo,
                idEspacioFisico:denominacion,
                idEmpresa:empresa,
                vendedor:vendedor,
                tipoContrato:tipo,
                costo:costo,
                descuento:descuento,
                fechaR:fechar,
                fechaVencimiento:fechav,
                observacion:observacion
                };
                console.log("datos",dat);
                $.ajax({
                    data: dat,
                    url: "./Model/ArriendoAjax.php",
                    method: "POST",
                    success: function(datos){
                        console.log("datos a modificar",datos);
                        if (datos != 0) {
                         toastr["success"]("Arriendo modificado.", "Éxito");
                                  setTimeout(() => {
                                    window.location.reload();
                                }, 4000);
                        } else {
                            toastr["error"]("No se puede modificar el arriendo.", "Error");
                        }
                    }
                    });
        }
        
        //modificar
        $("#modificarArriendo").click(function(e){
        e.preventDefault();
        modificarArriendo($("#idarriendo").val(),
                         $("#idempresa").val(),
                         $("#iddenominacion").val(),
                         $("#vendedor").val(),
                         $("#tipo").val(),
                         $("#costo").val(),
                         $("#descuento").val(),
                         $("#fechar").val(),
                         $("#fechav").val(),
                         $("#observaciones").val());
        
        }); 



       

    });