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

    public function listParameter($parameter)
	{
        $query = "select * from mix_comercial where id_mix_comercial = ".$parameter;
		$result = pg_query($this->conn, $query);
        $mixComercial = null;
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $mixComercial = new MixComercial();
                $mixComercial->setId_mix_comercial($info[0]);
                $mixComercial->setNombre_mix($info[1]);
                $mixComercial->setDescripcion_mix($info[2]);
            }
            //pg_close($this->conn);
            return $mixComercial;
        }
    }



 public function createMixComercial($mix)
    {
        $query = "insert into mix_comercial (nombre_mix, descripcion_mix) values 
        ('".$mix->getNombre_mix()."','".$mix-> getDescripcion_mix()."')";
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }

    public function modificarMixComercial($mix)
    {
        $query = "update mix_comercial set nombre_mix='".$mix->getNombre_mix()."',descripcion_mix='".$mix-> getDescripcion_mix()."'
        where id_mix_comercial=".$mix->getId_mix_comercial()."";
        echo $query;
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }
    

    public function usuarioEmpresaMixComercialCircular($mixComercial){
        $datos = array();
        $query="select u.id_usuario from mix_comercial as mc inner join Empresa as e
        on mc.id_mix_comercial=e.id_mix_comercial inner join usuario as u
        on e.id_usuario=u.id_usuario where mc.id_mix_comercial=".$mixComercial;
        echo $query;
        $result=pg_query($this->conn, $query);
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{ 
                $usuario=$info[0];
            }
        }
        echo $usuario;
        return  $usuario;
    }
}

?>