$(document).ready(function(){

    function getPermisosTodos(){
        //console.log("entro");
        var dat = {
            crud:"todoslospermisos"
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

    getPermisosTodos();

});