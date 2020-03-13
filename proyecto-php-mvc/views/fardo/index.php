<h1>Gestionar Fardos</h1>


<a href="<?=base_url?>fardos/crear" class= "button button-small">
Crear Fardos
</a>

<table border="1">
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
	</tr>
	<?php while($cat = $fardo->fetch_object()): ?>
		<TR>
			<td><?=$cat->id;?></td>
			<td><?=$cat->nombre;?></td>	
		</TR>
	<?php endwhile; ?>
</table>
