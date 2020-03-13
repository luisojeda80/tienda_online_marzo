<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Tiendas de Camisetas</title>
		<link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/styles.css">
	</head>

	<body>

	<!--CABECERA-->
		<header id="header">
			<div id="logo">
				<img src="<?=base_url?>assets/img/camiseta.png" />
				<a href="index.php">
					Tienda de camisetas
				</a>
				
			</div>
		</header>

	<!--Menu-->
	<?php $categorias = Utils::showCategorias();?>
	<nav id="menu">
		<ul>
			<li>
				<a href="#">Inicio</a>
			</li>
				<?php while($cat = $categorias->fetch_object()): ?>
					<li>
						<a href="#"><?=$cat->nombre?></a>
					</li>
				<?php endwhile; ?>
			<li>
				<a href="#">Categoría 5</a>
			</li>
		</ul>
	</nav>
	<div id="content">