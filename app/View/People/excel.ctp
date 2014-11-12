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
                $urlnueva = "../vendor/xls/datos.xls";
                if (is_uploaded_file($tmpEXCEL)) {
                    copy($tmpEXCEL, $urlnueva);
                    echo '<div align="center"><strong>Datos Cargados con Exito</strong></div>';
                }
            }
            ?>
            <?php echo $this->Form->create('Person'); ?>
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
            <table border="1" width="10%">
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
                        <th><center><strong>J</strong></center></th>
                        <th><center><strong>K</strong></center></th>
                        <th><center><strong>L</strong></center></th>
                        <th><center><strong>M</strong></center></th>
                        <th><center><strong>N</strong></center></th>
                        <th><center><strong>O</strong></center></th>
                    <tr>
                        <th>IDENTIFICACIÓN</th>
                        <th>TIPO</th>
                        <th>CATEGORIA</th>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>ENTIDAD</th>
                        <th>EMAIL</th>
                        <th>CELULAR</th>
                        <th>TELÉFONO</th>
                        <th>CIUDAD</th>
                        <th>PAÍS</th>
                        <th>No. STAND</th>
                        <th>SECTOR</th>
                        <th>PROFESION</th>
                        <th>OBSERVACIONES</th>
                    </tr>
                </thead>
                    <tbody>
                      	<?php
                    if (isset($_POST['radio'])) {
                        require_once '../vendor/PHPExcel/IOFactory.php';

                        $objPHPExcel = PHPExcel_IOFactory::load('../vendor/xls/datos.xls');
                        $objHoja = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true, true, true, true);
                        $size = count($objHoja);
                        echo '<input type="hidden" name="size" id="size" value="' . $size . '">';
                        foreach ($objHoja as $iIndice => $objCelda) {

                            echo '
							<tr>
								<td align ="center"><input type="text" id = "doc' . $iIndice . '" name = "doc' . $iIndice . '" value ="' . $objCelda['A'] . '" style="display:none">' . $objCelda['A'] . '</td>
								<td align ="center"><input type="text" id = "ti' . $iIndice . '" name = "ti' . $iIndice . '" value ="' . $objCelda['B'] . '" style="display:none">' . $objCelda['B'] . '</td>
								<td align ="center"><input type="text" id = "cat' . $iIndice . '" name = "cat' . $iIndice . '" value ="' . $objCelda['C'] . '" style="display:none">' . $objCelda['C'] . '</td>
								<td align ="center"><input type="text" id = "nom' . $iIndice . '" name = "nom' . $iIndice . '" value ="' . $objCelda['D'] . '" style="display:none">' . $objCelda['D'] . '</td>
								<td align ="center"><input type="text" id = "ape' . $iIndice . '" name = "ape' . $iIndice . '" value ="' . $objCelda['E'] . '" style="display:none">' . $objCelda['E'] . '</td>
								<td align ="center"><input type="text" id = "ent' . $iIndice . '" name = "ent' . $iIndice . '" value ="' . $objCelda['F'] . '" style="display:none">' . $objCelda['F'] . '</td>
								<td align ="center"><input type="text" id = "mai' . $iIndice . '" name = "mai' . $iIndice . '" value ="' . $objCelda['G'] . '" style="display:none">' . $objCelda['G'] . '</td>
								<td align ="center"><input type="text" id = "cel' . $iIndice . '" name = "cel' . $iIndice . '" value ="' . $objCelda['H'] . '" style="display:none">' . $objCelda['H'] . '</td>
								<td align ="center"><input type="text" id = "tel' . $iIndice . '" name = "tel' . $iIndice . '" value ="' . $objCelda['I'] . '" style="display:none">' . $objCelda['I'] . '</td>
								<td align ="center"><input type="text" id = "ciu' . $iIndice . '" name = "ciu' . $iIndice . '" value ="' . $objCelda['J'] . '" style="display:none">' . $objCelda['J'] . '</td>
								<td align ="center"><input type="text" id = "pai' . $iIndice . '" name = "pai' . $iIndice . '" value ="' . $objCelda['K'] . '" style="display:none">' . $objCelda['K'] . '</td>
								<td align ="center"><input type="text" id = "sta' . $iIndice . '" name = "sta' . $iIndice . '" value ="' . $objCelda['L'] . '" style="display:none">' . $objCelda['L'] . '</td>
								<td align ="center"><input type="text" id = "sec' . $iIndice . '" name = "sec' . $iIndice . '" value ="' . $objCelda['M'] . '" style="display:none">' . $objCelda['M'] . '</td>
								<td align ="center"><input type="text" id = "pro' . $iIndice . '" name = "pro' . $iIndice . '" value ="' . $objCelda['N'] . '" style="display:none">' . $objCelda['N'] . '</td>															
								<td align ="center"><input type="text" id = "obs' . $iIndice . '" name = "obs' . $iIndice . '" value ="' . $objCelda['O'] . '" style="display:none">' . $objCelda['O'] . '</td>															
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