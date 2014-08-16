<?php //
$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

// define table cells
$table = array(
    array('label' => __('Cantidad Usuarios'), 'width' => 'auto', 'filter' => true)    
);

// heading
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// data
foreach ($datos as $dato) {
    $this->PhpExcel->addTableRow(array(
        $dato['Entrada']["Cantidad"]
    ));
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte Usuarios Registrados.xlsx"); 

?>