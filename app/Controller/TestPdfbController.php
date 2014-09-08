<?php

/*
 * * File: test_pdfb_controller.php
 * * Location: /controllers
 * * Purpouse: test pdf barcode library
 */

class TestPdfbController extends AppController {

    var $name = 'TestPdfb';
    var $uses = array(); // no models needed
    var $helpers = array('pdf'); // Use the helper just created

    function barcode() {
        $this->layout = 'pdf'; // Set layout to pdf
        $this->set('doc_id', '1234567'); // Set number to print
        $this->render('barcode');
    }

}

?>