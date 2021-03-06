<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="Fork-Awesome/css/fork-awesome.min.css">
	<title>Alta de alumnos</title>
</head>
<body>
	<?php
		include 'menu.php';
	?>
	<div class="contenedor">
		<h1 class="titulo">Alta de alumnos</h1>
		<hr class="border">

		<!-- Formulario -->
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="formulario" name="fAlumnos">
			<div class="form-grup">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="nombre" class="usuario" placeholder="Nombre(s)">
			</div>
			<br>
			<div class="form-grup">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="apellidos" class="usuario" placeholder="Apellidos">
			</div>
			<br>
			<div class="form-grup">
				<i class="icono izquierda fa fa-users"></i>
			<?php
				include 'comboGrupo.php';
			?>
			</div>
			<br>
			<div class="form-grup">
				<i class="icono izquierda fa fa-users"></i>
					<select name="especialidad" class="especialidad_btn" >
						<option value="0">Selecciona la Especialidad</option>
						<option value="Programacion">Programación</option>
						<option value="Contabilidad">Contabilidad</option>
						<option value="Recursos Humanos">Recursos Humanos</option>
						<option value="Electricidad">Electricidad</option>
						<option value="Construccion">Construccion</option>
					</select>
				<i class="submit_btn fa fa-arrow-right" onclick="fAlumnos.submit()"></i>
			</div>
		
		<?php if (!empty($errores)):?>
			<div class="error">
				<?php echo $errores; ?>
			</div>
		<?php endif; ?>
		</form>
	</div>
	<div align="center" style="align:center;  height:150px;"><br>
	<?php
		require 'listaalumnos.php';
	?>
	</div>
</body>
</html>