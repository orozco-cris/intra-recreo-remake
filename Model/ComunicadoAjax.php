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
            session_start();
            $id_usuario=$_SESSION["usuario"];
            //$id_usuario = 2;
            $con_comunicado_controller = new ComunicadoController();
            $query = "select * from comunicado as co where co.id_usuario_creador =".$id_usuario."
                and co.tipo_comunicado = 'permiso' order by co.id_comunicado desc";
            $con_comunicado_controller = new ComunicadoController();           
            $con_comunicado = $con_comunicado_controller->getPermisosParaCliente($query);
            $html = '<table class="table table-bordered table-striped" id="tblAuditadasRep">
				<thead>
					<tr>
						<th class="back-color text-center">Asunto</th>
						<th class="back-color text-center">Fecha</th>
						<th class="back-color text-center">Departamento</th>
                        <th class="back-color text-center">Ver más</th>   
						<th class="back-color text-center"></th>
					</tr>
				</thead>
				<tbody>';
            if($con_comunicado[0]["success"])
            {
                foreach ($con_comunicado as $row) 
                {$color=$row["destinatario"]->getRevision();
                    $c='';
                    if($color==0){
                        $c='text-danger';
                    }
                    else if($color==1){
                        $c='text-success';
                    }
                    else if($color==2){
                        $c='text-warning';
                    }
                    $html .= '<tr>
                        <td>'.$row["asunto_comunicado"].'</td>
                        <td class="text-center">'.$row["anio_comunicado"].'/'.
                            $row["mes_comunicado"].'/'.
                            $row["dia_comunicado"].'</td>
                        <td class="text-center">'.$row["destinatario"]->getId_usuario()->getId_tipo_usuario()->getNombre_tipo_usuario().'</td>
                        <td class="text-center"><a class="btn btn-link" 
                    href="?page=solEspecificas&comu='.base64_encode($row["id_comunicado"]).'&estado=0">Ver más</a></td>
                        <td class="text-center"><i class="fa fa-circle '.$c.'"></i></td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No existen solicitudes de permisos</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;

        case 'createSolicitudPermiso':
            session_start();
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
            
            //$comunicado->setId_usuario_creador($_POST["usuario"]);
            $comunicado->setId_usuario_creador($_SESSION["usuario"]);
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
            $comunicado->setFecha_caducidad_comunicado('');
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

        case 'listCircularesParaCliente':
        break;
    }
}

?>