<?php if(isset($editar) && isset($pro) && is_object($pro)):?>
	<h1>Editar Producto <?=$pro->nombre?></h1>
	<?php $url_action = base_url."producto/edit&id=".$pro->id;?>
<?php else: ?>
	<h1>Crear Producto</h1>
	<?php $url_action = base_url."producto/save";?>
<?php endif; ?>

<div class = "form_container">

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

	<LABEL>Catecoria</LABEL>
	<?php $categorias = Utils::showCategorias(); ?>
	<select name="categoria">
				<?php while($cat = $categorias->fetch_object()): ?>
					<option value="<?=$cat->id?>">
						<a href="#"><?=$cat->nombre?></a>
					</option>
				<?php endwhile; ?>
	</select>	
	<LABEL>Nombre</LABEL>
	<input type="text" name="nombre" required/>
	<LABEL>Descripcion</LABEL>
	<textarea name="descripcion" required>
	</textarea>
	<LABEL>Precio</LABEL>
	<input type="text" name="precio" required/>
	<LABEL>Stock</LABEL>
	<input type="text" name="stock" required/>
	<LABEL>Oferta</LABEL>	
	<input type="text" name="oferta"/>
	<LABEL>Fecha Alta</LABEL>	
	<input type="date" name="fecha"/>
	<LABEL>Imagen</LABEL>	
	<input type="file" name="imagen"/>	
	<input type="submit" name="Guardar">

</form>
</div>