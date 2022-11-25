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
                    href="?page=solEspecificas&comu='.base64_encode($row["id_comunicado"]).'&estado=1&revision='.$color.'">Ver más</a></td>
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
            
        
            $imagen=$_POST["foto_comunicado"];
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
            $comunicado->setFoto_comunicado($imagen);
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

        case 'listCircularesParaAdmin':
            $obj_comunicado_controller = new ComunicadoController();
            $query = "select * from comunicado where tipo_comunicado = 'circular'
                order by id_comunicado desc limit 25";
            $obj_comunicado = $obj_comunicado_controller->getComunicados($query);
            $html = '<table class="table table-bordered table-striped" id="tblCircularesAll">
				<thead>
					<tr>
						<th class="back-color text-center">Asunto</th>
						<th class="back-color text-center">Fecha</th>
						<th class="back-color text-center">Para</th>
                        <th class="back-color text-center">Ver más</th>   
					</tr>
				</thead>
				<tbody>';
            if($obj_comunicado[0]["success"])
            {
                foreach ($obj_comunicado as $row) 
                {
                    $html .= '<tr>
                        <td>'.$row["comunicado"]->getAsunto_comunicado().'</td>
                        <td class="text-center">'.$row["comunicado"]->getAnio_comunicado().'/'.
                            $row["comunicado"]->getMes_comunicado().'/'.
                            $row["comunicado"]->getDia_comunicado().'</td>
                        <td class="text-center">'.$row["comunicado"]->getPara_comunicado().'</td>
                        <td class="text-center"><a class="btn btn-link" 
                    href="?page=detalleCircularEspecifica&circular='.base64_encode($row["comunicado"]->getId_comunicado()).'">Ver más</a></td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No existen circulares registradas</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;

        case 'listCircularesNoRevisadasAdmin':
            $obj_comunicado_controller = new ComunicadoController();
            $query = "select co.id_comunicado, co.id_usuario_creador, co.de_comunicado, co.para_comunicado, 
            co.codigo_comunicado, co.asunto_comunicado, co.mensaje_comunicado, co.detalle_comunicado,
            co.dia_comunicado, co.mes_comunicado, co.anio_comunicado, co.hora_comunicado, co.fecha_caducidad_comunicado,
            co.foto_comunicado, co.tipo_comunicado
            from comunicado as co 
            inner join comunicado_usuario as cu on co.id_comunicado = cu.id_comunicado
            where co.tipo_comunicado = 'circular' and cu.revision = 0
            group by co.id_comunicado, cu.revision order by co.id_comunicado desc limit 50";
            $obj_comunicado = $obj_comunicado_controller->getComunicados($query);
            $html = '<table class="table table-bordered table-striped" id="tblCircularesNoRevisadasAdmin">
				<thead>
					<tr>
						<th class="back-color text-center">Asunto</th>
						<th class="back-color text-center">Fecha</th>
						<th class="back-color text-center">Para</th>
                        <th class="back-color text-center">Ver más</th>   
					</tr>
				</thead>
				<tbody>';
            if($obj_comunicado[0]["success"])
            {
                foreach ($obj_comunicado as $row) 
                {
                    $html .= '<tr>
                        <td>'.$row["comunicado"]->getAsunto_comunicado().'</td>
                        <td class="text-center">'.$row["comunicado"]->getAnio_comunicado().'/'.
                            $row["comunicado"]->getMes_comunicado().'/'.
                            $row["comunicado"]->getDia_comunicado().'</td>
                        <td class="text-center">'.$row["comunicado"]->getPara_comunicado().'</td>
                        <td class="text-center"><a class="btn btn-link" 
                        href="?page=usuariosCircularEspecifica&circular='.base64_encode($row["comunicado"]->getId_comunicado()).'">Ver más</a></td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No existen circulares sin visualización</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;


        case 'updatePermiso':
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
            
            //$id=$_POST["id_comunicado"];
        
            $imagen=$_POST["foto_comunicado"];
            //$comunicado->setId_usuario_creador($_POST["usuario"]);
            //$comunicado->setId_usuario_creador($_SESSION["usuario"]);
            $comunicado->setId_comunicado($_POST["id_comunicado"]);
            $comunicado->setDe_comunicado($_POST["de_comunicado"]);
            $comunicado->setPara_comunicado($_POST["para_comunicado"]);
            $comunicado->setCodigo_comunicado($circular_codigo);
            $comunicado->setAsunto_comunicado($_POST["asunto_comunicado"]);
            //$comunicado->setMensaje_comunicado($_POST["mensaje_comunicado"]);
            $comunicado->setDetalle_comunicado($_POST["detalle_comunicado"]);
            $comunicado->setDia_comunicado($dia);
            $comunicado->setMes_comunicado($mes);
            $comunicado->setAnio_comunicado($anio);
            $comunicado->setHora_comunicado($hora);
           // $comunicado->setFecha_caducidad_comunicado('');
            $comunicado->setFoto_comunicado($imagen);
            //$comunicado->setTipo_comunicado($_POST["tipo_comunicado"]);

            
            $result_comunicado = $con_comunicado->updatePermiso($comunicado);
            
            if($result_comunicado)
            {
                $result_comunicado_usuario = $con_comunicado_usuario->updateComunicado($_POST["id_comunicado"]);
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

        case 'usuariosCirculares':
            $circular = $_POST["circular"];
            $obj_usuario_controller = new ComunUsuaController();
            $query = " select *from usuario as u inner join comunicado_usuario as cu
            on u.id_usuario=cu.id_usuario where id_comunicado=".$circular;
            $obj_usuario = $obj_usuario_controller->getClientesCircular($query);
            $html = '<table class="table table-bordered table-striped" id="tblCircularesClientes">
				<thead>
					<tr>
						<th class="back-color text-center">Nombre</th>
						<th class="back-color text-center">Login</th>
						<th class="back-color text-center">Contraseña</th>
                        <th class="back-color text-center">Espacio Fisico</th>   
					</tr>
				</thead>
				<tbody>';
            if($obj_usuario[0]["success"])
            {
                foreach ($obj_usuario as $row) 
                {
                    $revision=$row["comunicado_usuario"]->getRevision();
                    if($revision==0){
                        $html .= '<tr style="background:#FAAC58; border-radius:3px !important;">
                        <td >'.$row["cliente"]->getNombre_usuario().'</td>
                        <td class="text-center">'.$row["cliente"]->getLogin_usuario().'</td>
                        <td class="text-center">'.$row["cliente"]->getClave_usuario().'</td>
                        <td class="text-center"></td>                        
                    </tr>';   
                    }else{
                        $html .= '<tr>
                        <td>'.$row["cliente"]->getNombre_usuario().'</td>
                        <td class="text-center">'.$row["cliente"]->getLogin_usuario().'</td>
                        <td class="text-center">'.$row["cliente"]->getClave_usuario().'</td>
                        <td class="text-center"></td>                        
                    </tr>';   
                    }
                                     
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No existen clientes registradas</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;
    }
}

?>