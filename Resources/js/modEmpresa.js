$(document).ready(function(){


    function modificarEmpresa(idempresa,mixc,nombre,ruc,telefono,direccion,correo,fechar){
        var dat = {
            crud: "modificarEmpresa",
                id_empresa:idempresa,
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
                        toastr["success"]("Empresa Modificada.", "Éxito");
                              /*setTimeout(() => {
                                window.location = "?page=empresas";
                            }, 4000); */
                    } else {
                        toastr["error"]("No se puede modificar los datos de la empresa.", "Error");
                    }
                }
                });
    }
    
    //modificar
    $("#modificar").click(function(e){
    e.preventDefault();
    console.log("prueba");
    modificarEmpresa( $("#id_empresa").val(),
                    $("#mixc").val(),
                    $("#nombreE").val(),					    
                    $("#rucE").val(),
                    $("#telefonoE").val(),
                    $("#direccionE").val(),
                    $("#correoE").val(),
                    $("#fecharE").val());
    
    }); 
}
);