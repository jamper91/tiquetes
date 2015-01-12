
<?php

require_once('../Vendor/fpdf/ean13.php');
require_once('../Vendor/phpqrcode/qrlib.php');
$pdf = new PDF_EAN13();

$pdf->Open();
$pdf->SetAutoPageBreak(true, 0.3);
$pdf->AddPage('P', array('100', '120'));
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
$qrx = $data['escarapela'][0]['escarapelas']['qrx'];
$qry = $data['escarapela'][0]['escarapelas']['qry'];
$doc = $data['documento'];
//debug($data);die;
$datos = $data['datos'];
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
$pdf->Image('../webroot/img/certificate/nueve.jpg', 0, 0, $pdf->w, $pdf->h);
if ($data['tipo'] == 2) {

    if ($data['codigo']) {
        $codigo = $data['codigo'];
        $pdf->SetY(-24);
//        debug($codigo);die;
        if ($id == 8) {
            $pdf->cell(0, 2, $pdf->EAN13(35, $cod, "$codigo"), 0, 0, 'C');
        } else {
            $pdf->cell(0, 2, $pdf->EAN13(35, $cod, "$codigo"), 0, 0, 'C');
        }
        $pdf->Ln(2);

        if ($id == 7 || $id == 9) {
            $name = $data['nombre'] . ' ' . $data['apellido'];
            $x = strlen($name);
            if ($x <= 19) {
                $tam_nombres = 20;
            } else if ($x <= 27) {
                $tam_nombres = 15;
            } else if ($x <= 35) {
                $tam_nombres = 11;
            } else {
                $tam_nombres = 10;
            }
            $pdf->SetY($nombres);
            $pdf->SetFont('Arial', 'B', $tam_nombres);
            $pdf->Cell(0, 2, utf8_decode($name), 0, 0, 'C');
        } elseif ($id == 8) {
            $name = "" . $data['nombre'] . ' ' . $data['apellido'];
            $x = strlen($name);
            if ($x <= 19) {
                $tam_nombres = 12;
            } else if ($x <= 27) {
                $name = "    " . $data['nombre'] . ' ' . $data['apellido'];
                $tam_nombres = 11;
            } else if ($x <= 35) {
                $name = "        " . $data['nombre'] . ' ' . $data['apellido'];
                $tam_nombres = 10;
            } else {
                $name = "            " . $data['nombre'] . ' ' . $data['apellido'];
                $tam_nombres = 8;
            }
            $pdf->SetY($nombres);
            $pdf->SetFont('Arial', 'B', $tam_nombres);
            $pdf->Cell(0, 2, utf8_decode($name), 0, 0, 'C');
        } else {
            $pdf->SetY($nombres);
            $pdf->SetFont('Arial', 'B', $tam_nombres);
            $pdf->Cell(0, 2, utf8_decode($data['nombre']), 0, 0, 'C');
            $pdf->Ln(2);

            $pdf->SetY($apellidos);
            $pdf->SetFont('Arial', 'B', $tam_apellidos);
            $pdf->Cell(0, 2, utf8_decode($data['apellido']), 0, 0, 'C');
            $pdf->Ln(2);
        }
        if ($documento != null && $documento != '') {
            if ($id != 8) {
                $cedula = 'ID: ' . $numero;
                $pdf->SetY($documento);
                $pdf->SetFont('Arial', '', $tam_documento);
                $pdf->Cell(0, 2, $cedula, 0, 0, 'C');
                $pdf->Ln(2);
            } else {
                $cedula = $numero;
                $pdf->SetY($documento);
                $pdf->SetFont('Arial', '', $tam_documento);
                $pdf->Cell(0, 2, $cedula, 0, 0, 'C');
                $pdf->Ln(2);
            }
        }
<<<<<<< HEAD
        if ($id == 9) {
            if ($empresa != null && $empresa != '') {
                $pdf->SetY($empresa);
                $pdf->SetFont('Arial', '', $tam_empresa);
                $pdf->Cell(0, 2, utf8_decode($data['empresa']).' '.utf8_decode($data['categoria']), 0, 0, 'C');
                $pdf->Ln(2);
            }
        } else {
            if ($empresa != null && $empresa != '') {
                $pdf->SetY($empresa);
                $pdf->SetFont('Arial', '', $tam_empresa);
                $pdf->Cell(0, 2, utf8_decode($data['empresa']), 0, 0, 'C');
                $pdf->Ln(2);
            }

            if ($categoria != null && $categoria != '') {
                $pdf->SetY($categoria);
                $pdf->SetFont('Arial', 'B', $tam_categoria);
                $pdf->Cell(0, 2, utf8_decode($data['categoria']), 0, 0, 'C');
                $pdf->Ln(2);
            }
=======
        
        if ($datos != array()) {
            $dato = "BEGIN:VCARD\n"
                    . "VERSION:2.1\n"
                    . "N:" .$datos['nombre'] . ";" . $datos['apellido'] . "\n"
                    . "FN:" . $datos['nombre'] . " " . $datos['apellido'] . "\n"
                    . "DOC:". $datos['documento']."\n"
                    . "TITLE:Desarrollador de Software\n"
                    . "TEL;WORK;VOICE:(111) 555-1212\n"
                    . "END:VCARD";
            QRcode::png($dato, '../webroot/img/certificate/QR.png', 1, 1);
            $pdf->Image('../webroot/img/certificate/QR.png', $qrx, $qrx);
        }
        
        if ($empresa != null && $empresa != '') {
            $pdf->SetY($empresa);
            $pdf->SetFont('Arial', '', $tam_empresa);
            $pdf->Cell(0, 2, utf8_decode($data['empresa']), 0, 0, 'C');
            $pdf->Ln(2);
        }
        
        if ($categoria != null && $categoria != '') {
            $pdf->SetY($categoria);
            $pdf->SetFont('Arial', 'B', $tam_categoria);
            $pdf->Cell(0, 2, utf8_decode($data['categoria']), 0, 0, 'C');
            $pdf->Ln(2);
>>>>>>> 9f1d7229e419643ec542942160038aee78656b57
        }
    }
}
$pdf->AutoPrint(true);
//$pdf->AutoPrint(true);
//$pdf->Output('prueba', 'I');
//$pdf->AutoPrint(true);
$pdf->Output(); // 'prueba', 'I'
?>
