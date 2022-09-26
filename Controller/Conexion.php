<?php
/**
 * Description of Conexion
 *
 * @author CRISTHIAN_OROZCO 2022-06-06
 */
class Conexion 
{
	private $conn;
	private static $instance;
    private $db_host;
    private $db_port;
    private $db_user;
    private $db_pass;
    private $db_name;
	public function __construct()
	{
        $this->db_host= "127.0.0.1";
        $this->db_port="3306";
        $this->db_user="root";
        $this->db_pass="";
        $this->db_name="camaras_accesodb_2";
		$this->conn = mysqli_connect("127.0.0.1", "root", "", "camaras_accesodb_2", "3306") or die(mysql_error());
        //pg_connect("host=sheep port=5432 dbname=mary user=lamb password=foo");
        //Este sistema está hecho con mysql pero en lo preferible 
        //debe hacerse con postgres con la línea de arriba (Comprobar OJO)
    }

	public function getConexion()
	{
		return $this->conn;
	}

	public static function getInstance()
	{
		if(self::$instance == null)
		{
			self::$instance = new self();
		}
		return self::$instance;
	}
}

?>