$(document).ready(function(){

	function obtenerPermiso(id_usuario){
        var dat = {
            crud:"permisoDeterminado",
			comunicado: id_usuario
        };
        $.ajax({
            data: dat,
            url:"./Model/ComunUsuaAjax.php",
            method: "POST",
            success: function(data){
                console.log("data");
                $("#permiso").html(data);
            },
            error: function(error){
                console.error(error);
            }
            
        });
    }

    $('#solicitud').on('show.bs.modal', function(e) {
        var id = e.relatedTarget.dataset.yourparameter;
        console.log("id permiso",id);
        obtenerPermiso(id);
      });
});