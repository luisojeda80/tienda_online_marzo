<?php

require_once 'models/productos.php';

class productoController{

	public function index(){

		require_once 'views/productos/destacados.php';

	}

	public function gestion(){
		Utils::isAdmin();

		$producto = new Producto();
		$productos = $producto->getAll();
		require_once 'views/productos/gestion.php';
	}

	public function crear(){
		Utils::isAdmin();

		require_once 'views/productos/crear.php';
	}
	

	public function save(){
		Utils::isAdmin();
		if(isset($_POST)){
			$categoria = isset($_POST['categoria'])? $_POST['categoria'] : false;
			$nombre = isset($_POST['nombre'])? $_POST['nombre'] : false;
			$descripcion = isset($_POST['descripcion'])? $_POST['descripcion'] : false;
			$precio = isset($_POST['precio'])? $_POST['precio'] : false;
			$stock = isset($_POST['stock'])? $_POST['stock'] : false;


			if($categoria && $nombre && $descripcion && $precio && $stock){
				$producto = new Producto();
				$producto->setCategoriaId($_POST['categoria']);
				$producto->setNombre($_POST['nombre']);
				$producto->setDescripcion($_POST['descripcion']);
				$producto->setPrecio($_POST['precio']);
				$producto->setStock($_POST['stock']);
				$producto->setOferta($_POST['oferta']);
				$producto->setFecha($_POST['fecha']);
				$producto->setImagen($_POST['imagen']);


				//

				$file = $_FILES['imagen'];
				$filename = $file['name'];
				$mimetype = $file['type'];

				if($mimetype == "image/jpg"||$mimetype == "image/jpeg"||$mimetype == "image/png"){

					if(!is_dir('uploads/images')){

						mkdir('uploads/images',0777,true);
					}
					move_uploaded_file($file['tmp_name'],'uploads/image'.$filename);
					$producto->setImagen($filename);
				} 

				$save = $producto->save();
				
				if($save){
					$_SESSION['producto'] = "complete";
				}else{
					$_SESSION['producto'] = "failed";
				}
			}else{
				$_SESSION['producto'] = "failed";
			}
		}else{
			$_SESSION['producto'] = "failed";
		}
		header("Location:".base_url."producto/gestion");
	}

	public function editar(){
		Utils::isAdmin();

		if(isset($_GET["id"])){
			$id = $_GET["id"];
			$editar = true;

			$producto = new Producto();
			$producto->setId($id);
			$pro = $producto->getOne();

			require_once 'views/productos/crear.php';
		}else{
			header("Location:".base_url."producto/gestion");
		}
	}			

	public function eliminar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$producto = new Producto();
			$producto->setId($id);

			$delete = $producto->delete();
				if($delete){
					$_SESSION['eliminar'] = "complete";
				}else{
					$_SESSION['eliminar'] = "failed";
				}
			}else{
					$_SESSION['eliminar'] = "failed";
				}
		header("Location:".base_url."producto/gestion");
	}
}
