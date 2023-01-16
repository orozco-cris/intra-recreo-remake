<?php

require_once "Conexion.php";
require_once "./../../Class/Persona.php";

class LoginUsuarioModel
{
    static public function saveNew($persona, $superadmin, $objeto)
    {
        $querySql = "insert into login_usuario 
        (id_persona, token, token_exp, nombre_login, clave_login, id_super_admin, ultima_conexion, fecha_creacion, fecha_actualizacion)
         values
         (:id_persona, :token, :token_exp, :nombre_login, :clave_login, :id_super_admin, :ultima_conexion, :fecha_creacion, :fecha_actualizacion)";
        $base = Conexion::conectar();
        $base->beginTransaction();
        $query = $base->prepare($querySql);
        $anio = date('Y-d-m h:i:s');  
        $query->bindParam(":id_persona", $persona, PDO::PARAM_INT);
        $query->bindParam(":token", $objeto->str_token, PDO::PARAM_STR);
        $query->bindParam(":token_exp", $objeto->str_token_exp, PDO::PARAM_STR);
        $query->bindParam(":nombre_login", $objeto->str_nombre_login, PDO::PARAM_STR);
        $query->bindParam(":clave_login", $objeto->str_clave_login, PDO::PARAM_STR);
        $query->bindParam(":id_super_admin", $superadmin, PDO::PARAM_INT);
        $query->bindParam(":ultima_conexion", $anio, PDO::PARAM_STR);
        $query->bindParam(":fecha_creacion", $anio, PDO::PARAM_STR);
        $query->bindParam(":fecha_actualizacion", $anio, PDO::PARAM_STR);
        try{
            $query->execute();
            $base->commit();
            return 'Success';
        }
        catch(PDOException $e)
        {
            $base->rollBack();
            return $e->getMessage();
        }
    }

    static public function loginSuperAdmin($objeto)
    {
        $querySql = "select * from login_usuario where nombre_login = :nombre_login and clave_login =:clave_login";
        $base = Conexion::conectar();
        $base->beginTransaction();
        $query = $base->prepare($querySql);
        $query->bindParam(":nombre_login", $objeto->str_nombre_login, PDO::PARAM_STR);
        $query->bindParam(":clave_login", $objeto->str_clave_login, PDO::PARAM_STR);
        $id_result = 0;
        try{
            $query->execute();
            $base->commit();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount() > 0)
            {
                foreach($result as $row)
                {
                    $id_result = $row->id_login_usuario;
                }
                $query->closeCursor();
                $query = null;
                return $id_result;
            }
            else{
                return null;
            }
        }
        catch(PDOException $e)
        {
            $base->rollBack();
            return $e->getMessage();
        }  
    }

    static public function updateToken($datos, $id)
    {
        $querySql = "update login_usuario set token = :token, token_exp = :token_exp 
        where id_login_usuario = :id_login_usuario";
        $base = Conexion::conectar();
        $base->beginTransaction();
        $query = $base->prepare($querySql);
        $query->bindParam(":token", $datos['token'], PDO::PARAM_STR);
        $query->bindParam(":token_exp", $datos['token_exp'], PDO::PARAM_STR);
        $query->bindParam(":id_login_usuario", $id, PDO::PARAM_INT);
        $id_result = 0;
        try{
            $query->execute();
            $base->commit();
            $query->closeCursor();
            $query = null;
            return 'Success';
        }
        catch(PDOException $e)
        {
            $base->rollBack();
            return $e->getMessage();
        }  
    } 
}