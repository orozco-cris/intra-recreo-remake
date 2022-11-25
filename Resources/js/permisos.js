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


    function getPermisosAprobados(){
        var dat = {
            crud:"listPermisosAprobados"
        };

        $.ajax({
            data: dat,
            url:"./Model/ComunUsuaAjax.php",
            method: "POST",
            success: function(data){
                $("#PermisosAprobados").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getPermisosAprobados();

    function getPermisosNoAprobados(){
        var dat = {
            crud:"listPermisosNoAprobados"
        };

        $.ajax({
            data: dat,
            url:"./Model/ComunUsuaAjax.php",
            method: "POST",
            success: function(data){
                $("#PermisosNoAprobados").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getPermisosNoAprobados();

});