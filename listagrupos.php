<?php
  include 'conexion/conexion.php';
    $reg=0;
    $sql="Select idgrupo,grupo from grupos";
    $consulta = $conexion->query($sql);
    if (!$consulta) {
      die('No se pudo consultar:' . $conexion->mysql_error());
    }else{

      echo '<table width="100%">
                <tr>
                  <th bgcolor="#497A70">ID</th>
                  <th bgcolor="#497A70">GRUPO</th>
                </tr>';
      foreach ($consulta as $row) {
        echo ' <tr style="font-size: 12px;">
                  <td align="center">'.$row['idgrupo'].'</td>
                  <td align="center">'.strtoupper($row['grupo']).'</td>
                </tr>';
        $reg=1;
      }
      echo ($reg==0?'<tr><td align="center" colspan="2">No se encontrarón grupos registrados</td></tr>':'');
      echo ' </table>';
    }
?>