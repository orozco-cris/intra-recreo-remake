<?php
require_once "./../Class/Comunicado.php";
require_once "./../Controller/MixComercialController.php";

if($_POST["crud"])
{
    $crud = $_POST["crud"];
    switch($crud)
    {
        case 'listMixComerciales':
            $con_mix_comercial_controller = new MixComercialController();
            $query = "select * from mix_comercial";
            $con_mix_comercial = $con_mix_comercial_controller->listMixComercial($query);
            $html = '<table class="table table-bordered text-center table-striped" id="tblmixComercial">
				<thead>
					<tr>
						<th class="back-color text-center">Nombre</th>
						<th class="back-color text-center">Descripcion</th>
						<th class="back-color text-center">Editar</th>
					</tr>
				</thead>
				<tbody>';
                
            if($con_mix_comercial[0]["success"])
            {
                foreach ($con_mix_comercial as $row) 
                {
                    $html .= '<tr>
                        <td>'.$row["mix_comercial"]->getNombre_mix().'</td>
                        <td>'.$row["mix_comercial"]->getDescripcion_mix().'</td>
                        <td>
                        <button type="button" class="form-control btn btn-primary" data-bs-toggle="modal"  data-bs-target="#editar" data-yourparameter="'.($row["mix_comercial"]->getId_mix_comercial()).'">Editar </button></td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No existen mix comerciales disponibles</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;
        case 'createMixComercial':
            $mixComercial = new MixComercial();
            $con_mixComercial = new mixComercialController();

            $mixComercial->setNombre_mix($_POST["nombre_mix"]);
            $mixComercial-> setDescripcion_mix($_POST["descripcion_mix"]);      
            
            $result_comunicado = $con_mixComercial->createMixComercial($mixComercial);
            
            if($result_comunicado)
            {
                echo 'correcto';
            }else
            {
                echo 'incorrecto';
            }
        break;

        case 'mixComercialPorId':
            $idMix=$_POST["idMix"];
            $con_mix_comercial_controller = new MixComercialController();
            $query = "select * from mix_comercial where id_mix_comercial='$idMix'";
            $con_mix_comercial = $con_mix_comercial_controller->listMixComercial($query);

            
            if($con_mix_comercial[0]["success"])
            {
                foreach ($con_mix_comercial as $row) 
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
                                        <input id="nombreMix" class="form-control" type="text" value="'.$row["mix_comercial"]->getNombre_mix().'">
                                    </div>
                                    <div class="col-md-1" style="padding:15px"></div>
                                    <div class="col-md-1" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px"> 
                                        <label> Descripción</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <textarea id="descripcionMix" class="form-control" type="text" rows="6"  >'.$row["mix_comercial"]->getDescripcion_mix().'</textarea>
                                        <input type="hidden" value="'.($row["mix_comercial"]->getId_mix_comercial()).'" id="id_mix">
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
        case 'modificarMixComercial':
            $mixComercial = new MixComercial();
            $con_mixComercial = new mixComercialController();

            $mixComercial->setNombre_mix($_POST["nombre_mix"]);
            $mixComercial-> setDescripcion_mix($_POST["descripcion_mix"]);    
            $mixComercial->setId_mix_comercial($_POST["id_mix"]);  
            
            $result_comunicado = $con_mixComercial->modificarMixComercial($mixComercial);
            
            if($result_comunicado)
            {
                echo 'correcto';
            }else
            {
                echo 'incorrecto';
            }
        break;

        case 'listMix':
            $con_mix_comercial_controller = new MixComercialController();
            $query = "select * from mix_comercial";
            $con_mix_comercial = $con_mix_comercial_controller->listMixComercial($query);
            $html = '
            <select class="form-control" id="mixc">';
            if($con_mix_comercial[0]["success"])
            {
                foreach ($con_mix_comercial as $row) 
                {
                    
                    $html .= '<option value="'.($row["mix_comercial"]->getId_mix_comercial()).'">'.$row["mix_comercial"]->getNombre_mix().' </option>';
                }
            }
            $html .='</select>';            
            
                echo $html;
        break;

       
    }
}
?>
