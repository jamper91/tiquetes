<?php //
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('Nombre'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Apellido'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Cedula'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Empresa'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Manilla'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Chip'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Agosto 1'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Agosto 2'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Agosto 3'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Total'), 'width' => 'auto', 'filter' => true)
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// data
foreach ($datos as $dato) {
    $this->PhpExcel->addTableRow(array(
        $dato['Nombre'],
        $dato['Apellido'],
        $dato['Cedula'],
        $dato['Empresa'],
        $dato['Manilla'],
        $dato['Chip'],
        $dato['Agosto-1'],
        $dato['Agosto-2'],
        $dato['Agosto-3'],
        $dato['Agosto-1']+$dato['Agosto-2']+$dato['Agosto-3'],
    ));
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte Ingreso por Asistente Fondas de mi Pueblo.xlsx"); 

?>