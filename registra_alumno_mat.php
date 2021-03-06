<?php 
 include 'conexion/conexion.php';

session_start();
if(!isset($_SESSION['usuario']))
{
  header('Location:login.php'); 
}

$idMateria='';
$idAlumno='';
if ($_SERVER['REQUEST_METHOD']=='POST') 
{

  $idMateria = $_POST['idMateria'];
  $idAlumno = $_POST['idAlumno'];

  if ($idMateria==0 or $idAlumno==0){
      $errores.='<li> Favor de rellenar todos los campos</li>';
  }else{
    	$idMateria = $_POST['idMateria'];
      $idAlumno = $_POST['idAlumno'];
    	 try {
              $insertar= $conexion->prepare('INSERT INTO alumno_materia (idmateria, idAlumnos) VALUES (:IDMATERIA, :IDALUMNO)');
            $insertar->execute(array(
              ':IDMATERIA'=>$idMateria,
              ':IDALUMNO'=>$idAlumno));
            header('Location: registra_alumno_mat.php');
    		
            //
            } 
            catch (PDOException $e) {
              echo "Error".$e->getMessage();
            }
  }
}
require 'view/registra_alumno_mat.view.php';

 ?>