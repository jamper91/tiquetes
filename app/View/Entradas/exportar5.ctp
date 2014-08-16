<?php //
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('Nombre'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Apellido'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Cedula'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Empresa'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Escarapela'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Chip'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Dia 1'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Dia 2'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Dia 3'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Dia 4'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Dia 5'), 'width' => 'auto', 'filter' => true),
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
        $dato['Agosto-4'],
        $dato['Agosto-5'],
        $dato['Agosto-1']+$dato['Agosto-2']+$dato['Agosto-3']+$dato['Agosto-4']+$dato['Agosto-5'],
    ));
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte Ingreso por Asistente.xlsx"); 

?>