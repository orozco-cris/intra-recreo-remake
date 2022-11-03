<?php
require_once "./../Class/Arriendo.php";
require_once "./../Controller/ArriendoController.php";
    if($_POST["crud"])
    {
        $crud = $_POST["crud"];
        switch($crud)
        {
           	
			
			case 'listArriendos':
				$arriendo = new ArriendoController();
             
				$query = "select *from arriendo where estado_arriendo=1";

				$con_arriendo = $arriendo->listArriendo($query);
				$html = '
                
                
                
                <table class="table table-bordered text-center table-striped" id="arriendos">
				<thead>
					<tr>
						<th class="back-color text-center">EMPRESA</th>
						<th class="back-color text-center">TIPO ESPACIO</th>
                        <th class="back-color text-center">DENOMINACIÓN</th>
                        <th class="back-color text-center">FECHA REGISTRO</th>
                        <th class="back-color text-center">VER MÁS</th>
					</tr>
				</thead>
				<tbody class="BusquedaRapida">';
                
            if($con_arriendo[0]["success"])
            {
                foreach ($con_arriendo as $row) 
                {
                    $tipo=$row["espacio_fisico"]->getTipo_espacio();
                    $val=0;
                    if($tipo==1){
                        $val='Local';
                    }else if($tipo==2){
                        $val='Isla';
                    }else if($tipo==3){
                        $val='Publicidad';
                    }
                    
                    $html .= '<tr>
                        <td>'.$row["empresa"]->getNombre_comercial().'</td>
                        <td>'.$val.'</td>       
                        <td>'.$row["espacio_fisico"]->getDenominacion().'</td> 
                        <td>'.$row["arriendo"]->getFecha_registro().'</td>                 
                        <td>                          
                            <a class="btn btn-link" 
                                 href="?page=detalleArriendo&arriendo='.base64_encode($row["arriendo"]->getId_arriendo()).'">Ver más
                            </a>                      
                        </td>  
						
                    </td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No se obtuvieron arriendos</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
			break;	
            case 'filtrarArriendos':
                $campo=$_POST["campo"];
				$arriendo = new ArriendoController();             

				$con_arriendo = $arriendo->buscarArriendo($campo);
				$html = '
                
                
                
                <table class="table table-bordered text-center table-striped" id="arriendos">
				<thead>
					<tr>
						<th class="back-color text-center">EMPRESA</th>
						<th class="back-color text-center">TIPO ESPACIO</th>
                        <th class="back-color text-center">DENOMINACIÓN</th>
                        <th class="back-color text-center">FECHA REGISTRO</th>
                        <th class="back-color text-center">VER MÁS</th>
					</tr>
				</thead>
				<tbody class="BusquedaRapida">';
                
            if($con_arriendo!=null)
            {
                foreach ($con_arriendo as $row) 
                {
                    $tipo=$row["espacio_fisico"]->getTipo_espacio();
                    $val=0;
                    if($tipo==1){
                        $val='Local';
                    }else if($tipo==2){
                        $val='Isla';
                    }else if($tipo==3){
                        $val='Publicidad';
                    }
                    
                    $html .= '<tr>
                        <td>'.$row["empresa"]->getNombre_comercial().'</td>
                        <td>'.$val.'</td>       
                        <td>'.$row["espacio_fisico"]->getDenominacion().'</td> 
                        <td>'.$row["arriendo"]->getFecha_registro().'</td>                 
                        <td>                          
                            <a class="btn btn-link" 
                                 href="?page=detalleArriendo&arriendo='.base64_encode($row["arriendo"]->getId_arriendo()).'">Ver más
                            </a>                      
                        </td>  
						
                    </td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No se obtuvieron arriendos</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
			break;		

			case 'createArriendo':
                $arriendo = new Arriendo();
                date_default_timezone_set('America/Guayaquil');
                $hoy = getdate();
                $dia = $hoy["mday"];
                $mes = $hoy["mon"];
                $anio = $hoy["year"];
                $fecha=$anio."-".$mes."-".$dia;
                $con_arriendo = new ArriendoController();
                $arriendo->setId_espacio_fisico($_POST["idEspacioFisico"]);
                $arriendo-> setId_empresa($_POST["idEmpresa"]);
                $arriendo-> setVendedor_arriendo($_POST["vendedor"]);
                $arriendo-> setTipo_contrato($_POST["tipoContrato"]);
                $arriendo-> setCosto_contrato($_POST["costo"]);
                $arriendo-> setDescuento_arriendo($_POST["descuento"]);
                $arriendo-> setFecha_registro($fecha);
                $arriendo-> setFecha_vencimiento($_POST["fechaVencimiento"]);
                $arriendo-> setObservacion_arriendo($_POST["observacion"]);
                $arriendo-> setEstado_arriendo(1);
                
                $result_arriendo = $con_arriendo->createArriendo($arriendo);
                
                if($result_arriendo)
                {
                    echo 'correcto';
                }else
                {
                    echo 'incorrecto';
                }
            break;      

            case 'modificarArriendo':
                $arriendo = new Arriendo();
                date_default_timezone_set('America/Guayaquil');
                $hoy = getdate();
                $dia = $hoy["mday"];
                $mes = $hoy["mon"];
                $anio = $hoy["year"];
                $fecha=$anio."-".$mes."-".$dia;
                $con_arriendo = new ArriendoController();
                $arriendo->setId_arriendo($_POST["idArriendo"]);
                $arriendo->setId_espacio_fisico($_POST["idEspacioFisico"]);
                $arriendo-> setId_empresa($_POST["idEmpresa"]);
                $arriendo-> setVendedor_arriendo($_POST["vendedor"]);
                $arriendo-> setTipo_contrato($_POST["tipoContrato"]);
                $arriendo-> setCosto_contrato($_POST["costo"]);
                $arriendo-> setDescuento_arriendo($_POST["descuento"]);
                $arriendo-> setFecha_registro($_POST["fechaR"]);
                $arriendo-> setFecha_vencimiento($_POST["fechaVencimiento"]);
                $arriendo-> setObservacion_arriendo($_POST["observacion"]);
                $arriendo-> setEstado_arriendo(1);
                
                
                $result_arriendo = $con_arriendo->modificarArriendo($arriendo);
                
                if($result_arriendo)
                {
                    echo 'correcto';
                }else
                {
                    echo 'incorrecto';
                }
            break;
    
            case 'eliminarArriendo':
                $id_arriendo=$_POST["arriendo"];
                $con_arriendo = new ArriendoController();
                
                $result = $con_arriendo->eliminarArriendo($id_arriendo);
                
                if($result)
                {
                    echo 'correcto';
                }else
                {
                    echo 'incorrecto';
                }
            break;


            case 'arriendoPorId':
                $idArriendo=$_POST["idArriendo"];
                $con_arriendo_controller = new ArriendoController();
                $query = "select * from arriendo where id_arriendo=".$idArriendo ;
                $con_arriendo = $con_arriendo_controller->listArriendo($query);
    
                $html;
                if($con_arriendo[0]["success"])
                {
                    foreach ($con_arriendo as $row) 
                    {
                    $html =' 
                    <form class="form form-horizontal" style="padding-top: 3%" id="empresa">
                    <div class="form-body">
                        
                        <div class="row">
                            <div class="col-md-2" style="padding:15px">
                                <strong><label> Empresa</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                                <label>'.$row["empresa"]->getNombre_comercial().'</label>
                            </div>
                            <div class="col-md-2" style="padding:15px"> 
                                <strong><label> Denominacion</label></strong>                           
                            </div>                        
                            <div class="col-md-4 form-group" style="padding:15px">
                            <label>'.$row["espacio_fisico"]->getDenominacion().'</label>
                                                               
                            </div>                                                                                         
                        </div>
                        <div class="row">
                            <div class="col-md-2" style="padding:15px">
                                <strong><label>Vendedor</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                                <label>'.$row["arriendo"]->getVendedor_arriendo().'</label>
                            </div>
                            <div class="col-md-2" style="padding:15px">
                                <strong><label> Tipo Contrato</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                                <label>'.$row["arriendo"]->getTipo_contrato().'</label>
                            </div>                                                                                   
                        </div>
                        <div class="row">
                            <div class="col-md-2" style="padding:15px"> 
                                <strong><label> Costo</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                                <label>'.$row["arriendo"]->getCosto_contrato().'</label>
                            </div>                                     
                            <div class="col-md-2" style="padding:15px">
                                <strong><label> Descuento</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                                <label>'.$row["arriendo"]->getDescuento_arriendo().'</label>
                            </div>                                                                                             
                        </div>
                        <div class="row">
                            <div class="col-md-2" style="padding:15px">
                                <strong><label> Fecha de registro</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                            <label>'.$row["arriendo"]->getFecha_registro().'</label>                                
                            </div>    
                            <div class="col-md-2" style="padding:15px">
                            <strong><label> Fecha vencimiento</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                            <label>'.$row["arriendo"]->getFecha_vencimiento().'</label>                                
                            </div>                                                                                                                                                
                        </div>
                        <div class="row">
                            <div class="col-md-2" style="padding:15px">
                                <strong><label> Observaciones</label></strong>
                            </div>
                            <div class="col-md-10 form-group" style="padding:15px">
                            <label>'.$row["arriendo"]->getObservacion_arriendo().'</label>                                
                            </div>                                                                                                                                              
                        </div>';          
    
                        
                    '</div>
                </form>
            </div>';
                }
            }
                else{
                    echo $error;
                }
                    echo $html;
            break;

            case 'editarArriendo':
                $idArriendo=$_POST["idArriendo"];
                $con_arriendo_controller = new ArriendoController();
                $query = "select * from arriendo where id_arriendo=".$idArriendo ;
                $con_arriendo = $con_arriendo_controller->listArriendo($query);
    
                $html;
                if($con_arriendo[0]["success"])
                {
                    foreach ($con_arriendo as $row) 
                    {
                    $html =' 
                    <form class="form form-horizontal" style="padding-top: 3%" id="empresa">
                    <div class="form-body">
                        
                        <div class="row">
                            <div class="col-md-2" style="padding:15px">
                                <strong><label> Empresa</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                                <input id="empresa" class="form-control" type="text"  value="'.$row["empresa"]->getNombre_comercial().'" disabled>
                                <input id="idempresa" class="form-control" type="hidden"  value="'.$row["empresa"]->getId_empresa().'" disabled>
                                <input id="idarriendo" class="form-control" type="hidden"  value="'.$row["arriendo"]->getId_arriendo().'" disabled>
                            </div>
                            <div class="col-md-2" style="padding:15px"> 
                                <strong><label> Denominacion</label></strong>                           
                            </div>                        
                            <div class="col-md-4 form-group" style="padding:15px">
                                <input id="denominacion" class="form-control" type="text"  value="'.$row["espacio_fisico"]->getDenominacion().'" disabled>     
                                <input id="iddenominacion" class="form-control" type="hidden"  value="'.$row["espacio_fisico"]->getId_espacio_fisico().'" disabled>                                         
                            </div>                                                                                         
                        </div>
                        <div class="row">
                            <div class="col-md-2" style="padding:15px">
                                <strong><label>Vendedor</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                            <input id="vendedor" class="form-control" type="text"  value="'.$row["arriendo"]->getVendedor_arriendo().'" >
                            </div>
                            <div class="col-md-2" style="padding:15px">
                                <strong><label> Tipo Contrato</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                                <input id="tipo" class="form-control" type="text"  value="'.$row["arriendo"]->getTipo_contrato().'">
                            </div>                                                                                   
                        </div>
                        <div class="row">
                            <div class="col-md-2" style="padding:15px"> 
                                <strong><label> Costo</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                                <input id="costo" class="form-control" type="text"  value="'.$row["arriendo"]->getCosto_contrato().'">
                            </div>                                     
                            <div class="col-md-2" style="padding:15px">
                                <strong><label> Descuento</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                                <input id="descuento" class="form-control" type="text"  value="'.$row["arriendo"]->getDescuento_arriendo().'">
                            </div>                                                                                             
                        </div>
                        <div class="row">
                            <div class="col-md-2" style="padding:15px">
                                <strong><label> Fecha de registro</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                                 <input id="fechar" class="form-control" type="text"  value="'.$row["arriendo"]->getFecha_registro().'">                             
                            </div>    
                            <div class="col-md-2" style="padding:15px">
                            <strong><label> Fecha vencimiento</label></strong>
                            </div>
                            <div class="col-md-4 form-group" style="padding:15px">
                            <input id="fechav" class="form-control" type="text"  value="'.$row["arriendo"]->getFecha_vencimiento().'">                               
                            </div>                                                                                                                                                
                        </div>
                        <div class="row">
                            <div class="col-md-2" style="padding:15px">
                                <strong><label>Observaciones</label></strong>
                            </div>
                            <div class="col-md-10 form-group" style="padding:15px">
                                <input id="observaciones" class="form-control" type="text"  value="'.$row["arriendo"]->getObservacion_arriendo().'">                             
                            </div>                                                                                                                                              
                        </div>';          
    
                        
                    '</div>
                </form>
            </div>';
                }
            }
                else{
                    echo $error;
                }
                    echo $html;
            break;
                    
        }
    }

?>