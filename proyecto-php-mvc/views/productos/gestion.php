<h1> Gestion de Productos</h1>

<a href="<?=base_url?>producto/crear" class= "button button-small">
Nuevo Producto
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
	<strong class="alert_green">Producto fue creado Correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
	<strong class="alert_red">Producto NO fue Creado Correctamente</strong>
<?php endif;?>

<?php Utils::deleteSession('producto');?>


<?php if(isset($_SESSION['eliminar']) && $_SESSION['eliminar'] == 'complete'): ?>
	<strong class="alert_green">Producto fue Eliminado Correctamente</strong>
<?php elseif(isset($_SESSION['eliminar']) && $_SESSION['eliminar'] != 'complete'): ?>
	<strong class="alert_red">Producto NO fue Eliminado Correctamente</strong>
<?php endif;?>

<?php Utils::deleteSession('eliminar');?>

<table border="1">
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>PRECIO</th>
		<th>STOCK</th>
		<th>ACCIONES</th>
	</tr>
	<?php while($pro = $productos->fetch_object()): ?>
		<tr>
			<td><?=$pro->id;?></td>
			<td><?=$pro->nombre;?></td>
			<td><?=$pro->precio;?></td>
			<td><?=$pro->stock;?></td>
			<td>
				<a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
				<a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
				
			</td>	
		</tr>
	<?php endwhile; ?>
</table>