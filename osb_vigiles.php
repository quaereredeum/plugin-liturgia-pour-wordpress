<?php

//osb_vigiles($date,$tableau,$calendarium)

function osb_vigiles($jour) {
$lang=$_GET['lang'];
if($lang=="") $lang="fr";
$option=$_GET['option'];
$xml=$GLOBALS['liturgia'];
//print_r($xml);
$prio=$xml->xpath("//ordo[@id='RE']//priorite");
$priorite=$prio[0];

//////// INTITULE
print intitule();
print"<div class=\"gauche\"><center><i>Ad Vigilias</i></center></div>
<div class=\"droite\"><center><i>".get_traduction("Ad Vigilias", $lang)."</i></center></div>";
// Initial
print affiche_texte("OSB_Vigiles_initial",$lang);

// Psaume d'attente
print psaume("ps3",$lang);
// Invitatoire

// Hymne
//
$hr=$xml->xpath("ordo[@id='RE']/HYMNUS_lectures");
$hrr=$hr[0];
print hymne($hrr,$lang);

print"<div class=\"gauche\"><center><i>IN I NOCTURNO</i></center></div>
<div class=\"droite\"><center><i>".get_traduction("IN I NOCTURNO", $lang)."</i></center></div>";
// Antienne et psaume 1
$ar=$xml->xpath("ordo[@id='RE']/Vant1");
$arr=$ar[0];
//print $arr;
print antienne($arr,$lang,"1");
$psr=$xml->xpath("ordo[@id='RE']/Vps1");
$psrr=$psr[0];
//print $psrr;
print psaume($psrr,$lang);
print antienne($arr,$lang);
// Antienne et psaume 2
$ar=$xml->xpath("ordo[@id='RE']/Vant2");
$arr=$ar[0];
print antienne($arr,$lang,"2");
$psr=$xml->xpath("ordo[@id='RE']/Vps2");
$psrr=$psr[0];
print psaume($psrr,$lang);
print antienne($arr,$lang);
// Antienne et psaume 3
$ar=$xml->xpath("ordo[@id='RE']/Vant3");
$arr=$ar[0];
print antienne($arr,$lang,"3");
$psr=$xml->xpath("ordo[@id='RE']/Vps3");
$psrr=$psr[0];
print psaume($psrr,$lang);
if($arr) print antienne($arr,$lang);
// Antienne et psaume 4
$ar=$xml->xpath("ordo[@id='RE']/Vant4");
$arr=$ar[0];
print antienne($arr,$lang,"4");
$psr=$xml->xpath("ordo[@id='RE']/Vps4");
$psrr=$psr[0];
print psaume($psrr,$lang);
print antienne($arr,$lang);
///Antienne et psaume 5
$ar=$xml->xpath("ordo[@id='RE']/Vant5");
$arr=$ar[0];
print antienne($arr,$lang,"5");
$psr=$xml->xpath("ordo[@id='RE']/Vps5");
$psrr=$psr[0];
print psaume($psrr,$lang);
print antienne($arr,$lang);
///Antienne et psaume 6
$ar=$xml->xpath("ordo[@id='RE']/Vant6");
$arr=$ar[0];
print antienne($arr,$lang,"6");
$psr=$xml->xpath("ordo[@id='RE']/Vps6");
$psrr=$psr[0];
print psaume($psrr,$lang);
print antienne($arr,$lang);

// Verset
print verset("VERS_Intellectum_tibi",$lang);
// Lecture 1
$fer=$xml->xpath("ordo[@id='RE']/matin/ferie");
$ferie=$fer[0];
print lecture_vigiles("LEC_".$ferie."-II_1",$lang,"1");
// Répons 1
print repons_vigiles("RESP_".$ferie."_1",$lang,"1");
// Lecture 2
print  lecture_vigiles("LEC_".$ferie."-II_2",$lang,"2");
// Répons 2
print repons_vigiles("RESP_".$ferie."_2",$lang,"2");
// Lecture 3
print lecture_vigiles("LEC_".$ferie."-II_3",$lang,"3");
// Répons 3
print repons_vigiles("RESP_".$ferie."_3",$lang,"3");

print"<div class=\"gauche\"><center><i>IN II NOCTURNO</i></center></div>
<div class=\"droite\"><center><i>".get_traduction("IN II NOCTURNO", $lang)."</i></center></div>";
// Antienne et psaume7
$ar=$xml->xpath("ordo[@id='RE']/Vant7");
$arr=$ar[0];
print antienne($arr,$lang,"7");
$psr=$xml->xpath("ordo[@id='RE']/Vps7");
$psrr=$psr[0];
print psaume($psrr,$lang);
print antienne($arr,$lang);
// Antienne et psaume 8
$ar=$xml->xpath("ordo[@id='RE']/Vant8");
$arr=$ar[0];
print antienne($arr,$lang,"8");
$psr=$xml->xpath("ordo[@id='RE']/Vps8");
$psrr=$psr[0];
print psaume($psrr,$lang);
print antienne($arr,$lang);
// Antienne et psaume 9
$ar=$xml->xpath("ordo[@id='RE']/Vant9");
$arr=$ar[0];
print antienne($arr,$lang,"9");
$psr=$xml->xpath("ordo[@id='RE']/Vps9");
$psrr=$psr[0];
print psaume($psrr,$lang);
print antienne($arr,$lang);
// Antienne et psaume 10
$ar=$xml->xpath("ordo[@id='RE']/Vant10");
$arr=$ar[0];
print antienne($arr,$lang,"10");
$psr=$xml->xpath("ordo[@id='RE']/Vps10");
$psrr=$psr[0];
print psaume($psrr,$lang);
print antienne($arr,$lang);
///Antienne et psaume 11
$ar=$xml->xpath("ordo[@id='RE']/Vant11");
$arr=$ar[0];
print antienne($arr,$lang,"11");
$psr=$xml->xpath("ordo[@id='RE']/Vps11");
$psrr=$psr[0];
print psaume($psrr,$lang);
print antienne($arr,$lang);
///Antienne et psaume 12
$ar=$xml->xpath("ordo[@id='RE']/Vant12");
$arr=$ar[0];
print antienne($arr,$lang);
$psr=$xml->xpath("ordo[@id='RE']/Vps12");
$psrr=$psr[0];
print psaume($psrr,$lang);
print antienne($arr,$lang);

// Verset
print verset("VERS_Convertimini_et_agite",$lang);
// Lecture 4
print lecture_vigiles("LEC_".$ferie."-II_4",$lang,"4");
// Répons 4
print repons_vigiles("RESP_".$ferie."_4",$lang,"4");
// Lecture 5
print  lecture_vigiles("LEC_".$ferie."-II_5",$lang,"5");
// Répons 5
print repons_vigiles("RESP_".$ferie."_5",$lang,"5");
// Lecture 6
print lecture_vigiles("LEC_".$ferie."-II_6",$lang,"6");
// Répons 6
print repons_vigiles("RESP_".$ferie."_6",$lang,"6");

// FIN
print affiche_texte("OSB_Vigiles_fin_semaine",$lang);
}


?>