<?php  

if(!isset($_SESSION["perfil"]))
{
	header("?page=login");
}


else
{
	//$consulta=();
	if($_SESSION["perfil"] == 1)
	{
		header("Location:?page=homeAdmin");
        //echo 'ADM';
	}
	/*elseif($_SESSION["perfil"] === "SEG")
	{
		header("Location: ?page=homeSeg");
        //echo 'SEG';
	}
	elseif ($_SESSION["perfil"] === "SIS") 
	{
		//header("Location: ?page=homeSis");
        //echo 'SIS';
	}
	elseif ($_SESSION["perfil"] === "VIS")
	{
		//header("Location: ?page=homeVis");
        //echo 'VIS';
	}
	else
	{
		//header("Location: ?page=logout");
	}*/
}
?>