
$(document).ready(function(){

function getPermisosAprobados(){
    var dat = {
        crud:"listPermisosAprobados"
    };

    $.ajax({
        data: dat,
        url:"./Model/ComunUsuaAjax.php",
        method: "POST",
        success: function(data){
            $("#PermisosAprobadosSeg").html(data);
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
            $("#PermisosNoAprobadosSeg").html(data);
        },

        error: function(error){
            console.error(error);
        }
        
    });
}

getPermisosNoAprobados();

});