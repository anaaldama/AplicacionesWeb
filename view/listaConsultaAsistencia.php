<?php

if ($_SERVER['REQUEST_METHOD']=='POST'){

	$idMateria = $_POST['idMateria'];
  	$idgrupo = $_POST['idgrupo'];
  	$fecha=$_POST['fecha'];

  	if ($idMateria==0 or $idgrupo==0 or empty($fecha)){
  		echo $errores='<p align="center"> Favor de rellenar todos los campos</p>';
  	}else{
		$reg=0;
		$sql="SELECT
		            alumnos.idalumnos as idalumnos,
		              alumnos.nombre as nombre,
		              alumnos.apellidos as apellidos,
		              alumnos.especialidad as especialidad,
		              grupos.grupo as grupos,
		              materias.materia as materias
		          FROM
		            alumnos, grupos, materias,
		            grupo_alumno as ga,
		            alumno_materia as am,
		            asistencias
		          WHERE
		            ga.idalumnos=alumnos.idalumnos
		          AND ga.idgrupo=grupos.idgrupo
		          AND am.idalumnos=alumnos.idalumnos
		          AND am.idmateria=materias.idmateria
		          AND grupos.idgrupo=$idgrupo
		          AND materias.idmateria=$idMateria
		          AND asistencias.idalumnos=alumnos.idalumnos
		          AND asistencias.idmateria=materias.idmateria
		          AND asistencias.fecha='$fecha'
		          ORDER BY 5, 3  ASC";
		  //echo $sql;
		  $consulta = $conexion->query($sql);
		  if (!$consulta) {
		    die('No se pudo consultar:' . $conexion->mysql_error());
		  }else{
		   	$formListaAlum='';

		   	$tableAlumno='';
		    $tableAlumno.='<table width="100%" align="center">
		              <tr>
		                <th bgcolor="#497A70">ID</th>
		                <th bgcolor="#497A70">ALUMNO</th>
		                <th bgcolor="#497A70">&nbsp;</th>
		              </tr>';
		    foreach ($consulta as $row) {
				    //Consulta
				    $tableAlumno.= ' <tr style="font-size: 12px;">
				                <td align="center" width="10%">'.$row['idalumnos'].'</td>
				                <td align="left" >'.strtoupper($row['apellidos']).' '.strtoupper($row['nombre']).'</td>
				                <td align="right" width="20%"> 
				                	<i class="asistencia fa fa-check-square-o" ></i>
				                </td>
				              </tr>';
				      $reg=1;
				      $materia=strtoupper($row['grupos']);
				      $grupo=strtoupper($row['materias']);
			}		   
		    if($reg==0){
		    	$formListaAlum= '<table width="100%">';
		    	$formListaAlum.='<tr><td align="center">No se encontrarón materias registradas</td></tr>';
		    	$formListaAlum.= ' </table>';
		    }else{
				$tableAlumno.= ' </table>';
				$formListaAlum.=$tableAlumno;
		    }   
		    echo $formListaAlum;
		  } 
	}
}

?>