<?php 
require_once "./../Controller/Conexion.php";
require_once "./../Class/Arriendo.php";
require_once "./../Class/EspacioFisico.php";
require_once "./../Class/Empresas.php";
require_once "./../Controller/EspacioFisicoController.php";
require_once "./../Controller/EmpresaController.php";

class ArriendoController extends Conexion
{
    private $conn;
    public function __construct()
    {
        $this->conn = Conexion::getInstance()->getConexion();
    }

    public function listArriendo($parameter)
	{
        $result = pg_query($this->conn, $parameter);
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{               
               
                $arriendo = new Arriendo();
                $espacio_fisico=new EspacioFisico();
                $con_espacio_fisico=new EspacioFisicoController();
                $espacio_fisico=$con_espacio_fisico->espacioFisicoId($info[1]);
                $empresa= new Empresas();
                $con_empresa = new EmpresaController();
                $empresa=$con_empresa->getEmpresas($info[2]);
                $arriendo->setId_arriendo($info[0]);
                $arriendo->setId_espacio_fisico($espacio_fisico);
                $arriendo->setId_empresa($empresa);
                $arriendo->setVendedor_arriendo($info[3]);
                $arriendo->setTipo_contrato($info[4]);
                $arriendo->setCosto_contrato($info[5]);
                $arriendo->setDescuento_arriendo($info[6]);
                $arriendo->setFecha_registro($info[7]);
                $arriendo->setFecha_vencimiento($info[8]);
                $arriendo->setObservacion_arriendo($info[9]);
                $arriendo->setEstado_arriendo($info[10]);
                
                    $datos[] = array(
                        "success" => true,
                        "arriendo" => $arriendo,
                        "empresa" => $empresa,
                        "espacio_fisico"=>$espacio_fisico,
                    );
                
                }
                
            }
            return  $datos;
        }
    



    public function listArriendoId($parameter)
	{
        $query = "select *from arriendo where id_arriendo = ".$parameter;
        $result = pg_query($this->conn, $query);
        $empresa=null;
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
               
                $arriendo = new Arriendo();
                $espacio_fisico=new EspacioFisico();
                $con_espacio_fisico=new EspacioFisicoController();
                $espacio_fisico=$con_espacio_fisico->espacioFisicoId($info[1]);
                $empresa= new Empresas();
                $con_empresa = new EmpresaController();
                $empresa=$con_empresa->getEmpresas($info[2]);
                $arriendo->setId_arriendo($info[0]);
                $arriendo->setId_espacio_fisico($espacio_fisico);
                $arriendo->setId_empresa($empresa);
                $arriendo->setVendedor_arriendo($info[3]);
                $arriendo->setTipo_contrato($info[4]);
                $arriendo->setCosto_contrato($info[5]);
                $arriendo->setDescuento_arriendo($info[6]);
                $arriendo->setFecha_registro($info[7]);
                $arriendo->setFecha_vencimiento($info[8]);
                $arriendo->setObservacion_arriendo($info[9]);
                $arriendo->setEstado_arriendo($info[10]);
                
                    $datos[] = array(
                        "success" => true,
                        "arriendo" => $arriendo,
                        "empresa" => $empresa,
                        "espacio_fisico"=>$espacio_fisico,
                    );
                
            }
            //pg_close($this->conn);
           
            return $datos;
        }
    }


    public function buscarArriendo($parameter)
	{
        if(empty($parameter)){
            $query="select *from arriendo as ar inner join empresa as e
            on ar.id_empresa=e.id_empresa inner join espacio_fisico as ef  
                   on ar.id_espacio_fisico=ef.id_espacio_fisico
                   where ar.estado_arriendo=1";
        }else{
            $query="select *from arriendo as ar inner join empresa as e
            on ar.id_empresa=e.id_empresa inner join espacio_fisico as ef  
                   on ar.id_espacio_fisico=ef.id_espacio_fisico
                   where ar.estado_arriendo=1 and e.nombre_comercial LIKE '%".$parameter."%' 
                   or ef.denominacion LIKE '%".$parameter."%' ";
        }
        $result = pg_query($this->conn, $query);
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{               
               
                $arriendo = new Arriendo();
                $espacio_fisico=new EspacioFisico();
                $con_espacio_fisico=new EspacioFisicoController();
                $espacio_fisico=$con_espacio_fisico->espacioFisicoId($info[1]);
                $empresa= new Empresas();
                $con_empresa = new EmpresaController();
                $empresa=$con_empresa->getEmpresas($info[2]);
                $arriendo->setId_arriendo($info[0]);
                $arriendo->setId_espacio_fisico($espacio_fisico);
                $arriendo->setId_empresa($empresa);
                $arriendo->setVendedor_arriendo($info[3]);
                $arriendo->setTipo_contrato($info[4]);
                $arriendo->setCosto_contrato($info[5]);
                $arriendo->setDescuento_arriendo($info[6]);
                $arriendo->setFecha_registro($info[7]);
                $arriendo->setFecha_vencimiento($info[8]);
                $arriendo->setObservacion_arriendo($info[9]);
                $arriendo->setEstado_arriendo($info[10]);
                
                    $datos[] = array(
                        "success" => true,
                        "arriendo" => $arriendo,
                        "empresa" => $empresa,
                        "espacio_fisico"=>$espacio_fisico,
                    );
                
                }
                
            }
            return  $datos;
        }

  
    public function createArriendo($arriendo)
    {
        $query = "insert into arriendo
         (id_espacio_fisico,id_empresa,vendedor_arriendo,tipo_contrato,
         costo_contrato,descuento_arriendo,fecha_registro,fecha_vencimiento,observacion_arriendo,
         estado_arriendo) values 
        (".$arriendo->getId_espacio_fisico().",".$arriendo-> getId_empresa().",
        '".$arriendo->getVendedor_arriendo()."','".$arriendo-> getTipo_contrato()."',
        '".$arriendo->getCosto_contrato()."','".$arriendo-> getDescuento_arriendo()."',
        '".$arriendo-> getFecha_registro()."','".$arriendo-> getFecha_vencimiento()."',
        '".$arriendo->getObservacion_arriendo()."','".$arriendo-> getEstado_arriendo()."')";
        echo $query;
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }

    public function modificarArriendo($arriendo)
    {
        $query = "update arriendo set id_espacio_fisico=".$arriendo->getId_espacio_fisico().",
                                    id_empresa=".$arriendo-> getId_empresa().",
                                    vendedor_arriendo='".$arriendo-> getVendedor_arriendo()."',
                                    tipo_contrato='".$arriendo-> getTipo_contrato()."',
                                    costo_contrato='".$arriendo-> getCosto_contrato()."',
                                    descuento_arriendo='".$arriendo-> getDescuento_arriendo()."',
                                    fecha_registro='".$arriendo-> getFecha_registro()."',
                                    fecha_vencimiento='".$arriendo-> getFecha_vencimiento()."',
                                    observacion_arriendo='".$arriendo-> getObservacion_arriendo()."',
                                    estado_arriendo='".$arriendo-> getEstado_arriendo()."'
                        where id_arriendo=".$arriendo->getId_arriendo()."";
        echo $query;
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }

    public function eliminarArriendo($arriendo)
    {
        $query = "update arriendo set estado_arriendo=0 where id_arriendo=".$arriendo."";
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }
    

}

?>