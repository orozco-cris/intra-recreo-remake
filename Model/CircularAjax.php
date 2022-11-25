<?php
require_once "./../Class/Comunicado.php";
require_once "./../Controller/ComunicadoController.php";
require_once "./../Class/ComunicadoUsuario.php";
require_once "./../Controller/ComunUsuaController.php";
require_once "./../Controller/EspacioFisicoController.php";

    if($_POST["crud"])
    {
        $crud = $_POST["crud"];
        switch($crud)
        {
           	
            case 'createSolicitudCircular':
                session_start();
                $comunicado = new Comunicado();
                $usuario = new Usuario();
                $con_comunicado = new ComunicadoController();
                $comunicado_usuario = new ComunicadoUsuario();
                $con_comunicado_usuario = new ComunUsuaController();
    
                date_default_timezone_set('America/Guayaquil');
                $hoy = getdate();
                $dia = $hoy["mday"];
                $mes = $hoy["mon"];
                $anio = $hoy["year"];
                $circular_codigo = "".$hoy["year"].$hoy["mon"] . $hoy["mday"] . $hoy["hours"] . $hoy["minutes"] . $hoy["seconds"] ."";
                $hora = $hoy["hours"] . ":" . $hoy["minutes"] . ":" . $hoy["seconds"];
                
            

                $de=$_POST["de_comunicado"];
                $para=($_POST["para_comunicado"]);
                $asunto=$_POST["asunto_comunicado"];
                $mensaje=$_POST["mensaje_comunicado"];
                $imagen=$_POST["foto_comunicado"];
                $detalle=$_POST["detalle_comunicado"];
                $tipo=$_POST["tipo_comunicado"];
                $destinatario=$_POST["usuario"];
                $fecha=$_POST["fecha_comunicado"];

                $comunicado->setId_usuario_creador($_SESSION["usuario"]);
                $comunicado->setDe_comunicado($_POST["de_comunicado"]);
                $comunicado->setPara_comunicado($_POST["usuario"]);
                $comunicado->setCodigo_comunicado($circular_codigo);
                $comunicado->setAsunto_comunicado($_POST["asunto_comunicado"]);
                $comunicado->setMensaje_comunicado($_POST["mensaje_comunicado"]);
                $comunicado->setDetalle_comunicado($_POST["detalle_comunicado"]);
                $comunicado->setDia_comunicado($dia);
                $comunicado->setMes_comunicado($mes);
                $comunicado->setAnio_comunicado($anio);
                $comunicado->setHora_comunicado($hora);
                $comunicado->setFecha_caducidad_comunicado('');
                $comunicado->setFoto_comunicado($imagen);
                $comunicado->setTipo_comunicado($_POST["tipo_comunicado"]);
    
                $result_comunicado = $con_comunicado->createPermiso($comunicado);

                if($result_comunicado){

                
                switch($destinatario){
                    case 'Clientes':
                        if($para)
                        {
                            foreach($para as $i)
                            {
                                echo "id usuario";
                                echo $i;
                                $id_comunicado = $con_comunicado->getLastId();    
                                $comunicado_usuario->setId_comunicado($id_comunicado);            
                                $comunicado_usuario->setId_usuario($i);                
                                $comunicado_usuario->setRevision(0);
                                $result_comunicado_usuario = $con_comunicado_usuario->create($comunicado_usuario);
                                    if($result_comunicado_usuario)
                                    {
                                        echo 'correcto';
                                    }else
                                    {
                                        echo 'incorrecto';
                                    }
                            }
                          
                        }
                        break;
                    case 'Empresas':
                        $con_empresa=new EmpresaController();
                        if($para)
                        {
                            foreach($para as $i)
                            {
                                $result_empresa=$con_empresa->usuarioEmpresaCircular($i);
                               if($result_empresa){
                                    echo "id usuario";
                                    echo $result_empresa;
                                    $id_comunicado = $con_comunicado->getLastId();    
                                    $comunicado_usuario->setId_comunicado($id_comunicado);            
                                    $comunicado_usuario->setId_usuario($result_empresa);                
                                    $comunicado_usuario->setRevision(0);
                                    $result_comunicado_usuario = $con_comunicado_usuario->create($comunicado_usuario);
                                    if($result_comunicado_usuario)
                                    {
                                        echo 'correcto';
                                    }else
                                    {
                                        echo 'incorrecto';
                                    } 
                               }
                                
                            }
                          
                        }
                        break;
                    case 'Mix Comercial':
                        $con_mixComercial=new MixComercialController();
                        if($para)
                        {
                            foreach($para as $i)
                            {
                                $result_mix=$con_mixComercial->usuarioEmpresaMixComercialCircular($i);
                               if($result_mix){
                                    echo "id usuario";
                                    echo $result_mix;
                                    $id_comunicado = $con_comunicado->getLastId();    
                                    $comunicado_usuario->setId_comunicado($id_comunicado);            
                                    $comunicado_usuario->setId_usuario($result_mix);                
                                    $comunicado_usuario->setRevision(0);
                                    $result_comunicado_usuario = $con_comunicado_usuario->create($comunicado_usuario);
                                    if($result_comunicado_usuario)
                                    {
                                        echo 'correcto';
                                    }else
                                    {
                                        echo 'incorrecto';
                                    } 
                               }
                                
                            }
                        }
                          
                        break;
                    case 'Espacio Fisico':
                        $con_espacio=new EspacioFisicoController();
                        if($para)
                        {
                            foreach($para as $i)
                            {
                                $result_espacio=$con_espacio->usuarioEspacioFisicoCircular($i);
                               if($result_espacio){
                                    echo "id usuario";
                                    echo $result_espacio;
                                    $id_comunicado = $con_comunicado->getLastId();    
                                    $comunicado_usuario->setId_comunicado($id_comunicado);            
                                    $comunicado_usuario->setId_usuario($result_espacio);                
                                    $comunicado_usuario->setRevision(0);
                                    $result_comunicado_usuario = $con_comunicado_usuario->create($comunicado_usuario);
                                    if($result_comunicado_usuario)
                                    {
                                        echo 'correcto';
                                    }else
                                    {
                                        echo 'incorrecto';
                                    } 
                               }
                                
                            }
                        }
                        break;
                }


            }else
                {
                    echo 'incorrecto';
                } 
            break;

            
        }
    }

?>