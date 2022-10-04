<?php 
/**
 * Description of AuditoriasController
 *
 * @author CRISTHIAN_OROZCO 2022-09-30
 */

require_once "./../Controller/Conexion.php";
require_once "./../Controller/ComunicadoController.php";
require_once "./../Controller/UsuarioController.php";
require_once "./../Class/Comunicado.php";
require_once "./../Class/Usuario.php";
require_once "./../Class/ComunicadoUsuario.php";

class ComunUsuaController extends Conexion
{
    private $conn;
    public function __construct()
    {
        $this->conn = Conexion::getInstance()->getConexion();
    }

    public function getComunicadosParaCliente($query)
    {
        $result = pg_query($this->conn, $query);
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $obj_comunicado = new Comunicado();
                $obj_usuario = new Usuario();
                $con_comunicado = new ComunicadoController();
                $con_usuario = new UsuarioController();
                $obj_comunicado = $con_comunicado->listParameter($info[1]);
                $obj_usuario = $con_usuario->listParameter($info[2]);
                $datos[] = array(
                    "success" => true,
                    "id_comunicado_usuario" => info[0],
                    "comunicado" => $obj_comunicado,
                    "cliente" => $obj_usuario,
                    "check" => $info[3]
                );
            }
        }
        else
		{
			$datos[] = array("success" => false);
		}
        pg_close($this->conn);
        return $datos;
    }

    public function listComunUsuarioByComunicado($parameter)
	{
        $query = "select * from comunicado_usuario where id_comunicado = ".$parameter;
        $result = pg_query($this->conn, $query);
        $comunicado = null;
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $usuario = new Usuario();
                $con_usuario = new UsuarioController();
                $usuario = $con_usuario->listParameter($info[2]);
                $comunicado_usuario = new ComunicadoUsuario();
                $comunicado_usuario->setId_comunicado_usuario($info[0]);
                $comunicado_usuario->setId_usuario($usuario);
                $comunicado_usuario->setId_comunicado($info[1]);
                $comunicado_usuario->setRevision($info[3]);
            }
            pg_close($this->conn);
            return $comunicado_usuario;
        }
    }
}

?>