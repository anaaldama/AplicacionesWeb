    <?php
      include 'conexion/conexion.php';

      $cmbGrupo=0;
      $reg=0;

      $sql="Select idalumnos,nombre, apellidos from alumnos";
      $consulta = $conexion->query($sql);
      if (!$consulta) {
        die('No se pudo consultar:' . $conexion->mysql_error());
      }else{

        $cmbGrupo='<select name="idAlumno" class="alumnos" >';
        $cmbGrupo.='<option value="0">Selecciona el Alumno</option>';
        foreach ($consulta as $row) {
          $cmbGrupo.='<option value="'.$row['idalumnos'].'">'.$row['idalumnos'].
                      '-'.strtoupper($row['apellidos']).' '
                      .strtoupper($row['nombre']).' '.
                      '</option>';
          $reg=1;
        }  
        $cmbGrupo.='</select>';
      }
      echo $cmbGrupo;
    ?>