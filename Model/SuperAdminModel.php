<?php

require_once "Conexion.php";
require_once "LoginUsuarioModel.php";
require_once "./../../Class/Persona.php";

class SuperAdminModel
{
    static public function saveNew($objeto1, $objeto2)
    {
        $querySql = "insert into super_administrador (nombres_superadmin, cedula_superadmin) values
         (:nombres_superadmin, :cedula_superadmin)";
        $base = Conexion::conectar();
        $base->beginTransaction();
        $query = $base->prepare($querySql);
        $query->bindParam(":nombres_superadmin", $objeto1->str_nombres_superadmin, PDO::PARAM_STR);
        $query->bindParam(":cedula_superadmin", $objeto1->str_cedula_superadmin, PDO::PARAM_STR);
        $lastId = 0;
        try{
            $query->execute();
            $lastId = $base->lastInsertId();
            $base->commit();
            $result = LoginUsuarioModel::saveNew(null, $lastId, $objeto2);
            if($result){
                return $result;
            }
            else
            {
                $base->rollBack();
                return null;
            }
        }
        catch(PDOException $e)
        {
            $base->rollBack();
            return $e->getMessage();
        }
    }
}