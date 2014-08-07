<?php
App::uses('AppController', 'Controller');
/**
 * PDF Controller
 *
 */
class PDFsController extends AppController {

    public $uses=array();
    
    public function index(){
      
    }
  
    public function viewpdf() {
      App::import('Vendor', 'Fpdf', array('file' =>'fpdf/fpdf.php'));
      $this->layout = 'pdf'; //this will use the pdf.ctp layout
   
      $this->set('fpdf', new FPDF('P','mm','A4'));
      $this->set('data', 'Hola, PDF mundo');
   
      $this->render('pdf');
    }

}
