<?php
require_once('../Vendor/fpdf/fpdf_js.php');
//debug($data);
//
//$fpdf -> SetLineWidth(5);
//$fpdf -> SetMargins(2, 2);
$fpdf = new PDF_JavaScript();
$fpdf->Open();
$fpdf->SetAutoPageBreak(true, 0.3);
$fpdf->AddPage();

//$fpdf->Image('../webroot/img/certificate/solidaridadcer.jpg',0,0,$fpdf->w,$fpdf->h);


if ($data['nombre']) {
    $ncompleto = $data['nombre'] . ' ' . $data['apellido'];
    $fpdf->SetY(-130);
    $fpdf->SetFont('Arial', 'B', 26);
//    $fpdf->Cell(-30);
    $fpdf->Cell(0, 2, $ncompleto, 0, 0, 'C');
    $fpdf->Ln(2);
}

//if ($data['documento']) {
////    $cedula = 'Identificado con ';
//    $fpdf->SetY(-125);
//    $fpdf->SetFont('Arial', '', 10);
//    $fpdf->Cell(-30);
//    $fpdf->Cell(0, 2, , 0, 0, 'C');
//    $fpdf->Ln(2);
//}

if ($data['documento']) {
//    $cedula = 'Identificado con ';
    $fpdf->SetY(-120);
    $fpdf->SetFont('Arial', 'B', 16);
//    $fpdf->Cell(-30); 
    $fpdf->Cell(0, 2, $data['abr'].' '.$data['documento'], 0, 0, 'C');
    $fpdf->Ln(2);
}

if ($data['empresa']) {
//    $cedula = 'Identificado con ';
    $fpdf->SetY(-110);
    $fpdf->SetFont('Arial', 'B', 16);
//    $fpdf->Cell(-30); 
    $fpdf->Cell(0, 2, $data['empresa'], 0, 0, 'C');
    $fpdf->Ln(2);
}

//if ($data['categoria']) {
//    
//        $fpdf->SetY(-62);
//        $fpdf->SetFont('Arial', 'B', 12);
//        $fpdf->Cell(0, 2, 'asistio en calidad de '.$data['categoria'] .' al', 0, 0, 'C');
//        $fpdf->Ln(2);
//    
//}
//if ($data['evento']) {
//    $fpdf->SetY(-56);
//    $fpdf->SetFont('Arial', '', 12);
//    $fpdf->Cell(0, 2,$data['evento'], 0, 0, 'C');
//    $fpdf->Ln(2);
//}
//
//if ($data['ciudad']) {
//    $fpdf->SetY(-48);
//    $fpdf->SetFont('Arial', '', 12);
//    $fpdf->Cell(0, 2,'realizado en la ciudad de '. $data['ciudad'].' ,Colombia en los dias comprendidos', 0, 0, 'C');
//    $fpdf->Ln(2);
//}
//
//if ($data['diainicio']) {
//    if($data['mesinicial']==$data['mesfinal'])
//    $fpdf->SetY(-40);
//    $fpdf->SetFont('Arial', '', 12);
//    $fpdf->Cell(0, 2,'entre el '. $data['diainicio'].' y el '. $data['diafinal'].' de '. $data['mesinicial'].' de '. $data['ano'], 0, 0, 'C');
//    $fpdf->Ln(2);
//}

//$fpdf->SetY(-62);
//    $fpdf->SetFont('Arial', '', 13);
//    $fpdf->Cell(-30);
//    $fpdf->Cell(0, 2, 'con una intensidad de 20 horas', 0, 0, 'C');
//    $fpdf->Ln(2);
//}
// $fpdf->Image(WWW_ROOT."/img/banner.jpg",0,0,50,22); 
//$fpdf->SetY(-50);
//$fpdf->Cell(0,5,'Page '.'1',0,0,'C');
//$fpdf->Image(WWW_ROOT."/img/body_bg.jpg",-20,10,30,22); 
$fpdf->AutoPrint(true);
$fpdf->Output();//'prueba', 'I'

?>
