<?php
require_once "./../Class/Usuario.php";
require_once "./../Controller/UsuarioController.php";
require_once "./../Controller/ComunUsuaController.php";

    if($_POST["crud"])
    {
        $crud = $_POST["crud"];
        switch($crud)
        {
            case 'read':
				//$clave=md5($_POST["clave"]);
				$clave=$_POST["clave"];
                $usuario = new Usuario();
				$conUsuario = new UsuarioController();
				$query = "select * from usuario where estado_usuario = 1 and login_usuario = '".$_POST["usuario"]."' and clave_usuario = '".$clave."'";
				$usuario = $conUsuario->readOne($query);
				if($usuario != null)
				{					
					if($usuario->getLogin_usuario() === $_POST["usuario"] && $usuario->getClave_usuario() === $clave)
					//if($usuario->getUsuario() === $_POST["usuario"] && $usuario->getClave() === base64_encode($_POST["clave"]))
					{
						session_start();
						$_SESSION["perfil"] = $usuario->getId_tipo_usuario();
						$_SESSION["usuario"] = $usuario->getId_usuario();
						echo "Bienvenido ".$usuario->getNombre_usuario().' '.$usuario->getApellido_usuario();
					}
					else{
						echo "0";
					}
				}		
				else
				{
					echo "0";
				} 
                break;


			case "list":
            	break;

			case "create":
				/* $conUsuario = new UsuarioController();
				$nombreDia = $_POST["nombreDia"];
				$dia = $_POST["dia"];
				$mes = $_POST["mes"];
				$anio = $_POST["anio"];
				$A0 = $_POST["A0"];
				$A1 = $_POST["A1"];
				$A2 = $_POST["A2"];
				$A3 = $_POST["A3"];
				$A4 = $_POST["A4"];
				$A5 = $_POST["A5"];
				$A6 = $_POST["A6"];
				$A7 = $_POST["A7"];
				$A8 = $_POST["A8"];
				$posterior0 = $_POST["posterior0"];
				$subAnt = $_POST["subAnt"];
				$subMega = $_POST["subMega"];

				$status = $conUsuario->create($nombreDia, $dia, $mes, $anio, 
				$A0, $A1, $A2, $A3, $A4, $A5, $A6, $A7, $A8, $posterior0, $subAnt, $subMega);
				echo $status; */
				break;

			case "edit":
				/* $conUsuario = new UsuarioController();
				$A0 = $_POST["A0"];
				$A1 = $_POST["A1"];
				$A2 = $_POST["A2"];
				$A3 = $_POST["A3"];
				$A4 = $_POST["A4"];
				$A5 = $_POST["A5"];
				$A6 = $_POST["A6"];
				$A7 = $_POST["A7"];
				$A8 = $_POST["A8"];
				$posterior0 = $_POST["posterior0"];
				$subAnt = $_POST["subAnt"];
				$subMega = $_POST["subMega"];
				$fecha = $_POST["fecha"];

				$status = $conUsuario->edit($A0, $A1, $A2, $A3, $A4, $A5, 
				$A6, $A7, $A8, $posterior0, $subAnt, $subMega, $fecha);
				echo $status; */
				break;
				case 'listUsuarios':
					$usuario_comunicado = new UsuarioController();
					$seguridad=4;
					$operaciones=3;
					$query = " select *from usuario where id_tipo_usuario=".$seguridad." or id_tipo_usuario=".$operaciones." ";
					$con_usuario_comunicado = $usuario_comunicado->listClientes($query);
					$html = ' <div id="usuarios">
					<select class="form-control" id="destinatario">';
					if($con_usuario_comunicado[0]["success"])
					{
						foreach ($con_usuario_comunicado as $row) 
						{
							
							$html .= '<option value="'.$row["id_usuario"].'">'.$row["nombre_usuario"].' '.$row["apellido_usuario"].'</option>';
						}
					}
					$html .='</select>
						</div>';
					
					
						echo $html;
				break;
        }
    }

?>