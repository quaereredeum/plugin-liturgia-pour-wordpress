<?php

function laudes($date,$ordo) {
$lang=$_GET['lang'];
$option=$_GET['option'];
if($lang=="") $lang="fr";
$xml=$GLOBALS['liturgia'];
$prio=$xml->xpath("//ordo[@id='RE']//priorite");
$priorite=$prio[0];

//////// INTITULE
print intitule();
print"<div class=\"gauche\"><center><i>Ad Laudes matutinas</i></center></div>
<div class=\"droite\"><center><i>".get_traduction("Ad Laudes matutinas", $lang)."</i></center></div>";
// Initial
print affiche_texte("initial_GHeure",$lang);
print alleluia();
// Hymne
$hr=$xml->xpath("ordo[@id='RE']/HYMNUS_laudes");
$hrr=$hr[0];
print hymne($hrr,$lang);
// ant1 et  PS1
$ar=$xml->xpath("ordo[@id='RE']/ant1");
$arr=$ar[0];
print antienne($arr,$lang,"1");
$pr=$xml->xpath("ordo[@id='RE']/ps1");
$prr=$pr[0];
print psaume($prr,$lang);
print antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("ordo[@id='RE']/ant2");
$arr=$ar[0];
print antienne($arr,$lang,"2");
$pr=$xml->xpath("ordo[@id='RE']/ps2");
$prr=$pr[0];
print psaume($prr,$lang);
print antienne($arr,$lang);
// ant3 et  PS3
$ar=$xml->xpath("ordo[@id='RE']/ant3");
$arr=$ar[0];
print antienne($arr,$lang,"3");
$pr=$xml->xpath("ordo[@id='RE']/ps3");
$prr=$pr[0];
print psaume($prr,$lang);
print antienne($arr,$lang);
// Lecon et répons bref
$lr=$xml->xpath("ordo[@id='RE']/LB_matin");
$lrr=$lr[0];
print lectiobrevis($lrr,$lang);
$rr=$xml->xpath("ordo[@id='RE']/RB_matin");
$rrr=$rr[0];
print reponsbref($rrr,$lang);
// Antienne et Benedictus
$br=$xml->xpath("ordo[@id='RE']/benedictus");
$brr=$br[0];
print antienne($brr,$lang);
print psaume("benedictus",$lang);
print antienne($brr,$lang);
$preces=$xml->xpath("ordo[@id='RE']/laudes_preces");
$pp="PRECES_".$preces[0]."_laudes";
print preces($pp,$lang);
print pater($lang);
$oratio=$xml->xpath("ordo[@id='RE']/oratio_laudes");
//print_r($oratio);
print collecte($oratio[0],$lang);
/// CONCLUSION
print affiche_texte("LH_conclusion_Gheure",$lang);

}

?>