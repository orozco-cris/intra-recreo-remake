$(document).ready(function(){

    function getEmpresas(){
        var dat = {
            crud:"lisEmpresas"
        };

        $.ajax({
            data: dat,
            url:"./Model/EmpresaAjax.php",
            method: "POST",
            success: function(data){               
                $("#tblEmpresas").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getEmpresas();


    function getMixComercial(){
        var dat = {
            crud:"listMix"
        };
    
        $.ajax({
            data: dat,
            url:"./Model/mixComercialAjax.php",
            method: "POST",
            success: function(data){    
                console.log(data) ;          
                $("#mix").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }
    
    getMixComercial();

    function createEmpresa(id_usuario,mixc,nombre,ruc,telefono,direccion,correo,fechar){
        var dat = {
            crud: "createEmpresa",
            usuario:id_usuario,
            mixc:mixc,
            nombre: nombre,
            ruc:ruc,
            telefono:telefono,
            direccion:direccion,
            correo:correo,
            fechar,fechar
            };
            console.log("datos",dat);
            $.ajax({
                data: dat,
                url: "./Model/EmpresaAjax.php",
                method: "POST",
                success: function(datos){
                    console.log("datos1",datos);
                    if (datos != 0) {
                        toastr["success"]("EMPRESA REGISTRADA.", "Éxito");
                              setTimeout(() => {
                                window.location = "?page=empresas";
                            }, 4000);
                    } else {
                        toastr["error"]("No se puedo registrar la empresa.", "Error");
                    }
                }
                });
    }

    $("#id_guardar").click(function(e){
		e.preventDefault();
		createEmpresa(	$("#id_usuario").val(),
                        $("#mixc").val(),
                        $("#nombre").val(),					    
                        $("#ruc").val(),
                        $("#telefono").val(),
                        $("#direccion").val(),
                        $("#correo").val(),
                        $("#fechar").val());

	}); 



    function getEmpresaId(id){
        var dat = {
            crud:"empresaPorId",
            idEmpresa:id
        };
        console.log("id mix", dat);
        $.ajax({
            data: dat,
            url:"./Model/EmpresaAjax.php",
            method: "POST",
            success: function(data){       
                console.log(data);
                $("#editarEmpresa").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }   


//obtener id y mostrar la modal
    $('#solicitud').on('show.bs.modal', function(e) {
        
        var id = e.relatedTarget.dataset.yourparameter;
        console.log("id empresa", id);
        //getMixComercial();
        getEmpresaId(id);
        //
        //seleccionar();
        
      });

      function seleccionar() {  
        $var= $("#mixComercial").val()
        console.log("MIX COMERCIAL", $var);
       $("#mixc[value='"+$var+"']").prop("selected", true);
     }
    

      $("#modificar").click(function(e){
		    $('#empresa input').prop('disabled', false);
            $(this).hide();
            $('#guardar').show();
                //seleccionar();
                //getMixComercial();
	}); 

});
