<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
	<strong>Registro completado CORRECTAMENTE</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
	<strong>Registro Fallido</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method="POST">

	<LABEL>Nombre</LABEL>
	<input type="text" name="nombre" required/>

	<LABEL>Apellidos</LABEL>
	<input type="text" name="apellidos" required/>

	<LABEL>Email</LABEL>
	<input type="email" name="email" required/>

	<LABEL>Password</LABEL>
	<input type="password" name="password" required/>

	<input type="submit" name="registar" value = "Registrarse">


</form>

