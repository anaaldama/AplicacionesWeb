<?php 
include 'conexion/conexion.php';

session_start();
if(isset($_SESSION['usuario']))
{
  header('Location:index.php'); 
}

$usuario='';
$password ='';
$password2 ='';
$tipo="";

if ($_SERVER['REQUEST_METHOD']=='POST') 
{
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
 	$correo = $_POST['correo'];
  $tipo="docente";

  	$errores='';
  	
  	if (empty($usuario) or empty($password) or empty($password2)) 
  	{
  		$errores.='<li> Favor de rellenar todos los campos</li>';
  	}
  	else
  	{
  		$duplicado = $conexion->prepare('Select usuario from usuarios WHERE usuario = :USER LIMIT 1');
  		$duplicado->execute(array(':USER'=>$usuario));
      $resultado = $duplicado->fetch(); 

      if($resultado != false)
      {
        $errores .='<li>El usuario ya existe</li>';
      }

      $password = hash('sha512',$password); 
      $password2 = hash('sha512',$password2);
      if ($password != $password2) 
      {
         $errores.='<li>Las contraseñas no son iguales</li>';
      }

      if ($errores=='') 
      {
       
       try {
          $insertar= $conexion->prepare('INSERT INTO usuarios (usuario,correo,tipo, password) VALUES (:USUARIO,:EMAIL,:TIPO,:PASS)');
        $insertar->execute(array(
          ':USUARIO'=>$usuario,
          ':EMAIL'=>$correo,
          ':TIPO'=>$tipo,
          ':PASS'=>$password));
        header('Location: login.php');

       //var_dump($insertar);
        } 
        catch (PDOException $e) {
          echo "Error".$e->getMessage();
        } 
      }

  	}
}

require 'view/registrate.view.php';
 ?>