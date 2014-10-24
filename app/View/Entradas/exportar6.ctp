<?php //
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('CATEGORIA'), 'width' => 'auto', 'filter' => true),
    array('label' => __('DOCUMENTO'), 'width' => 'auto', 'filter' => true),
    array('label' => __('NOMBRES'), 'width' => 'auto', 'filter' => true),
    array('label' => __('APELLIDOS'), 'width' => 'auto', 'filter' => true),
    array('label' => __('EMPRESA'), 'width' => 'auto', 'filter' => true),
    array('label' => __('FECHA LECTURA'), 'width' => 'auto', 'filter' => true),
    array('label' => __('DESCRIPCION'), 'width' => 'auto', 'filter' => true),
    
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// data
foreach ($datos as $dato) {
    $this->PhpExcel->addTableRow(array(
        $dato['Categoria'],
        $dato['Documento'],
        $dato['Nombres'],
        $dato['Apellidos'],
        $dato['Empresa'],
        $dato['Fecha'],
        $dato['Descripcion'],
    ));
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte Consumibles.xlsx"); 

?>