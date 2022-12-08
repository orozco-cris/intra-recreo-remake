<?php
require_once "./../Class/Usuario.php";
require_once "./../Controller/UsuarioController.php";
require_once "./../Controller/ComunUsuaController.php";

    if($_POST["crud"])
    {
        $crud = $_POST["crud"];
        switch($crud)
        {
            case 'read':
				$clave=md5($_POST["clave"]);
				//$clave=$_POST["clave"];
                $usuario = new Usuario();
				$conUsuario = new UsuarioController();
				$query = "select * from usuario where estado_usuario = 1 and login_usuario = '".$_POST["usuario"]."' and clave_usuario = '".$clave."'";
				$usuario = $conUsuario->readOne($query);
				if($usuario != null)
				{					
					if($usuario->getLogin_usuario() === $_POST["usuario"] && $usuario->getClave_usuario() === $clave)
					//if($usuario->getUsuario() === $_POST["usuario"] && $usuario->getClave() === base64_encode($_POST["clave"]))
					{
						session_start();
						$_SESSION["perfil"] = $usuario->getId_tipo_usuario();
						$_SESSION["usuario"] = $usuario->getId_usuario();
						echo "Bienvenido ".$usuario->getNombre_usuario().' '.$usuario->getApellido_usuario();
					}
					else{
						echo "0";
					}
				}		
				else
				{
					echo "0";
				} 
                break;


			case "list":
            	break;

			case "create":
				/* $conUsuario = new UsuarioController();
				$nombreDia = $_POST["nombreDia"];
				$dia = $_POST["dia"];
				$mes = $_POST["mes"];
				$anio = $_POST["anio"];
				$A0 = $_POST["A0"];
				$A1 = $_POST["A1"];
				$A2 = $_POST["A2"];
				$A3 = $_POST["A3"];
				$A4 = $_POST["A4"];
				$A5 = $_POST["A5"];
				$A6 = $_POST["A6"];
				$A7 = $_POST["A7"];
				$A8 = $_POST["A8"];
				$posterior0 = $_POST["posterior0"];
				$subAnt = $_POST["subAnt"];
				$subMega = $_POST["subMega"];

				$status = $conUsuario->create($nombreDia, $dia, $mes, $anio, 
				$A0, $A1, $A2, $A3, $A4, $A5, $A6, $A7, $A8, $posterior0, $subAnt, $subMega);
				echo $status; */
				break;

			case "edit":
				/* $conUsuario = new UsuarioController();
				$A0 = $_POST["A0"];
				$A1 = $_POST["A1"];
				$A2 = $_POST["A2"];
				$A3 = $_POST["A3"];
				$A4 = $_POST["A4"];
				$A5 = $_POST["A5"];
				$A6 = $_POST["A6"];
				$A7 = $_POST["A7"];
				$A8 = $_POST["A8"];
				$posterior0 = $_POST["posterior0"];
				$subAnt = $_POST["subAnt"];
				$subMega = $_POST["subMega"];
				$fecha = $_POST["fecha"];

				$status = $conUsuario->edit($A0, $A1, $A2, $A3, $A4, $A5, 
				$A6, $A7, $A8, $posterior0, $subAnt, $subMega, $fecha);
				echo $status; */
				break;
				case 'listUsuarios':
					$usuario_comunicado = new UsuarioController();
					$seguridad=4;
					$operaciones=3;
					$query = " select *from usuario where id_tipo_usuario=".$seguridad." or id_tipo_usuario=".$operaciones." and estado_usuario=1";
					$con_usuario_comunicado = $usuario_comunicado->listClientes($query);
					$html = '
					<select class="form-control" id="destinatario">';
					if($con_usuario_comunicado[0]["success"])
					{
						foreach ($con_usuario_comunicado as $row) 
						{
							
							$html .= '<option value="'.$row["id_usuario"].'">'.$row["nombre_usuario"].' '.$row["apellido_usuario"].'</option>';
						}
					}
					$html .='</select>
						';
					
					
						echo $html;
				break;

				case 'clientesEmpresa':
					$usuario_comunicado = new UsuarioController();
					$query = "select *from usuario where id_tipo_usuario=2 and id_usuario not in(select id_usuario from empresa where id_usuario is not null)";
					$con_usuario_comunicado = $usuario_comunicado->listClientes($query);
					$html='<select class="form-control" id="id_usuario">';
						

					if($con_usuario_comunicado[0]["success"])
					{					
						$html.='<option value="NULL">Seleccione</option>';

						foreach ($con_usuario_comunicado as $row) 
						{
							
							$html .= '<option value="'.$row["id_usuario"].'">'.$row["nombre_usuario"].' '.$row["apellido_usuario"].'</option>';
						}
					}			
					$html .='</select>
						';
						echo $html;
				break;

				case 'usuariosInternos':
					$usuario_cliente = new UsuarioController();
					$query = "select *from usuario where id_tipo_usuario=2 and estado_usuario=1";
					$con_usuario_cliente = $usuario_cliente->UsuarioEmpresa($query);
					$html = '<table class="table table-bordered text-center table-striped" id="tblUsuarios">
					<thead>
						<tr>
							<th class="back-color text-center">NOMBRES</th>
							<th class="back-color text-center">LOGIN</th>
							<th class="back-color text-center">CONTRASEÑA</th>
							<th class="back-color text-center">EMPRESA</th>
							<th class="back-color text-center">VER MAS</th>
						</tr>
					</thead>
					<tbody>';
					
				if($con_usuario_cliente!=null && $con_usuario_cliente[0]["success"])
				{
					foreach ($con_usuario_cliente as $row) 
					{
						$html .= '<tr>
							<td>'.$row["usuario"]->getNombre_usuario().'  '.$row["usuario"]->getApellido_usuario().'</td>
							<td>'.$row["usuario"]->getLogin_usuario().'</td>
							<td>'.$row["usuario"]->getClave_usuario().'</td>
							<td>'.$row["empresa"]->getNombre_comercial().'</td>
							<td>
							<a class="btn btn-link" 
                                 href="?page=detalleUsuarioInterno&usuario='.base64_encode($row["usuario"]->getId_usuario()).'&tipo='.$row["tipo_usuario"]->getId_tipo_usuario().'">Ver más
                            </a>  
							</td>
						</td>
						</tr>';
						
					}
				}
				else
					{
						$html .= "<tr><td colspan='4' class='text-center'>No se encontraron registros</td></tr>";
					}
					$html .= '</tbody></table>';
					echo $html;
				break;


				case 'createCliente':
					$usuario = new Usuario();
					$con_usuario = new UsuarioController();
					$usuario-> setId_tipo_usuario($_POST["tipo_usuario"]);
					$usuario-> setNombre_usuario($_POST["nombre"]);
					$usuario-> setApellido_usuario($_POST["apellido"]);
					$usuario-> setCedula_usuario($_POST["cedula"]);
					$usuario-> setLogin_usuario($_POST["login"]);
					$usuario-> setClave_usuario($_POST["clave"]);
					$usuario-> setCorreo_usuario($_POST["correo"]);
					$usuario-> setDireccion_usuario($_POST["direccion"]);
					$usuario-> setEstado_usuario(1);
					
					$result = $con_usuario->createCliente($usuario);
					
					if($result)
					{
						echo 'correcto';
					}else
					{
						echo 'incorrecto';
					}
				break;    

				case 'usuariosAdmin':
					$usuario_cliente = new UsuarioController();
					$query = "select *from usuario where id_tipo_usuario<>2 and estado_usuario=1";
					$con_usuario_admin = $usuario_cliente->UsuarioTipo($query);
					$html = '<table class="table table-bordered text-center table-striped" id="tblUsuarioAdmin">
					<thead>
						<tr>
							<th class="back-color text-center">NOMBRES</th>
							<th class="back-color text-center">LOGIN</th>
							<th class="back-color text-center">CONTRASEÑA</th>
							<th class="back-color text-center">ROL</th>
							<th class="back-color text-center">VER MAS</th>
						</tr>
					</thead>
					<tbody>';
					
				if($con_usuario_admin[0]["success"])
				{
					foreach ($con_usuario_admin as $row) 
					{
						$html .= '<tr>
							<td>'.$row["usuario"]->getNombre_usuario().'  '.$row["usuario"]->getApellido_usuario().'</td>
							<td>'.$row["usuario"]->getLogin_usuario().'</td>
							<td>'.$row["usuario"]->getClave_usuario().'</td>
							<td>'.$row["tipo_usuario"]->getNombre_tipo_usuario().'</td>
							<td>
							<a class="btn btn-link" 
                                 href="?page=detalleUsuarioSistema&usuario='.base64_encode($row["usuario"]->getId_usuario()).'&tipo='.$row["tipo_usuario"]->getId_tipo_usuario().'">Ver más
                            </a>  
							</td>
						</td>
						</tr>';
						
					}
				}
				else
					{
						$html .= "<tr><td colspan='4' class='text-center'>No se encontraron registros</td></tr>";
					}
					$html .= '</tbody></table>';
					echo $html;
				break;

				case 'eliminarUsuario':
					$id_usuario=$_POST["usuario"];
					$con_Usuario= new UsuarioController();
					
					$res=$con_Usuario->verificarUsuarioEliminar($id_usuario);
					
				
					if($res==0)
					{
						$con_eliminarUsuario=new UsuarioController();
						$result = $con_eliminarUsuario->eliminarUsuario($id_usuario);
							if($result)
							{
								//echo "elimino el usuario";
								$var=1;
								//echo json_encode(array('success' => 1));
								echo $var; 
							}else
							{
								$var=0;
								//echo json_encode(array('success' => 0));
								 //"no se elimino el usuario";
								echo $var;
							}   
					} else{
						$var=2;
						//echo "usuario asignado a una empresa";
						//echo json_encode(array('success' => 0));
						echo $var;
					}                     
		
				break;

				case 'usuarioInternoId':
					$idUsuario=$_POST["idUsuario"];
					$usuario_cliente = new UsuarioController();
					$query = "select *from usuario where id_usuario=".$idUsuario."";
					$con_usuario_cliente = $usuario_cliente->UsuarioEmpresa($query);		
					$html;
					if($con_usuario_cliente[0]["success"])
					{
						foreach ($con_usuario_cliente as $row) 
						{
						$html =' 
						<form class="form form-horizontal" id="usuarioInterno">
                                                <div class="form-body">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
														<strong><label> Nombres</label></strong>
                                                        </div>
                                                        <div class="col-md-6 form-group" style="padding:15px">
                                                            <label>'.$row["usuario"]->getNombre_usuario().'</label>
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px"></div>                                                                                                            
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
														<strong><label> Apellidos</label></strong>
                                                        </div>
                                                        <div class="col-md-6 form-group" style="padding:15px">
														<label>'.$row["usuario"]->getApellido_usuario().'</label>
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px">   </div>                                                                                     
                                                    </div>
                                                    <div class="row">
                                                    	<div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
														<strong><label> Cédula</label></strong>
                                                        </div>
                                                        <div class="col-md-6 form-group" style="padding:15px">
														<label>'.$row["usuario"]->getCedula_usuario().'</label>
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px"></div>                                                                                               
                                                    </div>
													<div class="row">
														<div class="col-md-2" style="padding:15px"></div>
														<div class="col-md-2" style="padding:15px">
															<strong><label> Tipo Usuario</label></strong>
														</div>
														<div class="col-md-6 form-group" style="padding:15px">
															<label>'.$row["tipo_usuario"]->getNombre_tipo_usuario().'</label>
														</div>      
														<div class="col-md-2" style="padding:15px"></div>                                                                                               
													</div>
													</div> <div class="row">
                                                        <div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
														<strong><label> Correo</label></strong>
                                                        </div>
                                                        <div class="col-md-6 form-group" style="padding:15px">
														<label>'.$row["usuario"]->getCorreo_usuario().'</label>
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
														<strong><label> Dirección</label></strong>
                                                        </div>
                                                        <div class="col-md-6 form-group" style="padding:15px">
														<label>'.$row["usuario"]->getDireccion_usuario().'</label>
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
														<strong><label> Nombre de usuario</label></strong>
                                                        </div>
                                                        <div class="col-md-6 form-group" style="padding:15px">
														<label>'.$row["usuario"]->getLogin_usuario().'</label>
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2" style="padding:15px"></div>
                                                        <div class="col-md-2" style="padding:15px">
														<strong><label> Contraseña</label></strong>
                                                        </div>
                                                        <div class="col-md-6 form-group" style="padding:15px">
														<label>'.$row["usuario"]->getClave_usuario().'</label>
                                                            <input id="id_Usuario" class="form-control" type="hidden" value="'.$row["usuario"]->getId_usuario().'">
															<input id="id_tipo_usuario" class="form-control" type="hidden" value="'.$row["tipo_usuario"]->getId_tipo_usuario().'">
                                                        </div>      
                                                        <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
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

				case 'modUsuarioInterno':
					$idUsuario=$_POST["idUsuario"];
					$usuario_cliente = new UsuarioController();
					$query = "select *from usuario where id_usuario=".$idUsuario."";
					$con_usuario_cliente = $usuario_cliente->UsuarioEmpresa($query);
		
					$html;
					if($con_usuario_cliente[0]["success"])
					{
						foreach ($con_usuario_cliente as $row) 
						{
						$html =' 
						<form class="form form-horizontal" id="usuarioInterno">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Nombres</label></strong>
                                    </div>
                                    <div class="col-md-6 form-group" style="padding:15px">
                                        <input type="text" class="form-control" id="nombreU" value="'.$row["usuario"]->getNombre_usuario().'">
                                    </div>      
                                    <div class="col-md-2" style="padding:15px"></div>                                                                                                            
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Apellidos</label></strong>
                                    </div>
                                    <div class="col-md-6 form-group" style="padding:15px">
										<input type="text" class="form-control" id="apellidoU" value="'.$row["usuario"]->getApellido_usuario().'">
                                    </div>      
                                    <div class="col-md-2" style="padding:15px">   </div>                                                                                     
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Cédula</label></strong>
                                    </div>
									<div class="col-md-6 form-group" style="padding:15px">
										<input type="text" class="form-control" id="cedulaU" value="'.$row["usuario"]->getCedula_usuario().'">
									</div>      
                                	<div class="col-md-2" style="padding:15px"></div>                                                                                               
                            	</div>
                               <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Correo</label></strong>
                                    </div>
                                    <div class="col-md-6 form-group" style="padding:15px">
										<input type="text" class="form-control" id="correoU" value="'.$row["usuario"]->getCorreo_usuario().'">
                                    </div>      
                                    <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Dirección</label></strong>
                                    </div>
                                    <div class="col-md-6 form-group" style="padding:15px">
										<input type="text" class="form-control" id="direccionU" value="'.$row["usuario"]->getDireccion_usuario().'">
									</div>      
                                    <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Nombre de usuario</label></strong>
                                    </div>
                                    <div class="col-md-6 form-group" style="padding:15px">
										<input type="text" class="form-control" id="loginU" value="'.$row["usuario"]->getLogin_usuario().'">
									</div>      
                                    <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Contraseña</label></strong>
                                    </div>
                                    <div class="col-md-6 form-group" style="padding:15px">
										<input type="text" class="form-control" id="claveU" value="'.$row["usuario"]->getClave_usuario().'">
										<input id="id_U" class="form-control" type="hidden" value="'.$row["usuario"]->getId_usuario().'">
										<input id="tipo_Usuario" class="form-control" type="hidden" value="'.$row["tipo_usuario"]->getId_tipo_usuario().'">
                                    </div>      
                                    <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
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

				case 'modUsuarioSistema':
					$idUsuario=$_POST["idUsuario"];
					$usuario_cliente = new UsuarioController();
					$query = "select *from usuario where id_usuario=".$idUsuario."";
					$con_usuario_cliente = $usuario_cliente->listClientes($query);
		
					$html;
					if($con_usuario_cliente[0]["success"])
					{
						foreach ($con_usuario_cliente as $row) 
						{
						$html =' 
						<form class="form form-horizontal" id="usuarioInterno">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Nombres</label></strong>
                                    </div>
                                    <div class="col-md-6 form-group" style="padding:15px">
                                        <input type="text" class="form-control" id="nombreU" value="'.$row["nombre_usuario"].'">
                                    </div>      
                                    <div class="col-md-2" style="padding:15px"></div>                                                                                                            
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Apellidos</label></strong>
                                    </div>
                                    <div class="col-md-6 form-group" style="padding:15px">
										<input type="text" class="form-control" id="apellidoU" value="'.$row["apellido_usuario"].'">
                                    </div>      
                                    <div class="col-md-2" style="padding:15px">   </div>                                                                                     
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Cédula</label></strong>
                                    </div>
									<div class="col-md-6 form-group" style="padding:15px">
										<input type="text" class="form-control" id="cedulaU" value="'.$row["cedula_usuario"].'">
									</div>      
                                	<div class="col-md-2" style="padding:15px"></div>                                                                                               
                            	</div>
								<div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                        <div class="col-md-2" style="padding:15px">
										<strong><label> Tipo Usuario</label></strong>
                                    </div>
                                    <div class="col-md-6 form-group" id="id_usuario">
                                                            
                                     </div>      
                                    <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                </div>
                               <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Correo</label></strong>
                                    </div>
                                    <div class="col-md-6 form-group" style="padding:15px">
										<input type="text" class="form-control" id="correoU" value="'.$row["correo_usuario"].'">
                                    </div>      
                                    <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Dirección</label></strong>
                                    </div>
                                    <div class="col-md-6 form-group" style="padding:15px">
										<input type="text" class="form-control" id="direccionU" value="'.$row["direccion_usuario"].'">
									</div>      
                                    <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Nombre de usuario</label></strong>
                                    </div>
                                    <div class="col-md-6 form-group" style="padding:15px">
										<input type="text" class="form-control" id="loginU" value="'.$row["login_usuario"].'">
									</div>      
                                    <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="padding:15px"></div>
                                    <div class="col-md-2" style="padding:15px">
										<strong><label> Contraseña</label></strong>
                                    </div>
                                    <div class="col-md-6 form-group" style="padding:15px">
										<input type="text" class="form-control" id="claveU" value="'.$row["clave_usuario"].'">
										<input id="id_U" class="form-control" type="hidden" value="'.$row["id_usuario"].'">
										<input id="idtipo_Usuario" class="form-control" type="hidden" value="'.$row["id_tipo_usuario"].'">
                                    </div>      
                                    <div class="col-md-2" style="padding:15px"></div>                                                                                                                                                      
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

				case 'modificarUsuario':
					$usuario = new Usuario();
					$con_Usuario= new UsuarioController();
					$usuario->setId_usuario($_POST["id_usuario"]);
					$usuario->setId_tipo_usuario($_POST["id_tipo"]);
					$usuario-> setCedula_usuario($_POST["cedula"]);
					$usuario-> setNombre_usuario($_POST["nombre"]);
					$usuario-> setApellido_usuario($_POST["apellido"]);
					$usuario-> setDireccion_usuario($_POST["direccion"]);
					$usuario-> setLogin_usuario($_POST["login"]);
					$usuario-> setClave_usuario($_POST["clave"]);
					$usuario-> setCorreo_usuario($_POST["correo"]);
					$usuario-> setEstado_usuario(1);
					
					$result_usuario = $con_Usuario->modificarUsuario($usuario);
					
					if($result_usuario)
					{
						echo 'correcto';
					}else
					{
						echo 'incorrecto';
					}
				break;

				case 'listUsuariosCirculares':
					$con_usuario = new UsuarioController();
					$query = "select * from usuario where estado_usuario=1 and id_tipo_usuario=2";
					$con_usuario_list = $con_usuario->listClientes($query);
					$html = '<table class="table table-bordered text-center table-striped" id="tblClientesCirculares">
						<thead>
							<tr>
								<th class="back-color text-center">SELECCIONAR</th>
								<th class="back-color text-center">NOMBRES</th>
								<th class="back-color text-center">CÉDULA</th>
							</tr>
						</thead>
						
						<tbody id="formClientes">
						';
					if($con_usuario_list[0]["success"])
					{
						foreach ($con_usuario_list as $row) 
						{
							$html .= '<tr>
								<td><input type="checkbox" class="ckClientes" name="clientes" value="'.$row["id_usuario"].'"></td>
								<td>'.$row["nombre_usuario"].' '.$row["apellido_usuario"].'</td>
								<td>'.$row["cedula_usuario"].'</td>
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
		

				
				case 'verificarUsuarioEliminar':
					$id_usuario=$_POST["usuario"];
					$con_Usuario= new UsuarioController();
					
					$result = $con_Usuario->verificarUsuarioEliminar($id_usuario);
					
					if($result)
					{
						echo 'correcto';
					}else
					{
						echo 'incorrecto';
					}
					return $result;
				break;
        }
    }

?>