<?php

require_once "Conexion.php";
require_once "./../../Class/Persona.php";

class PersonaModel
{
    static public function index($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
        $stmt->close();
        $stmt = null;
    }

    static public function readOne($objeto)
	{
        $query = "select * from persona where id_persona = :id_persona";
        Conexion::conectar()->beginTransaction();
        $query = Conexion::conectar()->prepare($query);
        $query->bindParam(":id_persona", $objeto->id_persona, PDO::PARAM_INT);
        try{
            $query->execute();
        }
        catch(PDOException $e)
        {
            return null;
        }        
        $result = $query->fetchAll(PDO::FETCH_OBJ);
		$persona = null;
		if($query->rowCount() > 0)
		{
            $persona = new Persona();
			foreach($result as $info)
			{
				$persona->setInt_id_persona($info->id_persona);
				$persona->setInt_id_tipo_identificacion($info->id_tipo_identificacion);
				$persona->setInt_id_genero($info->id_genero);
				$persona->setInt_id_centro_comercial($info->id_centro_comercial);
				$persona->setInt_id_rol_persona($info->nombres_persona);
				$persona->setInt_id_cliente($info->apellidos_persona);
				$persona->setInt_id_administrativo($info->direccion_persona);
				$persona->setInt_id_empresa($info->fecha_registro);				
				$persona->setStr_nombres_persona($info->estado_persona);
                $persona->setStr_apellidos_persona($info->estado_civil);
                $persona->setStr_direccion_persona($info->rol_persona);
                $persona->setDte_fecha_registro_persona($info->id_cliente);
                $persona->setBol_estado_persona($info->id_administrativo);
                $persona->setStr_estado_civil_persona($info->id_empresa);
			}
		}
        $query->closeCursor();
        $query = null;
		return $persona;
	} 


}