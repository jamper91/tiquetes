
<?php

//debug($data);

$fpdf->SetLineWidth(5);
$fpdf->SetMargins(1, 1, 1, 1);
$fpdf->AddPage('L');

$fpdf->SetAutoPageBreak(true, 1);
$fpdf->SetDisplayMode('real','default'); 

//foreach ($data as $dat) {
//debug($data['nombre']);
if ($data['nombre']) {
    $fpdf->SetFont('Arial', 'B', 6);
    $fpdf->Cell(0, 6, $data['nombre'], 0, 0, 'C');
    $fpdf->Ln(4);
}
if ($data['apellido']) {
    $fpdf->SetFont('Arial', '', 4);
    $fpdf->Cell(0, 6, $data['apellido'], 0, 0, 'C');
    $fpdf->Ln(4);
}

if ($data['documento']) {
    $fpdf->SetFont('Arial', '', 4);
    $fpdf->Cell(0, 6, $data['documento'], 0, 0, 'C');
    $fpdf->Ln(4);
}
if ($data['empresa']) {
    $fpdf->SetFont('Arial', '', 4);
    $fpdf->Cell(0, 6, $data['empresa'], 0, 0, 'C');
    $fpdf->Ln(4);
}
if ($data['categoria']) {
    foreach ($data['categoria'] as $value) {
        $fpdf->SetFont('Arial', 'B', 4);
        $fpdf->Cell(0, 6, $value, 0, 0, 'C');
        $fpdf->Ln(4);
    }
}



//}
// $fpdf->Image(WWW_ROOT."/img/banner.jpg",0,0,50,22); 


//$fpdf->SetY(-50);
////$fpdf->Cell(0,5,'Page '.'1',0,0,'C');
////$fpdf->Image(WWW_ROOT."/img/body_bg.jpg",-20,10,30,22); 
$fpdf->Output('prueba', 'I');
?>
