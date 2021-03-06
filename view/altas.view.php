<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="Fork-Awesome/css/fork-awesome.min.css">
	<title>Altas</title>
</head>
<body>

<div class="contenedor">
	<h1 class="titulo">ALTAS</h1>
	<hr class="border">
	<table cellspacing="10" cellpadding="10" border="0" width="100%" style=" background:#0B385B;">
		<tr>
			<td align="center" width="25%">
				<a href="asistencia.php" style="color:#FFFFFF">Asistencias</a>
			</td>
			<td align="center" width="25%">
				<a href="registra_alumnos.php" style="color:#FFFFFF">Alumnos</a>
			</td>
			<td align="center" width="25%">
				<a href="altaGrupos.php" style="color:#FFFFFF">Grupo</a>
			</td>
			<td align="center" width="25%">
				<a href="altaMateria.php" style="color:#FFFFFF">Materia</a>
			</td>
			<td align="center" width="25%">
				<a href="registra_alumno_mat.php" style="color:#FFFFFF">Alumno/Materia</a>
			</td>
		</tr>
	</table>
	<hr class="border">
	<div class="contenido">
		<article>
			<p> </p>
		</article>
	</div>
	<p align="right">
		<?php
			date_default_timezone_set(date_default_timezone_get());
			echo $hoy = date("F j, Y, g:i a");
		?>
	</p>
	
</div>


</body>
</html>