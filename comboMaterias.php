    <?php
      include 'conexion/conexion.php';

      $cmbGrupo=0;
      $reg=0;

      $sql="Select idmateria,materia from materias";
      $consulta = $conexion->query($sql);
      if (!$consulta) {
        die('No se pudo consultar:' . $conexion->mysql_error());
      }else{

        $cmbGrupo='<select name="idMateria" class="cmbMateria" style="width: 81%">';
        $cmbGrupo.='<option value="0">Selecciona la Materia</option>';
        foreach ($consulta as $row) {
          $cmbGrupo.='<option '.(isset($_POST['idMateria'])?
                                  ($_POST['idMateria']==$row['idmateria']?
                                    ' selected="selected" ':''
                                  ):'').' 
                               value="'.$row['idmateria'].'">'.$row['idmateria'].
                      '-'.strtoupper($row['materia']).'</option>';
          $reg=1;
        }  
        $cmbGrupo.='</select>';
      }
      echo $cmbGrupo;
    ?>