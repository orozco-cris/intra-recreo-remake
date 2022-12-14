<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Intranet Recreo</title>
	<link rel="stylesheet" type="text/css" href="Resources/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Resources/css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="Resources/css/toastr.min.css" >
	<link rel=stylesheet href="Resources/css/estilos.css" type="text/css" />
	<script type="text/javascript" src="Resources/bootstrap/js/bootstrap.js"></script>
	<!-- <script type="text/javascript" src="Resources/bootstrap/js/bootstrap.bundle.min.js"></script> -->
	<script type="text/javascript" src="Resources/js/jquery-ui.js"></script>
	<script type="text/javascript" src="Resources/js/jquery-3.6.1.js"></script>
	<script type="text/javascript" src="Resources/js/toastr.min.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<main>
	<div id="contenedor">
		<?php  
			if(isset($_GET["page"]))
			{
				include "View/".$_GET["page"].".php";
			}
			else
			{
				include "View/login.php";
			}
		?>
	</div>
	<footer></footer>
	<script type="text/javascript" src="Resources/bootstrap/js/bootstrap.bundle.min.js"></script>
</main>
</body>
</html>