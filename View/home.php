<?php  

if(!isset($_SESSION["perfil"]))
{
	header("?page=login");
}
else
{
	if($_SESSION["perfil"] === "ADM")
	{
		//header("Location: ?page=homeAdm");
        //echo 'ADM';
	}
	elseif($_SESSION["perfil"] === "perfil")
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
		header("Location: ?page=logout");
	}
}
?>