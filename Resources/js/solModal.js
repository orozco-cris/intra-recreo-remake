$(document).ready(function(){

	function obtenerPermiso(id_usuario){
        var dat = {
            crud:"permisoDeterminado",
			usuario: id_usuario
        };
        $.ajax({
            data: dat,
            url:"./Model/ComunUsuaAjax.php",
            method: "POST",
            success: function(data){
                $("#permiso").html(data);
            },
            error: function(error){
                console.error(error);
            }
            
        });
    }

    $('#solicitud').on('show.bs.modal', function(e) {
        var id = e.relatedTarget.dataset.yourparameter;
        obtenerPermiso(id);
      });
});