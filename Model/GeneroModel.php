<?php

require_once "Conexion.php";
require_once "./../../Class/Persona.php";
require_once "./../../Class/Genero.php";

class GeneroModel
{
    static public function saveGenero($objeto)
    {
        $query = "insert into genero (nombre_genero, descripcion_genero) values
         ('".$objeto->str_nombre_genero."', '".$objeto->str_descripcion_genero."')";
        Conexion::conectar()->beginTransaction();
        $query = Conexion::conectar()->prepare($query);
        try{
            $query->execute();
            $query->closeCursor();
            $query = null;
            return 'Success';
        }
        catch(Exception $e)
        {
            Conexion::conectar()->rollBack();
            return 'Error: '.$e->getMessage();
        }
        
    }
}