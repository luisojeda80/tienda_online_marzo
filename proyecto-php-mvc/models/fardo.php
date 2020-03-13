<?php 

class Fardo{
	private $id_fardo;
	private $nro_fardo;
	private $db;

	public function __construct() {
		$this->db = Database::connect(); 
	}

		function getId()
			{
				return $this->id;
			}

		function getNombre()
			{
				return $this->nombre;
			}


		function setId($id)
			{
				$this->id = $id;
			}


		function setNombre($nombre)
		{
			$this->nombre = $this->db->real_escape_string($nombre);
		}

	public function getAll(){
					//$sql = "SELECT * FROM categorias WHERE id = 2;";
					//$categorias = $this->db->query($sql);
			$categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
			return $categorias;
			}

	public function save(){
		$sql = "INSERT INTO categorias VALUES(NULL,'{$this->getNombre()}');";
		$save = $this->db->query($sql);

	$resultado = false;

	if($save){
		$resultado=true;
	}
		return $resultado;
	}
}