<?php
    include 'conexion/conexion.php';
	echo '	<form action='.htmlspecialchars($_SERVER['PHP_SELF']).' method="POST" class="formulario" name="fconsultaAsis">
	    		<div class="form-grup" width="90%">
					<i class="icono izquierda fa fa-users"></i>';
					
					include 'comboGrupo.php';

	echo '		</div>
				<div class="form-grup">
					<i class="icono izquierda fa fa-book"></i>';
					include 'comboMaterias.php';
	echo '		</div>
    			<div class="form-grup">
					<i class="icono izquierda fa fa-calendar"></i>
					<input type="date"  name="fecha"  
					value="'.(isset($_POST['fecha'])?
                                  (!empty($_POST['fecha'])?
                                    date("Y-m-d"):''
                                  ):'').'"  
					class="materia_btn">
					<i class="submit_btn fa fa-arrow-right" onclick="fconsultaAsis.submit()"></i>
				</div>';
				include 'listaConsultaAsistencia.php';
	echo	'</form>';
    ?>