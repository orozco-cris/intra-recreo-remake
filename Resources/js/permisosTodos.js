$(document).ready(function(){

    function getPermisosTodos(){
        //console.log("entro");
        var dat = {
            crud:"todoslospermisos"
        };
        console.log("entro");
        $.ajax({
            data: dat,
            url:"./Model/ComunUsuaAjax.php",
            method: "POST",
            success: function(data){
                console.log("Si: "+data);
                $("#permisoTodos").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getPermisosTodos();

});