<?php
require_once "./../Class/EtapaComercial.php";
require_once "./../Controller/EtapaComercialController.php";
    if($_POST["crud"])
    {
        $crud = $_POST["crud"];
        switch($crud)
        {
           
			case 'listEtapaComercial':
				$etapa_comercial = new EtapaComercialController();
				$query = "select *from etapa_comercial";
				$con_etapa_comercial = $etapa_comercial->listEtapa($query);
				$html = ' 
				    <select class="form-control" id="id_Etapa">';
					    if($con_etapa_comercial!=null)
					        {
                                foreach ($con_etapa_comercial as $row) 
                                {							
                                    $html .= '<option value="'.$row["id_etapa_comercial"].'">'.$row["nombre_etapa_comercial"].'</option>';
                                }
					        }
					$html .='</select>';					
					
						echo $html;
			break;		
			
			case 'listEtapas':
				$etapa_comercial = new EtapaComercialController();
				$query = "select *from etapa_comercial";
				$con_etapa_comercial = $etapa_comercial->listEtapa($query);
				$html = '<table class="table table-bordered text-center table-striped" id="etapaComercial">
				<thead>
					<tr>
						<th class="back-color text-center">NOMBRE</th>
						<th class="back-color text-center">DESCRIPCIÓN</th>
                        <th class="back-color text-center">EDITAR</th>
					</tr>
				</thead>
				<tbody>';
                
            if($con_etapa_comercial[0]["success"])
            {
                foreach ($con_etapa_comercial as $row) 
                {
                    $html .= '<tr>
                        <td>'.$row["nombre_etapa_comercial"].'</td>
                        <td>'.$row["descripcion_etapa_comercial"].'</td>                       
                        <td>  
						<button type="button" class="form-control btn btn-primary" data-bs-toggle="modal"  data-bs-target="#editar" data-yourparameter="'.($row["id_etapa_comercial"]).'">Editar </button></td>                 
                        </td>
                    </td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No se obtuvieron etapas comerciales</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
			break;		

			case 'createEtapaComercial':
				$etapaComercial = new EtapaComercial();
				$con_etapaComercial = new EtapaComercialController();
	
				$etapaComercial->setNombre_etapa_comercial($_POST["nombre_etapa"]);
				$etapaComercial-> setDescripcion_etapa_comercial($_POST["descripcion_etapa"]);      
				
				$result_etapa = $con_etapaComercial->createEtapaComercial($etapaComercial);
				
				if($result_etapa)
				{
					echo 'correcto';
				}else
				{
					echo 'incorrecto';
				}
			break;

			case 'modificarEtapaComercial':
				$etapaComercial = new EtapaComercial();
				$con_etapaComercial = new EtapaComercialController();
	
				$etapaComercial->setId_etapa_comercial($_POST["id_etapa"]);
				$etapaComercial->setNombre_etapa_comercial($_POST["nombre_etapa"]);
				$etapaComercial-> setDescripcion_etapa_comercial($_POST["descripcion_etapa"]);  
				
				$result_etapa = $con_etapaComercial->modificarEtapaComercial($etapaComercial);
				
				if($result_etapa)
				{
					echo 'correcto';
				}else
				{
					echo 'incorrecto';
				}
			break;

			case 'etapaComercialPorId':
				$idEtapa=$_POST["idEtapa"];
				$con_etapa_comercial_controller = new EtapaComercialController();
				$query = "select * from etapa_comercial where id_etapa_comercial='$idEtapa'";
				$con_etapa_comercial = $con_etapa_comercial_controller->listEtapa($query);
	
				
				if($con_etapa_comercial[0]["success"])
				{
					foreach ($con_etapa_comercial as $row) 
					{
					$html =' 
						<div class="col-md-12">
							<form class="form form-horizontal">
								<div class="form-body">
									
								<div class="row">
										<div class="col-md-1" style="padding:15px"></div>
										<div class="col-md-2" style="padding:15px">
											<label> Nombre</label>
										</div>
										<div class="col-md-8 form-group">
											<input id="nombreEtapa" class="form-control" type="text" value="'.$row["nombre_etapa_comercial"].'">
										</div>
										<div class="col-md-1" style="padding:15px"></div>
										<div class="col-md-1" style="padding:15px"></div>
										<div class="col-md-2" style="padding:15px"> 
											<label> Descripción</label>
										</div>
										<div class="col-md-8 form-group">
											<textarea id="descripcionEtapa" class="form-control" type="text" rows="6"  >'.$row["descripcion_etapa_comercial"].'</textarea>
											<input type="hidden" value="'.($row["id_etapa_comercial"]).'" id="id_etapa">
										</div>   
										<div class="col-md-1" style="padding:15px"></div>                                        
									</div>
									
							</div>
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