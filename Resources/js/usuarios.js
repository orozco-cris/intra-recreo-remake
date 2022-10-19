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

});