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
            $query = "select * from comunicado_usuario as cu where cu.id_usuario =".$id_usuario."";
            $con_usuario_comunicado = $con_usuario_comunicado_controller->getComunicadosParaCliente($query);
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
                //$html = 'Positivo';
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No existen ventas auditadas</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;
    }
}

?>