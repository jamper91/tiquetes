
<?php

require_once('../Vendor/fpdf/ean13.php');
$pdf = new PDF_EAN13();
$pdf->SetAutoPageBreak(true, 0.3);
$pdf->AddPage();



if ($data['codigo']) {
    $codigo = $data['codigo'];
    $pdf->SetY(-10);
    $pdf->cell(0, 2, $pdf->EAN13(16, 22, "$codigo"), 0, 0, 'C');
    $pdf->Ln(2);
}
if ($data['nombre']) {
    $ncompleto = $data['nombre'] . ' ' . $data['apellido'];
    $pdf->SetY(-35);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 2, $ncompleto, 0, 0, 'C');
    $pdf->Ln(2);
}

if ($data['documento']) {
    $cedula = 'C.C ' . $data['documento'];
    $pdf->SetY(-30);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(0, 2, $cedula, 0, 0, 'C');
    $pdf->Ln(2);
}
if ($data['empresa']) {
    $pdf->SetY(-25);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(0, 2, $data['empresa'], 0, 0, 'C');
    $pdf->Ln(2);
}
if ($data['empresa'] == '') {
    $pdf->SetY(-25);
    $pdf->Cell(0, 2, '', 0, 0, 'C');
    $pdf->Ln(2);
}

if ($data['ciudad']) {
    $pdf->SetY(-21);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(0, 2, $data['ciudad'], 0, 0, 'C');
    $pdf->Ln(2);
}


//}
// $pdf->Image(WWW_ROOT."/img/banner.jpg",0,0,50,22); 
//$pdf->SetY(-50);
//$pdf->Cell(0,5,'Page '.'1',0,0,'C');
//$pdf->Image(WWW_ROOT."/img/body_bg.jpg",-20,10,30,22); 
$pdf->Output('prueba', 'I');
?>
