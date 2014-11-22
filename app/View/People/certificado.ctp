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
//$fpdf->Image('../webroot/img/certificate/CERTIFICADOSC-03.jpg', 0, 0, $fpdf->w, $fpdf->h);
//debug($data);
//die;
$name = $data['certificado'][0]['certificados']['nombres'];
$doc = $data['certificado'][0]['certificados']['documento'];
$emp = $data['certificado'][0]['certificados']['empresa'];
$libre = $data['certificado'][0]['certificados']['libre'];
$id = $data['id'];
$cat = $data['categoria'];

if ($data['nombre']) {
    $ncompleto = $data['nombre'] . ' ' . $data['apellido'];
    $cuenta = strlen($ncompleto);    
    $fpdf->SetY($name);
    if ($cuenta <=25){
    $fpdf->SetFont('Arial', 'B', 41);
    } else if ($cuenta<=30){
      $fpdf->SetFont('Arial', 'B', 38);  
    } else if($cuenta <=35){
        $fpdf->SetFont('Arial', 'B', 33);  
    }else if($cuenta >36){
        $fpdf->SetFont('Arial', 'B', 24);  
    }
    if($id==3){
    $fpdf->SetTextColor(130, 130, 130);
    }
    $fpdf->Cell(0, 2, utf8_decode($ncompleto), 0, 0, 'C');
    $fpdf->Ln(2);
}

if ($doc != '' && $doc != null) {
    if ($data['documento']) {
        $fpdf->SetY($doc);
        $fpdf->SetFont('Arial', '', 16);
        $fpdf->Cell(0, 2, 'ID.' . ' ' . $data['documento'], 0, 0, 'C'); //$data['abr']
        $fpdf->Ln(2);
    }
}
if ($emp != null) {
    $fpdf->SetY($emp);
    $fpdf->SetFont('Arial', 'B', 26);
    $fpdf->Cell(0, 2, $data['empresa'], 0, 0, 'C');
    $fpdf->Ln(2);
}
if ($libre == true) {
    
    if ($cat == "PONENTE") {
        $fpdf->SetXY(0, -99);
//        $fpdf->SetY(-99);
        $fpdf->SetFont('Arial', '', 14);
        $fpdf->Cell(0, 2, utf8_decode("Participó como ponente en el"), 0, 0, 'C');
        $fpdf->Ln(2);
    } else {
        $fpdf->SetXY(0, -99);
//        $fpdf->SetY(-99);
        $fpdf->SetFont('Arial', '', 14);
        $fpdf->Cell(0, 2, utf8_decode("Participó en el"), 0, 0, 'C');
        $fpdf->Ln(2);
    }
}
$fpdf->AutoPrint(true);
$fpdf->Output('prueba', 'I');
?>
