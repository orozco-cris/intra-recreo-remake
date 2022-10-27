<?php
require_once "./../Class/Usuario.php";
require_once "./../Controller/UsuarioController.php";
require_once "./../Controller/ComunUsuaController.php";

    if($_POST["crud"])
    {
        $crud = $_POST["crud"];
        switch($crud)
        {
           
			case 'listTipoUsuario':
				$tipo_usuario = new TipoUsuarioController();
				$query = "select *from tipo_usuario where id_tipo_usuario<>2";
				$con_tipo_usuario = $tipo_usuario->getTipoUsuario($query);
				$html = ' 
				    <select class="form-control" id="tipo_Usuario">';
					    if($con_tipo_usuario!=null)
					        {
                                foreach ($con_tipo_usuario as $row) 
                                {							
                                    $html .= '<option value="'.$row["tipo_usuario"]->getId_tipo_usuario().'">'.$row["tipo_usuario"]->getNombre_tipo_usuario().'</option>';
                                }
					        }
					$html .='</select>';					
					
						echo $html;
			break;
				
				
        }
    }

?>