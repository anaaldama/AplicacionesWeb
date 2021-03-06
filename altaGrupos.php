<?php
 	include 'conexion/conexion.php';

	session_start();
	if(!isset($_SESSION['usuario'])){
	  header('Location:login.php'); 
	}

	$grupo='';

	if ($_SERVER['REQUEST_METHOD']=='POST'){
	
		//$materia = filter_var(strtolower($_POST['materia']), FILTER_SANITIZE_STRING);
		$grupo = trim(strtolower($_POST['grupo']));
		 try {
	          	$insertar= $conexion->prepare('INSERT INTO grupos (grupo) VALUES (:GRUPO)');
	        	$insertar->execute(array(':GRUPO'=>$grupo));
	        header('Location: altaGrupos.php');
			
	    }catch (PDOException $e) {
	          echo "Error".$e->getMessage();
	    } 
	}

	require 'view/altaGrupos.view.php';
?>