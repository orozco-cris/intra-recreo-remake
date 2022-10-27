<?php 
require_once "./../Controller/Conexion.php";
require_once "./../Class/Empresas.php";
require_once "./../Class/MixComercial.php";
require_once "./../Controller/MixComercialController.php";
require_once "./../Class/Usuario.php";
require_once "./../Controller/UsuarioController.php";

class EmpresaController extends Conexion
{
    private $conn;
    public function __construct()
    {
        $this->conn = Conexion::getInstance()->getConexion();
    }

    public function listEmpresas($parameter)
	{
        $result = pg_query($this->conn, $parameter);
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{               
               
                $mixComercial = new MixComercial();
                $con_mixComercial = new MixComercialController();
                $mixComercial = $con_mixComercial->listParameter($info[2]);
                $usuario = new Usuario();
                $con_usuario = new UsuarioController();
                $usuario = $con_usuario->listParameter($info[1]);
                $empresa =new Empresas();
                $empresa->setId_empresa($info[0]);
                $empresa->setId_usuario($usuario);
                $empresa->setId_mix_comercial($info[2]);
                $empresa->setNombre_comercial($info[3]);
                $empresa->setRuc_empresa($info[4]);
                $empresa->setTelefono_empresa($info[5]);
                $empresa->setDireccion_empresa($info[6]);
                $empresa->setCorreo_empresa($info[7]);
                $empresa->setFecha_registro($info[8]);
                $empresa->setFecha_deshabilitado($info[9]);
                $empresa->setEstado_empresa($info[10]);
                if($usuario!=null)
                {
                    $datos[] = array(
                        "success" => true,
                        "empresa" => $empresa,
                        "usuario" => $usuario,
                        "mixComercial"=>$mixComercial,
                    );
                }
                else{
                    $usuario = new Usuario();
                    $usuario->setNombre_usuario(null);
                    $usuario->setApellido_usuario(null);
                    $datos[] = array(
                        "success" => true,
                        "empresa" => $empresa,
                        "usuario" => $usuario,
                        "mixComercial"=>$mixComercial,
                    );
                }
                
            }
            return  $datos;
        }
    }


    public function listEmpresaId($parameter)
	{
        $query = "select *from empresa where id_empresa = ".$parameter;
        $result = pg_query($this->conn, $query);
        $empresa=null;
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $datos = array();
                $mixComercial = new MixComercial();
                $con_mixComercial = new MixComercialController();
                $mixComercial = $con_mixComercial->listParameter($info[2]);
                $usuario = new Usuario();
                $con_usuario = new UsuarioController();
                $usuario = $con_usuario->listParameter($info[2]);
                $empresa =new Empresa();
                $empresa->setId_empresa($info[0]);
                $empresa->setId_usuario($usuario);
                $empresa->setId_mix_comercial($info[2]);
                $empresa->setNombre_comercial($info[3]);
                $empresa->setRuc_empresa($info[4]);
                $empresa->setTelefono_empresa($info[5]);
                $empresa->setDireccion_empresa($info[6]);
                $empresa->setCorreo_empresa($info[7]);
                $empresa->setFecha_registro($info[8]);
                $empresa->setFecha_deshabilitado($info[9]);
                $empresa->setEstado_empresa($info[10]);
                $datos[] = array(
                    "success" => true,
                    "empresa" => $empresa,
                    "usuario" => $usuario,
                    "mixComercial"=>$mixComercial,
                );

            }
            //pg_close($this->conn);
           
            return $datos;
        }
    }

    public function listEmpresaUsuario($parameter)
	{
        $query="Select *from empresa where id_usuario=".$parameter;
        $result = pg_query($this->conn, $query);
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{               
               
                $mixComercial = new MixComercial();
                $con_mixComercial = new MixComercialController();
                $mixComercial = $con_mixComercial->listParameter($info[2]);
                $usuario = new Usuario();
                $con_usuario = new UsuarioController();
                $usuario = $con_usuario->listParameter($info[2]); 
                $empresa =new Empresas();
                $empresa->setId_empresa($info[0]);
                $empresa->setId_usuario($usuario);
                $empresa->setId_mix_comercial($mixComercial);
                $empresa->setNombre_comercial($info[3]);
                $empresa->setRuc_empresa($info[4]);
                $empresa->setTelefono_empresa($info[5]);
                $empresa->setDireccion_empresa($info[6]);
                $empresa->setCorreo_empresa($info[7]);
                $empresa->setFecha_registro($info[8]);
                $empresa->setFecha_deshabilitado($info[9]);
                $empresa->setEstado_empresa($info[10]);
               /*  $datos[] = array(
                    "success" => true,
                    "empresa" => $empresa,
                    "mixComercial"=>$mixComercial,
                ); */
            }
            return  $empresa;
        }else{
            return null;
        }
    }


    public function createEmpresa($empresa)
    {
        $query = "insert into empresa
         (id_usuario,id_mix_comercial,nombre_comercial,ruc_empresa,telefono_empresa,direccion_empresa,
        correo_empresa,fecha_registro,fecha_deshabilitado,estado_empresa) values 
        (".$empresa->getId_usuario().",".$empresa-> getId_mix_comercial().",
        '".$empresa->getNombre_comercial()."','".$empresa-> getRuc_empresa()."',
        '".$empresa->getTelefono_empresa()."','".$empresa-> getDireccion_empresa()."',
        '".$empresa->getCorreo_empresa()."','".$empresa-> getFecha_registro()."',
        '".$empresa->getFecha_deshabilitado()."',".$empresa-> getEstado_empresa().")";
        echo $query;
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }

    public function modificarEmpresa($empresa)
    {
        $query = "update empresa set id_usuario=".$empresa->getId_usuario().",
                                    id_mix_comercial=".$empresa-> getId_mix_comercial().",
                                    nombre_comercial='".$empresa-> getNombre_comercial()."',
                                    ruc_empresa='".$empresa-> getRuc_empresa()."',
                                    telefono_empresa='".$empresa-> getTelefono_empresa()."',
                                    direccion_empresa='".$empresa-> getDireccion_empresa()."',
                                    correo_empresa='".$empresa-> getCorreo_empresa()."',
                                    fecha_registro='".$empresa-> getFecha_registro()."',
                                    fecha_deshabilitado='".$empresa-> getFecha_deshabilitado()."',
                                    estado_empresa=".$empresa-> getEstado_empresa()."
                        where id_empresa=".$empresa->getId_empresa()."";
        echo $query;
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }

    public function eliminarEmpresa($empresa)
    {
        $query = "update empresa set estado_empresa=0 where id_empresa=".$empresa."";
        echo $query;
        echo $query;
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }
    

    
}

?>