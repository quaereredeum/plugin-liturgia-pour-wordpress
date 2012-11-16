<?php

function journee() {
	//print"vérification de la semaine prochaine";
	
		
		$jour_ts=$GLOBALS['date_ts'];
		$ordo="RE";
		print "<br>Date : ".date('Ymd',$jour_ts);
		
//print"<br>an=".$an." mois=".$mois;

$file="http://92.243.24.163/wp-content/plugins/liturgia/calendrier/".date("Y-m-d",$jour_ts).".xml";
$xml = @simplexml_load_file($file);
$GLOBALS['liturgia']=$xml;
		lecture($date, $ordo);
		laudes($date, $ordo);
		tierce($date, $ordo);
		messe($date, $ordo);
		sexte($date, $ordo);
		none($date, $ordo);
		vepres($date, $ordo);
		complies($date, $ordo);
	
}
?>