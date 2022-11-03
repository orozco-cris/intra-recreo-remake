<?php 

require_once "./../Controller/Conexion.php";
require_once "./../Class/EspacioFisico.php";
require_once "./../Class/EtapaComercial.php";
require_once "./../Controller/EtapaComercialController.php";

class EspacioFisicoController extends Conexion
{
    private $conn;
    public function __construct()
    {
        $this->conn = Conexion::getInstance()->getConexion();
    }

    public function listEspacioFisico($parameter)
	{
        $result = pg_query($this->conn, $parameter);
        $espacio_fisico = null;
        $datos=null;
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{               
                $espacio_fisico = new EspacioFisico();
                $etapa_comercial=new EtapaComercial();
                $con_estapa_comercial=new EtapaComercialController();
                $etapa_comercial=$con_estapa_comercial->listParameter($info[1]);
                $espacio_fisico->setId_espacio_fisico($info[0]);
                $espacio_fisico->setId_etapa_comercial($etapa_comercial);
                $espacio_fisico->setDenominacion($info[2]);
                $espacio_fisico->setUbicacion_espacio($info[3]);
                $espacio_fisico->setMedidas($info[4]);
                $espacio_fisico->setCaracteristicas($info[5]);
                $espacio_fisico->setFotografia_espacio($info[6]);
                $espacio_fisico->setTipo_espacio($info[7]);
                $espacio_fisico->setEstado_espacio($info[8]);
                $espacio_fisico->setCodigo_espacio($info[9]);
                $datos[] = array(
                    "success" => true,
                    "espacio_fisico" => $espacio_fisico,
                    "etapa_comercial" => $etapa_comercial,
                );
            }
            //pg_close($this->conn);
            return $datos;
        }
    }

    public function buscarEspacioFisico($parameter)
	{
        if(empty($parameter)){
            $query="select *from espacio_fisico where estado_espacio=1";
        }
        else{
            $query="select *from espacio_fisico where estado_espacio=1 and denominacion LIKE'%".$parameter."%'";
        }
        
        $result = pg_query($this->conn, $query);
        $espacio_fisico = null;
        $datos=null;
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{               
                $espacio_fisico = new EspacioFisico();
                $etapa_comercial=new EtapaComercial();
                $con_estapa_comercial=new EtapaComercialController();
                $etapa_comercial=$con_estapa_comercial->listParameter($info[1]);
                $espacio_fisico->setId_espacio_fisico($info[0]);
                $espacio_fisico->setId_etapa_comercial($etapa_comercial);
                $espacio_fisico->setDenominacion($info[2]);
                $espacio_fisico->setUbicacion_espacio($info[3]);
                $espacio_fisico->setMedidas($info[4]);
                $espacio_fisico->setCaracteristicas($info[5]);
                $espacio_fisico->setFotografia_espacio($info[6]);
                $espacio_fisico->setTipo_espacio($info[7]);
                $espacio_fisico->setEstado_espacio($info[8]);
                $espacio_fisico->setCodigo_espacio($info[9]);
                $datos[] = array(
                    "success" => true,
                    "espacio_fisico" => $espacio_fisico,
                    "etapa_comercial" => $etapa_comercial,
                );
            }
            //pg_close($this->conn);
            return $datos;
        }
    }

    public function espacioFisicoId($parameter)
	{
        $query="select *from espacio_fisico where id_espacio_fisico=".$parameter."";
        $result = pg_query($this->conn, $query);
        $espacio_fisico = null;
        $datos=null;
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{               
                $espacio_fisico = new EspacioFisico();
                $etapa_comercial=new EtapaComercial();
                $con_estapa_comercial=new EtapaComercialController();
                $etapa_comercial=$con_estapa_comercial->listParameter($info[1]);
                $espacio_fisico->setId_espacio_fisico($info[0]);
                $espacio_fisico->setId_etapa_comercial($etapa_comercial);
                $espacio_fisico->setDenominacion($info[2]);
                $espacio_fisico->setUbicacion_espacio($info[3]);
                $espacio_fisico->setMedidas($info[4]);
                $espacio_fisico->setCaracteristicas($info[5]);
                $espacio_fisico->setFotografia_espacio($info[6]);
                $espacio_fisico->setTipo_espacio($info[7]);
                $espacio_fisico->setEstado_espacio($info[8]);
                $espacio_fisico->setCodigo_espacio($info[9]);
            }
            //pg_close($this->conn);
            return $espacio_fisico;
        }
    }

    public function eliminarEspacioFisico($espacio)
    {
        $query = "update espacio_fisico set estado_espacio=0 where id_espacio_fisico=".$espacio."";
        echo $query;
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }


    
    public function createEspacioFisico($espacio_fisico)
    {
        $query = "insert into espacio_fisico
         (id_etapa_comercial,denominacion,ubicacion_espacio,medidas,caracteristicas,fotografia_espacio,
         tipo_espacio,estado_espacio,codigo_espacio) values 
        (".$espacio_fisico->getId_etapa_comercial().",'".$espacio_fisico-> getDenominacion()."',
        '".$espacio_fisico->getUbicacion_espacio()."','".$espacio_fisico-> getMedidas()."',
        '".$espacio_fisico->getCaracteristicas()."','".$espacio_fisico-> getFotografia_espacio()."',
        ".$espacio_fisico->getTipo_espacio().",".$espacio_fisico-> getEstado_espacio().",
        '".$espacio_fisico->getCodigo_espacio()."')";
        echo $query;
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }


}