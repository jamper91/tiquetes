<?php

require_once('../Vendor/fpdf/fpdf_js.php');
//debug($data);
//
//$fpdf -> SetLineWidth(5);
//$fpdf -> SetMargins(2, 2);
$fpdf_1 = new PDF_JavaScript();
$fpdf_1->Open();
$fpdf_1->SetAutoPageBreak(true, 0.3);
$fpdf_1->AddPage();

$fpdf_1->Image('../webroot/img/certificate/CERTIFICADO-02.jpg', 0, 0, $fpdf_1->w, $fpdf_1->h);
$name = $data['certificado'][0]['certificados']['nombres'];
$doc = $data['certificado'][0]['certificados']['documento'];
$emp = $data['certificado'][0]['certificados']['empresa'];

if ($data['nombre']) {
    $ncompleto = $data['nombre'] . ' ' . $data['apellido'];
    $fpdf_1->SetY($name);
    $fpdf_1->SetFont('Arial', 'B', 28);
    $fpdf_1->Cell(0, 2, $ncompleto, 0, 0, 'C');
    $fpdf_1->Ln(2);
}


if ($data['documento']) {
    $fpdf_1->SetY($doc);
    $fpdf_1->SetFont('Arial', '', 16);
    $fpdf_1->Cell(0, 2, 'ID.' . ' ' . $data['documento'], 0, 0, 'C'); //$data['abr']
    $fpdf_1->Ln(2);
}

if ($emp != null) {
    $fpdf_1->SetY($emp);
    $fpdf_1->SetFont('Arial', 'B', 26);
    $fpdf_1->Cell(0, 2, $data['empresa'], 0, 0, 'C');
    $fpdf_1->Ln(2);
}

$fpdf_1->AutoPrint(true);
$fpdf_1->Output('prueba', 'I');
?>
