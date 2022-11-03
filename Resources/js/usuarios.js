$(document).ready(function(){

    function getUsuarios(){
        //console.log("entro");
        var dat = {
            crud:"listUsuarios"
        };

        $.ajax({
            data: dat,
            url:"./Model/UsuariosAjax.php",
            method: "POST",
            success: function(data){
                $("#usuarios").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getUsuarios();


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
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }
    
    usuariosEmpresas();


    function getUsuarioInterno(){
        var dat = {
            crud:"usuariosInternos"
        };

        $.ajax({
            data: dat,
            url:"./Model/UsuariosAjax.php",
            method: "POST",
            success: function(data){
                $("#tblUsuarioInterno").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }
    getUsuarioInterno();


    

    function createUsuario(tipo,nombres,apellidos,cedula,correo,direccion,usuario_login,clave){
        var dat = {
            crud: "createCliente",
            tipo_usuario:tipo,
            nombre:nombres,
            apellido: apellidos,
            cedula:cedula,
            correo:correo,
            direccion:direccion,
            login:usuario_login,
            clave:clave,
           
            direccion:direccion
            };
            console.log("datos recibidos",dat);
            $.ajax({
                data: dat,
                url: "./Model/UsuariosAjax.php",
                method: "POST",
                success: function(datos){
                    console.log("datos1",datos);
                    if (datos != 0) {
                        toastr["success"]("USUARIO REGISTRADO.", "Éxito");
                              setTimeout(() => {
                                window.location.reload();
                            }, 4000);
                    } else {
                        toastr["error"]("Usuario no registraso.", "Error");
                    }
                }
                });
    }

    $("#id_aceptar").click(function(e){
		e.preventDefault();
		createUsuario(	$("#tipo_Usuario").val(),
                        $("#nombres").val(),
                        $("#apellidos").val(),
                        $("#cedula").val(),					    
                        $("#correo").val(),
                        $("#direccion").val(),
                        $("#usuario_login").val(),                        
                        $("#clave").val())

	});

    $("#id_aceptarUS").click(function(e){
		e.preventDefault();
		createUsuario(	
                        $("#tipo_Usuario").val(),
                        $("#nombres").val(),
                        $("#apellidos").val(),
                        $("#cedula").val(),					    
                        $("#correo").val(),
                        $("#direccion").val(),
                        $("#usuario_login").val(),                        
                        $("#clave").val())

	});


    //listar usuarios menos clientes
    function getUsuariosAdmin(){
        var dat = {
            crud:"usuariosAdmin"
        };

        $.ajax({
            data: dat,
            url:"./Model/UsuariosAjax.php",
            method: "POST",
            success: function(data){
                $("#tblUsuarioAdmin").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }
    getUsuariosAdmin();



});