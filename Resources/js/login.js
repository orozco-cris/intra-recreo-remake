$(document).ready(function(){

	function loginUsuario(cedula, clave)
	{
		var dat = {
			crud: "read",
			cedula: cedula,
			clave: clave
		};

		$.ajax({
			data: dat,
			url: "./Model/UsuariosAjax.php",
			method: "POST",
			success: function(datos){
				if(datos == 0)
				{
					toastr["error"]("Usuario o contraseña incorrecta.", "Error");
				}
				else
				{
					toastr["success"]("Datos ingresados correctamente.", "Éxito");
					setTimeout(() => {
						window.location = "?page=home";
					 }, 4000);
				}
			},
			error: function(error){
				console.log(error);
			}
		});
	}

	$("#id_ingresar").click(function(e){
		e.preventDefault();
		loginUsuario($("#id_cedula").val(), $("#id_clave").val());
	});

	/* $("#id_cedula").keyup(function(e){
		if(e.keyCode == 13)
		{
			loginUsuario($("#id_cedula").val(), $("#id_clave").val());
		}
	}); */

	/* $("#id_clave").keyup(function(e){
		if(e.keyCode == 13)
		{
			loginUsuario($("#id_cedula").val(), $("#id_clave").val());
		}
	}); */
});