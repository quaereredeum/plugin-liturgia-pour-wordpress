<?php

$handle = fopen("traductions.csv", "r","1");
$xml="<traductions>\r";
while (($data = @fgetcsv($handle, 1000, ";")) !== FALSE) {
if($data[0]) $xml.="<item ref=\"".$data[0]."\">";
else $xml.="<item ref=\"".$data[1]."\">";
$xml.="<la>".$data[1]."</la>";
$xml.="<fr>".$data[2]."</fr>";
$xml.="<en>".$data[3]."</en>";
$xml.="</item>\r";
}
$xml.="</traductions>";
print $xml;
$sxe = new SimpleXMLElement($xml);
$sxe->asXML("traductions.xml");

?>