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
        /* $this->db_host= "127.0.0.1";
        $this->db_port="3306";
        $this->db_user="root";
        $this->db_pass="";
        $this->db_name="camaras_accesodb_2";
		$this->conn = mysqli_connect("127.0.0.1", "root", "", "camaras_accesodb_2", "3306") or die(mysql_error()); */
        $this->db_host="127.0.0.1";
		$this->db_port="5432";
		$this->db_user="ADMrecreo";
		$this->db_pass="RecreoIntraRemake+2022";
		$this->db_name="intra_recreo_remake";
		$this->conn = pg_connect("host=127.0.0.1 user=adminrecreo password=recreointraremake+2022 dbname=remake_intra_recreo port=5432") or die("No se ha podido establecer la conexion con la base de datos :( dbc");
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