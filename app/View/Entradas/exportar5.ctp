<?php //
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('Fecha de Diligenciamiento'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Tipo de documento'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Identificación'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Nombres'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Apellidos'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Empresa'), 'width' => 'auto', 'filter' => true),    
    array('label' => __('Cargo'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Telefono'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Celular'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Email'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Ciudad'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Pais'), 'width' => 'auto', 'filter' => true),
    array('label' => __('sector'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Categoria'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Impreso por'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Fecha de Impresion'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Dia 1'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Dia 2'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Dia 3'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Dia 4'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Total'), 'width' => 'auto', 'filter' => true),
    
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// data
foreach ($datos as $dato) {
    $this->PhpExcel->addTableRow(array(
        $dato['Fecha'],
        $dato['Tipo2'],
        $dato['Documento'],
        $dato['Nombre'],
        $dato['Apellido'],
        $dato['Empresa'],
        $dato['Cargo'],
        $dato['Telefono'],
        $dato['Celular'],
        $dato['Email'],
        $dato['Ciudad'],
        $dato['Pais'],
        $dato['Sector'],
        $dato['Tipo'],
        $dato['Impreso'],
        $dato['Fecha2'],
        $dato['Agosto-1'],
        $dato['Agosto-2'],
        $dato['Agosto-3'],
        $dato['Agosto-4'],
        $dato['Agosto-1']+$dato['Agosto-2']+$dato['Agosto-3']+$dato['Agosto-4'],
    ));
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte Ingreso por Asistente.xlsx"); 

?>