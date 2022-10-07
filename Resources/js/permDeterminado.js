$(document).ready(function(){

    function obtenerPermiso(){
        console.log("entro 1");
        var dat = {
            crud:"permisoDeterminado",
        };

        console.log("datos",dat);
        $.ajax({
            data: dat,
            url:"./Model/ComunUsuaAjax.php",
            method: "POST",
            success: function(data){
                console.log("Si: "+data);
                $("#permisoDeterminado").html(data);
            },
    
            error: function(error){
                console.error(error);
            }
            
        });
    }

    obtenerPermiso();

        $("#permiso").click(function(e){
            e.preventDefault();
            console.log($("#permiso").val());
            //obtenerPermiso(recuperar);       
        });    
	 
});