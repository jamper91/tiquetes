<?php
// 		session_start();
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("tiquetes", $conexion);
?>
<div align="center">
    <form action="" method="post" enctype="multipart/form-data" name="form1">
        <table width="90%" border="0">
            <tr>
                <td>
                    <strong>Agregar Archivo de Excel [Productos]</strong>

                    <input type="file" name="archivo" id="archivo">
                    <strong>Desea Actualizar la BD</strong>
                    <label><input type="radio" name="radio" value="s" checked />SI</label>
                    <label><input type="radio" name="radio" value="n" />NO</label>

                    <input type="submit" name="button" class="btn" id="button" value="Cargar">
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
//                echo '<div align="center"><strong>Datos Actualizados con Exito</strong></div>';
        }
    }
    ?>
    <?php echo $this->Form->create('People', array('action' => 'cargarUsuarios')); ?>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th><center><strong>A</strong></center></th>
                <th><center><strong>B</strong></center></th>
                <th><center><strong>C</strong></center></th>
                <th><center><strong>D</strong></center></th>
                <th><center><strong>E</strong></center></th>
                <th><center><strong>F</strong></center></th>
<!--                <th><center><strong>G</strong></center></th>
                <th><center><strong>H</strong></center></th>
                <th><center><strong>I</strong></center></th>
                <th><center><strong>J</strong></center></th>
                <th><center><strong>K</strong></center></th>
                <th><center><strong>L</strong></center></th>-->

        </tr>
            <tr> 
            <th>DOCUMENTO</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>DIRECCION</th>
            <th>TELEFONO</th>
            <TH>EMAIL</TH>
<!--            <th>TELEFONO</th>
            <th>TIPO DE USUARIO</th>
            <th>DEPARTAMENTO</th>
            <th>USUARIO</th>
            <th>CONTRASEÑA</th>
            <th>VALIDO DESDE</th>
            <th>VALIDO HASTA</th>
            <th>IDENTIFICADOR</th>-->
        </tr>
        </thead>
            <tbody>

              	<?php
            if (isset($_POST['radio'])) {
                require_once '../vendor/PHPExcel/IOFactory.php';

                $objPHPExcel = PHPExcel_IOFactory::load('../vendor/xls/datos.xls');
                $objHoja = $objPHPExcel->getActiveSheet()->toArray(true, true, true, true, true, true);
                $size = count($objHoja);
                echo '<input type="hidden" name="size" id="size" value="' . $size . '">';
                foreach ($objHoja as $iIndice => $objCelda)
                    echo '
							<tr>
								<td align ="center"><input type="text" id = "doc' . $iIndice . '" name = "doc' . $iIndice . '" value ="' . $objCelda['A'] . '" style="display:none">' . $objCelda['A'] . '</td>
								<td align ="center"><input type="text" id = "nom' . $iIndice . '" name = "nom' . $iIndice . '" value ="' . $objCelda['B'] . '" style="display:none">' . $objCelda['B'] . '</td>
								<td align ="center"><input type="text" id = "ape' . $iIndice . '" name = "ape' . $iIndice . '" value ="' . $objCelda['C'] . '" style="display:none">' . $objCelda['C'] . '</td>
								<td align ="center"><input type="text" id = "dir' . $iIndice . '" name = "dir' . $iIndice . '" value ="' . $objCelda['D'] . '" style="display:none">' . $objCelda['D'] . '</td>
								<td align ="center"><input type="text" id = "tel' . $iIndice . '" name = "tel' . $iIndice . '" value ="' . $objCelda['E'] . '" style="display:none">' . $objCelda['E'] . '</td>
								<td align ="center"><input type="text" id = "mail' . $iIndice . '" name = "mail' . $iIndice . '" value ="' . $objCelda['F'] . '" style="display:none">' . $objCelda['F'] . '</td>
								
							</tr>
						';
                $doc = $objCelda['A'];
                $name = $objCelda['B'];
                $ape = $objCelda['C'];
                $dir = $objCelda['D'];
                $tel = $objCelda['E'];
                $mail = $objCelda['F'];
//            $tip = $objCelda['F'];
//            $dep = $objCelda['G'];
//            $usu = $objCelda['H'];
//            $pass = $objCelda['I'];
//            $desde = $objCelda['J'];
//            $hasta = $objCelda['K'];
//            $ide = $objCelda['L'];


                if ($_POST['radio'] == 's') {






                    //                        $datos = mysqli_query($existe);
                    //                        $id = $datos[0]['id'];
                    //                        var_dump($datos);
                    //                mysql_fetch_array($datos);
                    //                var_dump($datos);
                    //                $sql = "INSERT INTO people (pers_documento, pers_primNombre, pers_primApellido, pers_direccion, pers_telefono) VALUES ('$doc','$name','$ape','$dir','$tel')";
                    //                mysql_query($sql);
                    //                $id = mysql_insert_id();
                    //                var_dump($id);
                    //                $sql2 = "INSERT INTO users (username, password, person_id, type_user_id, department_id, validodesde, validohasta, identificador) VALUES ('$usu', '$pass', '$id', '$tip', '$dep', '$desde', '$hasta', '$ide')";
                    //                mysql_query($sql2);
                }
            }
            ?>


                </tbody>            
    </table>        
    <?php echo $this->Form->end(__('Registrar')); ?>
</div>
<script language="javascript" type="text/javascript">
//    function importarUsuarios(frm) {
//        alert($("#size".val()));
//    });
    $("#form2").submit(function(e) {
        alert("123123");
        return false;
//        document.form2.submit();
    });
    $(document).ready(function() {

    });
    function registrar() {
        alert("123");
        document.form2.submit();
        var url = urlbase + "people/cargarUsuarios.xml";
        var max = $("#size").val();
        for (i = 1; i <= max; i++) {
            var doc + i = $("#doc" + i).val();
        }
        ajax(url, datos, function(xml) {
            $("datos", xml).each(function() {

            });
//
        });
    }
</script>