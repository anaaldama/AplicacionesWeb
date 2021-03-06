<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="Fork-Awesome/css/fork-awesome.min.css">
	<title>Alta de Materias</title>
</head>
<body>
	<?php
		include 'menu.php';
	?>
	<div class="contenedor">
		<h1 class="titulo">Alta de materia</h1>
		<hr class="border">
		<!-- Formulario -->
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formulario" name="fmateria">
			<div class="form-grup">
				<i class="icono izquierda fa fa-book"></i><input type="text" name="materia" class="materia_btn" placeholder="Materia"><i class="submit_btn fa fa-arrow-right" onclick="fmateria.submit()"></i>
			</div>
		
		<?php if (!empty($errores)):?>
			<div class="error">
				<?php echo $errores; ?>
			</div>
		<?php endif; ?>
		
		<?php
			require 'listamaterias.php';
		?>
		</form>
		<br>
	</div>
</body>
</html>