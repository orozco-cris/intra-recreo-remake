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
                        <td class="text-rigth"><a class="btn btn-default" title="Editar"
                        href="#"><i class="icon-edit"></i>Editar</a></td>
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

       
    }
}
?>
