<?php

//
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('CATEGORIA'), 'width' => 'auto', 'filter' => true),
    array('label' => __('DOCUMENTO'), 'width' => 'auto', 'filter' => true),
    array('label' => __('NOMBRES'), 'width' => 'auto', 'filter' => true),
    array('label' => __('APELLIDOS'), 'width' => 'auto', 'filter' => true),
);
$l = 0;
$x = 0;
for ($k = 4; $k < count($actividades) + 4; $k++) {
    $table[$k + $l] = array('label' => __('FECHA DE INGRESO'), 'width' => 'auto', 'filter' => true);
    if ($actividades[$x]['Activity']['permanencia'] == true) {
        $l = $l + 1;
        $table[$k + $l] = array('label' => __('FECHA DE SALIDA'), 'width' => 'auto', 'filter' => true);
        $l = $l + 1;
        $table[$k + $l] = array('label' => __('PERMANENCIA'), 'width' => 'auto', 'filter' => true);
    }
    $x++;
}

//debug($table);die;
$demas = array(
    array('label' => __(''), 'width' => 'auto', 'filter' => true),
    array('label' => __(''), 'width' => 'auto', 'filter' => true),
    array('label' => __(''), 'width' => 'auto', 'filter' => true),
    array('label' => __(''), 'width' => 'auto', 'filter' => true),
);
$j = 4;
for ($i = 0; $i < count($actividades); $i++) {
    $j = $j + $i;
    $demas[$j] = array('label' => __($actividades[$i]['Activity']['nombre']), 'width' => 'auto', 'filter' => true);
    if ($actividades[$i]['Activity']['permanencia'] == true) {
        $j = $j + 1;
        $demas[$j] = array('label' => __(''), 'width' => 'auto', 'filter' => true);
        $j = $j + 1;
        $demas[$j] = array('label' => __(''), 'width' => 'auto', 'filter' => true);
    }
}

// heading
$this->PhpExcel->addTableHeader($demas, array('name' => 'Cambria', 'bold' => true));
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// data
function resta($inicio, $fin) {
    $dif = date("H:i:s", strtotime("00:00:00") + strtotime($fin) - strtotime($inicio));
    return $dif;
}

debug($datos2);
//debug($actividades);
$b = array();
$c = array();
for ($i = 0; $i < count($actividades); $i++) {
    $b[$i] = $actividades[$i]['Activity']['id'];
    $c[$i] = $actividades[$i]['Activity']['permanencia'];
}
//debug($b);
//debug($c);
//die;
//debug($datos2);
foreach ($datos2 as $dato) {
    $ch = 0;
    if (count($dato) == 8) {
        $datos = array(
            $dato['categoria'],
            $dato['documento'],
            $dato['nombres'],
            $dato['apellidos'],
        );
        for ($i = 0; $i < count($actividades); $i++) {
            $activity = $b[$ch];
            $permanencia = $c[$ch];
            $actividad = $dato['actividad'];
            $entrada = $dato['entrada'];
            $rest = substr($entrada, -8);
            if ($activity == $actividad) {
                array_push($datos, $entrada);
                if ($dato['permanencia'] == true) {
                    $salida = $dato['salida'];
                    $rest2 = substr($salida, -8);
                    $diferencia = resta($rest, $rest2);
                    array_push($datos, $salida);
                    array_push($datos, $diferencia);
                }
            } else {
                array_push($datos, '');
                if ($permanencia == true) {
                    array_push($datos, '');
                    array_push($datos, '');
                }
            }
            $ch++;
        }
    } else {
        $datos = array(
            $dato['categoria'],
            $dato['documento'],
            $dato['nombres'],
            $dato['apellidos'],
        );
        for ($i = 0; $i < count($actividades); $i++) {
            $activity = $b[$ch];
            $actividad = $dato['actividad'];
            $entrada = $dato['entrada'];
            $rest = substr($entrada, -8);
            if ($activity == $actividad) {
                array_push($datos, $entrada);
                if ($dato['permanencia'] == true) {
                    $salida = $dato['salida'];
                    $rest2 = substr($salida, -8);
                    $diferencia = resta($rest, $rest2);
                    array_push($datos, $salida);
                    array_push($datos, $diferencia);
                }
                $ch++;
                break;
            } else {
                array_push($datos, '');
                $permanencia = $c[$ch];
                if ($permanencia == true) {
                    array_push($datos, '');
                    array_push($datos, '');
                }
            }
            $ch++;
        }
        $k = 0;
        for ($j = 0; $j < ((count($dato) - 8) / 4); $j++) {
            $entrada = $dato[$k];
            $k++;
            $permanencia = $dato[$k];
            $k++;
            $salida = $dato[$k];
            $k++;
            $actividad = $dato[$k];
            $k++;
            $activity = $b[$ch];
//            debug($activity);
//            debug($actividad);
            if ($activity == $actividad) {
                array_push($datos, $entrada);
                if ($permanencia == true) {
                    $salida = $dato['salida'];
                    $rest2 = substr($salida, -8);
                    $diferencia = resta($rest, $rest2);
                    array_push($datos, $salida);
                    array_push($datos, $diferencia);
                }
            } else {
                array_push($datos, '');
                if ($permanencia == true) {
                    array_push($datos, '');
                    array_push($datos, '');
                }
            }
            $ch++;
        }
    }
    $this->PhpExcel->addTableRow($datos);
}
//debug($k);
//die;
$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte de actividades.xlsx");
?>