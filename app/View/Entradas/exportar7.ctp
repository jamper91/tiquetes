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
//    array('label' => __('FECHA DE INGRESO'), 'width' => 'auto', 'filter' => true),
//    array('label' => __('FECHA DE SALIDA'), 'width' => 'auto', 'filter' => true),
//    array('label' => __('PERMANENCIA'), 'width' => 'auto', 'filter' => true),
);
$l = 0;
for ($k = 4; $k < count($actividades) + 4; $k++) {
    $table[$k + $l] = array('label' => __('FECHA DE INGRESO'), 'width' => 'auto', 'filter' => true);
    $l = $l + 1;
    $table[$k + $l] = array('label' => __('FECHA DE SALIDA'), 'width' => 'auto', 'filter' => true);
    $l = $l + 1;
    $table[$k + $l] = array('label' => __('PERMANENCIA'), 'width' => 'auto', 'filter' => true);
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
    $j = $j + 1;
    $demas[$j] = array('label' => __(''), 'width' => 'auto', 'filter' => true);
    $j = $j + 1;
    $demas[$j] = array('label' => __(''), 'width' => 'auto', 'filter' => true);
}

// heading
$this->PhpExcel->addTableHeader($demas, array('name' => 'Cambria', 'bold' => true));
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// data
foreach ($datos2 as $dato) {
//    debug($dato['ingreso']);die;
    $entrada = $dato['ingreso'];
    $salida = $dato['salida'];    
    $this->PhpExcel->addTableRow(array(
        $dato['categoria'],
        $dato['documento'],
        $dato['nombres'],
        $dato['apellidos'],
        $entrada,
        $salida,
    ));
//    debug($entrada);die;
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte de actividades.xlsx");
?>