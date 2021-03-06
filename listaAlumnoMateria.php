<?php
include 'conexion/conexion.php';
      $reg=0;
      $sql="SELECT
                alumnos.idalumnos as idalumnos,
                alumnos.nombre as nombre,
                alumnos.apellidos as apellidos,
                alumnos.especialidad as especialidad,
                materias.idmateria as idmateria,
                materias.materia as materia,
                grupos.grupo as grupo
            FROM  
              alumno_materia as am, 
                materias, 
                alumnos,
                grupo_alumno as ga,
                grupos
            WHERE
              am.idmateria=materias.idmateria
            AND am.idalumnos=alumnos.idalumnos
            AND ga.idalumnos=alumnos.idalumnos
            AND ga.idgrupo=grupos.idgrupo
            ORDER BY grupo,materia,apellidos ASC";
      $consulta = $conexion->query($sql);
      if (!$consulta) {
        die('No se pudo consultar:' . $conexion->mysql_error());
      }else{
        //echo print_r($consulta,true);
        echo '<table width="100%">
                  <tr>
                    <th bgcolor="#497A70" width="10%">GRUPO</th>
                    <th bgcolor="#497A70" width="50%">MATERIA</th>
                    <th bgcolor="#497A70" width="40%">ALUMNO</th>
                  </tr>';
        foreach ($consulta as $row) {
          echo ' <tr style="font-size: 12px;">
                    <td align="center" >'.strtoupper($row['grupo']).'</td>
                    <td >'.strtoupper($row['materia']).'</td>
                    <td align="center">'.strtoupper($row['apellidos'].' '.$row['nombre']).'</td>
                  </tr>';
          $reg=1;
        }
        echo ($reg==0?'<tr><td align="center" colspan="3">No se encontrarón materias registradas</td></tr>':'');
        echo ' </table>';
      }      
?>