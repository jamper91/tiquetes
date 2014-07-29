<?php
  /**
   * Export all member records in .xls format
   * with the help of the xlsHelper
   */
 
  //declare the xls helper
  $xls= new Xls();
 
  //input the export file name
  $xls->setHeader('City_'.date('Y_m_d'));
 
  $xls->addXmlHeader();
  $xls->setWorkSheetName('City');
   
  //1st row for columns name
  $xls->openRow();
  $xls->writeString('identificador');
  $xls->writeString('nombre');
//  $xls->writeString('StringField3');
//  $xls->writeString('NumberField4');
  $xls->closeRow();
   
  //rows for data
  foreach ($cities as $city):
    $xls->openRow();
    $xls->writeNumber($city['City']['id']);
    $xls->writeString($city['City']['name']);
//    $xls->writeString($city['City']['string_field_3']);
//    $xls->writeNumber($city['City']['number_field_4']);
    $xls->closeRow();
  endforeach;
  
  $xls->addXmlFooter();
  exit();
?>