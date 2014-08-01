<?php

//

$this->PhpExcel->createWorksheet();
$this->PhpExcel->setDefaultFont('Calibri', 12);

$totalV = 0;
$totalI = 0;
$fechaAnterior = "";
foreach ($datos as $dato) {
    $fecha2 = explode("-", $dato["Entrada"]["Fecha"]);
    $mons = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
    $fecha = $mons[$fecha2[0]] . " - " . $fecha2[1];
    if ($fecha != $fechaAnterior) {
        $this->PhpExcel->addTableRow(array(
            $fecha
        ));
        $fechaAnterior = $fecha;
        $this->PhpExcel->addTableRow(array(
            "Usuario",
            "Nombre Vendedor",
            "Cantidad"
        ));
    }


    $this->PhpExcel->addTableRow(array(
        $dato['User']["username"],
        $dato['Person']["pers_PrimNombre"],
        $dato['Entrada']["Cantidad"]
    ));
}

$this->PhpExcel->addTableFooter();
$this->PhpExcel->output("Reporte Ventas Fondas de mi Pueblo.xlsx");
?>