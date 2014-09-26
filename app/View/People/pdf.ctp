
<?php

require_once('../Vendor/fpdf/ean13.php');
$pdf = new PDF_EAN13();
$pdf->SetAutoPageBreak(true, 0.3);
$pdf->AddPage();
//$pdf->Image('../webroot/img/certificate/escarapela.png', 0, 0, $pdf->w, $pdf->h);
if ($data['tipo'] == 2) {

    if ($data['codigo']) {
        $codigo = $data['codigo'];
        $pdf->SetY(-24);
        $pdf->cell(0, 2, $pdf->EAN13(35, 77.3, "$codigo"), 0, 0, 'C');
        $pdf->Ln(2);
    }
    if ($data['nombre']) {
        $pdf->SetY(-63);
        $pdf->SetFont('Arial', 'B', 19);
        $pdf->Cell(0, 2, $data['nombre'], 0, 0, 'C');
        $pdf->Ln(2);
    }
    if ($data['apellido']) {
        $pdf->SetY(-58);
        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Cell(0, 2, $data['apellido'], 0, 0, 'C');
        $pdf->Ln(2);
    }

    if ($data['documento']) {
        $cedula = 'C.C ' . $data['documento'];
        $pdf->SetY(-54);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 2, $cedula, 0, 0, 'C');
        $pdf->Ln(2);
    }
    if ($data['empresa']) {
        $pdf->SetY(-50);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 2,$data['empresa'], 0, 0, 'C');
        $pdf->Ln(2);
    }
    if ($data['categoria']) {
        $pdf->SetY(-28);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(0, 2, $data['categoria'], 0, 0, 'C');
        $pdf->Ln(2);
    }
} else {
    if ($data['nombre']) {
        $ncompleto = $data['nombre'] . ' ' . $data['apellido'];
        $longitud = strlen($ncompleto);
//    debug($longitud);die;
        if ($longitud <= 14) {
            $pdf->SetY(-20);
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(0, 2, $ncompleto, 0, 0, 'C');
            $pdf->Ln(2);
        } elseif ($longitud <= 20) {
            $pdf->SetY(-20);
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(0, 2, $ncompleto, 0, 0, 'C');
            $pdf->Ln(2);
        } elseif ($longitud > 20) {
            $pdf->SetY(-20);
            $pdf->SetFont('Arial', 'B', 7.5);
            $pdf->Cell(0, 2, $ncompleto, 0, 0, 'C');
            $pdf->Ln(2);
        }
    }

    if ($data['documento']) {
        $cedula = 'C.C ' . $data['documento'];
        $pdf->SetY(-16);
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(0, 2, $cedula, 0, 0, 'C');
        $pdf->Ln(2);
    }
    if ($data['empresa']) {
        $pdf->SetY(-13);
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(0, 2, $data['empresa'], 0, 0, 'C');
        $pdf->Ln(2);
    }
    if ($data['empresa'] == '') {
        $pdf->SetY(-14);
        $pdf->Cell(0, 2, '', 0, 0, 'C');
        $pdf->Ln(2);
    }
}
//}
// $pdf->Image(WWW_ROOT."/img/banner.jpg",0,0,50,22); 
//$pdf->SetY(-50);
//$pdf->Cell(0,5,'Page '.'1',0,0,'C');
//$pdf->Image(WWW_ROOT."/img/body_bg.jpg",-20,10,30,22); 
$pdf->Output('prueba', 'I');
?>
