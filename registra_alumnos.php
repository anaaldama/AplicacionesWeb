<?php 
 
include 'conexion/conexion.php';

session_start();
if(!isset($_SESSION['usuario']))
{
  header('Location:login.php'); 
}

$nombre='';
$apellidos ='';
$especialidad='';
$idGrupo='';
$idAlumno='';

if ($_SERVER['REQUEST_METHOD']=='POST') 
{
	   //$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
  	$nombre = trim(strtolower($_POST['nombre']));
  	$apellidos = trim(strtolower($_POST['apellidos']));
   	$idGrupo=trim(strtolower($_POST['idgrupo']));
   	$especialidad=trim(strtolower($_POST['especialidad']));
  	$errores='';
  	
  	if (empty($nombre) or empty($apellidos) or empty($especialidad)or $especialidad==0 or $idGrupo==0){
  		$errores.='<li> Favor de rellenar todos los campos</li>';
  	}else{
  		  $duplicado = $conexion->prepare( 'SELECT  alumnos.nombre, alumnos.apellidos,
                                                  alumnos.especialidad, grupos.grupo,
                                                  grupos.turno 
                                          FROM  
                                                  alumnos, grupos, grupo_alumno
                                          WHERE 
                                                  grupo_alumno.idalumnos=alumnos.idalumnos
                                          AND     grupo_alumno.idgrupo=grupos.idgrupo
                                          AND     grupos.idgrupo =:IDGRUPO
                                          AND     alumnos.nombre=:NOMBRE 
                                          AND     alumnos.apellidos=:APELLIDOS LIMIT 1');
  		  $duplicado->execute(array(':IDGRUPO'=>$idGrupo,
                            			':NOMBRE'=>$nombre,
                            			':APELLIDOS'=>$apellidos));
        $resultado = $duplicado->fetch(); 
		    //var_dump($resultado);
      
      if($resultado != false){
        $errores .='<li>El alumno ya existe</li>';
      }

      if ($errores==''){
       try {
          $insertarAlumnos= $conexion->prepare('INSERT INTO alumnos (nombre,apellidos,especialidad) 
                                          VALUES (:NOMBRE,:AP,:ESP)');
          $insertarAlumnos->execute(array( ':NOMBRE'=>$nombre,
                                            ':AP'=>$apellidos,
                                         	  ':ESP'=>$especialidad));
          $idAlumno = $conexion->lastInsertId();
          try{
              $insertaGrupAlu= $conexion->prepare('INSERT INTO grupo_alumno (idalumnos,idgrupo) 
                                  VALUES (:IDALUMNO,:IDGRUPO)');
               $insertaGrupAlu->execute(array( ':IDALUMNO'=>$idAlumno,
                                                ':IDGRUPO'=>$idGrupo));
               //header('Location: registra_alumnos.php');
          }catch (PDOException $e) {
            echo "Error".$e->getMessage();
          } 
        }catch (PDOException $e) {
          echo "Error".$e->getMessage();
        } 
      }
  	}
}
require 'view/registra_alumnos.view.php';

?>