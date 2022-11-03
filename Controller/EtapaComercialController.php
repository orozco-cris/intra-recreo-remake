<?php 

require_once "./../Controller/Conexion.php";
require_once "./../Class/EtapaComercial.php";

class EtapaComercialController extends Conexion
{
    private $conn;
    public function __construct()
    {
        $this->conn = Conexion::getInstance()->getConexion();
    }

    public function listParameter($parameter)
	{
        $query="Select *from etapa_comercial where id_etapa_comercial=".$parameter."";
        $result = pg_query($this->conn, $query);
        $etapa_comercial = null;
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $etapa_comercial = new EtapaComercial();
                $etapa_comercial->setId_etapa_comercial($info[0]);
                $etapa_comercial->setNombre_etapa_comercial($info[1]);
                $etapa_comercial->setDescripcion_etapa_comercial($info[2]);
            }
            //pg_close($this->conn);
            return $etapa_comercial;
        }
    }

    public function listEtapa($parameter)
    {
        $result = pg_query($this->conn, $parameter);
        $etapa_comercial = null;
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $etapa_comercial = new EtapaComercial();
                $etapa_comercial->setId_etapa_comercial($info[0]);
                $etapa_comercial->setNombre_etapa_comercial($info[1]);
                $etapa_comercial->setDescripcion_etapa_comercial($info[2]);

                $datos[] = array(
                    "success" => true,
                    "id_etapa_comercial" => $info[0],
                    "nombre_etapa_comercial"=> $info[1],
                    "descripcion_etapa_comercial" => $info[2],
                );
            }
            //pg_close($this->conn);
            return $datos;
        }
    }


    
 public function createEtapaComercial($etapa)
 {
     $query = "insert into etapa_comercial (nombre_etapa_comercial, descripcion_etapa_comercial) values 
     ('".$etapa->getNombre_etapa_comercial()."','".$etapa-> getDescripcion_etapa_comercial()."')";
     $result = pg_query($this->conn, $query);
     //pg_close($this->conn);
     return $result;
 }

 public function modificarEtapaComercial($etapa)
    {
        $query = "update etapa_comercial set nombre_etapa_comercial='".$etapa->getNombre_etapa_comercial()."',descripcion_etapa_comercial='".$etapa-> getDescripcion_etapa_comercial()."'
        where id_etapa_comercial=".$etapa->getId_etapa_comercial()."";
        echo $query;
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }

}