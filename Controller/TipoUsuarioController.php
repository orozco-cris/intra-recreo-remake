<?php 
/**
 * Description of ComunicadoController
 *
 * @author CRISTHIAN_OROZCO 2022-09-30
 */

require_once "./../Controller/Conexion.php";
require_once "./../Class/TipoUsuario.php";

class TipoUsuarioController extends Conexion
{
    private $conn;
    public function __construct()
    {
        $this->conn = Conexion::getInstance()->getConexion();
    }

    public function listParameter($parameter)
	{
        $query = "select * from tipo_usuario where id_tipo_usuario = ".$parameter;
        $result = pg_query($this->conn, $query);
        $tipo_usuario = null;
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $tipo_usuario = new TipoUsuario();
                $tipo_usuario->setId_tipo_usuario($info[0]);
                $tipo_usuario->setNombre_tipo_usuario($info[1]);
                $tipo_usuario->setDescripcion_tipo_usuario($info[2]);
            }
            //pg_close($this->conn);
            return $tipo_usuario;
        }
    }

    public function getTipoUsuario($parameter)
	{
        $result = pg_query($this->conn, $parameter);
        $tipo_usuario = null;
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $tipo_usuario = new TipoUsuario();
                $tipo_usuario->setId_tipo_usuario($info[0]);
                $tipo_usuario->setNombre_tipo_usuario($info[1]);
                $tipo_usuario->setDescripcion_tipo_usuario($info[2]);
                $datos[] = array(
                    "success" => true,
                    "tipo_usuario" => $tipo_usuario,
                );
            }

            //pg_close($this->conn);
            return $datos;
        }
    }
}