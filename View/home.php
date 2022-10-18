<?php  

if(!isset($_SESSION["perfil"]))
{
	header("Location:?page=login");
}else
{
	//$consulta=();
	if($_SESSION["perfil"] == 1)
	{
		header("Location:?page=homeAdmin");
        //echo 'ADM';
	}
	elseif($_SESSION["perfil"] == 2)
	{
		header("Location: ?page=homeCliente");
        //echo 'SEG';
	}
	elseif ($_SESSION["perfil"] == 3 || $_SESSION["perfil"] == 4) 
	{
		header("Location: ?page=homeSeg");
        //echo 'SIS';
	}
	/*elseif ($_SESSION["perfil"] === "VIS")
	{
		//header("Location: ?page=homeVis");
        //echo 'VIS';
	}*/
	else
	{
		header("Location: ?page=logout");
	}
}
?>