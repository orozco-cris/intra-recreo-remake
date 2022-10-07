<?php
require_once "./../Class/Comunicado.php";
require_once "./../Controller/ComunicadoController.php";
require_once "./../Class/ComunicadoUsuario.php";
require_once "./../Controller/ComunUsuaController.php";

if($_POST["crud"])
{
    $crud = $_POST["crud"];
    switch($crud)
    {
        case 'listPermisosParaCliente':
            $id_usuario = $_POST["usuario"];
            $con_comunicado_controller = new ComunicadoController();
            $query = "select * from comunicado as co where co.id_usuario_creador =".$id_usuario."
                and co.tipo_comunicado = 'permiso'";
            $con_comunicado = $con_comunicado_controller->getPermisosParaCliente($query);
            $html = '<table class="table table-bordered table-striped" id="tblAuditadasRep">
				<thead>
					<tr>
						<th class="back-color text-center">Asunto</th>
						<th class="back-color text-center">Fecha</th>
						<th class="back-color text-center">Departamento</th>
						<th class="back-color text-center">Estado</th>
					</tr>
				</thead>
				<tbody>';
            if($con_comunicado[0]["success"])
            {
                foreach ($con_comunicado as $row) 
                {
                    $html .= '<tr>
                        <td>'.$row["asunto_comunicado"].'</td>
                        <td>'.$row["anio_comunicado"].'/'.
                            $row["mes_comunicado"].'/'.
                            $row["dia_comunicado"].'</td>
                        <td>'.$row["destinatario"]->getId_usuario()->getId_tipo_usuario()->getNombre_tipo_usuario().'</td>
                        <td>'.$row["destinatario"]->getRevision().'</td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No existen permisos solicitados</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;

        case 'createSolicitudPermiso':
            $comunicado = new Comunicado();
            $con_comunicado = new ComunicadoController();
            $comunicado_usuario = new ComunicadoUsuario();
            $con_comunicado_usuario = new ComunUsuaController();

            date_default_timezone_set('America/Guayaquil');
            $hoy = getdate();
            $dia = $hoy["mday"];
            $mes = $hoy["mon"];
            $anio = $hoy["year"];
            $circular_codigo = "".$hoy["year"].$hoy["mon"] . $hoy["mday"] . $hoy["hours"] . $hoy["minutes"] . $hoy["seconds"] ."";
            $hora = $hoy["hours"] . ":" . $hoy["minutes"] . ":" . $hoy["seconds"];

            $comunicado->setId_usuario_creador($_POST["usuario"]);
            $comunicado->setDe_comunicado($_POST["de_comunicado"]);
            $comunicado->setPara_comunicado($_POST["para_comunicado"]);
            $comunicado->setCodigo_comunicado($circular_codigo);
            $comunicado->setAsunto_comunicado($_POST["asunto_comunicado"]);
            $comunicado->setMensaje_comunicado($_POST["mensaje_comunicado"]);
            $comunicado->setDetalle_comunicado($_POST["detalle_comunicado"]);
            $comunicado->setDia_comunicado($dia);
            $comunicado->setMes_comunicado($mes);
            $comunicado->setAnio_comunicado($anio);
            $comunicado->setHora_comunicado($hora);
            $comunicado->setFecha_caducidad_comunicado($_POST["fecha_caducidad"]);
            $comunicado->setFoto_comunicado($_POST["foto_comunicado"]);
            $comunicado->setTipo_comunicado($_POST["tipo_comunicado"]);
            $result_comunicado = $con_comunicado->createPermiso($comunicado);
            
            if($result_comunicado)
            {
                $id_comunicado = $con_comunicado->getLastId();
                $comunicado_usuario->setId_comunicado($id_comunicado);
                $comunicado_usuario->setId_usuario($_POST["usuario"]);
                $comunicado_usuario->setRevision(0);
                $result_comunicado_usuario = $con_comunicado_usuario->create($comunicado_usuario);
                if($result_comunicado_usuario)
                {
                    echo 'correcto';
                }else
                {
                    echo 'incorrecto';
                }
            }else
            {
                echo 'incorrecto';
            }
        break;
    }
}

?>