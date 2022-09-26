<?php
require_once "./../Class/Usuario.php";
require_once "./../Controller/UsuarioController.php";

    if($_POST["crud"])
    {
        $crud = $_POST["crud"];
        switch($crud)
        {
            case 'read':
                /* $usuario = new Usuario();
				$conUsuario = new UsuarioController();
				
				$query = "select * from usuario where estado = 1 and cedula = '".$_POST["cedula"]."' and clave = '".$_POST["clave"]."'";
				//$query = "select * from usuarios where activo = 1 and usuario = '".$_POST["usuario"]."' and clave = '".base64_encode($_POST["clave"])."'";
				$usuario = $conUsuario->readOne($query);

				if($usuario != null)
				{
					if($usuario->getCedula() === $_POST["cedula"] && $usuario->getClave() === $_POST["clave"])
					//if($usuario->getUsuario() === $_POST["usuario"] && $usuario->getClave() === base64_encode($_POST["clave"]))
					{
						session_start();
						$_SESSION["perfil"] = $usuario->getRol();
						$_SESSION["usuario"] = $usuario->getIdUsuario();
						echo "Bienvenido ".$usuario->getNombre().' '.$usuario->getApellido();
					}
					else
					{
						echo "0";
					}
				}
				else
				{
					echo "0";
				} */
                break;

			case "list":
                /* $conPersona = new UsuarioController();
				$query = "SELECT f.idFecha, f.nombreDia, concat(f.anio,'/',f.mes,'/',f.dia) as fecha,
				sum(CASE when a.nombre = 'ACCESO 0' THEN v.valor end) as 'A0',
				sum(CASE when a.nombre = 'ACCESO 1' THEN v.valor end) as 'A1',
				sum(CASE when a.nombre = 'ACCESO 2' THEN v.valor end) as 'A2',
				sum(CASE when a.nombre = 'ACCESO 3' THEN v.valor end) as 'A3',
				sum(CASE when a.nombre = 'ACCESO 4' THEN v.valor end) as 'A4',
				sum(CASE when a.nombre = 'ACCESO 5' THEN v.valor end) as 'A5',
				sum(CASE when a.nombre = 'ACCESO 6' THEN v.valor end) as 'A6',
				sum(CASE when a.nombre = 'ACCESO 7' THEN v.valor end) as 'A7',
				sum(CASE when a.nombre = 'ACCESO 8' THEN v.valor end) as 'A8',
				sum(CASE when a.nombre = 'POSTERIOR 0' THEN v.valor end) as Posterior_0,
				sum(CASE when a.nombre = 'SUB ANT' THEN v.valor end) as Subsuelo_ANT,
				sum(CASE when a.nombre = 'SUB MEGA' THEN v.valor end) as Subsuelo_MEGA
				FROM acceso as a
				inner join valor as v on a.idAcceso = v.idAcceso
				inner join fecha as f on v.idFecha = f.idFecha
				where a.idCategoria = 5
				GROUP by f.idFecha order by f.idFecha desc
				limit 31";

				$registros = $conPersona->listAll31($query);
				$html = '';

				if($registros[0]["success"])
				{
					$html .= '<table id="idTablaPersonas" class="table table-bordered border-secondary mt-3 text-center table-hover" name="idTablaPersonas">
					<thead class="back-color">
						<tr>
							<th>Fecha</th><th>Dia</th><th>0</th><th>1</th><th>2</th><th>3</th>
							<th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>Post. 0</th>
							<th>Sub. ANT</th><th>Sub. MEGA</th><th></th>
						</tr>
					</thead><tbody>';
					foreach($registros as $row)
					{
						$html .='<tr>
							<td>'.$row["fecha"].'</td>
							<td>'.$row["nombreDia"].'</td>
							<td>'.$row["A0"].'</td>
							<td>'.$row["A1"].'</td>
							<td>'.$row["A2"].'</td>
							<td>'.$row["A3"].'</td>
							<td>'.$row["A4"].'</td>
							<td>'.$row["A5"].'</td>
							<td>'.$row["A6"].'</td>
							<td>'.$row["A7"].'</td>
							<td>'.$row["A8"].'</td>
							<td>'.$row["Posterior0"].'</td>
							<td>'.$row["SubANT"].'</td>
							<td>'.$row["SubMEGA"].'</td>
							<td>
							<button class="btn btn-info btn-edit-pea" type="button" idPeatones="'.$row["idFecha"].'">
								<span class="fa-solid fa-pen-to-square"></span>
							</button> 
							</td>
						</tr>';
					}
					/* 
							<button class="btn btn-danger" type="button">
								<span class="fa-solid fa-trash"></span>
							</button>
					$html .= '</tbody></table>';
				}

				echo $html; */
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
        }
    }

?>