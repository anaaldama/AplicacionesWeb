<?php 
session_start();
if(isset($_SESSION['usuario']))
{
	include 'menu.php';
	require 'view/altas.view.php';

}
else
{
	header('Location:index.php');
}



 ?>