<?php

class Conexion{
    static public function conectar()
    {
        $servidor = "127.0.0.1";
        $puerto = "5432";
        $nombreBaseDatos = "intradbcc";
        $usuario = "admindbcc";
        $clave="passdbcc+2022";
        try {
            $link = new PDO("pgsql:host=$servidor;port=$puerto;dbname=$nombreBaseDatos", $usuario, $clave);
            $link->exec("set names utf8");
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $link;
        }catch(PDOException $e) {
            die("Ocurrió un error con la base de datos: " . $e->getMessage());
        } 
    }

    static public function setToken($id, $objeto)
    {
        $time = time();
        $token = array(
            "iat" => $time,
            "exp" => $time + (60*60), //tiempo que expira, 1 hora 
            "data" => [
                "id" => $id,
                "nombre_usuario" => $objeto->str_nombre_login
            ]
        );
        return $token;
    }

}