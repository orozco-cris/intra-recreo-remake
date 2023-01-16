<?php

require_once "./../../Model/PersonaModel.php";
require_once "./../../Model/SuperAdminModel.php";
require_once "./../../Model/Conexion.php";

require_once "./../../vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
/*require_once "./../Class/Usuario.php";
require_once "./../Class/TipoUsuario.php";
require_once "./../Controller/TipoUsuarioController.php";
require_once "./../Class/Empresas.php";
require_once "./../Controller/EmpresaController.php"; */
//session_start();

class PersonaController
{
    public function loginPost($json)
    {
        if(isset($json['json']))
        {
            $objJson = json_decode($json['json']);
            switch($objJson->method)
            {
                case 'getPorId':
                    $result = PersonaModel::readOne($objJson->objeto);
                    if($result)
                    {
                        $objetoJson = $result->toJSON();
                        $this->fnReturnJson(200, $objetoJson);
                    }else
                    {
                        $this->fnReturnJson(500, null);
                    } 
                break;
                case 'registroSuperAdmin':
                    $clave = $objJson->objeto2->str_clave_login;
                    $claveEn = crypt($clave, '$6$rounds=5000$tecentel+2022$');
                    $objJson->objeto2->str_clave_login = $claveEn;
                    $result = SuperAdminModel::saveNew($objJson->objeto1, $objJson->objeto2);
                    if($result)
                    {
                        $objetoJson = $result;
                        $this->fnReturnJson(200, $objetoJson);
                    }else
                    {
                        $this->fnReturnJson(500, null);
                    }
                    break; 
                case 'loginSuperAdmin':
                    $clave = $objJson->objeto->str_clave_login;
                    $claveEn = crypt($clave, '$6$rounds=5000$tecentel+2022$');
                    $objJson->objeto->str_clave_login = $claveEn;
                    $result = LoginUsuarioModel::loginSuperAdmin($objJson->objeto);
                    if($result)
                    {
                        $key = "tecentel+2022";
                        $token = Conexion::setToken($result, $objJson->objeto);
                        $jwt = JWT::encode($token, $key, 'HS256');
                        $tokens = array(
                            "token" => $jwt,
                            "token_exp" => $token["exp"]
                        );
                        $update = LoginUsuarioModel::updateToken($tokens, $result);

                        $this->fnReturnJson(200, $update);
                    }else
                    {
                        $this->fnReturnJson(500, null);
                    }
                    break;
            }  
        }else{
            $this->fnReturnJson(422, null);
        }
        
    }

    /* public function savePerson($json)
    {
        if($json['json']){
            echo 'correcto';
        }else{
            $data = [
                'status' => 422,
                'message' => 'La información es incorrecta',
            ];
            header('HTTP/1.0 422 Unprocessable Entity');
            echo json_encode($data);
            exit();
        }
    } */

    public function loginGet($json)
    {
        if(isset($json['json']))
        {
            $objJson = json_decode($json['json']);
            switch($objJson->method)
            {
                case 'getPorId':
                    $result = PersonaModel::readOne($objJson->objeto);
                    if($result)
                    {
                        $objetoJson = $result->toJSON();
                        $this->fnReturnJson(200, $objetoJson);
                    }else
                    {
                        $this->fnReturnJson(500, null);
                    } 
                break;
            }  
        }else{
            $this->fnReturnJson(422, null);
        }
    }

    public function fnReturnJson($status, $objeto)
    {
        switch($status)
        {
            case 200:
                $data = array(
                    "status" => $status,
                    "message" => 'Success',
                    "result" => $objeto
                );
                echo json_encode($data, http_response_code($data["status"]));
                break;
            case 422:
                $data = array(
                    'status' => $status,
                    'message' => 'Data is wrong',
                );
                echo json_encode($data, http_response_code($data["status"]));
                break;
            case 500:
                $data = [
                    'status' => $status,
                    'message' => 'Internal Server Error'
                ];
                echo json_encode($data, http_response_code($data["status"]));
                break;
        }

    }
//-------------------------------------------------OLD---------------------------------------------------------
     

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

	public function listParameter($parameter)
	{
        if($parameter!=null){        
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
                /* $datos[] = array(
                    "success" => true,
                    "usuario"=>$usuario,
                    "tipo_usuario"=>$tipo_usuario
                ); */
            }
            //pg_close($this->conn);
            return $usuario;
        }
    }
        else{
            return null;
        }
           
    }


    public function UsuarioEmpresa($query)
	{
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
                $con_empr= new EmpresaController();
                $empresa=new Empresas();
                $empresa=$con_empr->listEmpresaUsuario($info[0]);
                $usuario->setId_usuario($info[0]);
                $usuario->setId_tipo_usuario($tipo_usuario);
                $usuario->setNombre_usuario($info[2]);
                $usuario->setApellido_usuario($info[3]);
                $usuario->setCedula_usuario($info[4]);
                $usuario->setLogin_usuario($info[5]);
                $usuario->setClave_usuario($info[6]);
                $usuario->setCorreo_usuario($info[7]);
                $usuario->setDireccion_usuario($info[8]);
                if($empresa!=null){
                    $datos[] = array(
                        "success" => true,
                        "usuario" => $usuario,
                        "tipo_usuario"=> $tipo_usuario,
                        "empresa"=> $empresa
                    );
                }else{
                    $empresa=new Empresas();
                    $empresa->setNombre_Comercial(null);
                    $datos[] = array(
                        "success" => true,
                        "usuario" => $usuario,
                        "tipo_usuario"=> $tipo_usuario,
                        "empresa"=> $empresa
                    );
                }
                
            }
            //pg_close($this->conn);
            return $datos;
        }
    }


	public function UsuarioTipo($query)
	{
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
                $datos[] = array(
                    "success" => true,
                    "usuario" => $usuario,
                    "tipo_usuario"=> $tipo_usuario,
                );
            }
            //pg_close($this->conn);
            return $datos;
        }
    }

    public function createCliente($cliente)
    {
        $query = "insert into usuario
         (id_tipo_usuario,nombre_usuario,apellido_usuario,cedula_usuario,login_usuario,
         clave_usuario,correo_usuario,direccion_usuario,estado_usuario) values 
        (".$cliente->getId_tipo_usuario().",'".$cliente-> getNombre_usuario()."',
        '".$cliente->getApellido_usuario()."','".$cliente-> getCedula_usuario()."',
        '".$cliente->getLogin_usuario()."','".$cliente-> getClave_usuario()."',
        '".$cliente->getCorreo_usuario()."','".$cliente-> getDireccion_usuario()."',
        '".$cliente->getEstado_usuario()."')";
   
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }

    public function eliminarUsuario($usuario)
    {
        $query = "update usuario set estado_usuario=0 where id_usuario=".$usuario."";
        //echo $query;
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        
        return $result;
    }

    public function modificarUsuario($usuario)
    {
        $query = "update usuario set id_tipo_usuario=".$usuario->getId_tipo_usuario().",
                                    nombre_usuario='".$usuario-> getNombre_usuario()."',
                                    apellido_usuario='".$usuario-> getApellido_usuario()."',
                                    cedula_usuario='".$usuario-> getCedula_usuario()."',
                                    login_usuario='".$usuario-> getLogin_usuario()."',
                                    clave_usuario='".$usuario-> getClave_usuario()."',
                                    correo_usuario='".$usuario-> getCorreo_usuario()."',
                                    direccion_usuario='".$usuario-> getDireccion_usuario()."',
                                    estado_usuario=".$usuario-> getEstado_usuario()."
                        where id_usuario=".$usuario->getId_usuario()."";
        echo $query;
        $result = pg_query($this->conn, $query);
        //pg_close($this->conn);
        return $result;
    }

    public function verificarUsuarioEliminar($usuario)
    {
        $query = "select *from usuario as u inner join empresa as e
                    on u.id_usuario=e.id_usuario where u.id_usuario=".$usuario."";
        //echo $query;
        $result = pg_query($this->conn, $query);
        $var=0;
        if(pg_num_rows($result) > 0)
		{
            $var=1;
        }
        //print_r($result);
        //pg_close($this->conn);
        return $var;
    }



    
}

?>