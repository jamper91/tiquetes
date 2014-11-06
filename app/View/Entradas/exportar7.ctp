<?php //
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('CATEGORIA'), 'width' => 'auto', 'filter' => true),
    array('label' => __('DOCUMENTO'), 'width' => 'auto', 'filter' => true),
    array('label' => __('NOMBRES'), 'width' => 'auto', 'filter' => true),
    array('label' => __('APELLIDOS'), 'width' => 'auto', 'filter' => true),
    array('label' => __('ACTIVIDAD'), 'width' => 'auto', 'filter' => true),
    array('label' => __('FECHA DE INGRESO'), 'width' => 'auto', 'filter' => true),
    array('label' => __('FECHA DE SALIDA'), 'width' => 'auto', 'filter' => true),
    
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// data
foreach ($datos as $dato) {
    $this->PhpExcel->addTableRow(array(
        $dato['categoria'],
        $dato['documento'],
        $dato['nombres'],
        $dato['apellidos'],
        $dato['actividad'],
        $dato['ingreso'],
        $dato['salida'],
    ));
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte de actividades.xlsx"); 

?>