$(document).ready(function(){

    function getEspacioFisicoId(id){
        var dat = {
            crud:"getEspacioFisicoId",
            idEspacio:id
        };

        $.ajax({
            data: dat,
            url:"./Model/EspacioFisicoAjax.php",
            method: "POST",
            success: function(data){             
                $("#espacioFisicoId").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    getEspacioFisicoId(atob($("#id_espacio_fisico").val()));


});
