<?php


function lecture($date,$ordo) {
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
else print"<div class=\"gauche\"><center><i>Ad Officium lectionis</i></center></div><div class=\"droite\"><center><i>".get_traduction("Ad Officium lectionis", $lang)."</i></center></div>";

// Initial
print affiche_texte("initial_GHeure",$lang);
print alleluia();
// Hymne
$hr=$xml->xpath("ordo[@id='RE']/HYMNUS_lectures");
$hrr=$hr[0];
print hymne($hrr,$lang);
// ant1 et  PS1
$ar=$xml->xpath("ordo[@id='RE']/antL1");
$arr=$ar[0];
print antienne($arr,$lang,"1");
$pr=$xml->xpath("ordo[@id='RE']/psL1");
$prr=$pr[0];
print psaume($prr,$lang);
print antienne($arr,$lang);
// ant2 et  PS2
$ar=$xml->xpath("ordo[@id='RE']/antL2");
$arr=$ar[0];
if($arr) print antienne($arr,$lang,"2");
$pr=$xml->xpath("ordo[@id='RE']/psL2");
$prr=$pr[0];
if($prr) print psaume($prr,$lang);
if($arr) print antienne($arr,$lang);
// ant3 et  PS3
$ar=$xml->xpath("ordo[@id='RE']/antL3");
$arr=$ar[0];
if($arr) print antienne($arr,$lang,"3");
$pr=$xml->xpath("ordo[@id='RE']/psL3");
$prr=$pr[0];
if($prr) print psaume($prr,$lang);
if($arr) print antienne($arr,$lang);

// Verset
$vr=$xml->xpath("ordo[@id='RE']/LVers");
$vrr=$vr[0];
if($vrr) print affiche_texte($vrr,$lang);

// Lecon 1
$lr=$xml->xpath("ordo[@id='RE']/Llec1");
$lrr=$lr[0];
print lecture_OL($lrr,$lang,1);
$rr=$xml->xpath("ordo[@id='RE']/Lrep1");
$rrr=$rr[0];
print repons($rrr,$lang,1);

// Lecon 2
$lr=$xml->xpath("ordo[@id='RE']/Llec2");
$lrr=$lr[0];
print lecture_OL($lrr,$lang,2);
$rr=$xml->xpath("ordo[@id='RE']/Lrep2");
$rrr=$rr[0];
print repons($rrr,$lang,2);

$oratio=$xml->xpath("ordo[@id='RE']/oratio_laudes");
//print_r($oratio);
print collecte($oratio[0],$lang);
print affiche_texte("Benedicamus_Domino",$lang);
}
?>
