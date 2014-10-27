<?php

//
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('FECHA REGISTRO'), 'width' => 'auto', 'filter' => true),
    array('label' => __('CATEGORIA'), 'width' => 'auto', 'filter' => true),
    array('label' => __('TIPO DE DOCUMENTO'), 'width' => 'auto', 'filter' => true),
    array('label' => __('IDENTIFICACION'), 'width' => 'auto', 'filter' => true),
    array('label' => __('NOMBRES'), 'width' => 'auto', 'filter' => true),
    array('label' => __('APELLIDOS'), 'width' => 'auto', 'filter' => true),
    array('label' => __('EMPRESA'), 'width' => 'auto', 'filter' => true),
    array('label' => __('EMAIL'), 'width' => 'auto', 'filter' => true),
    array('label' => __('TELEFONO'), 'width' => 'auto', 'filter' => true),
    array('label' => __('CELULAR'), 'width' => 'auto', 'filter' => true),
    array('label' => __('CIUDAD'), 'width' => 'auto', 'filter' => true),
    array('label' => __('PAIS'), 'width' => 'auto', 'filter' => true),
    array('label' => __('STAND'), 'width' => 'auto', 'filter' => true),
    array('label' => __('SECTOR'), 'width' => 'auto', 'filter' => true),
    array('label' => __('OBSERVACIONES'), 'width' => 'auto', 'filter' => true),
    array('label' => __('USER ESCARAPELA'), 'width' => 'auto', 'filter' => true),
    array('label' => __('IMPRESION ESCARAPELA'), 'width' => 'auto', 'filter' => true),
    array('label' => __('USER CERTIFICADO'), 'width' => 'auto', 'filter' => true),
    array('label' => __('FECHA CERTIFICADO'), 'width' => 'auto', 'filter' => true),
    array('label' => __('CODIGO DE BARRAS'), 'width' => 'auto', 'filter' => true),
    array('label' => __('DIA 1'), 'width' => 'auto', 'filter' => true),
    array('label' => __('DIA 2'), 'width' => 'auto', 'filter' => true),
    array('label' => __('DIA 3'), 'width' => 'auto', 'filter' => true),
    array('label' => __('DIA 4'), 'width' => 'auto', 'filter' => true),
    array('label' => __('DIA 5'), 'width' => 'auto', 'filter' => true),
    array('label' => __('DIA 6'), 'width' => 'auto', 'filter' => true),
    array('label' => __('DIA 7'), 'width' => 'auto', 'filter' => true),
    array('label' => __('DIA 8'), 'width' => 'auto', 'filter' => true),
    array('label' => __('TOTAL'), 'width' => 'auto', 'filter' => true),

);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// data

//if($datos != null) {
    foreach ($datos as $dato) {
        $this->PhpExcel->addTableRow(array(
            $dato['Fecha'],
            $dato['Tipo'],
            $dato['Tipo2'],
            $dato['Documento'],
            $dato['Nombre'],
            $dato['Apellido'],
            $dato['Empresa'],
            $dato['Email'],
            $dato['Telefono'],
            $dato['Celular'],
            $dato['Ciudad'],
            $dato['Pais'],
            $dato['Stand'],
            $dato['Sector'],
            $dato['Cargo'],
            $dato['Impreso'],
            $dato['Fecha2'],
            $dato['Impreso2'],
            $dato['Fecha3'],
            $dato['Codigo'],
            $dato['Agosto-1'],
            $dato['Agosto-2'],
            $dato['Agosto-3'],
            $dato['Agosto-4'],
            $dato['Agosto-5'],
            $dato['Agosto-6'],
            $dato['Agosto-7'],
            $dato['Agosto-8'],
            $dato['Agosto-1'] + $dato['Agosto-2'] + $dato['Agosto-3'] + $dato['Agosto-4'] + $dato['Agosto-5'] + $dato['Agosto-6'] + $dato['Agosto-7'] + $dato['Agosto-8'],
        ));
    }
//}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte Ingreso por Asistente.xlsx");
?>