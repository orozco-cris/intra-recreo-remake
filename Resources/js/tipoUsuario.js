$(document).ready(function(){

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
            $("#tipoUsuario").html(data);
        },

        error: function(error){
            console.error(error);
        }
        
    });
}
getTipoUsuario();

});