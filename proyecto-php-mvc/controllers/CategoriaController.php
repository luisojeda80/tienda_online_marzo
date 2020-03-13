<?php 

require_once 'models/categoria.php';


class categoriaController{
	
		public function index(){
			$categoria = new Categoria();
			$categorias = $categoria->getAll();

			require_once 'views/categoria/index.php';
		}

		public function crear(){
			Utils::isAdmin();

			require_once 'views/categoria/crear.php';
		}

	public function save(){
		Utils::isAdmin();
		//Guardar Categoria
		if(isset($_POST)){
			$categoria = new Categoria();
			$categoria->setNombre($_POST['nombre']);

			$save = $categoria->save();

		//Volver al Index
		header("Location:".base_url."categoria/index");
		}
	}
}

?>
