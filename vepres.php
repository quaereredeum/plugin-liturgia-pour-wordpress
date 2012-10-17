<?php

function vepres($date,$ordo) {
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
else print"<div class=\"gauche\"><center><i>Ad Vesperas</i></center></div><div class=\"droite\"><center><i>".get_traduction("Ad Vesperas", $lang)."</i></center></div>";

// Initial
print affiche_texte("initial_GHeure",$lang);
// Hymne
$hr=$xml->xpath("ordo[@id='RE']/HYMNUS_vepres");
$hrr=$hr[0];
print hymne($hrr,$lang);
// ant1 et  PS1
$ar=$xml->xpath("ordo[@id='RE']/ant7");
$arr=$ar[0];
print antienne($arr,$lang,"1");
$pr=$xml->xpath("ordo[@id='RE']/ps7");
$prr=$pr[0];
print psaume($prr,$lang);
print antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("ordo[@id='RE']/ant8");
$arr=$ar[0];
print antienne($arr,$lang,"2");
$pr=$xml->xpath("ordo[@id='RE']/ps8");
$prr=$pr[0];
print psaume($prr,$lang);
print antienne($arr,$lang);
// ant3 et  PS3
$ar=$xml->xpath("ordo[@id='RE']/ant9");
$arr=$ar[0];
print antienne($arr,$lang,"3");
$pr=$xml->xpath("ordo[@id='RE']/ps9");
$prr=$pr[0];
print psaume($prr,$lang);
print antienne($arr,$lang);
// Lecon et répons bref
$lr=$xml->xpath("ordo[@id='RE']/LB_soir");
$lrr=$lr[0];
print lectiobrevis($lrr,$lang);
$rr=$xml->xpath("ordo[@id='RE']/RB_soir");
$rrr=$rr[0];
print reponsbref($rrr,$lang);
// Antienne et Benedictus
$br=$xml->xpath("ordo[@id='RE']/magnificat");
$brr=$br[0];
print antienne($brr,$lang);
print psaume("magnificat",$lang);
print antienne($brr,$lang);
$preces=$xml->xpath("ordo[@id='RE']/vepres_preces");
$pp="PRECES_".$preces[0]."_vepres";
print preces($pp,$lang);
print pater($lang);
$oratio=$xml->xpath("ordo[@id='RE']/oratio_vepres");
//print_r($oratio);
print collecte($oratio[0],$lang);
/// CONCLUSION
print affiche_texte("LH_conclusion_Gheure",$lang);

}

?>