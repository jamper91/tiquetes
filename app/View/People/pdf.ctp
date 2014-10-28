
<?php

require_once('../Vendor/fpdf/ean13.php');
$pdf = new PDF_EAN13();
$pdf->Open();
$pdf->SetAutoPageBreak(true, 0.3);
$pdf->AddPage();

if ($data['tipo'] == 2) {

    if ($data['codigo']) {
        $codigo = $data['codigo'];
        $pdf->SetY(-24);
        $pdf->cell(0, 2, $pdf->EAN13(35, 77.3, "$codigo"), 0, 0, 'C');
        $pdf->Ln(2);
//    }
//    if ($data['nombre']) {
        $pdf->SetY(-61);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(0, 2, $data['nombre'], 0, 0, 'C');
        $pdf->Ln(2);
//    }
//    if ($data['apellido']) {
        $pdf->SetY(-55);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 2, $data['apellido'], 0, 0, 'C');
        $pdf->Ln(2);
//    }
//    if ($data['documento']) {
        $cedula = 'C.C ' . $data['documento'];
        $pdf->SetY(-51);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 2, $cedula, 0, 0, 'C');
        $pdf->Ln(2);
        // }
//    if ($data['empresa']!='') {
        $pdf->SetY(-47);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 2, $data['empresa'], 0, 0, 'C');
        $pdf->Ln(2);
    }
    if ($data['categoria']) {
        $pdf->SetY(-32);

////    }
//    if ($data['categoria']) {
        $pdf->SetY(-31);
        $pdf->SetFont('Arial', 'B', 22);
        $pdf->Cell(0, 2, $data['categoria'], 0, 0, 'C');
        $pdf->Ln(2);
    }

}
 

$pdf->AutoPrint(true);
//$pdf->Output('prueba', 'I');
//$pdf->AutoPrint(true);
$pdf->Output(); // 'prueba', 'I'
?>
