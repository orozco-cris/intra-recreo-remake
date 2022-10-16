$(document).ready(function(){

    function getPermisosSegOpe(){
        //console.log("entro");
        var dat = {
            crud:"listPermisosSegOpe"
        };

        $.ajax({
            data: dat,
            url:"./Model/ComunUsuaAjax.php",
            method: "POST",
            success: function(data){
                $("#tablaPermisos").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getPermisosSegOpe();

});