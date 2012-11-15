<?php


function none($date,$ordo) {
$lang=$_GET['lang'];
$option=$_GET['option'];
if($lang=="") $lang="fr";
$xml=$GLOBALS['liturgia'];
$prio=$xml->xpath("//ordo[@id='RE']//priorite");
$priorite=$prio[0];

//////// INTITULE
print intitule();

$of=$xml->xpath("//ordo[@id='RE']//office_matin/la");
if($of[0]) $off=$of[0];
if($off) {
	print"<div class=\"gauche\"><center><i>".$off."</i></center></div>";
	print"<div class=\"droite\"><center><i>".get_traduction($off,$lang)."</i></center></div>";
}
else print"<div class=\"gauche\"><center><i>Ad Nonam</i></center></div><div class=\"droite\"><center><i>".get_traduction("Ad Nonam", $lang)."</i></center></div>";

// Initial
print affiche_texte("initial_GHeure",$lang);
// Hymne
$hr=$xml->xpath("ordo[@id='RE']/HYMNUS_9");
$hrr=$hr[0];
print hymne($hrr,$lang);
// ant1 et  PS1
$ar=$xml->xpath("ordo[@id='RE']/ant4");
$arr=$ar[0];
print antienne($arr,$lang,"1");
$pr=$xml->xpath("ordo[@id='RE']/ps4");
$prr=$pr[0];
print psaume($prr,$lang);
print antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("ordo[@id='RE']/ant5");
$arr=$ar[0];
if($arr) print antienne($arr,$lang,"2");
$pr=$xml->xpath("ordo[@id='RE']/ps5");
$prr=$pr[0];
if($prr) print psaume($prr,$lang);
if($arr) print antienne($arr,$lang);
// ant3 et  PS3
$ar=$xml->xpath("ordo[@id='RE']/ant6");
$arr=$ar[0];
if($arr) print antienne($arr,$lang,"3");
$pr=$xml->xpath("ordo[@id='RE']/ps6");
$prr=$pr[0];
if($prr) print psaume($prr,$lang);
if($arr) print antienne($arr,$lang);
// Lecon et répons bref
$lr=$xml->xpath("ordo[@id='RE']/LB_9");

$lrr=$lr[0];
//print "<b>".$lrr."</b>";
print lectiobrevis($lrr,$lang);
$rr=$xml->xpath("ordo[@id='RE']/RB_9");
$rrr=$rr[0];
//print "<br>";print_r($rr);
print affiche_texte($rrr,$lang);

$oratio=$xml->xpath("ordo[@id='RE']/oratio_9");
print"
	<div class=\"gauche\">Orémus.</div>
	<div class=\"droite\">".get_traduction("Orémus", $lang).".</div>
	";	
print oratio($oratio[0],$lang);
print affiche_texte("Benedicamus_Domino",$lang);
}





?>
