<?php 
require_once "./../Controller/Conexion.php";
require_once "./../Class/Empresas.php";

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
                $empresa = new Empresas();
                $empresa->setId_empresa($info[0]);
                $empresa->setId_usuario($info[1]);
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
                );
            }
            return  $datos;
        }
    }


 public function createMixComercial($mix)
    {
        $query = "insert into mix_Comercial (nombre_mix, descripcion_mix) values 
        ('".$mix->getNombre_mix()."','".$mix-> getDescripcion_mix()."')";
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }

    public function modificarMixComercial($mix)
    {
        $query = "update mix_Comercial set nombre_mix='".$mix->getNombre_mix()."',descripcion_mix='".$mix-> getDescripcion_mix()."'
        where id_mix_comercial=".$mix->getId_mix_comercial()."";
        echo $query;
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }
    
}

?>