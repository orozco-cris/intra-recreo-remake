<?php
require_once "./../Class/Empresas.php";
require_once "./../Controller/EmpresaController.php";

if($_POST["crud"])
{
    $crud = $_POST["crud"];
    switch($crud)
    {
        case 'lisEmpresas':
            $con_empresa = new EmpresaController();
            $query = "select * from empresa";
            $con_empresa_list = $con_empresa->listEmpresas($query);
            $html = '<table class="table table-bordered text-center table-striped" id="tblEmpresa">
				<thead>
					<tr>
						<th class="back-color text-center">NOMBRE</th>
						<th class="back-color text-center">RUC</th>
                        <th class="back-color text-center">TELÉFONO</th>
                        <th class="back-color text-center">DIRECCIÓN</th>
						<th class="back-color text-center">VER DETALLE</th>
					</tr>
				</thead>
				<tbody>';
                
            if($con_empresa_list[0]["success"])
            {
                foreach ($con_empresa_list as $row) 
                {
                    $html .= '<tr>
                        <td>'.$row["empresa"]->getNombre_comercial().'</td>
                        <td>'.$row["empresa"]->getRuc_empresa().'</td>
                        <td>'.$row["empresa"]->getTelefono_empresa().'</td>
                        <td>'.$row["empresa"]->getDireccion_empresa().'</td>
                        <td>
                        <button type="button" >Ver detalle </button></td>
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
