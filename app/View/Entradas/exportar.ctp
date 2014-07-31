<?php

$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
//$table = array(
////    array('label' => __('Cantidad'), 'width' => 'auto', 'filter' => true),
////    array('label' => __('Tipo'), 'width' => 'auto', 'filter' => true),
//);
//
//// heading
//$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));
// data
$totalV = 0;
$totalI = 0;
foreach ($datos3 as $dato) {
    $this->PhpExcel->addTableRow(array(
        $dato['Fecha']
    ));
    $this->PhpExcel->addTableRow(array(
        "Validos",
        "Invalido"
    ));

    $this->PhpExcel->addTableRow(array(
        $dato['Validos'],
        $dato['Invalidos']
    ));
    $totalV+=$dato['Validos'];
    $totalI+=$dato['Invalidos'];
}
$this->PhpExcel->addTableRow(array(
    "Total"
));
$this->PhpExcel->addTableRow(array(
    "Validos",
    "Invalido"
));
$this->PhpExcel->addTableRow(array(
    $totalV,
    $totalI
));

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte General Feria de las Florez");
?>