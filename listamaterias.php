<?php
  include 'conexion/conexion.php';
  $reg=0;
  $sql="Select idmateria,materia from materias";
  $consulta = $conexion->query($sql);
  if (!$consulta) {
    die('No se pudo consultar:' . $conexion->mysql_error());
  }else{
    //echo print_r($consulta,true);
    echo '<table width="100%">
              <tr>
                <th bgcolor="#497A70">ID</th>
                <th bgcolor="#497A70">MATERIA</th>
              </tr>';
    foreach ($consulta as $row) {
      echo ' <tr style="font-size: 12px;">
                <td align="center">'.$row['idmateria'].'</td>
                <td align="left">'.strtoupper($row['materia']).'</td>
              </tr>';
      $reg=1;
    }
    echo ($reg==0?'<tr><td align="center" colspan="2">No se encontrarón materias registradas</td></tr>':'');
    echo ' </table>';
  }      
?>