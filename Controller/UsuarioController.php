<?php

require_once "./../Controller/Conexion.php";
require_once "./../Class/Usuario.php";
require_once "./../Class/TipoUsuario.php";
require_once "./../Controller/TipoUsuarioController.php";
//session_start();

class UsuarioController extends Conexion
{
    private $conn;
	public function __construct()
	{
		$this->conn = Conexion::getInstance()->getConexion();
	}

     public function readOne($query)
	{
		$result = pg_query($this->conn, $query);
		$usuarios = null;
		if(pg_num_rows($result) > 0)
		{
			while($info = pg_fetch_array($result))
			{
				$usuarios = new Usuario();
				$usuarios->setId_usuario($info[0]);
				$usuarios->setId_tipo_usuario($info[1]);
				$usuarios->setNombre_usuario(utf8_encode($info[2]));
				$usuarios->setApellido_usuario(utf8_encode($info[3]));
				$usuarios->setCedula_usuario($info[4]);
				$usuarios->setLogin_usuario($info[5]);
				$usuarios->setClave_usuario($info[6]);
				$usuarios->setCorreo_usuario($info[7]);				
				$usuarios->setEstado_usuario($info[9]);
			}
		}
		//pg_close($this->conn);
		//$this->conn->next_result();
		//implode ($usuarios);
		return $usuarios;
	} 

	public function listClientes($query)
	{
		$result = pg_query($this->conn, $query);
		$datos = array();
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $datos[] = array(
                    "success" => true,
                    "id_usuario" => $info[0],
                    "id_tipo_usuario" => $info[1],
                    "nombre_usuario" => $info[2],
                    "apellido_usuario" => $info[3],
                    "cedula_usuario" => $info[4],
					"login_usuario" => $info[5],
                    "clave_usuario" => $info[6],
					"correo_usuario" => $info[7],
                    "direccion_usuario" => $info[8],
					"estado_usuario" => $info[9]
                );
            }
        }
        else
		{
			$datos[] = array("success" => false);
		}
		pg_close($this->conn);
		//$this->conn->next_result();
		return $datos;
	}

	/* public function create($nombreDia, $dia, $mes, $anio, 
	$A0, $A1, $A2, $A3, $A4, $A5, $A6, $A7, $A8, $posterior0, $subAnt, $subMega)
	{
		$dia = intval($dia);
        $mes = intval($mes);
        $anio = intval($anio);
		$A0 = intval($A0);
        $A1 = intval($A1);
        $A2 = intval($A2);
        $A3 = intval($A3);
        $A4 = intval($A4);
		$A5 = intval($A5);
        $A6 = intval($A6);
        $A7 = intval($A7);
        $A8 = intval($A8);
		$posterior0 = intval($posterior0);
        $subAnt = intval($subAnt);
        $subMega = intval($subMega);
        $conFecha = new FechaController();

		$idFecha = $conFecha->consultaFecha($nombreDia, $dia, $mes, $anio, 5);
        $idUsuario = $_SESSION["usuario"];
        if($idFecha != 0)
        {
            $query = "insert into valor(idAcceso, idFecha, idUsuario, valor) 
            values (11, ".$idFecha.", ".$idUsuario.", ".$A0.")";
            $result = $this->conn->query($query);
            if($result)
            {
                $query = "insert into valor(idAcceso, idFecha, idUsuario, valor) 
                values (1, ".$idFecha.", ".$idUsuario.", ".$A1.")";
                $result = $this->conn->query($query);
                if($result)
                {
                    return "ok";
                }
            }  
		    else
            {
                return "nok";
            }  
        }
        else
            {
                return "nok";
            } 
		$result->close();
		$this->conn->next_result();
	}

	public function edit($A0, $A1, $A2, $A3, $A4, $A5, $A6, 
	$A7, $A8, $posterior0, $subAnt, $subMega, $fecha)
	{
		$A0 = intval($A0);
        $A1 = intval($A1);
        $A2 = intval($A2);
        $A3 = intval($A3);
        $A4 = intval($A4);
		$A5 = intval($A5);
        $A6 = intval($A6);
        $A7 = intval($A7);
        $A8 = intval($A8);
		$posterior0 = intval($posterior0);
        $subAnt = intval($subAnt);
        $subMega = intval($subMega);
        $idFecha = intval($fecha);
        $idUsuario = $_SESSION["usuario"];
		
		$query = "select * from usuario 
			where idUsuario = ".$idUsuario." and rol = 'VIS'";
		$result = $this->conn->query($query);
		if($result->num_rows > 0)
		{
			return "vnok";
		}else{
			if($idFecha != 0)
			{
			}
			else
				{
					return "nok";
				} 
		}
        
		$result->close();
		$this->conn->next_result();
	} */

	public function listParameter($parameter)
	{
        $query = "select * from usuario where id_usuario = ".$parameter;
		$result = pg_query($this->conn, $query);
        $usuario = null;
        if(pg_num_rows($result) > 0)
		{
            while($info = pg_fetch_array($result))
			{
                $tipo_usuario = new TipoUsuario();
                $con_tipo_usuario = new TipoUsuarioController();
                $tipo_usuario = $con_tipo_usuario->listParameter($info[1]);

				$usuario = new Usuario();
                $usuario->setId_usuario($info[0]);
                $usuario->setId_tipo_usuario($tipo_usuario);
                $usuario->setNombre_usuario($info[2]);
                $usuario->setApellido_usuario($info[3]);
                $usuario->setCedula_usuario($info[4]);
                $usuario->setLogin_usuario($info[5]);
                $usuario->setClave_usuario($info[6]);
                $usuario->setCorreo_usuario($info[7]);
                $usuario->setDireccion_usuario($info[8]);
            }
            pg_close($this->conn);
            return $usuario;
        }
    }

}

?>