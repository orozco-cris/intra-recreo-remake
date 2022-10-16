<?php

require_once "./../Class/Comunicado.php";
require_once "./../Controller/ComunicadoController.php";


if($_POST["crud"])
{
    $crud = $_POST["crud"];
    switch($crud)
    {
        case 'listAllPermisos':
            $comunicado_controller = new ComunicadoController();
            $objs_comunicados = $comunicado_controller->listAll();
            $html = '<table class="table table-bordered table-striped" id="tblAuditadasRep">
            <thead>
                <tr>
                    <th class="back-color text-center">Asunto</th>
                    <th class="back-color text-center">Fecha</th>
                    <th class="back-color text-center">De</th>
                    <th class="back-color text-center"></th>
                </tr>
            </thead>
            <tbody>';
            if($objs_comunicados[0]["success"])
            {
                foreach ($objs_comunicados as $row) 
                {
                    $html .= '<tr>
                        <td>'.$row["asunto_comunicado"].'</td>
                        <td>'.$row["anio_comunicado"].'/'.
                            $row["mes_comunicado"].'/'.
                            $row["dia_comunicado"].'</td>
                        <td>'.$row["de_comunicado"].'</td>
                        <td></td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No existe información disponible</td></tr>";
				}
				$html .= '</tbody></table>';
            echo $html;
            /* <td>'.$row["comunicado"]->getId_usuario_creador()->getId_tipo_usuario()->getNombre_tipo_usuario().'</td> */
        break;
    }
}

?>