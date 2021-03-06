<?php 
include 'funciones/conexion.php';


$busqueda=$conexion->prepare("select * from alumnos");
    $busqueda->execute();
     $arrDatos=$busqueda->fetchAll(PDO::FETCH_ASSOC);

 ?>

 <table   class="table table-bordered">
    <th class="bg-primary" scope="col">Id</th>
    <th class="bg-primary" scope="col">Nombre</th>
    
    <?php

   /* var_dump($arrDatos);*/
   /*Recorremos todos los resultados, ya no hace falta invocar más a fetchAll como si fuera fetch...*/
   foreach ($arrDatos as $muestra) {
        echo '<tr>';

        echo '<td >' . $muestra['idalumnos'] . '</td>';
        echo '<td >' . $muestra['nombre'] . '</td>';
        echo ' </tr>';

    }
    ?>

</table>