<?php //
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('Fecha de Diligenciamiento'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Nombres'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Apellidos'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Identificación'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Lugar de Expedición'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Tipo de Participante'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Teléfono'), 'width' => 'auto', 'filter' => true),
    array('label' => __('E-mail'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Dirección'), 'width' => 'auto', 'filter' => true),    
    array('label' => __('Municipio'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Institución'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Cargo'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Fecha de Impresion del Certificado'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Impreso por'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Dia 1'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Dia 2'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Dia 3'), 'width' => 'auto', 'filter' => true),
    array('label' => __('Total'), 'width' => 'auto', 'filter' => true)
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// data
foreach ($datos as $dato) {
    $this->PhpExcel->addTableRow(array(
        $dato['Fecha'],
        $dato['Nombre'],
        $dato['Apellido'],       
        $dato['Documento'],
        $dato['Lugar'],
        $dato['Tipo'],
        $dato['Telefono'],
        $dato['Email'],
        $dato['Direccion'],
        $dato['Municipio'],
        $dato['Institucion'],
        $dato['Cargo'],
        $dato['Fecha2'],
        $dato['Impreso'],
        $dato['Agosto-1'],
        $dato['Agosto-2'],
        $dato['Agosto-3'],
        $dato['Agosto-1']+$dato['Agosto-2']+$dato['Agosto-3'],
    ));
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte Ingreso por Asistente.xlsx"); 

?>