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

//$fpdf_1->Image('../webroot/img/certificate/solidaridadcer.jpg',0,0,$fpdf_1->w,$fpdf_1->h);


if ($data['nombre']) {
    $ncompleto = $data['nombre'] . ' ' . $data['apellido'];
    $fpdf_1->SetY(-130);
    $fpdf_1->SetFont('Arial', 'B', 26);
//    $fpdf_1->Cell(-30);
    $fpdf_1->Cell(0, 2, $ncompleto, 0, 0, 'C');
    $fpdf_1->Ln(2);
}

//if ($data['documento']) {
////    $cedula = 'Identificado con ';
//    $fpdf_1->SetY(-125);
//    $fpdf_1->SetFont('Arial', '', 10);
//    $fpdf_1->Cell(-30);
//    $fpdf_1->Cell(0, 2, , 0, 0, 'C');
//    $fpdf_1->Ln(2);
//}

if ($data['documento']) {
//    $cedula = 'Identificado con ';
    $fpdf_1->SetY(-120);
    $fpdf_1->SetFont('Arial', 'B', 16);
//    $fpdf_1->Cell(-30); 
    $fpdf_1->Cell(0, 2, $data['abr'].' '.$data['documento'], 0, 0, 'C');
    $fpdf_1->Ln(2);
}

if ($data['empresa']) {
//    $cedula = 'Identificado con ';
    $fpdf_1->SetY(-110);
    $fpdf_1->SetFont('Arial', 'B', 16);
//    $fpdf_1->Cell(-30); 
    $fpdf_1->Cell(0, 2, $data['empresa'], 0, 0, 'C');
    $fpdf_1->Ln(2);
}

//if ($data['categoria']) {
//    
//        $fpdf_1->SetY(-62);
//        $fpdf_1->SetFont('Arial', 'B', 12);
//        $fpdf_1->Cell(0, 2, 'asistio en calidad de '.$data['categoria'] .' al', 0, 0, 'C');
//        $fpdf_1->Ln(2);
//    
//}
//if ($data['evento']) {
//    $fpdf_1->SetY(-56);
//    $fpdf_1->SetFont('Arial', '', 12);
//    $fpdf_1->Cell(0, 2,$data['evento'], 0, 0, 'C');
//    $fpdf_1->Ln(2);
//}
//
//if ($data['ciudad']) {
//    $fpdf_1->SetY(-48);
//    $fpdf_1->SetFont('Arial', '', 12);
//    $fpdf_1->Cell(0, 2,'realizado en la ciudad de '. $data['ciudad'].' ,Colombia en los dias comprendidos', 0, 0, 'C');
//    $fpdf_1->Ln(2);
//}
//
//if ($data['diainicio']) {
//    if($data['mesinicial']==$data['mesfinal'])
//    $fpdf_1->SetY(-40);
//    $fpdf_1->SetFont('Arial', '', 12);
//    $fpdf_1->Cell(0, 2,'entre el '. $data['diainicio'].' y el '. $data['diafinal'].' de '. $data['mesinicial'].' de '. $data['ano'], 0, 0, 'C');
//    $fpdf_1->Ln(2);
//}

//$fpdf_1->SetY(-62);
//    $fpdf_1->SetFont('Arial', '', 13);
//    $fpdf_1->Cell(-30);
//    $fpdf_1->Cell(0, 2, 'con una intensidad de 20 horas', 0, 0, 'C');
//    $fpdf_1->Ln(2);



//}
// $fpdf->Image(WWW_ROOT."/img/banner.jpg",0,0,50,22); 
//$fpdf->SetY(-50);
//$fpdf->Cell(0,5,'Page '.'1',0,0,'C');
//$fpdf->Image(WWW_ROOT."/img/body_bg.jpg",-20,10,30,22); 
$fpdf_1->AutoPrint(true);
$fpdf_1->Output('prueba', 'I');

?>
