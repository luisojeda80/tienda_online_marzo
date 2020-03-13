<!-- BARRA LATERAL-->
<aside id="lateral">
	<div id="login" class="block_aside">
		<?php if(!isset($_SESSION['identity'])): ?>
		<h3>ENTRAR A LA WEB</h3>
		<form action="<?=base_url?>usuario/login" method="POST">
			<LABEL>Email</LABEL>
			<input type="email" name="email"/>
			<label>Password</label>
			<input type="password" name="password">
			<input type="submit" name="envir" value="Enviar">
		</form>
		<?php else: ?>
			<h3><?=$_SESSION['identity']->nombre?></h3>
		<?php endif; ?>
	<br>

		<ul>
			<?php if(isset($_SESSION['admin'])): ?>
				<li>
					<a href="<?=base_url?>categoria/index">Gestionar Categorias</a>
				</li>
				<li>
					<a href="<?=base_url?>producto/gestion">Gestionar Productos</a>
				</li>
				<li>
					<a href="#">Gestionar Pedidos</a>
				</li>
		    <?php endif ;?>

			<?php if(isset($_SESSION['identity'])): ?>		    
				<li>	
					<a href="#">Mis Pedidos</a>
				</li>
				<li>
					<a href="<?=base_url?>usuario/logout">Cerrar Sesión</a>
				</li>
			<?php else: ?>
				<li>
					<a href="<?=base_url?>usuario/registro">Registrate AQUÍ</a>
				</li>
				
		    <?php endif ;?>
		</ul>
	</div>			
</aside>
<div id="central">