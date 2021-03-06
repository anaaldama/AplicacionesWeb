    <?php
      include 'conexion/conexion.php';

      $cmbGrupo=0;
      $reg=0;

      $sql="Select idgrupo,grupo from grupos";
      $consulta = $conexion->query($sql);
      if (!$consulta) {
        die('No se pudo consultar:' . $conexion->mysql_error());
      }else{

        $cmbGrupo='<select name="idgrupo" class="grupo" >';
        $cmbGrupo.='<option value="0">Selecciona el Grupo</option>';
        foreach ($consulta as $row) {
          $cmbGrupo.='<option '.(isset($_POST['idgrupo'])?
                                  ($_POST['idgrupo']==$row['idgrupo']?
                                    ' selected="selected" ':''
                                  ):'').' 
                        value="'.$row['idgrupo'].'">'.strtoupper($row['grupo']).
                      '</option>';
          $reg=1;
        }  
        $cmbGrupo.='</select>';
      }
      echo $cmbGrupo;
    ?>