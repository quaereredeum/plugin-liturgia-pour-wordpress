<?php

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

/** PHPExcel_IOFactory */
include 'C:/phpscriptscli/PHPExcel/Classes/PHPExcel/IOFactory.php';


$inputFileName = 'w:/Calendrier_Re.xls';
echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);


echo '<hr />';

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
var_dump($sheetData);




$objPHPExcel = PHPExcel_IOFactory::load("w:/Calendrier_Re.xls");

?>