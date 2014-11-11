<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Soft Unicorn</title>
    </head>

    <body>
        <div align="center">
            <form action="" method="post" enctype="multipart/form-data" name="form1">
                <table width="90%" border="0">
                    <tr>
                        <td>
                            <strong>Selecciona el documento con los datos</strong>

                            <input type="file" name="archivo" id="archivo"/>
                            <div style="display:none">
                                <strong>Desea Actualizar la BD</strong>
                                <input type="hidden" name="llave" id="llave" value="s"/>
                                <label><input type="radio" name="radio" value="s" checked />SI</label>
                                <label><input type="radio" name="radio" value="n" />NO</label>
                            </div>
                            <input type="submit" name="button" class="btn" id="button" value="Mostrar Datos"/>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </form>
            <?php
            if (isset($_POST['radio'])) {
                //subir la imagen del articulo
                $nameEXCEL = $_FILES['archivo']['name'];
                $tmpEXCEL = $_FILES['archivo']['tmp_name'];
                $extEXCEL = pathinfo($nameEXCEL);
                $urlnueva = "../vendor/xls/stands.xls";
                if (is_uploaded_file($tmpEXCEL)) {
                    copy($tmpEXCEL, $urlnueva);
                    echo '<div align="center"><strong>Datos Cargados con Exito</strong></div>';
                }
            }
            ?>
            <?php echo $this->Form->create('Shelf'); ?>
            <input type="hidden" name="llave" id="llave" value="n"/>
            <div align="center">
                <?php
                echo $this->Form->input('event_id', array(
                    "div" => array(
                        "class" => "controls"
                    ),
                    "label" => "Evento",
                    "options" => $events,
                    'required' => 'true',
                    "empty" => "Seleccione un Evento"
                ));
                ?>
            </div>
            <br></br>
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th><center><strong>A</strong></center></th>
                        <th><center><strong>B</strong></center></th>
                        <th><center><strong>C</strong></center></th>
                        <th><center><strong>D</strong></center></th>
                        <th><center><strong>E</strong></center></th>
                        <th><center><strong>F</strong></center></th>
                        <th><center><strong>G</strong></center></th>
                        <th><center><strong>H</strong></center></th>
                        <th><center><strong>I</strong></center></th>
                        
                    <tr>
                        <th>STAND</th>
                        <th>NOMBRE</th>
                        <th>GENERO</th>
                        <th>REPRESENTANTE</th>
                        <th>UBICACION</th>
                        <th>MTS</th>
                        <th>DESCRIPCION</th>
                        <th>OBSERVACION</th>
                        <th>AFORO</th>
                    </tr>
                </thead>
                    <tbody>
                      	<?php
                    if (isset($_POST['radio'])) {
                        require_once '../vendor/PHPExcel/IOFactory.php';

                        $objPHPExcel = PHPExcel_IOFactory::load('../vendor/xls/stands.xls');
                        $objHoja = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true, true, true, true);
                        $size = count($objHoja);
                        echo '<input type="hidden" name="size" id="size" value="' . $size . '">';
                        foreach ($objHoja as $iIndice => $objCelda) {

                            echo '
							<tr>
								<td align ="center"><input type="text" id = "codigo' . $iIndice . '" name = "codigo' . $iIndice . '" value ="' . $objCelda['A'] . '" style="display:none">' . $objCelda['A'] . '</td>
								<td align ="center"><input type="text" id = "nombre' . $iIndice . '" name = "nombre' . $iIndice . '" value ="' . $objCelda['B'] . '" style="display:none">' . $objCelda['B'] . '</td>
								<td align ="center"><input type="text" id = "genero' . $iIndice . '" name = "genero' . $iIndice . '" value ="' . $objCelda['C'] . '" style="display:none">' . $objCelda['C'] . '</td>
								<td align ="center"><input type="text" id = "representante' . $iIndice . '" name = "representante' . $iIndice . '" value ="' . $objCelda['D'] . '" style="display:none">' . $objCelda['D'] . '</td>
								<td align ="center"><input type="text" id = "ubicacion' . $iIndice . '" name = "ubicacion' . $iIndice . '" value ="' . $objCelda['E'] . '" style="display:none">' . $objCelda['E'] . '</td>
								<td align ="center"><input type="text" id = "mts' . $iIndice . '" name = "mts' . $iIndice . '" value ="' . $objCelda['F'] . '" style="display:none">' . $objCelda['F'] . '</td>
								<td align ="center"><input type="text" id = "descripcion' . $iIndice . '" name = "descripcion' . $iIndice . '" value ="' . $objCelda['G'] . '" style="display:none">' . $objCelda['G'] . '</td>
								<td align ="center"><input type="text" id = "observacion' . $iIndice . '" name = "observacion' . $iIndice . '" value ="' . $objCelda['H'] . '" style="display:none">' . $objCelda['H'] . '</td>
								<td align ="center"><input type="text" id = "aforo' . $iIndice . '" name = "aforo' . $iIndice . '" value ="' . $objCelda['I'] . '" style="display:none">' . $objCelda['I'] . '</td>
							</tr>
						';
                        }
                    }
                    ?>

                        </tbody>
            </table>
            <br></br>
            <?php echo $this->Form->end(__('Registrar')); ?>
        </div>
    </body>
</html>