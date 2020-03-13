<?php 

require_once 'models/usuarios.php';

class usuarioController{	
	public function index()
	{
		echo "Controlador Usuario, Accion index";
	}

	public function registro(){
		require_once 'views/usuario/registro.php';
	}

	public function save(){

		if(isset($_POST)){
			$usuario = new Usuario();
			$usuario->setNombre($_POST['nombre']);
			$usuario->setApellidos($_POST['apellidos']);
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);

			$save = $usuario->save();

			if($save){
				$_SESSION['register'] = "complete";
			}else{
				$_SESSION['register'] = "failed";
			}
		}else{
			$_SESSION['register'] = "failed";
		}
		header("Location:".base_url.'usuario/registro');
	}


	public function login(){
		if(isset($_POST)){
			$usuario = new Usuario();
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);

			$identity = $usuario->login();

			if($identity && is_object($identity)){
				$_SESSION['identity'] = $identity;
			}
			if($identity->rol == 'admin'){
				$_SESSION['admin'] = true;
			}
		}else{
			$_SESSION['error_login'] = 'Identificacion Fallida!!';
		}

	header("Location:".base_url);	
	}

	public function logout(){

		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}


		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}

		header("Location:".base_url);		

	}

} // FIN DE LA CLASSE