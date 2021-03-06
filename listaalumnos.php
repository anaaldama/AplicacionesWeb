<?php
include 'conexion/conexion.php';
      $reg=0;
      $sql="SELECT
                alumnos.idalumnos as idalumnos,
                alumnos.nombre as nombre,
                alumnos.apellidos as apellidos,
                alumnos.especialidad as especialidad,
                grupos.idgrupo as idgrupo,
                grupos.grupo as grupo
            FROM  grupo_alumno as ga, 
                grupos, 
                alumnos 
            WHERE
              ga.idgrupo=grupos.idgrupo
            AND ga.idalumnos=alumnos.idalumnos
            ORDER BY 3 ASC";
      $consulta = $conexion->query($sql);
      if (!$consulta) {
        die('No se pudo consultar:' . $conexion->mysql_error());
      }else{
        //echo print_r($consulta,true);
        echo '<table width="50%" >
                  <tr>
                    <th bgcolor="#497A70">ID</th>
                    <th bgcolor="#497A70">ALUMNOS</th>
                    <th bgcolor="#497A70">APELLIDOS</th>
                    <th bgcolor="#497A70">GRUPO</th>
                    <th bgcolor="#497A70">ESPECIALIDAD</th>
                  </tr>';
        foreach ($consulta as $row) {
          echo ' <tr style="font-size: 12px;">
                    <td align="center">'.$row['idalumnos'].'</td>
                    <td align="center">'.ucfirst($row['nombre']).'</td>
                    <td align="center">'.ucfirst($row['apellidos']).'</td>
                    <td align="center">'.ucfirst($row['grupo']).'</td>
                    <td align="center">'.ucfirst($row['especialidad']).'</td>
                  </tr>';
          $reg=1;
        }
        echo ($reg==0?'<tr><td align="center" colspan="5">No se encontrarón alumnos registrados</td></tr>':'');
        echo ' </table>';
      }      
?>