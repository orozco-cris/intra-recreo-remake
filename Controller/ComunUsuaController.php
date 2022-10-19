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
require_once "./../Class/TipoUsuario.php";

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
                    "id_comunicado_usuario" => $info[0],
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
            //pg_close($this->conn);
            return $comunicado_usuario;
        }
    }

    public function listadoPermSegOperaciones($query)
    {
        $query;
        $result = pg_query($this->conn, $query);
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $obj_comunicado = new Comunicado();
                $con_comunicado = new ComunicadoController();
                $obj_comunicado_usuario= new ComunicadoUsuario();
                $con_comunicado_usuario= new ComunicadoController();
                $obj_comunicado = $con_comunicado->listParameter($info[0]);
                $obj_comunicado_usuario = $con_comunicado_usuario->listParameterComunUsuari($info[0]);
                $datos[] = array(
                    "success" => true,
                    "comunicado" => $obj_comunicado,
                    "comunicado_usuario"=> $obj_comunicado_usuario,
                    "check" => $info[3]
                );
            }
        }
        else
		{
			$datos[] = array("success" => false);
		}
        //pg_close($this->conn);
        
        return $datos;
    }

    public function PermisoDeterminado($query)
    {        
        $result = pg_query($this->conn, $query);
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $obj_comunicado = new Comunicado();
                $con_comunicado = new ComunicadoController();
                $obj_comunicado = $con_comunicado->listParameter($info[0]);
                $datos[] = array(
                    "success" => true,
                    "comunicado" => $obj_comunicado,
                    "check" => $info[3]
                );
            }
        }
        else
		{
			$datos[] = array("success" => false);
		}
       //pg_close($this->conn);
        return $datos;
    }


    public function aceptarPermiso($query)
    {        
        $result = pg_query($this->conn, $query);
        $datos = array();
        if($result)
		{
            while($info = pg_fetch_array($result))
			{
                $datos[] = array(
                    "success" => true,
                    "check" => $info[3]
                );
            }
        }
        else
		{
			$datos[] = array("success" => false);
		}
       //pg_close($this->conn);
        return $datos;
    }

    public function create($comunicado_usuario)
    {
        $query = "insert into comunicado_usuario (id_comunicado, id_usuario, revision)
        values(".$comunicado_usuario->getId_comunicado().", 
        ".$comunicado_usuario->getId_usuario().", ".$comunicado_usuario->getRevision().")";
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }

}

?>