$(document).ready(function () {

	function getCircularesClientes() {
		var dat = {
			crud: "listCircularesParaCliente",
		};

		$.ajax({
			data: dat,
			url: "./Model/ComunicadoAjax.php",
			method: "POST",
			success: function (data) {
				$("#tblCircularesClientes").html(data);
			},

			error: function (error) {
				console.error(error);
			}

		});
	}

	getCircularesClientes();


    function getCircularesNoRevisadasClientes() {
		var dat = {
			crud: "listCircularesNoRevisadasCliente",
		};

		$.ajax({
			data: dat,
			url: "./Model/ComunicadoAjax.php",
			method: "POST",
			success: function (data) {
				$("#tblCircularesNoRevisadasClientes").html(data);
			},

			error: function (error) {
				console.error(error);
			}

		});
	}

	getCircularesNoRevisadasClientes();


});