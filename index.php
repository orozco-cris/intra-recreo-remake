<?php 
/* session_start();
ob_start(); */
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Intranet Recreo</title>
</head>
<body>
<main>
	<header>
		<div class="container-fluid" style="overflow-y: auto;">
		</div>
	</header>
	<div id="contenedor" class="container">
		<?php  
			if(isset($_GET["page"]))
			{
				include "./View/".$_GET["page"].".php";
			}
			else
			{
				include "./View/login.php";
			}
		?>
	</div>
	<footer></footer>
</main>
</body>
</html>