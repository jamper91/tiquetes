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
    array('label' => __('Hora'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Estado'), 'width' => 'auto', 'filter' => true),
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// data
foreach ($datos2 as $dato) {
    $this->PhpExcel->addTableRow(array(
        $dato['Nombre'],
        $dato['Apellido'],
        $dato['Cedula'],
        $dato['Empresa'],
        $dato['Manilla'],
        $dato['Chip'],
        $dato['Hora'],
        $dato['Estado'],
    ));
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte Usuarios Feria de las Florez"); 

?>