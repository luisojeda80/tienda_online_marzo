<?php 

	class Producto{
		private $id;
		private $categoria;
		private $nombre;
		private $descripcion;
		private $precio;
		private $stock;
		private $oferta;
		private $fecha;
		private $imagen;
		private $db;

		public function __construct() {
			$this->db = Database::connect(); 
		}

		function getId()
		{
			return $this->id;
		}

		function getCategoriaId()
		{
			return $this->categoria;
		}

		function getNombre()
		{
			return $this->nombre;
		}

		function getDescripcion()
		{
			return $this->descripcion;
		}

		function getPrecio()
		{
			return $this->precio;
		}

		function getStock()
		{
			return $this->stock;
		}

		function getOferta()
		{
			return $this->oferta;
		}

		function getFecha()
		{
			return $this->fecha;
		}

		function getImagen()
		{
			return $this->imagen;
		}

		function setId($id)
		{
			$this->id = $id;
		}

		function setCategoriaId($categoria)
		{
			$this->categoria = $this->db->real_escape_string($categoria);
		}


		function setNombre($nombre)
		{
			$this->nombre = $this->db->real_escape_string($nombre);
		}

		function setDescripcion($descripcion)
		{
			$this->descripcion = $this->db->real_escape_string($descripcion);
		}

		function setPrecio($precio)
		{
			$this->precio = $this->db->real_escape_string($precio);
		}

		function setStock($stock)
		{
			$this->stock = $this->db->real_escape_string($stock);
		}

		function setOferta($oferta)
		{
			$this->oferta = $this->db->real_escape_string($oferta);
		}

		function setFecha($fecha)
		{
			$this->fecha = $this->db->real_escape_string($fecha);
		}

		function setImagen($imagen)
		{
			$this->imagen = $imagen;
		}

	public function getAll(){
			$productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
			return $productos;
	}


	public function getOne(){
			$producto = $this->db->query("SELECT * FROM productos WHERE id = ($this->getId());");
			return $productos->fetch_object();
	}

	public function save(){
		$sql = "INSERT INTO productos VALUES(NULL,'{$this->getCategoriaId()}','{$this->getNombre()}','{$this->getDescripcion()}','{$this->getPrecio()}','{$this->getStock()}','{$this->getOferta()}','{$this->getFecha()}','{$this->getImagen()}');";
		$save = $this->db->query($sql);

		$resultado = false;

		if($save){
			$resultado=true;
		}
			return $resultado;
	}

	public function edit(){
		$sql = "INSERT INTO productos VALUES(NULL,'{$this->getCategoriaId()}','{$this->getNombre()}','{$this->getDescripcion()}','{$this->getPrecio()}','{$this->getStock()}','{$this->getOferta()}','{$this->getFecha()}','{$this->getImagen()}');";
		$save = $this->db->query($sql);

		$resultado = false;

		if($save){
			$resultado=true;
		}
			return $resultado;
	}

	public function delete(){
		$sql = "DELETE FROM productos WHERE id={$this->id}";
		$delete = $this->db->query($sql);

		$resultado = false;

		if($delete){
			$resultado=true;
		}
			return $resultado;
	}
}

?>