
$(document).ready(function(){
    
  
//listar la empresa seleccionada

  function getEmpresaId(id){
    var dat = {
        crud:"empresaPorId",
        idEmpresa:id,
    };
    $.ajax({
        data: dat,
        url:"./Model/EmpresaAjax.php",
        method: "POST",
        success: function(data){   
            console.log(data);            
            $("#empresaId").html(data);
            
        },

        error: function(error){
            console.error(error);
        }
        
    });
}

getEmpresaId(atob($("#id_empresa_especifica").val()));


//modificar los datos de la empresa

function datosModificar(id){
    var dat = {
        crud:"obtenerDatosEmpresa",
        idEmpresa:id,
    };
    $.ajax({
        data: dat,
        url:"./Model/EmpresaAjax.php",
        method: "POST",
        success: function(data){   
            console.log(data);            
            $("#empresaEditar").html(data);
            getMixComercial();
            usuariosEmpresas();

        },

        error: function(error){
            console.error(error);
        }
        
    });
}

datosModificar(atob($("#id_empresa_especifica").val()));

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
            $("#mixC").html(data);
            $mix= $("#idmixComercial").val();
            console.log("idmixComercial",$mix);
            $("#mixc option[value="+ $mix +"]").attr("selected",true);

        },

        error: function(error){
            console.error(error);
        }
        
    });
}


function usuariosEmpresas(){
    var dat = {
        crud:"clientesEmpresa"
    };

    $.ajax({
        data: dat,
        url:"./Model/UsuariosAjax.php",
        method: "POST",
        success: function(data){    
            console.log("usuarios clientes",data) ;          
            $("#usuarioE").html(data);
            $usuario=$("#idUsuario").val();
            $nombre=$("#nombreU").val();
            $apellido=$("#apellidoU").val();
            $('#id_usuario').append( '<option value="'+$usuario+'" selected>'+$nombre+' '+$apellido+'</option>' );
        },

        error: function(error){
            console.error(error);
        }
        
    });
}

function seleccionar() {  
   $usuario=$("#idUsuario").val();
   $nombre=$("#nombreU").val();
   $apellido=$("#apellidoU").val();
   //añadir al select la opcion de usuario seleccionada
   $('#id_usuario').append( '<option value="'+$usuario+'" selected>'+$nombre+' '+$apellido+'</option>' );
      //$('#id_usuario').prepend("<option value="+ $usuario +" selected>"+$nombre+" "+$apellido+"</option>");
 }

 function modificarEmpresa(id_empresa,usuario,mixC,nombreE,rucE,telefonoE,direccionE,correoE,fechaE){
    var dat = {
        crud: "modificarEmpresa",
        id_empresa:id_empresa,
        usuario:usuario,
        mixC:mixC,
        nombreE:nombreE,
        rucE:rucE,
        telefonoE:telefonoE,
        direccionE:direccionE,
        correoE:correoE,
        fechaE:fechaE
        };
        console.log("datos",dat);
        $.ajax({
            data: dat,
            url: "./Model/EmpresaAjax.php",
            method: "POST",
            success: function(datos){
                console.log("datos a modificar",datos);
                if (datos != 0) {
                    toastr["success"]("Empresa modificada.", "Éxito");
                          setTimeout(() => {
                            window.location = "?page=empresas";
                        }, 4000);
                } else {
                    toastr["error"]("No se puede modificar la empresa.", "Error");
                }
            }
            });
}

//modificar
$("#modificarEmpresa").click(function(e){
e.preventDefault();
modificarEmpresa($("#id_empresa").val(),
                 $("#id_usuario").val(),
                 $("#mixc").val(),
                 $("#nombreE").val(),
                 $("#rucE").val(),
                 $("#telefonoE").val(),
                 $("#direccionE").val(),
                 $("#correoE").val(),
                 $("#fecharE").val());

}); 
 


function eliminarEmpresa(id_empresa){
    var dat = {
        crud: "eliminarEmpresa",
        empresa:id_empresa
        };
        console.log("datos",dat);
        $.ajax({
            data: dat,
            url: "./Model/EmpresaAjax.php",
            method: "POST",
            success: function(datos){
                console.log("datos a modificar",datos);
                if (datos != 0) {
                   toastr["success"]("Empresa eliminada.", "Éxito");
                          setTimeout(() => {
                            window.location = "?page=empresas";
                        }, 4000);
                } else {
                    toastr["error"]("No se puede eliminar la empresa.", "Error");
                }
            }
            });
}

//modificar
$("#eliminar_empresa").click(function(e){
    e.preventDefault();
    eliminarEmpresa(atob($("#id_empresa_especifica").val()));    
    }); 





});
