<?php
require_once "./../Class/Usuario.php";
require_once "./../Controller/UsuarioController.php";

if($_POST["crud"])
{
    $crud = $_POST["crud"];
    switch($crud)
    {
        case 'listClientes':
            $usuario = new Usuario();
            $conUsuario = new UsuarioController();
            
            $query = "select * from usuario";
            $usuarios = $conUsuario->listClientes($query);
            $html = "";

            if($usuarios[0]["success"])
            {
                $html .='<table id="idTablaTest" class="table table-bordered border-secondary mt-3 text-center table-hover" name="idTablaPersonas">
                <thead class="back-color">
                    <tr>
                        <th>Nombre</th><th>Apellido</th><th>Cedula</th><th>Correo</th><th>Dirección</th>
                    </tr>
                </thead><tbody>';
                foreach($usuarios as $row)
                {
                    $html.='<tr>
                        <td>'.$row["nombre_usuario"].'</td>
                        <td>'.$row["apellido_usuario"].'</td>
                        <td>'.$row["cedula_usuario"].'</td>
                        <td>'.$row["correo_usuario"].'</td>
                        <td>'.$row["direccion_usuario"].'</td>
                    </tr>';
                }
                $html .= '</tbody></table>';
            }
            echo $html;
            break;
    }
}

?>