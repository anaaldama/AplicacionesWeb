<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="Fork-Awesome/css/fork-awesome.min.css">
	<title>Alta Alumno - Materia</title>
</head>
<body>
	<?php
		include 'menu.php';
	?>
	<div class="contenedor">
		<h1 class="titulo">Alta Alumno - Materia</h1>
		<hr class="border">

		<!-- Formulario -->
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formulario" name="fmateria">
			<div class="form-grup">
				<i class="icono izquierda fa fa-user"></i>
				<?php
					include 'comboAlumnos.php';
				?>
			</div>
			<div class="form-grup">
				<i class="icono izquierda fa fa-book"></i>
				<?php
					include 'comboMaterias.php';
				?>
				<i class="submit_btn fa fa-arrow-right" onclick="fmateria.submit()"></i>
			</div>
		
		<?php if (!empty($errores)):?>
			<div class="error">
				<?php echo $errores; ?>
			</div>
		<?php endif; ?>
		
		<?php
			require 'listaAlumnoMateria.php';
		?>
		</form>
		<br>
	</div>
</body>
</html>