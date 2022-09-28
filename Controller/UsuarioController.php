<?php

require_once "./../Controller/Conexion.php";
require_once "./../Class/Usuario.php";
//require_once "./../Controller/FechaController.php";
//session_start();

class UsuarioController extends Conexion
{
    private $conn;
	public function __construct()
	{
		$this->conn = Conexion::getInstance()->getConexion();
	}

    /* public function readOne($query)
	{
		$result = $this->conn->query($query);
		$usuarios = null;
		if($result->num_rows > 0)
		{
			while ($info = mysqli_fetch_array($result)) 
			{
				$usuarios = new Usuario();
				$usuarios->setIdUsuario($info[0]);
				$usuarios->setNombre(utf8_encode($info[1]));
				$usuarios->setApellido(utf8_encode($info[2]));
				$usuarios->setCedula($info[3]);
				$usuarios->setClave($info[4]);
				$usuarios->setContacto($info[5]);
				$usuarios->setRol($info[6]);
				$usuarios->setEstado($info[7]);
			}
		}
		$result->close();
		$this->conn->next_result();
		return $usuarios;
	} */

	public function listClientes($query)
	{
		//$result = $this->conn->query("select * from usuario");
		$conect = new Conexion();
		$conect2 = $conect->getConexion(); 
		$result = pg_query($conect2, "select * from usuario");
		$datos = array();
        if($result)
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
        //$result->close();
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

}

?>