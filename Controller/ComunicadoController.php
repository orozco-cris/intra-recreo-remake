<?php 
/**
 * Description of ComunicadoController
 *
 * @author CRISTHIAN_OROZCO 2022-09-30
 */

require_once "./../Controller/Conexion.php";
require_once "./../Controller/ComunUsuaController.php";
require_once "./../Controller/UsuarioController.php";
require_once "./../Class/Comunicado.php";
require_once "./../Class/Usuario.php";
require_once "./../Class/ComunicadoUsuario.php";

class ComunicadoController extends Conexion
{
    private $conn;
    public function __construct()
    {
        $this->conn = Conexion::getInstance()->getConexion();
    }

    public function listParameter($parameter)
	{
        $query = "select * from comunicado where id_comunicado = ".$parameter;
        $result = pg_query($this->conn, $query);
        $comunicado = null;
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $usuario = new Usuario();
                $con_usuario = new UsuarioController();
                $usuario = $con_usuario->listParameter($info[1]);
                $comunicado = new Comunicado();
                $comunicado->setId_comunicado($info[0]);
                $comunicado->setId_usuario_creador($usuario);
                $comunicado->setDe_comunicado($info[2]);
                $comunicado->setPara_comunicado($info[3]);
                $comunicado->setCodigo_comunicado($info[4]);
                $comunicado->setAsunto_comunicado($info[5]);
                $comunicado->setMensaje_comunicado($info[6]);
                $comunicado->setDetalle_comunicado($info[7]);
                $comunicado->setDia_comunicado($info[8]);
                $comunicado->setMes_comunicado($info[9]);
                $comunicado->setAnio_comunicado($info[10]);
                $comunicado->setHora_comunicado($info[11]);
                $comunicado->setFecha_caducidad_comunicado($info[12]);
                $comunicado->setFoto_comunicado($info[13]);
            }
            pg_close($this->conn);
            return $comunicado;
        }
    }

    public function getPermisosParaCliente($query)
    {
        $result = pg_query($this->conn, $query);
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $obj_comunicado_usuario = new ComunicadoUsuario();
                $con_comunicado_usuario = new ComunUsuaController();
                $obj_comunicado_usuario = $con_comunicado_usuario->listComunUsuarioByComunicado($info[0]);
                $datos[] = array(
                    "success" => true,
                    "id_comunicado" => $info[0],
                    "destinatario"=> $obj_comunicado_usuario,
                    "id_usuario_creador" => $info[1],
                    "de_comunicado"=> $info[2],
                    "para_comunicado" => $info[3],
                    "codigo_comunicado" => $info[4],
                    "asunto_comunicado" => $info[5],
                    "mensaje_comunicado" => $info[6],
                    "detalle_comunicado" => $info[7],
                    "dia_comunicado" => $info[8],
                    "mes_comunicado" => $info[9],
                    "anio_comunicado" => $info[10],
                    "hora_comunicado" => $info[11],
                    "fecha_caducidad_comunicado" => $info[12],
                    "foto_comunicado" => $info[13],
                    "tipo_comunicado" => $info[14]
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

    public function createPermiso($comunicado)
    {
        $query = "insert into comunicado (id_usuario_creador, de_comunicado, para_comunicado, 
        codigo_comunicado, asunto_comunicado, mensaje_comunicado, detalle_comunicado, dia_comunicado, 
        mes_comunicado, anio_comunicado, hora_comunicado, fecha_caducidad_comunicado, foto_comunicado, 
        tipo_comunicado) values 
        (".$comunicado->getId_usuario_creador().", '".$comunicado->getDe_comunicado()."', 
        '".$comunicado->getPara_comunicado()."', '".$comunicado->getCodigo_comunicado()."',
        '".$comunicado->getAsunto_comunicado()."', '".$comunicado->getMensaje_comunicado()."', 
        '".$comunicado->getDetalle_comunicado()."', ".$comunicado->getDia_comunicado().", 
        ".$comunicado->getMes_comunicado().", ".$comunicado->getAnio_comunicado().", 
        '".$comunicado->getHora_comunicado()."', '".$comunicado->getFecha_caducidad_comunicado()."', 
        '".$comunicado->getFoto_comunicado()."', '".$comunicado->getTipo_comunicado()."')";
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }

    public function getLastId()
    {
        $query = "select max(id_comunicado) from comunicado";
        $result = pg_query($this->conn, $query);
		$id = 0;
		if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
				$id = $info[0];
			}
		}
		//pg_close($this->conn);
		return $id;
    }
}

?>