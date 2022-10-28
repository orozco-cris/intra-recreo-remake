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
            $id_permiso = 0;
            $id_permiso = $_POST["comunicado"];
            $con_usuario_comunicado_controller = new ComunUsuaController();
            $query = " select * from comunicado where id_comunicado=".$id_permiso."";
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
                        <label><b>MENSAJE:</b> '.$row["comunicado"]->getMensaje_comunicado().'</label>
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
    }
}
?>
