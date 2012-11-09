<?php

function complies($date,$ordo) {
$lang=$_GET['lang'];
$option=$_GET['option'];
if($lang=="") $lang="fr";
$xml=$GLOBALS['liturgia'];
$prio=$xml->xpath("//ordo[@id='RE']//priorite");
$priorite=$prio[0];

//////// INTITULE
print intitule_soir();

$of=$xml->xpath("//ordo[@id='RE']//office_soir/la");
if($of[0]) $off=$of[0];
if($off) {
	print"<div class=\"gauche\"><center><i>".$off."</i></center></div>";
	print"<div class=\"droite\"><center><i>".get_traduction($off,$lang)."</i></center></div>";
}
else print"<div class=\"gauche\"><center><i>Ad Completorium</i></center></div><div class=\"droite\"><center><i>".get_traduction("Ad Completorium", $lang)."</i></center></div>";

// Initial
print affiche_texte("initial_GHeure",$lang);
// Hymne
$hr=$xml->xpath("ordo[@id='RE']/HYMNUS_complies");
$hrr=$hr[0];
print hymne($hrr,$lang);
// ant1 et  PS1
$ar=$xml->xpath("ordo[@id='RE']/comp_ant1");
$arr=$ar[0];
print antienne($arr,$lang,"1");
$pr=$xml->xpath("ordo[@id='RE']/comp_ps1");
$prr=$pr[0];
print psaume($prr,$lang);
print antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("ordo[@id='RE']/comp_ant2");
$arr=$ar[0];
if($arr) print antienne($arr,$lang,"2");
$pr=$xml->xpath("ordo[@id='RE']/comp_ant2");
$prr=$pr[0];
if($prr) print psaume($prr,$lang);
if($arr) print antienne($arr,$lang);
// ant3 et  PS3

// Lecon et répons bref
$lr=$xml->xpath("ordo[@id='RE']/comp_LB");
$lrr=$lr[0];
print lectiobrevis($lrr,$lang);
$rr=$xml->xpath("ordo[@id='RE']/comp_RB");
$rrr=$rr[0];
print reponsbref($rrr,$lang);
// Antienne et Benedictus

print antienne("AN_Salva_nos_Domine",$lang);
print psaume("nunc_dimittis",$lang);
print antienne("AN_Salva_nos_Domine",$lang);

$oratio=$xml->xpath("ordo[@id='RE']/comp_oratio");
//print_r($oratio);
print collecte($oratio[0],$lang);
// Antienne mariale
$AM=$xml->xpath("ordo[@id='RE']/comp_AM");
$AMM="AM_".$AM[0];
print affiche_texte($AMM,$lang);
}

?>