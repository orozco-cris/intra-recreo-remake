<?php
require_once "./../Class/EspacioFisico.php";
require_once "./../Controller/EspacioFisicoController.php";

if($_POST["crud"])
{
    $crud = $_POST["crud"];
    switch($crud)
    {
        case 'lisEspacioFisico':
            $id_Espacio=$_POST["idEspacio"];
            $con_espacio_fisico= new EspacioFisicoController();
            $query = "select * from espacio_fisico where estado_espacio=1 and tipo_espacio=".$id_Espacio."";
            $con_espacio = $con_espacio_fisico->listEspacioFisico($query);
            $html = '<table class="table table-bordered text-center table-striped" id="tblEspacioFisico">
				<thead>
					<tr>
						<th class="back-color text-center">DENOMINACIÓN</th>
						<th class="back-color text-center">ETAPA</th>
                        <th class="back-color text-center">UBICACION</th>
                        <th class="back-color text-center">MEDIDAS</th>
						<th class="back-color text-center">FOTOGRAFÍA</th>
                        <th class="back-color text-center">VER MÁS</th>
                        <th class="back-color text-center">ELIMINAR</th>
					</tr>
				</thead>
				<tbody>';
                
            if($con_espacio!=null)
            {
                foreach ($con_espacio as $row) 
                {
                    $img=$row["espacio_fisico"]->getFotografia_espacio();
                    $html .= '<tr>
                        <td>'.$row["espacio_fisico"]->getDenominacion().'</td>
                        <td>'.$row["etapa_comercial"]->getNombre_etapa_comercial().'</td>
                        <td>'.$row["espacio_fisico"]->getUbicacion_espacio().'</td>
                        <td>'.$row["espacio_fisico"]->getMedidas().'</td>
                        <td> <img class="zoom" style="width:100px"; heigth:60px" src="Resources/uploads/'.$img.'"></td>
                        <td>                          
                            <a class="btn btn-link" 
                                 href="?page=detalleEspacioFisico&espacio='.base64_encode($row["espacio_fisico"]->getId_espacio_fisico()).'">Ver más
                            </a>                      
                        </td>
                        <td>
                            <button class="form-control btn btn-danger" id="id_espacio" type="button" value='.$row["espacio_fisico"]->getId_espacio_fisico().'> Eliminar</button>
                        </td>
                    </td>
                    </tr>';
                    
                }
            }
            else
			{
				$html .= "<tr><td colspan='12' class='text-center'>No se encontraron espacio fisicos</td></tr>";
			}
				$html .= '</tbody></table>';
				echo $html;
        break;

        case 'getEspacioFisicoId':
            $id_Espacio=$_POST["idEspacio"];
            $con_espacio_fisico= new EspacioFisicoController();
            $query = "select * from espacio_fisico where estado_espacio=1 and id_espacio_fisico=".$id_Espacio."";
            $con_espacio = $con_espacio_fisico->listEspacioFisico($query);
            if($con_espacio!=null)
            {
                foreach ($con_espacio as $row) 
                {
                    $tipo=$row["espacio_fisico"]->getTipo_espacio();
                    $idTipo='null';
                    if($tipo==1){
                        $idTipo="Local";
                    }else if($tipo==2){
                        $idTipo="Isla";
                    }else {
                        $idTipo="Publicidad";
                    }

                    $img=$row["espacio_fisico"]->getFotografia_espacio();
                    $html =' 
                <form class="form form-horizontal" style="padding-top: 3%" id="empresa">
                <div class="form-body">
                    
                    <div class="row">
                        <div class="col-md-2" style="padding:15px">
                            <strong><label> Denominacion</label></strong>
                        </div>
                        <div class="col-md-4 form-group" style="padding:15px">
                            <label>'.$row["espacio_fisico"]->getDenominacion().'</label>
                        </div>
                        <div class="col-md-2" style="padding:15px"> 
                            <strong><label> Ubicacion </label></strong>                           
                        </div>                        
                        <div class="col-md-4 form-group" style="padding:15px">
                            <label>'.$row["espacio_fisico"]->getUbicacion_espacio().'</label>
                        </div>                                                                                         
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:15px">
                            <strong><label> Medidas</label></strong>
                        </div>
                        <div class="col-md-4 form-group" style="padding:15px">
                        <label>'.$row["espacio_fisico"]->getMedidas().'</label>
                        </div>
                        <div class="col-md-2" style="padding:15px"> 
                            <strong><label> Codigo</label></strong>
                        </div>
                        <div class="col-md-4 form-group" style="padding:15px">
                            <label>'.$row["espacio_fisico"]->getCodigo_espacio().'</label>
                        </div>                                                                                             
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:15px">
                            <strong><label> Etapa</label></strong>
                        </div>
                        <div class="col-md-4 form-group" style="padding:15px">
                            <label>'.$row["etapa_comercial"]->getNombre_etapa_comercial().'</label>
                        </div>
                        <div class="col-md-2" style="padding:15px"> 
                            <strong><label> Tipo</label></strong>
                        </div>
                        <div class="col-md-4 form-group" style="padding:15px">
                            <label>'.$idTipo.'</label>
                        </div>                                                                                                
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:15px">
                            <strong><label> Características</label></strong>
                        </div>
                        <div class="col-md-10 form-group" style="padding:10px">
                            <textarea type="text" class="fom-control" id="caracteristicas" rows="3" style="width:100% !important" disabled>'.$row["espacio_fisico"]->getCaracteristicas().'
                            </textarea> 
                        </div>   
                                                                                                                                                                      
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2" style="padding:15px">
                            <strong><label> Imagen</label></strong>
                        </div>
                        <div class="col-md-8 form-group" style="padding:15px">
                            <img style="width:80%"; heigth:50%" src="Resources/uploads/'.$img.'">
                        </div>    
                        <div class="col-md-2" style="padding:15px">                             
                        </div>                                                                                                                                                                      
                    </div>
                    
                </div>
            </form>
        </div>';
                    
                }
            }
            else
			{
				$html .= "<tr><td colspan='12' class='text-center'>No se encontraron espacio fisicos</td></tr>";
			}
				$html .= '</tbody></table>';
				echo $html;
        break;

        case 'eliminarEspacioFisico':
            $id_espacio=$_POST["espacio"];
            $con_espacio= new EspacioFisicoController();
            
            $result = $con_espacio->eliminarEspacioFisico($id_Espacio);
            
            if($result)
            {
                echo 'correcto';
            }else
            {
                echo 'incorrecto';
            }
        break;

        case 'createEspacioFisico':
            $espacio_fisico = new EspacioFisico();

            $con_espacio_fisico = new EspacioFisicoController();
            $denominacion=$_POST["denominacion"];
            $espacio_fisico-> setId_etapa_comercial($_POST["idEtapa"]);
            $espacio_fisico-> setDenominacion($_POST["denominacion"]);
            $espacio_fisico-> setUbicacion_espacio($_POST["ubicacion"]);
            $espacio_fisico-> setMedidas($_POST["medidas"]);
            $espacio_fisico-> setCaracteristicas($_POST["caracteristicas"]);
            $espacio_fisico-> setFotografia_espacio($_POST["foto"]);
            $espacio_fisico-> setTipo_espacio($_POST["tipo"]);
            $espacio_fisico-> setEstado_espacio($_POST["estado"]);
            $espacio_fisico-> setCodigo_espacio($_POST["codigo"]);
            
    
            $con_denominacion= new EspacioFisicoController();
            $result=$con_denominacion->verificarEspacioFisico($denominacion);
            if($result) {
                
                $result_espacio_fisico = $con_espacio_fisico->createEspacioFisico($espacio_fisico);
                
                if($result_espacio_fisico)
                {
                    $var=1;
                    //echo json_encode(array('success' => 1));
                   echo $var; 
                }else
                {
                    $var=0;
                    //echo json_encode(array('success' => 1));
                   echo $var; 
                }
            }
            else{
                $var=2;
                echo $var;

            }                     
        
        break;      
        
        case 'verificarEspacioFisico':

            $denominacion=$_POST["denominacion"];
               
            $con_denominacion= new EspacioFisicoController();
            $result=$con_denominacion->verificarEspacioFisico($denominacion);
            if($result) {                
                echo 0;              
            }
            else{                
                echo 1;

            }                     
        
        break;      

        
        
        case 'lisEspacioArriendo':
            $con_espacio_fisico= new EspacioFisicoController();
            $query = "select * from espacio_fisico where estado_espacio=1 and id_espacio_fisico not in(select id_espacio_fisico from arriendo where estado_arriendo=1)";
            $con_espacio = $con_espacio_fisico->listEspacioFisico($query);
            $html = '<table class="table table-bordered text-center table-striped" id="tblEspacioFisico">
				<thead>
					<tr>
                        <th class="back-color text-center">SELECCIONAR</th>
						<th class="back-color text-center">DENOMINACIÓN</th>
						<th class="back-color text-center">ETAPA</th>
					</tr>
				</thead>
				<tbody>';
                
            if($con_espacio!=null)
            {
                foreach ($con_espacio as $row) 
                {
                    $html .= '<tr>
                        <td><input type="checkbox" id="id_denominacion" value="'.$row["espacio_fisico"]->getId_espacio_fisico().'"></td>
                        <td>'.$row["espacio_fisico"]->getDenominacion().'</td>
                        <td>'.$row["etapa_comercial"]->getNombre_etapa_comercial().'</td>
                        
                    </td>
                    </tr>';
                    
                }
            }
            else
			{
				$html .= "<tr><td colspan='12' class='text-center'>No se encontraron espacio fisicos</td></tr>";
			}
				$html .= '</tbody></table>';
				echo $html;
        break;

        case 'buscarEspacioFisico':
            $val=$_POST["campo"];
            $con_espacio_fisico= new EspacioFisicoController();
            $con_espacio = $con_espacio_fisico->buscarEspacioFisico($val);
            $html = '<table class="table table-bordered text-center table-striped" id="tblEspacioFisico">
				<thead>
					<tr>
                    <th class="back-color text-center">SELECCIONAR</th>
						<th class="back-color text-center">DENOMINACIÓN</th>
						<th class="back-color text-center">ETAPA</th>
                        <th class="back-color text-center">UBICACION</th>
                        <th class="back-color text-center">MEDIDAS</th>
					</tr>
				</thead>
				<tbody>';
                
            if($con_espacio!=null)
            {
                foreach ($con_espacio as $row) 
                {
                    $html .= '<tr>
                    <td><input type="checkbox" id="id_denominacion" value="'.$row["espacio_fisico"]->getId_espacio_fisico().'"></td>
                        <td>'.$row["espacio_fisico"]->getDenominacion().'</td>
                        <td>'.$row["etapa_comercial"]->getNombre_etapa_comercial().'</td>
                        <td>'.$row["espacio_fisico"]->getUbicacion_espacio().'</td>
                        <td>'.$row["espacio_fisico"]->getMedidas().'</td>     
                    </td>
                    </tr>';
                    
                }
            }
            else
			{
				$html .= "<tr><td colspan='12' class='text-center'>No se encontraron espacio fisicos</td></tr>";
			}
				$html .= '</tbody></table>';
				echo $html;
        break;

        case 'getDenominacionId':
            $id_Espacio=$_POST["idEspacio"];
            $con_espacio_fisico= new EspacioFisicoController();
            $query = "select * from espacio_fisico where estado_espacio=1 and id_espacio_fisico=".$id_Espacio."";
            $con_espacio = $con_espacio_fisico->listEspacioFisico($query);
            $html ='';
            if($con_espacio!=null)
            {
                foreach ($con_espacio as $row) 
                {
                  $html.=$row["espacio_fisico"]->getDenominacion();                    
                }
            }
				echo $html;
        break;

        case 'espacioFisicoCircular':
            $id_Espacio=$_POST["idEspacio"];
            $con_espacio_fisico= new EspacioFisicoController();
            $query = "select * from espacio_fisico where estado_espacio=1 and id_espacio_fisico in (select id_espacio_fisico from arriendo) and tipo_espacio=".$id_Espacio."";
            $con_espacio = $con_espacio_fisico->listEspacioFisico($query);
            $html = '<table class="table table-bordered text-center table-striped" id="tblEspacioFiscoCirculares">
				<thead>
					<tr>
                    <th class="back-color text-center">SELECCIONAR</th>
						<th class="back-color text-center">DENOMINACIÓN</th>
						<th class="back-color text-center">IMAGEN</th>
					</tr>
				</thead>
                
					
				<tbody id="formEspacioFisico">';
                
            if($con_espacio!=null)
            {
                foreach ($con_espacio as $row) 
                {
                    $imagen=$row["espacio_fisico"]->getFotografia_espacio();
                    $html .= '<tr>
                    <td><input type="checkbox" name="espacioComercial" class="ckEspacios" id="id_espacioComercial" value="'.$row["espacio_fisico"]->getId_espacio_fisico().'"></td>
                        <td>'.$row["espacio_fisico"]->getDenominacion().'</td>
                        <td style="with: 150px;"><img src="./Resources/uploads/'.$imagen.'.jpg" style="width:20%; heigth:10%"></td>
                    </td>
                    </tr>';                    
                }
            }
            else
			{
				$html .= "<tr><td colspan='12' class='text-center'>No se encontraron espacio fisicos</td></tr>";
			}
				$html .= '</tbody></table>';
				echo $html;
        break;
}
}
?>
