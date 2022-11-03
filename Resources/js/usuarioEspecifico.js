
$(document).ready(function(){
    
  
    //listar el usuario seleccionado
    
      function getUsuarioInternoId(id){
        var dat = {
            crud:"usuarioInternoId",
            idUsuario:id,
        };
        $.ajax({
            data: dat,
            url:"./Model/UsuariosAjax.php",
            method: "POST",
            success: function(data){   
                console.log(data);            
                $("#usuarioId").html(data);
                
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }
    
    getUsuarioInternoId(atob($("#id_usuario_especifico").val()));
    
    
    //modificar los datos de la empresa
    
     function modUsuarioInterno(id){
        var dat = {
            crud:"modUsuarioInterno",
            idUsuario:id,
        };
        $.ajax({
            data: dat,
            url:"./Model/UsuariosAjax.php",
            method: "POST",
            success: function(data){   
                console.log(data);            
                $("#UsuarioInterno").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }
    
    modUsuarioInterno(atob($("#id_usuario_especifico").val()));
    
    function getTipoUsuario(){
    var dat = {
        crud:"listTipoUsuario"
    };

    $.ajax({
        data: dat,
        url:"./Model/TipoUsuarioAjax.php",
        method: "POST",
        success: function(data){
            console.log("data",data);
            $("#id_usuario").html(data);
            
        },

        error: function(error){
            console.error(error);
        }
        
    });
}
    
     function modificarUsuario(id_usuario,tipo,cedula,nombre,apellido,direccion,login,clave,correo){
        var dat = {
            crud: "modificarUsuario",
            id_usuario:id_usuario,
            id_tipo:tipo,
            cedula:cedula,
            nombre:nombre,
            apellido:apellido,
            direccion:direccion,
            login:login,
            clave:clave,
            correo:correo
            };
            console.log("datos",dat);
            $.ajax({
                data: dat,
                url: "./Model/UsuariosAjax.php",
                method: "POST",
                success: function(datos){
                    console.log("datos a modificar",datos);
                    if (datos != 0) {
                        toastr["success"]("USUARIO MODIFICADO.", "Éxito");
                              setTimeout(() => {
                                window.location.reload();
                            }, 4000);
                    } else {
                        toastr["error"]("No se puedo MODIFICAR el usuario.", "Error");
                    }
                }
                });
    }
    
    //modificar
    $("#modificarUsuarioInterno").click(function(e){
    e.preventDefault();
    $tipo=atob($("#id_usuario_especifico").val());
    modificarUsuario($("#id_Usuario").val(),
                     $("#id_tipo_usuario").val(),
                     $("#cedulaU").val(),
                     $("#nombreU").val(),
                     $("#apellidoU").val(),
                     $("#direccionU").val(),
                     $("#loginU").val(),
                     $("#claveU").val(),
                     $("#correoU").val());
    
    });  
     
    
    
    function eliminarUsuario(id_usuario){
        var dat = {
            crud: "eliminarUsuario",
            usuario:id_usuario
            };
            console.log("datos",dat);
            $.ajax({
                data: dat,
                url: "./Model/UsuariosAjax.php",
                method: "POST",
                success: function(datos){
                    console.log("datos a modificar",datos);
                    if (datos != 0) {
                        $tipo=$("#id_tipo_usuario").val();
                        if($tipo==2)
                        {
                            toastr["success"]("USUARIO ELIMINADO.", "Éxito");
                            setTimeout(() => {
                                window.location = "?page=usuarioInterno";
                          }, 4000);
                        }else{
                            
                            toastr["success"]("USUARIO ELIMINADO.", "Éxito");
                            setTimeout(() => {
                                window.location = "?page=usuarioSistema";
                          }, 4000);
                        }
                       
                    } else {
                        toastr["error"]("No se puedo ELIMINAR el usuario.", "Error");
                    }
                }
                });
    }
    
  
    $("#eliminar_usuario").click(function(e){
        e.preventDefault();
        eliminarUsuario($("#id_Usuario").val());    
    }); 
        
    

        modUsuarioSistema(atob($("#id_usuario_especifico").val()));
        

         //modificar
    
     function modUsuarioSistema(id){
        var dat = {
            crud:"modUsuarioSistema",
            idUsuario:id,
        };
        $.ajax({
            data: dat,
            url:"./Model/UsuariosAjax.php",
            method: "POST",
            success: function(data){   
                console.log(data);        
                $("#UsuarioSistema").html(data); 
                //seleccionarUsuario();
                getTipoUsuario();
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }
    
    

    function getTipoUsuario(){
        var dat = {
            crud:"listTipoUsuario"
        };
    
        $.ajax({
            data: dat,
            url:"./Model/TipoUsuarioAjax.php",
            method: "POST",
            success: function(data){
                console.log("data",data);
                $("#id_usuario").html(data);
                $tipo= $("#idtipo_Usuario").val();
                console.log("tipo usuario",$tipo);
                $("#id_usuario option[value="+ $tipo +"]").attr("selected",true);
                
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    $("#modificarUsuarioAdmin").click(function(e){
        e.preventDefault();
        modificarUsuario($("#id_U").val(),
                         $("#tipo_Usuario").val(),
                         $("#cedulaU").val(),
                         $("#nombreU").val(),
                         $("#apellidoU").val(),
                         $("#direccionU").val(),
                         $("#loginU").val(),
                         $("#claveU").val(),
                         $("#correoU").val());
        
        });  
    
    });
    