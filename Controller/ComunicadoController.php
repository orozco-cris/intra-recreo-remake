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
                $comunicado->setTipo_comunicado($info[14]);
            }
            //pg_close($this->conn);
            return $comunicado;
        }
    }

    public function listAll()
	{
        $query = "select * from comunicado order by id_comunicado desc limit 25";
        $result = pg_query($this->conn, $query);
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $datos[] = array(
                    "success" => true,
                    "id_comunicado" => $info[0],
                    "id_usuario_creador" => $info[1],
                    "de_comunicado" => $info[2],
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
					"foto_comunicado" => $info[13]
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

    public function getComunicados($query)
    {
        $result = pg_query($this->conn, $query);
        $datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $obj_comunicado = new Comunicado();
                $con_usuario = new UsuarioController();
                $usuario = $con_usuario->listParameter($info[1]);
                $obj_comunicado->setId_comunicado($info[0]);
                $obj_comunicado->setId_usuario_creador($con_usuario);
                $obj_comunicado->setDe_comunicado($info[2]);
                $obj_comunicado->setPara_comunicado($info[3]);
                $obj_comunicado->setCodigo_comunicado($info[4]);
                $obj_comunicado->setAsunto_comunicado($info[5]);
                $obj_comunicado->setMensaje_comunicado($info[6]);
                $obj_comunicado->setDetalle_comunicado($info[7]);
                $obj_comunicado->setDia_comunicado($info[8]);
                $obj_comunicado->setMes_comunicado($info[9]);
                $obj_comunicado->setAnio_comunicado($info[10]);
                $obj_comunicado->setHora_comunicado($info[11]);
                $obj_comunicado->setFecha_caducidad_comunicado($info[12]);
                $obj_comunicado->setFoto_comunicado($info[13]);
                $obj_comunicado->setTipo_comunicado($info[14]);
                $datos[] = array(
                    "success" => true,
                    "comunicado" => $obj_comunicado
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

    public function listParameterComunUsuari($parameter)
	{
        $query = "select * from comunicado_usuario where id_comunicado = ".$parameter;
        $result = pg_query($this->conn, $query);
        $comunicado_usuario=null;
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $usuario = new Usuario();
                $con_usuario = new UsuarioController();
                $usuario = $con_usuario->listParameter($info[2]);
                $comunicado_usuario =new ComunicadoUsuario();
                $comunicado_usuario ->setId_comunicado_usuario($info[0]);
                $comunicado_usuario ->setId_usuario($usuario);
                $comunicado_usuario ->setId_comunicado($info[1]);
                $comunicado_usuario ->setRevision($info[3]);
            }
            //pg_close($this->conn);
           
            return $comunicado_usuario;
        }
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
        echo $query;
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

    public function updatePermiso($comunicado)
    {
        print_r($comunicado);
        $query = "update comunicado set de_comunicado='".$comunicado->getDe_comunicado()."',
         para_comunicado='".$comunicado->getPara_comunicado()."',
         asunto_comunicado='".$comunicado->getAsunto_comunicado()."',
         detalle_comunicado='".$comunicado->getDetalle_comunicado()."',
         foto_comunicado='".$comunicado->getFoto_comunicado()."',
         codigo_comunicado='".$comunicado->getCodigo_comunicado()."'
         where id_comunicado=".$comunicado->getId_comunicado();
     
        echo $query;
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }

    
    public function getPermisosAprobadosNoAprobados($query)
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
}

?>