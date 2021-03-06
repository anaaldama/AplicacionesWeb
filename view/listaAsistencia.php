<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){

	//echo print_r($_POST,true);
	//echo "ENTRA";
	$idMateria = $_POST['idMateria'];
  	$idgrupo = $_POST['idgrupo'];

  	if ($idMateria==0 or $idgrupo==0){
  		echo $errores='<p align="center"> Favor de rellenar todos los campos</p>';
  	}else{
	//echo "ENTRA2";
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
		              alumno_materia as am
		          WHERE
		            ga.idalumnos=alumnos.idalumnos
		          AND ga.idgrupo=grupos.idgrupo
		          AND am.idalumnos=alumnos.idalumnos
		          AND am.idmateria=materias.idmateria
		          AND grupos.idgrupo=$idgrupo
		          AND materias.idmateria=$idMateria
		          AND alumnos.idalumnos NOT IN (SELECT asistencias.idalumnos 
		               FROM   asistencias        
		               WHERE
		                  asistencias.idalumnos=alumnos.idalumnos
		               AND 	asistencias.idmateria=materias.idmateria
		               AND asistencias.fecha=(select Date_format(now(),'%Y-%m-%d'))) 
		               ORDER BY 5, 3  ASC";
		  //echo $sql;
		  $consulta = $conexion->query($sql);
		  if (!$consulta) {
		    die('No se pudo consultar:' . $conexion->mysql_error());
		  }else{
		    //echo print_r($consulta,true);
		   	$formListaAlum='';

		   	$tableAlumno='';
		    $tableAlumno.='<table width="100%">
		              <tr>
		                <th bgcolor="#497A70">ID</th>
		                <th bgcolor="#497A70">ALUMNO</th>
		                <th bgcolor="#497A70">&nbsp;</th>
		              </tr>';
		    foreach ($consulta as $row) {
		    	//Asitencia
		    	if(isset($_POST['asis_'.$row['idalumnos']])){
		    		try {
			        $insertar= $conexion->prepare('INSERT INTO asistencias(fecha, idalumnos, idmateria) VALUES (:FECHA, :IDALUMNO,:IDMATERIA)');
			        $insertar->execute(array(
			          ':FECHA'=>date("Y-m-d"),
					  ':IDALUMNO'=>$row['idalumnos'],
					  ':IDMATERIA'=>$idMateria));
			        	$tableAlumno.= ' <tr style="font-size: 12px;">
				                <td align="center" width="10%">'.$row['idalumnos'].'</td>
				                <td align="left" >'.strtoupper($row['apellidos']).' '.strtoupper($row['nombre']).'</td>
				                <td align="right" width="20%"> 
				                	<i class="asistencia fa fa-check-square-o" ></i>
				                </td>
				              </tr>';
			        } 
			        catch (PDOException $e) {
			        	var_dump($insertar);
			          echo "Error: ".$e->getMessage();
			        } 
		    	}else{
				    //Consulta
				    $tableAlumno.= ' <tr style="font-size: 12px;">
				                <td align="center" width="10%">'.$row['idalumnos'].'</td>
				                <td align="left" >'.strtoupper($row['apellidos']).' '.strtoupper($row['nombre']).'</td>
				                <td align="right" width="20%"> 
				                <input type="checkbox" name="asis_'.$row['idalumnos'].'">
				                <i class="asist_btn fa fa-arrow-right" onclick="fasistencia.submit()"></i>
				                </td>
				              </tr>';
				      $reg=1;
				      $materia=strtoupper($row['grupos']);
				      $grupo=strtoupper($row['materias']);
			     }
		    }
		   
		    if($reg==0){
		    	$formListaAlum= '<table width="100%">';
		    	$formListaAlum.='<tr><td align="center">No se encontrarón materias registradas</td></tr>';
		    	$formListaAlum.= ' </table>';
		    }else{
				$tableAlumno.= ' </table>';
			    //$formListaAlum.='<div class="contenedor">';
				$formListaAlum.=$tableAlumno;
			    //$formListaAlum.='</div>';
		    }   
		    echo $formListaAlum;
		  } 
	}
}
?>