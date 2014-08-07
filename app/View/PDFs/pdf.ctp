
<?php 
	
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',16);
    $fpdf->Cell(20,100, $data);
    $fpdf->Image(WWW_ROOT."/img/banner.jpg",0,0,50,22); 


    $fpdf->SetY(-50);
    $fpdf->Cell(0,5,'Page '.'1',0,0,'C');
    $fpdf->Output('prueba','I');
 ?>
