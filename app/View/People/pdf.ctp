
<?php 
	//debug($data);
    //
	//$fpdf -> SetLineWidth(5);
    //$fpdf -> SetMargins(2, 2);
    $fpdf -> SetAutoPageBreak(true, 0.3);
    $fpdf -> AddPage();
    

	if($data['nombre']){
        $ncompleto = $data['nombre'].' '.$data['apellido'];
        $fpdf->SetY(-30);
		$fpdf->SetFont('Arial','B',16);
		$fpdf->Cell(0,2, $ncompleto ,0,0,'C');
		$fpdf->Ln(2);
	}

    if($data['documento'])
    {
        $cedula = 'C.C '.$data['documento'];
        $fpdf->SetY(-25);
    	$fpdf->SetFont('Arial','',8);
    		$fpdf->Cell(0,2, $cedula,0,0,'C');
    		$fpdf->Ln(2);	
    }
    if($data['empresa'])
    {
        $fpdf->SetY(-20);
    	$fpdf->SetFont('Arial','',8);
		$fpdf->Cell(0,2, $data['empresa'],0,0,'C');
		$fpdf->Ln(2);	
    }
    if($data['empresa'] == '')
    {
        $fpdf->SetY(-20);
        $fpdf->Cell(0,2, '',0,0,'C');
        $fpdf->Ln(2);
    }

    if($data['ciudad'])
    {
        $fpdf->SetY(-15);
        $fpdf->SetFont('Arial','',8);
        $fpdf->Cell(0,2, $data['ciudad'],0,0,'C');
        $fpdf->Ln(2);   
    }

    
    if($data['categoria'])
    {
    	foreach ($data['categoria'] as $value) {
            $fpdf->SetY(-10);
    		$fpdf->SetFont('Arial','B', 22);
    		$fpdf->Cell(0,2, $value,0,0,'C');
    		$fpdf->Ln(2);
    	}
    		
    }
    	
    	
    	
    //}
    
   // $fpdf->Image(WWW_ROOT."/img/banner.jpg",0,0,50,22); 


    //$fpdf->SetY(-50);
    //$fpdf->Cell(0,5,'Page '.'1',0,0,'C');
    //$fpdf->Image(WWW_ROOT."/img/body_bg.jpg",-20,10,30,22); 
    $fpdf->Output('prueba','I');
 ?>
