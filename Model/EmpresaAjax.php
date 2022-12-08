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
            $query = "select * from empresa where estado_empresa=1";
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
                            <a class="btn btn-link" 
                                 href="?page=detalleEmpresa&empresa='.base64_encode($row["empresa"]->getId_empresa()).'&mix='.$row["empresa"]->getId_mix_comercial().'">Ver más
                            </a>                      
                        </td>
                    </td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No se pudo obtener el detalle de la empresa</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;

        case 'empresaPorId':
            $idEmpresa=$_POST["idEmpresa"];
            $con_empresa_controller = new EmpresaController();
            $query = "select * from empresa where id_empresa='$idEmpresa' and estado_empresa=1" ;
            $con_empresa = $con_empresa_controller->listEmpresas($query);

            $html;
            if($con_empresa[0]["success"])
            {
                foreach ($con_empresa as $row) 
                {
                $html =' 
                <form class="form form-horizontal" style="padding-top: 3%" id="empresa">
                <div class="form-body">
                    
                    <div class="row">
                        <div class="col-md-2" style="padding:15px">
                            <strong><label> Nombre Comercial</label></strong>
                        </div>
                        <div class="col-md-4 form-group" style="padding:15px">
                            <label>'.$row["empresa"]->getNombre_comercial().'</label>
                        </div>
                        <div class="col-md-2" style="padding:15px"> 
                            <strong><label> Mix Comercial</label></strong>                           
                        </div>                        
                        <div class="col-md-4 form-group" style="padding:15px">
                        <label>'.$row["mixComercial"]->getNombre_mix().'</label>
                                                           
                        </div>                                                                                         
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:15px">
                            <strong><label> RUC Empresa</label></strong>
                        </div>
                        <div class="col-md-4 form-group" style="padding:15px">
                            <label>'.$row["empresa"]->getRuc_empresa().'</label>
                        </div>
                        <div class="col-md-2" style="padding:15px"> 
                            <strong><label> Teléfono Empresa</label></strong>
                        </div>
                        <div class="col-md-4 form-group" style="padding:15px">
                            <label>'.$row["empresa"]->getTelefono_empresa().'</label>
                        </div>                                                                                             
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:15px">
                            <strong><label> Dirección</label></strong>
                        </div>
                        <div class="col-md-4 form-group" style="padding:15px">
                            <label>'.$row["empresa"]->getDireccion_empresa().'</label>
                        </div>
                        <div class="col-md-2" style="padding:15px"> 
                            <strong><label> Correo</label></strong>
                        </div>
                        <div class="col-md-4 form-group" style="padding:15px">
                            <label>'.$row["empresa"]->getCorreo_empresa().'</label>
                        </div>                                                                                                
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:15px">
                            <strong><label> Fecha de registro</label></strong>
                        </div>
                        <div class="col-md-4 form-group" style="padding:15px">
                        <label>'.$row["empresa"]->getFecha_registro().'</label>
                            <input type="hidden" id="id_mix" value='.$row["mixComercial"]->getId_mix_comercial().'>
                        </div>    
                        <div class="col-md-2" style="padding:15px"> 
                            <strong><label> Usuario</label></strong>
                        </div>
                        <div class="col-md-4 form-group" id="usuario" style="padding:15px">
                        <label>'.$row["usuario"]->getNombre_usuario().' '.$row["usuario"]->getApellido_usuario().'</label>        
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

        case 'obtenerDatosEmpresa':
            $idEmpresa=$_POST["idEmpresa"];
            $con_empresa_controller = new EmpresaController();
            $query = "select * from empresa where id_empresa='$idEmpresa' and estado_empresa=1";
            $con_empresa = $con_empresa_controller->listEmpresas($query);

            
            if($con_empresa[0]["success"])
            {
                foreach ($con_empresa as $row) 
                {
                $html =' 
                <form class="form form-horizontal" style="padding-top: 3%">
                <div class="form-body">
                    
                    <div class="row">
                        <div class="col-md-2" style="padding:15px">
                            <strong><label> Nombre Comercial</label></strong>
                        </div>
                        <div class="col-md-4 form-group">
                            <input id="nombreE" class="form-control" type="text"  value="'.$row["empresa"]->getNombre_comercial().'">
                        </div>
                        <div class="col-md-2" style="padding:15px"> 
                            <strong><label> Mix Comercial</label></strong>
                            <input id="idmixComercial" class="form-control" type="hidden" value="'.$row["mixComercial"]->getId_mix_comercial().'">
                        </div>
                        <div class="col-md-4 form-group" id="mixC">
                                         
                         </div>     
                                                                                                                   
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:15px">
                            <strong><label> RUC Empresa</label></strong>
                        </div>
                        <div class="col-md-4 form-group">
                            <input id="rucE" class="form-control" type="text" value="'.$row["empresa"]->getRuc_empresa().'">
                        </div>
                        <div class="col-md-2" style="padding:15px"> 
                            <strong><label> Teléfono Empresa</label></strong>
                        </div>
                        <div class="col-md-4 form-group">
                            <input id="telefonoE" class="form-control" type="text" value="'.$row["empresa"]->getTelefono_empresa().'">
                        </div>                                                                                             
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:15px">
                            <strong><label> Dirección</label></strong>
                        </div>
                        <div class="col-md-4 form-group">
                            <input id="direccionE" class="form-control" type="text" value="'.$row["empresa"]->getDireccion_empresa().'">
                        </div>
                        <div class="col-md-2" style="padding:15px"> 
                            <strong><label> Correo</label></strong>
                        </div>
                        <div class="col-md-4 form-group">
                            <input id="correoE" class="form-control" type="text" value="'.$row["empresa"]->getCorreo_empresa().'">
                            <input id="id_empresa" class="form-control" type="hidden" value="'.$row["empresa"]->getId_empresa().'">
                            </div>                                                                                                
                    </div>
                    <div class="row">
                        <div class="col-md-2" style="padding:15px">
                            <strong><label> Fecha de registro</label></strong>
                        </div>
                        <div class="col-md-4 form-group">
                            <input id="fecharE" class="form-control" type="text" value="'.$row["empresa"]->getFecha_registro().'">
                        </div>
                        <div class="col-md-2" style="padding:15px"> 
                            <strong><label> Usuario</label></strong>
                        </div>
                        <div class="col-md-4 form-group" id="usuarioE">   
                                                           
                        </div> 
                    </div>
                    <div class="row">
                         <div class="col-md-4 form-group" id="usuario" style="padding:15px">
                             <input type="hidden" class="form-control" value="'.$row["usuario"]->getNombre_usuario().' '.$row["usuario"]->getApellido_usuario().'" disabled >
                            <input type="hidden" id="nombreU" class="form-control" value="'.$row["usuario"]->getNombre_usuario().'">
                            <input type="hidden" id="apellidoU" class="form-control" value="'.$row["usuario"]->getApellido_usuario().'">
                             <input type="hidden" id="idUsuario" class="form-control" value="'.$row["usuario"]->getId_usuario().'">                
                        </div> 
                    </div>
                </div>
            </form>
        </div>';
            }
        }
            else{
                echo "error";
            }
				echo $html;
        break;

        case 'createEmpresa':
            session_start();
            $empresa = new Empresas();
            date_default_timezone_set('America/Guayaquil');
            $hoy = getdate();
            $dia = $hoy["mday"];
            $mes = $hoy["mon"];
            $anio = $hoy["year"];
            $fecha=$anio."-".$mes."-".$dia;
            $rucEmp=$_POST["ruc"];
            $val;
            $con_empresa = new EmpresaController();
            $empresa->setId_usuario($_POST["usuario"]);
            $empresa-> setId_mix_comercial($_POST["mixc"]);
            $empresa-> setNombre_comercial($_POST["nombre"]);
            $empresa-> setRuc_empresa($_POST["ruc"]);
            $empresa-> setTelefono_empresa($_POST["telefono"]);
            $empresa-> setDireccion_empresa($_POST["direccion"]);
            $empresa-> setCorreo_empresa($_POST["correo"]);
            $empresa-> setFecha_registro($fecha);
            $empresa-> setFecha_deshabilitado($fecha);
            $empresa-> setEstado_empresa(1);
             
             $con_ruc= new EmpresaController();
            $result=$con_ruc->verificarEmpresa($rucEmp);
            if($result) {
                $result_empresa = $con_empresa->createEmpresa($empresa);
                
                if($result_empresa)
                {
                    $var=1;
                    //echo json_encode(array('success' => 1));
                   echo $var; 
                }else
                {
                    $var=0;
                    //echo json_encode(array('success' => 0));
                    echo $var;
                }   
            } else{
                $var=2;
                //echo json_encode(array('success' => 0));
                echo $var;
            }                     
            
        break;      
        
        case 'modificarEmpresa':
            $empresa = new Empresas();
            $usuario=$_POST["usuario"];
            echo "usuario recibido";
            echo $usuario;
            if(!$usuario)
            {
                echo "entro";
                $usuario="null";
            }
            $con_Empresa= new EmpresaController();
            $empresa->setId_empresa($_POST["id_empresa"]);
            $empresa->setId_usuario($usuario);
            $empresa-> setId_mix_comercial($_POST["mixC"]);
            $empresa-> setNombre_comercial($_POST["nombreE"]);
            $empresa-> setRuc_empresa($_POST["rucE"]);
            $empresa-> setTelefono_empresa($_POST["telefonoE"]);
            $empresa-> setDireccion_empresa($_POST["direccionE"]);
            $empresa-> setCorreo_empresa($_POST["correoE"]);
            $empresa-> setFecha_registro($_POST["fechaE"]);
            $empresa-> setFecha_deshabilitado('2022-10-23');
            $empresa-> setEstado_empresa(1);
            
            $result_comunicado = $con_Empresa->modificarEmpresa($empresa);
            
            if($result_comunicado)
            {
                echo 'correcto';
            }else
            {
                echo 'incorrecto';
            }
        break;

        case 'eliminarEmpresa':
            $id_empresa=$_POST["empresa"];
            $con_Empresa= new EmpresaController();
            
            $result = $con_Empresa->eliminarEmpresa($id_empresa);
            
            if($result)
            {
                echo 'correcto';
            }else
            {
                echo 'incorrecto';
            }
        break;
        case 'listEmpresaArriendo':
            $con_empresa = new EmpresaController();
            $query = "    select * from empresa where estado_empresa=1 and id_empresa not in(select id_empresa from arriendo where estado_arriendo=1)";
            $con_empresa_list = $con_empresa->listEmpresas($query);
            $html = '<table class="table table-bordered text-center table-striped" id="tblEmpresa">
				<thead>
					<tr>
                        <th class="back-color text-center">SELECCIONAR</th>
						<th class="back-color text-center">NOMBRE</th>
						<th class="back-color text-center">RUC</th>
					</tr>
				</thead>
				<tbody>';
                
            if($con_empresa_list[0]["success"])
            {
                foreach ($con_empresa_list as $row) 
                {
                    $html .= '<tr>
                        <td><input type="checkbox" name="empresa" id="id_empresa" value="'.$row["empresa"]->getId_empresa().'"></td>
                        <td>'.$row["empresa"]->getNombre_comercial().'</td>
                        <td>'.$row["empresa"]->getRuc_empresa().'</td>
                    </td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No se pudo obtener el detalle de la empresa</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;

        case 'buscarEmpresaArriendo':
            
            $con_empresa = new EmpresaController();
            $val=$_POST["campo"];
            $con_empresa_list = $con_empresa->buscarEmpresas($val);
            $html = '<table class="table table-bordered text-center table-striped" id="tblEmpresa">
				<thead>
					<tr>
                        <th class="back-color text-center">SELECCIONAR</th>
						<th class="back-color text-center">NOMBRE</th>
						<th class="back-color text-center">RUC</th>
                        <th class="back-color text-center">TELÉFONO</th>
                        <th class="back-color text-center">DIRECCIÓN</th>
					</tr>
				</thead>
				<tbody>';
                
            if($con_empresa_list!=null)
            {
                foreach ($con_empresa_list as $row) 
                {
                    $html .= '<tr>
                        <td><input type="checkbox" name="empresaB" id="id_empresa" value="'.$row["empresa"]->getId_empresa().'"></td>
                        <td>'.$row["empresa"]->getNombre_comercial().'</td>
                        <td>'.$row["empresa"]->getRuc_empresa().'</td>
                        <td>'.$row["empresa"]->getTelefono_empresa().'</td>
                        <td>'.$row["empresa"]->getDireccion_empresa().'</td>
                    </td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No se pudo obtener el detalle de la empresa</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;

        case 'nombreEmpresaPorId':
            $idEmpresa=$_POST["idEmpresa"];
            $con_empresa_controller = new EmpresaController();
            $query = "select * from empresa where id_empresa='$idEmpresa' and estado_empresa=1" ;
            $con_empresa = $con_empresa_controller->listEmpresas($query);

            $html;
            if($con_empresa[0]["success"])
            {
                foreach ($con_empresa as $row) 
                {
                $html =$row["empresa"]->getNombre_comercial();
            }
        }
            else{
                echo $error;
            }
				echo $html;
        break;

        case 'empresasParaCirculares':
            $con_empresa = new EmpresaController();
            $query = "select * from empresa where estado_empresa=1 and id_usuario is not null";
            $con_empresa_list = $con_empresa->listEmpresas($query);
            $html = '<table class="table table-bordered text-center table-striped" id="tblEmpresasCirculares">
				<thead>
					<tr>
                        <th class="back-color text-center">SELECCIONAR</th>
						<th class="back-color text-center">NOMBRE</th>
						<th class="back-color text-center">RUC</th>
					</tr>
				</thead>
                
				<tbody id="formEmpresas">';
                
            if($con_empresa_list[0]["success"])
            {
                foreach ($con_empresa_list as $row) 
                {
                    $html .= '<tr>
                        <td><input type="checkbox" class="ckEmpresas" name="empresa" id="id_empresa" value="'.$row["empresa"]->getId_empresa().'"></td>
                        <td>'.$row["empresa"]->getNombre_comercial().'</td>
                        <td>'.$row["empresa"]->getRuc_empresa().'</td>
                    </td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No se pudo obtener el detalle de la empresa</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;

        case 'lisEmpresasSegOper':
            $con_empresa = new EmpresaController();
            $query = "select * from empresa where estado_empresa=1";
            $con_empresa_list = $con_empresa->listEmpresas($query);
            $html = '<table class="table table-bordered text-center table-striped" id="tblEmpresasSegOpe">
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
                            <a class="btn btn-link" 
                                 href="?page=detalleEmpresaSegOper&empresa='.base64_encode($row["empresa"]->getId_empresa()).'&mix='.$row["empresa"]->getId_mix_comercial().'">Ver más
                            </a>                      
                        </td>
                    </td>
                    </tr>';
                    
                }
            }
            else
				{
					$html .= "<tr><td colspan='4' class='text-center'>No se pudo obtener el detalle de la empresa</td></tr>";
				}
				$html .= '</tbody></table>';
				echo $html;
        break;
}
}
?>
