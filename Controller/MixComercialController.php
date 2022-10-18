<?php 
require_once "./../Controller/Conexion.php";
require_once "./../Controller/MixComercialController.php";
require_once "./../Class/MixComercial.php";

class MixComercialController extends Conexion
{
    private $conn;
    public function __construct()
    {
        $this->conn = Conexion::getInstance()->getConexion();
    }

    public function listMixComercial($parameter)
	{
        $result = pg_query($this->conn, $parameter);
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{               
                $mix_comercial = new MixComercial();
                $mix_comercial->setId_mix_comercial($info[0]);
                $mix_comercial->setNombre_mix($info[1]);
                $mix_comercial->setDescripcion_mix($info[2]);
                $datos[] = array(
                    "success" => true,
                    "mix_comercial" => $mix_comercial,
                );
            }
            return  $datos;
        }
    }

    
}

?>