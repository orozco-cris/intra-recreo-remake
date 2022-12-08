<?php
require_once "./../Class/Comunicado.php";
require_once "./../Controller/ComunicadoController.php";
require_once "./../Controller/ComunUsuaController.php";

if($_POST["crud"])
{
    $crud = $_POST["crud"];
    switch($crud)
    {
        case 'listCircularesParaCliente':
            $id_usuario = 2;
            $con_usuario_comunicado_controller = new ComunUsuaController();
            $query = "select cu.id_comunicado_usuario, cu.id_comunicado, cu.id_usuario, cu.revision 
                from comunicado_usuario as cu inner join comunicado as co on cu.id_comunicado = co.id_comunicado
                where cu.id_usuario =".$id_usuario." and co.tipo_comunicado = 'circular' order by cu.id_comunicado_usuario desc";
            $con_usuario_comunicado = $con_usuario_comunicado_controller->getCircularesParaCliente($query);
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
            if($con_usuario_comunicado[0]["success"])
            {
                foreach ($con_usuario_comunicado as $row) 
                {
                    $html .= '<tr>
                        <td>'.$row["comunicado"]->getAsunto_comunicado().'</td>
                        <td>'.$row["comunicado"]->getAnio_comunicado().'/'.
                            $row["comunicado"]->getMes_comunicado().'/'.
                            $row["comunicado"]->getDia_comunicado().'</td>
                        <td>'.$row["comunicado"]->getId_usuario_creador()->getId_tipo_usuario()->getNombre_tipo_usuario().'</td>
                        <td>'.$row["check"].'</td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No existen circulares disponibles</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;

        case 'listPermisosSegOpe':
            session_start();
            $con_usuario_comunicado_controller = new ComunUsuaController();
            $query = "   
            select *from comunicado as c inner join comunicado_usuario as cu
                on c.id_comunicado=cu.id_comunicado where cu.id_usuario=".$_SESSION["usuario"]." and tipo_comunicado='permiso' order by c.id_comunicado desc";
            $con_usuario_comunicado = $con_usuario_comunicado_controller->listadoPermSegOperaciones($query);
            $html = '<table class="table table-bordered table-striped" id="tablaPermisos">
				<thead>
					<tr>
						<th class="back-color text-center">Asunto</th>
                        <th class="back-color text-center">De</th>
						<th class="back-color text-center">Fecha</th>
						<th class="back-color text-center">Ver más</th>                        
                        <th class="back-color text-center"></th>
					</tr>
				</thead>
				<tbody>';
            if($con_usuario_comunicado[0]["success"])
            {
                foreach ($con_usuario_comunicado as $row) 
                {
                    $color=$row["comunicado_usuario"]->getRevision();
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
                        <td>'.$row["comunicado"]->getAsunto_comunicado().'</td>
                        <td class="text-center">'.$row["comunicado"]->getDe_comunicado().'</td>  
                        <td class="text-center">'.$row["comunicado"]->getAnio_comunicado().'/'.
                            $row["comunicado"]->getMes_comunicado().'/'.
                            $row["comunicado"]->getDia_comunicado().'</td>
                    <td class="text-center"><a class="btn btn-link" 
                    href="?page=solEspecificas&comu='.base64_encode($row["comunicado"]->getId_comunicado()).'&estado='.$row["comunicado_usuario"]->getRevision().'">Ver más</a></td>
                    <td class="text-center"><i class="fa fa-circle '.$c.'"></i>                    
                    </td>
                    </tr>';
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No existen permisos</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;

        case 'permisoDeterminado':
            //$id_permiso = 2;
            $id_permiso = $_POST["comunicado"];
            $con_usuario_comunicado_controller = new ComunUsuaController();
            $query = "select * from comunicado where id_comunicado = ".$id_permiso."";
            $con_usuario_comunicado = $con_usuario_comunicado_controller->PermisoDeterminado($query);
          
            $html = '';
            if($con_usuario_comunicado[0]["success"])
            {
                foreach ($con_usuario_comunicado as $row) 
                {
                    $html .= '                                   
                    <div class="col-md-3">
                        <label><b>DE:</b> '.$row["comunicado"]->getDe_comunicado().'</label>
                    </div>
                    <div class="col-md-3">
                        <label><b>FECHA:</b> '.$row["comunicado"]->getAnio_comunicado().'/'.
                        $row["comunicado"]->getMes_comunicado().'/'.
                        $row["comunicado"]->getDia_comunicado().'</label>
                    </div>
                    <div class="col-md-3">
                        <label><b>HORA:</b> '.$row["comunicado"]->getHora_comunicado().'</label>
                    </div>
                    <div class="col-md-3">
                        <label><b>CÓDIGO:</b> '.$row["comunicado"]->getCodigo_comunicado().'</label>
                    </div>
                </div>
                <div class="row" style="padding: 8px !important">  
                    <div class="col-md-12">
                        <label><b>ASUNTO:</b> '.$row["comunicado"]->getAsunto_comunicado().'</label>
                    </div>
                </div>
                <div class="row" style="padding: 8px !important">  
                    <div class="col-md-12">
                        <label><b>DETALLE:</b> '.$row["comunicado"]->getDetalle_comunicado().'</label>
                        <input type="hidden" id="id_comunicado" value='.$row["comunicado"]->getId_comunicado().'>
                    </div>
                </div>';
                $var=$row["comunicado"]->getFoto_comunicado();
                $img="logo.PNG";
                if ( empty($var)) {
                    
                        $html .=  '<div class="row" style="padding: 8px !important">  
                    <div class="col-md-12 form-group">
                        <div class="position-relative has-icon-left"> 
                        <img style="width:80%"; heigth:50px" src="Resources/images/'.$img.'">                
                        </div>
                    </div> 
                </div>';
                    }
                    else {                        
                        $html .= '<div class="row" style="padding: 8px !important">  
                        <div class="col-md-12 form-group">
                            <div class="position-relative has-icon-left"> 
                            <img style="width:80%"; heigth:50px" src="./Resources/uploads/'.$row["comunicado"]->getFoto_comunicado().'">                
                            </div>
                        </div> 
                    </div>';   
                    }
                }
            }
            else
				{
					$html .= "<tr><td colspan='1' class='text-center'>Error al recuperar los datos</td></tr>";
				}
            echo $html;
        break;
        
        case 'aceptarPermiso':
            $con_usuario_comunicado_controller = new ComunUsuaController();
            $query = "update comunicado_usuario set revision=1 where id_comunicado=".$_POST["id_comunicado"]."";
            $con_usuario_comunicado = $con_usuario_comunicado_controller->aceptarPermiso($query);
            if($con_usuario_comunicado[0]["success"])
            {
                echo "usuario modificado";
            }
            else
            {
                echo 0;
            }    
        break;

        case 'retroalimentarPermiso':
            $con_usuario_comunicado_controller = new ComunUsuaController();
            $obj_usuario_comunicado_controller = new ComunUsuaController();
            $query = "update comunicado_usuario set revision=2 where id_comunicado=".$_POST["id_comunicado"]."";
            $con_usuario_comunicado = $con_usuario_comunicado_controller->aceptarPermiso($query);

            $query = "update comunicado set mensaje_comunicado='".$_POST["mensaje"]."' where id_comunicado=".$_POST["id_comunicado"]."";
            $obj_usuario_comunicado = $obj_usuario_comunicado_controller->aceptarPermiso($query);

            if($con_usuario_comunicado[0]["success"] && $obj_usuario_comunicado[0]["success"])
            {
                echo "usuario modificado";
            }
            else
            {
                echo 0;
            }    
        break;

        case 'todoslospermisos':
            $con_usuario_comunicado_controller = new ComunUsuaController();
            $query = " select *from comunicado  as c inner join comunicado_usuario as cu 
            on c.id_comunicado=cu.id_comunicado";
            $con_usuario_comunicado = $con_usuario_comunicado_controller->listadoPermSegOperaciones($query);
           

            $html = '<table class="table table-bordered text-center table-striped" id="tablaPermisos">
				<thead>
					<tr>
						<th class="back-color text-center">Asunto</th>
						<th class="back-color text-center">Fecha</th>
						<th class="back-color text-center">Mensaje</th>
						<th class="back-color text-center">Ver Permiso</th>                        
                        <th class="back-color text-center"></th>
					</tr>
				</thead>
				<tbody>';
            if($con_usuario_comunicado[0]["success"])
            {
                foreach ($con_usuario_comunicado as $row) 
                {
                    $color=$row["comunicado_usuario"]->getRevision();
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
                        <td>'.$row["comunicado"]->getAsunto_comunicado().'</td>
                        <td>'.$row["comunicado"]->getAnio_comunicado().'/'.
                            $row["comunicado"]->getMes_comunicado().'/'.
                            $row["comunicado"]->getDia_comunicado().'</td>
                    <td>'.$row["comunicado"]->getMensaje_comunicado().'</td>   
                    <td>
                    <button type="button" class="form-control btn btn-primary" data-bs-toggle="modal"  data-bs-target="#solicitud" data-yourparameter="'.($row["comunicado"]->getId_comunicado()).'">Ver Detalles </button></td>
                    <td><i class="fa fa-circle '.$c.'"></i></td>                    
                    </td>
                    </tr>';
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No existen permisos</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;

        
    
        case 'solicitudesAprobadasCliente':
            session_start();
            $con_usuario_comunicado_controller = new ComunUsuaController();
            $query = "   
            select *from comunicado as c inner join comunicado_usuario as cu
                on c.id_comunicado=cu.id_comunicado where cu.id_usuario=".$_SESSION["usuario"]." and tipo_comunicado='permiso' 
                and and cu.revision=1 order order by c.id_comunicado desc";
            $con_usuario_comunicado = $con_usuario_comunicado_controller->listadoPermSegOperaciones($query);
            $html = '<table class="table table-bordered table-striped" id="tablaPermisos">
                <thead>
                    <tr>
                        <th class="back-color text-center">Asunto</th>
                        <th class="back-color text-center">De</th>
                        <th class="back-color text-center">Fecha</th>
                        <th class="back-color text-center">Ver más</th>                        
                        <th class="back-color text-center"></th>
                    </tr>
                </thead>
                <tbody>';
            if($con_usuario_comunicado[0]["success"])
            {
                foreach ($con_usuario_comunicado as $row) 
                {
                    
                    $html .= '<tr>
                        <td>'.$row["comunicado"]->getAsunto_comunicado().'</td>
                        <td class="text-center">'.$row["comunicado"]->getDe_comunicado().'</td>  
                        <td class="text-center">'.$row["comunicado"]->getAnio_comunicado().'/'.
                            $row["comunicado"]->getMes_comunicado().'/'.
                            $row["comunicado"]->getDia_comunicado().'</td>
                    <td class="text-center"><a class="btn btn-link" 
                    href="?page=solEspecificas&comu='.base64_encode($row["comunicado"]->getId_comunicado()).'&estado='.$row["comunicado_usuario"]->getRevision().'">Ver más</a></td>
                   
                    </tr>';
                }
            }
            else
                {
                    $html .= "<tr><td colspan='4' class='text-center'>No existen permisos</td></tr>";
                }
                $html .= '</tbody></table>';
                echo $html;
        break;
        case 'solicitudesNoAprobadasCliente':
            session_start();
            $con_usuario_comunicado_controller = new ComunUsuaController();
            $query = "   
            select *from comunicado as c inner join comunicado_usuario as cu
                on c.id_comunicado=cu.id_comunicado where cu.id_usuario=".$_SESSION["usuario"]." 
                and tipo_comunicado='permiso' and cu.revision=0 order order by c.id_comunicado desc";
            $con_usuario_comunicado = $con_usuario_comunicado_controller->listadoPermSegOperaciones($query);
            $html = '<table class="table table-bordered table-striped" id="tablaPermisos">
                <thead>
                    <tr>
                        <th class="back-color text-center">Asunto</th>
                        <th class="back-color text-center">De</th>
                        <th class="back-color text-center">Fecha</th>
                        <th class="back-color text-center">Ver más</th>                        
                        <th class="back-color text-center"></th>
                    </tr>
                </thead>
                <tbody>';
            if($con_usuario_comunicado[0]["success"])
            {
                foreach ($con_usuario_comunicado as $row) 
                {
                   
                    $html .= '<tr>
                        <td>'.$row["comunicado"]->getAsunto_comunicado().'</td>
                        <td class="text-center">'.$row["comunicado"]->getDe_comunicado().'</td>  
                        <td class="text-center">'.$row["comunicado"]->getAnio_comunicado().'/'.
                            $row["comunicado"]->getMes_comunicado().'/'.
                            $row["comunicado"]->getDia_comunicado().'</td>
                    <td class="text-center"><a class="btn btn-link" 
                    href="?page=solEspecificas&comu='.base64_encode($row["comunicado"]->getId_comunicado()).'&estado='.$row["comunicado_usuario"]->getRevision().'">Ver más</a></td>
                   
                    </tr>';
                }
            }
            else
                {
                    $html .= "<tr><td colspan='4' class='text-center'>No existen permisos</td></tr>";
                }
                $html .= '</tbody></table>';
                echo $html;
        break;

/*         case 'permisoAModificar':
            //$id_permiso = 2;
            $id_permiso = $_POST["comunicado"];
            $con_usuario_comunicado_controller = new ComunUsuaController();
            $query = "select * from comunicado where id_comunicado = ".$id_permiso."";
            $con_usuario_comunicado = $con_usuario_comunicado_controller->PermisoDeterminado($query);
          
            $html = '';
            if($con_usuario_comunicado[0]["success"])
            {
                foreach ($con_usuario_comunicado as $row) 
                {
                    $html .= ' 
                    
                    <div class="row" style="position: relative;" id="modificarPermiso">
                                                <div class="col-md-6">
                                                    <div class="row" style="padding:5px">
                                                        <div class="col-md-4" style="padding:15px">
                                                            <label> DE:</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input id="de" class="form-control" type="text" value='.$row["comunicado"]->getDe_comunicado().'>
                                                        </div>
                                                        <div class="col-md-4" style="padding:15px">
                                                            <label> ASUNTO:</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input id="asunto" class="form-control" type="text" value='.$row["comunicado"]->getAsunto_comunicado().'>
                                                        </div>
                                                        <div class="col-md-4" style="padding:15px">
                                                            <label> PARA:</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                        <input id="para" class="form-control" type="text" value='.$row["comunicado"]->getPara_comunicado().'>
                                                        </div>
                                                        <input id="codigo" class="form-control" type="hidden" value='.$row["comunicado"]->getCodigo_comunicado().'>
                                                       <!--  <div class="col-md-4" style="padding:15px">
                                                            <label> MENSAJE:</label>
                                                        </div> -->
                                                        <div class="col-md-8 form-group">
                                                            <input id="mensaje" class="form-control" type="hidden" rows="3">
                                                            <input id="tipo" class="form-control" type="hidden" value="permiso">
                                                            <input id="fechacaducidad" class="form-control" type="hidden" value="2022/10/15">
                                                        </div>
                                                        <div class="row">
                                                <div class="col-md-4" style="padding:10px">
                                                    <label> DESCRIPCION:</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <textarea class="fom-control" name="txtDescripcion" id="txtDescripcion" rows="8"> '.$row["comunicado"]->getDetalle_comunicado().'</textarea> 
                                                </div>
                                                <input type="hidden" id="id_comunicado" value='.$row["comunicado"]->getId_comunicado().'>
                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row" id="val">   
                                                    <div class="col-md-10 form-group" id="imagen">
                                                    <img style="width:80%"; heigth:50px" src="./Resources/uploads/'.$row["comunicado"]->getFoto_comunicado().'">  
                                                    </div>                                                     
                                                        <div class="col-md-10 form-group" style="padding:10px" >
                                                            <input type="file" class="btn btn-primary" id="file" name="file" accept="image/gif, image/jpeg, image/png">
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>

                    ';
                    }
                }
                else
				{
					$html .= "<tr><td colspan='1' class='text-center'>Error al recuperar los datos</td></tr>";
				}
            echo $html;
        break;
 */

case 'permisoAModificar':
    //$id_permiso = 2;
    $id_permiso = $_POST["comunicado"];
    $con_usuario_comunicado_controller = new ComunUsuaController();
    $query = "select * from comunicado where id_comunicado = ".$id_permiso."";
    $con_usuario_comunicado = $con_usuario_comunicado_controller->datosPermiso($query);
   //array ($con_usuario_comunicado= $con_usuario_comunicado_controller->datosPermiso($query));
    $test = json_encode($con_usuario_comunicado);
    //print_r($con_usuario_comunicado);
    echo $test;


break;

        case 'listPermisosAprobados':
            session_start();
            $id_usuario=$_SESSION["usuario"];
            //$id_usuario = 2;
            $con_comunicado_controller = new ComunicadoController();
            $query = "select * from comunicado as co inner join comunicado_usuario as cu 
                        on co.id_comunicado=cu.id_comunicado where co.id_usuario_creador =".$id_usuario."
                and co.tipo_comunicado = 'permiso' and cu.revision=1 order by co.id_comunicado desc";
            $con_comunicado_controller = new ComunicadoController();           
            $con_comunicado = $con_comunicado_controller->getPermisosAprobadosNoAprobados($query);
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
                {
                    $color=$row["destinatario"]->getRevision();
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
                    <td class="text-center"><i class="fa fa-circle '.$c.'"></i>                    
                    </td>
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

        case 'listPermisosNoAprobados':
            session_start();
            $id_usuario=$_SESSION["usuario"];
            //$id_usuario = 2;
            $con_comunicado_controller = new ComunicadoController();
            $query = "select * from comunicado as co inner join comunicado_usuario as cu 
                        on co.id_comunicado=cu.id_comunicado where co.id_usuario_creador =".$id_usuario."
                and co.tipo_comunicado = 'permiso' and cu.revision=0 order by co.id_comunicado desc";
            $con_comunicado_controller = new ComunicadoController();           
            $con_comunicado = $con_comunicado_controller->getPermisosAprobadosNoAprobados($query);
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
                {
                    $color=$row["destinatario"]->getRevision();
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
                    <td class="text-center"><i class="fa fa-circle '.$c.'"></i>                    
                    </td>
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
        case 'updatePermiso':
            echo "entro al controlador";
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
            //echo $imagen;
            //$comunicado->setId_usuario_creador($_POST["usuario"]);
            //$comunicado->setId_usuario_creador($_SESSION["usuario"]);
            $comunicado->setId_comunicado($_POST["id_comunicado"]);
            $comunicado->setDe_comunicado($_POST["de_comunicado"]);
            $comunicado->setPara_comunicado($_POST["para_comunicado"]);
            $comunicado->setCodigo_comunicado($_POST["codigo_comunicado"]);
            $comunicado->setAsunto_comunicado($_POST["asunto_comunicado"]);
            //$comunicado->setMensaje_comunicado($_POST["mensaje_comunicado"]);
            $comunicado->setDetalle_comunicado($_POST["detalle_comunicado"]);
           // $comunicado->setFecha_caducidad_comunicado('');
            $comunicado->setFoto_comunicado($_POST["foto_comunicado"]);
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

    }
}
?>
