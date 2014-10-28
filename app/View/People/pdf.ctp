
<?php

require_once('../Vendor/fpdf/ean13.php');
$pdf = new PDF_EAN13();
$pdf->Open();
$pdf->SetAutoPageBreak(true, 0.3);
$pdf->AddPage();


$cod = $data['escarapela'][0]['escarapelas']['codigo'];
$nombres = $data['escarapela'][0]['escarapelas']['nombres'];
$tam_nombres = $data['escarapela'][0]['escarapelas']['tam_nombre'];
$apellidos = $data['escarapela'][0]['escarapelas']['apellidos'];
$tam_apellidos = $data['escarapela'][0]['escarapelas']['tam_apellido'];
$documento = $data['escarapela'][0]['escarapelas']['documento'];
$tam_documento = $data['escarapela'][0]['escarapelas']['tam_documento'];
$empresa = $data['escarapela'][0]['escarapelas']['empresa'];
$tam_empresa = $data['escarapela'][0]['escarapelas']['tam_empresa'];
$categoria = $data['escarapela'][0]['escarapelas']['categoria'];
$tam_categoria = $data['escarapela'][0]['escarapelas']['tam_categoria'];

if ($data['tipo'] == 2) {

    if ($data['codigo']) {
        $codigo = $data['codigo'];
        $pdf->SetY(-24);
        $pdf->cell(0, 2, $pdf->EAN13(35, $cod, "$codigo"), 0, 0, 'C');
        $pdf->Ln(2);
//    }
//    if ($data['nombre']) {
        $pdf->SetY($nombres);
        $pdf->SetFont('Arial', 'B', $tam_nombres);
        $pdf->Cell(0, 2, $data['nombre'], 0, 0, 'C');
        $pdf->Ln(2);
//    }
//    if ($data['apellido']) {
        $pdf->SetY($apellidos);
        $pdf->SetFont('Arial', 'B', $tam_apellidos);
        $pdf->Cell(0, 2, $data['apellido'], 0, 0, 'C');
        $pdf->Ln(2);
//    }
//    if ($data['documento']) {
        $cedula = 'C.C ' . $data['documento'];
        $pdf->SetY($documento);
        $pdf->SetFont('Arial', '', $tam_documento);
        $pdf->Cell(0, 2, $cedula, 0, 0, 'C');
        $pdf->Ln(2);
        // }
//    if ($data['empresa']!='') {
        if ($empresa != null && $empresa != '') {
            $pdf->SetY($empresa);
            $pdf->SetFont('Arial', '', $tam_empresa);
            $pdf->Cell(0, 2, $data['empresa'], 0, 0, 'C');
            $pdf->Ln(2);
        }
        if ($categoria != null && $categoria != '') {
            $pdf->SetY($categoria);
            $pdf->SetFont('Arial', 'B', $tam_categoria);
            $pdf->Cell(0, 2, $data['categoria'], 0, 0, 'C');
            $pdf->Ln(2);
        }
    }
}
$pdf->AutoPrint(true);
//$pdf->AutoPrint(true);
//$pdf->Output('prueba', 'I');
//$pdf->AutoPrint(true);
$pdf->Output(); // 'prueba', 'I'
?>
