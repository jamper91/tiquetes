
<?php

require_once('../Vendor/fpdf/ean13.php');
$pdf = new PDF_EAN13();
$pdf->Open();
$pdf->SetAutoPageBreak(true, 0.3);
$pdf->AddPage();
$id = $data['escarapela'][0]['escarapelas']['id'];
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
$doc = $data['documento'];
if (strlen($doc) == 12) {
    $numero = substr($doc, -12, 1) . substr($doc, -11, 1) . substr($doc, -10, 1) . '.' . substr($doc, -9, 1) . substr($doc, -8, 1) . substr($doc, -7, 1) . '.' . substr($doc, -6, 1) . substr($doc, -5, 1) . substr($doc, -4, 1) . '.' . substr($doc, -3, 1) . substr($doc, -2, 1) . substr($doc, -1);
} elseif (strlen($doc) == 11) {
    $numero = substr($doc, -11, 1) . substr($doc, -10, 1) . '.' . substr($doc, -9, 1) . substr($doc, -8, 1) . substr($doc, -7, 1) . '.' . substr($doc, -6, 1) . substr($doc, -5, 1) . substr($doc, -4, 1) . '.' . substr($doc, -3, 1) . substr($doc, -2, 1) . substr($doc, -1);
    substr($doc, -10) . '.' . substr($doc, -9) . substr($doc, -8) . substr($doc, -7) . '.' . substr($doc, -6) . substr($doc, -5) . substr($doc, -4) . '.' . substr($doc, -3) . substr($doc, -2) . substr($doc, -1);
} elseif (strlen($doc) == 10) {
    $numero = substr($doc, -10, 1) . '.' . substr($doc, -9, 1) . substr($doc, -8, 1) . substr($doc, -7, 1) . '.' . substr($doc, -6, 1) . substr($doc, -5, 1) . substr($doc, -4, 1) . '.' . substr($doc, -3, 1) . substr($doc, -2, 1) . substr($doc, -1);
} elseif (strlen($doc) == 9) {
    $numero = substr($doc, -9, 1) . substr($doc, -8, 1) . substr($doc, -7, 1) . '.' . substr($doc, -6, 1) . substr($doc, -5, 1) . substr($doc, -4, 1) . '.' . substr($doc, -3, 1) . substr($doc, -2, 1) . substr($doc, -1);
} elseif (strlen($doc) == 8) {
    $numero = substr($doc, -8, 1) . substr($doc, -7, 1) . '.' . substr($doc, -6, 1) . substr($doc, -5, 1) . substr($doc, -4, 1) . '.' . substr($doc, -3, 1) . substr($doc, -2, 1) . substr($doc, -1);
} elseif (strlen($doc) == 7) {
    $numero = substr($doc, -7, 1) . '.' . substr($doc, -6, 1) . substr($doc, -5, 1) . substr($doc, -4, 1) . '.' . substr($doc, -3, 1) . substr($doc, -2, 1) . substr($doc, -1);
} elseif (strlen($doc) == 6) {
    $numero = substr($doc, -6, 1) . substr($doc, -5, 1) . substr($doc, -4, 1) . '.' . substr($doc, -3, 1) . substr($doc, -2, 1) . substr($doc, -1);
} elseif (strlen($doc) == 5) {
    $numero = substr($doc, -5, 1) . substr($doc, -4, 1) . '.' . substr($doc, -3, 1) . substr($doc, -2, 1) . substr($doc, -1);
} elseif (strlen($doc) == 4) {
    $numero = substr($doc, -4, 1) . '.' . substr($doc, -3, 1) . substr($doc, -2, 1) . substr($doc, -1);
} else {
    $numero = $doc;
}
$pdf->Image('../webroot/img/certificate/siete.jpg', 0, 0, $pdf->w, $pdf->h);
if ($data['tipo'] == 2) {

    if ($data['codigo']) {
        $codigo = $data['codigo'];
        $pdf->SetY(-24);
        $pdf->cell(0, 2, $pdf->EAN13(35, $cod, "$codigo"), 0, 0, 'C');
        $pdf->Ln(2);

        if ($id != 7) {
            $pdf->SetY($nombres);
            $pdf->SetFont('Arial', 'B', $tam_nombres);
            $pdf->Cell(0, 2, $data['nombre'], 0, 0, 'C');
            $pdf->Ln(2);

            $pdf->SetY($apellidos);
            $pdf->SetFont('Arial', 'B', $tam_apellidos);
            $pdf->Cell(0, 2, $data['apellido'], 0, 0, 'C');
            $pdf->Ln(2);
        } else {
            $name = $data['nombre'] . ' ' . $data['apellido'];
            $x = strlen($name);
            if ($x <= 19) {
                $tam_nombres = 20;
            } else {
                $tam_nombres = 10;
            }
            $pdf->SetY($nombres);
            $pdf->SetFont('Arial', 'B', $tam_nombres);
            $pdf->Cell(0, 2, $name, 0, 0, 'C');
        }
        if ($documento != null && $documento != '') {
            $cedula = 'ID: ' . $numero;
            $pdf->SetY($documento);
            $pdf->SetFont('Arial', '', $tam_documento);
            $pdf->Cell(0, 2, $cedula, 0, 0, 'C');
            $pdf->Ln(2);
        }
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
