<?php 
try 
{
	$conexion = new PDO('mysql: host=localhost; dbname=registro_asistencia','root','');
	#$conexion = new PDO('mysql:host=localhost;dbname=imc', 'root', '');
	#echo "ok";
} 
catch (PDOException $e) 
{
	echo "Error".$e->getMessage();	
}

 ?>