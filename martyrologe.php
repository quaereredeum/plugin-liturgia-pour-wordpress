<?php

function martyrologe($xml){
setlocale(LC_TIME, "fr_FR.UTF-8");
$date_ts=$GLOBALS['date_ts'];

/*$date=$GLOBALS['date'];
if($date) {
	
$anno=substr($date,0,4);
$mense=substr($date,4,2);
$die=substr($date,6,2);
$date_ts=mktime(12,0,0,$mense,$die,$anno);
}
*/
	$jrdumois=(int)date("d",$date_ts);
	$jrdelasem=strftime("%A ",$date_ts);
	$jrdelasem=ucfirst ( $jrdelasem );
	$date_formatee=$jrdelasem." ".$jrdumois." ".strftime("%B ",$date_ts).date("Y",$date_ts);
	
	$xml=$GLOBALS['liturgia'];
	//print_r($xml);
	print"<br><b>Martyrologe pour le ".$date_formatee."</b><br/><br/>";
	$output = "";
	foreach( $xml->martyrologe->children() as $saint )
	{
		$node = trim( $saint ) ;
		if( !empty( $node ) )
		{
			$output .= $node. "\r\n\r\n" ;			
		}
	}
	$output .= "\r\nEt encore ailleurs, beaucoup d'autres saints et bienheureux.\r\n\r\n" ;
	$output .= "V/. Elle est précieuse au regard de Dieu\r\n\r\n" ;
	$output .= "R/. La mort de ses saints\r\n\r\n" ;
	$output .= "Que la Sainte Vierge Marie et tous les saints intercèdent pour nous auprès du Seigneur, pour que nous obtenions de Lui aide et salut, Lui qui vit et règne pour les siècles des siècles.\r\n\r\n" ;
	
	print nl2br($output);
}