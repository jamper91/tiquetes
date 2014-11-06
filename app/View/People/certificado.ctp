<?php

require_once('../Vendor/fpdf/fpdf_js.php');
//debug($data);
//
//$fpdf -> SetLineWidth(5);
//$fpdf -> SetMargins(2, 2);
$fpdf = new PDF_JavaScript();
$fpdf->Open();
$fpdf->SetAutoPageBreak(true, 0.3);
$fpdf->AddPage('L', array('279.4', '215.9'));
//$fpdf->Image('../webroot/img/certificate/CERTIFICADO-02.jpg', 0, 0, $fpdf->w, $fpdf->h);
$name = $data['certificado'][0]['certificados']['nombres'];
$doc = $data['certificado'][0]['certificados']['documento'];
$emp = $data['certificado'][0]['certificados']['empresa'];

if ($data['nombre']) {
    $ncompleto = $data['nombre'] . ' ' . $data['apellido'];
    $fpdf->SetY($name);
    $fpdf->SetFont('Arial', 'B', 28);
    $fpdf->Cell(0, 2, $ncompleto, 0, 0, 'C');
    $fpdf->Ln(2);
}


if ($data['documento']) {
    $fpdf->SetY($doc);
    $fpdf->SetFont('Arial', '', 16);
    $fpdf->Cell(0, 2, 'ID.' . ' ' . $data['documento'], 0, 0, 'C'); //$data['abr']
    $fpdf->Ln(2);
}

if ($emp != null) {
    $fpdf->SetY($emp);
    $fpdf->SetFont('Arial', 'B', 26);
    $fpdf->Cell(0, 2, $data['empresa'], 0, 0, 'C');
    $fpdf->Ln(2);
}

$fpdf->AutoPrint(true);
$fpdf->Output('prueba', 'I');
?>
