<?php

//
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('Identificación'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Nombres'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Apellidos'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Empresa'), 'width' => 'auto', 'filter' => true),
    array('label' => __('sector'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Categoria'), 'width' => 'auto', 'filter' => true),
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));
foreach ($gifts as $key => $gift) {
    $table = array(
        array('label' => __('Identificación'), 'width' => 'auto', 'filter' => true),
        array('label' => __('Nombres'), 'width' => 'auto', 'filter' => true),
        array('label' => __('Apellidos'), 'width' => 'auto', 'filter' => true),
        array('label' => __('Empresa'), 'width' => 'auto', 'filter' => true),
        array('label' => __('sector'), 'width' => 'auto', 'filter' => true),
        array('label' => __('Categoria'), 'width' => 'auto', 'filter' => true),
    );
    $this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));
}
// data
foreach ($datos as $dato) {
    $this->PhpExcel->addTableRow(array(
        
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
        $dato['Agosto-1'] + $dato['Agosto-2'] + $dato['Agosto-3'] + $dato['Agosto-4'],
    ));
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte Ingreso por Asistente.xlsx");
?>