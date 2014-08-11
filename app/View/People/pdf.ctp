
<?php 
	//debug($data);
    //
	$fpdf -> SetLineWidth(5);
    $fpdf -> SetMargins(0.3, 1, 0.3);
    $fpdf -> AddPage();
    

	if($data['nombre']){
        $ncompleto = $data['nombre'].' '.$data['apellido'];
		$fpdf->SetFont('Arial','B',6);
		$fpdf->Cell(0,6, $ncompleto ,0,0,'C');
		$fpdf->Ln(2);
	}

    if($data['documento'])
    {
        $cedula = 'C.C '.$data['documento'];
    	$fpdf->SetFont('Arial','',4);
    		$fpdf->Cell(0,6, $cedula,0,0,'C');
    		$fpdf->Ln(2);	
    }
    if($data['empresa'])
    {
    	$fpdf->SetFont('Arial','',4);
    		$fpdf->Cell(0,6, $data['empresa'],0,0,'C');
    		$fpdf->Ln(2);	
    }
    if($data['empresa'] == '')
    {
        $fpdf->Cell(0,6, '',0,0,'C');
        $fpdf->Ln(2);
    }

    if($data['ciudad'])
    {
        $fpdf->SetFont('Arial','',4);
        $fpdf->Cell(0,6, $data['ciudad'],0,0,'C');
        $fpdf->Ln(2);   
    }

    if($data['categoria'])
    {
    	foreach ($data['categoria'] as $value) {
    		$fpdf->SetFont('Arial','U', 6);
    		$fpdf->Cell(0,6, $value,0,0,'C');
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
