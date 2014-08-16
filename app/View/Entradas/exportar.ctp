<?php

$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('Fecha'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Validos'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Invalidos'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Total'), 'width' => 'auto', 'filter' => true),
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));
// data
$totalV = 0;
$totalI = 0;
foreach ($datos3 as $dato) {

    $this->PhpExcel->addTableRow(array(
        $dato['Fecha'],
        $dato['Validos'],
        $dato['Invalidos'],
         $dato['Validos']+ $dato['Invalidos']
    ));
    $totalV+=$dato['Validos'];
    $totalI+=$dato['Invalidos'];
}
$this->PhpExcel->addTableRow(array(
    "Total",
    $totalV,
    $totalI,
    $totalV+$totalI
));

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte General.xlsx");
?>