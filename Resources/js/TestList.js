$(document).ready(function(){

    function getListadoUsuarios(){
        console.log("entro");
        var dat = {
            crud:"listClientes"
        };

        $.ajax({
            data: dat,
            url:"../Model/TestAjax.php",
            method: "POST",
            success: function(data){
                console.log("Si: "+data);
                $("#tablaTest").html(data);
            },
            error: function(error){
                console.error(error);
            }
        });
    }

    getListadoUsuarios();
});