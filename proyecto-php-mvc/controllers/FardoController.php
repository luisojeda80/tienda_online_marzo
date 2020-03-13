<?php 

require_once 'models/fardo.php';


class fardoController{
	
		public function index(){
			$fardo = new Fardo();
			$fardo = $fardo->getAll();

			require_once 'views/fardo/index.php';
		}

		public function crear(){
			Utils::isAdmin();

			require_once 'views/fardo/crear.php';
		}

	public function save(){
		Utils::isAdmin();
		//Guardar Fardo
		if(isset($_POST)){
			$fardo = new Categoria();
			$fardo->setNombre($_POST['nombre']);

			$save = $categoria->save();

		//Volver al Index
		header("Location:".base_url."fardo/index");
		}
	}
}

?>