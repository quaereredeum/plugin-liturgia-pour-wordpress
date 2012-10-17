<?php

function get_traduction($atraduire,$lang,$traductions) {
//print_r($traductions);
if(!$lang) $lang="fr";
$path="//item[@ref='".$atraduire."']//".$lang;
//$path="//item[@ref='Tempus Quadragesimae']/fr";
//print"<br>".$path." ";
$traduit=@$traductions->xpath($path);
//print $traduit[0];
if(!$traduit[0]) return $atraduire;
else return $traduit[0];
}

function genere_calendarium($annee,$ordo) {
//// Forme de la variable date : AAAAMMJJ
    /*

Le mathématicien Gauss avait trouvé un algorithme (une formule) pour calculer
cette date. Un autre mathématicien, T. H. OBeirne, a trouvé deux erreurs dans
la formule de Gauss. Il a alors formulé un autre algorithme :

Soit m lannée, on fait les calculs suivants :

   1. On soustrait 1900 de m : cest la valeur de n.
   2. On divise n par 19 : le reste est la valeur de a.
   3. On divise (7a + 1) par 19 : la partie entière du quotient est b.
   4. On divise (11a - b + 4) par 29 : le reste est c.
   5. On divise n par 4 : la partie entière du quotient est d.
   6. On divise (n - c + d + 31) par 7 : le reste est e.

La date de Pâques est le (25 - c - e) avril si le résultat est positif.
Sil est négatif, le mois est mars. Le quantième est la somme de 31 et
du résultat.
Par exemple, si le résultat est -7, le quantième est 31 + -7 = 24.

*/
//$ordo="RE";
if ($ordo=="RE") $lang="fr";

if($lang != "fr") {
$feriae=array("Dominica","Feria II","Feria III","Feria IV","Feria V","Feria VI","Sabbato");
$romains=array("","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII","XIII","XIV","XV","XVI","XVII","XVIII","XIX","XX","XXI","XXII","XXIII","XXIV","XXV","XXVI","XXVII","XXVIII","XXIX","XXX","XXXI","XXXII","XXXIII","XXXIV");
$menses=array("","Ianuarii","Februarii","Martii","Aprilii","Maii","Iunii","Iulii","Augusti","Septembri","Octobri","Novembri","Decembri");
}

if($lang == "fr") {
$feriae=array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
$romains=array("","I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII","XIII","XIV","XV","XVI","XVII","XVIII","XIX","XX","XXI","XXII","XXIII","XXIV","XXV","XXVI","XXVII","XXVIII","XXIX","XXX","XXXI","XXXII","XXXIII","XXXIV");
$menses=array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");

}
$hexa['Violet']="6c075f";
$hexa['Vert']="076c11";
$hexa['Rose']="ef9de4";
$hexa['Noir']="000000";
$hexa['Blanc']="f3f1bc";
$hexa['Rouge']="c50520";

$day=mktime(12,0,0,01,01,$annee);
 $m=@date("Y",$day);
 
$n=$m-1900; //print"<br>$n";
$a=$n%19; //print"<br>$a";
$b=intval((7*$a+1)/19); //print"<br>$b";
$c=(11*$a-$b+4)%29; //print"<br>$c";
$d=intval($n/4); //print"<br>$d";
$e=($n-$c+$d+31)%7; //print"<br>$e";

if($e>=0) {
	$p=25-$c-$e;
	$paques=mktime(12, 0, 0, 4, $p, $m);
}
if($e<0) {
	$p=31+$e;
	$paques=mktime(12, 0, 0, 3, $p, $m);
}
setlocale (LC_ALL, 'FR');
$res = date("Ymd", $paques);

//print"<br>PAQUES $res : $paques";
$jour=60*60*24;
$semaine=60*60*24*7;

$noel=mktime(12,0,0,12,25,$m);
$no=date("Ymd", $noel);
$jour_noel=date("w", $noel);

$temporal['intitule'][$no]="IN NATIVITATE DOMINI";
$temporal['code'][$no]="IN_NATIVITATE_DOMINI";
$temporal['couleur'][$no]="Blanc";
$temporal['tempus'][$no]="Tempus Nativitatis";
$temporal['rang'][$no]="Sollemnitas";
$temporal['hebdomada'][$no]="Infra octavam Nativitatis";
$temporal['priorite'][$no]="2";
$temporal['1V'][$no]=1;
$temporal['code'][$no]="1225_jour";
//item[@id='b1']/$lang;   $ligne->xpath('@id');

$sanctae_familiae2=$noel+(7-$jour_noel)*$jour;
$jj=date("w", $sanctae_familiae2);
//if($jj==0) $sanctae_familiae2=mktime(12,0,0,12,30,$m);
$dd=date("Ymd", $sanctae_familiae2);
$temporal['intitule'][$dd]="SANCTÆ FAMILIÆ IESU, MARIÆ ET IOSEPH";
$temporal['hebdomada'][$dd]="Infra octavam Nativitatis";
$temporal['tempus'][$dd]="Tempus Nativitatis";
$temporal['couleur'][$dd]="Blanc";
$temporal['priorite'][$dd]="7";
$temporal['1V'][$dd]=1;
$temporal['code'][$no]="SANCTAE_FAMILIAE_IESU,_MARIAE_ET_IOSEPH";

$fin_oct_nativitatis=$noel+8*$jour;
$dd=date("Ymd", $fin_oct_nativitatis);
$temporal['hebdomada'][$dd]="Hebdomada II post Nativitatem";
$temporal['tempus'][$dd]="Tempus Nativitatis";
$temporal['couleur'][$dd]="Blanc";
$temporal['hp'][$dd]=1;

$noel_annee_precedente=mktime(12,0,0,12,25,$m-1);
$dd=date("Ymd", $noel_annee_precedente);
$temporal['intitule'][$dd]="IN NATIVITATE DOMINI";
$temporal['code'][$dd]="IN_NATIVITATE_DOMINI";
$temporal['couleur'][$dd]="Blanc";
$temporal['rang'][$dd]="Sollemnitas";
$temporal['priorite'][$dd]="2";
$temporal['tempus'][$dd]="Tempus Nativitatis";
$temporal['hebdomada'][$dd]="Infra octavam Nativitatis";
$temporal['1V'][$dd]=1;
$jour_noel_precedent=date("w", $noel_annee_precedente);

$sanctae_familiae=$noel_annee_precedente+(7-$jour_noel_precedent)*$jour;
$jj=date("w", $sanctae_familiae);
//if($jj==0) $sanctae_familiae=mktime(12,0,0,12,30,$m-1);
$dd=date("Ymd", $sanctae_familiae);
$temporal['intitule'][$dd]="SANCTÆ FAMILIÆ IESU, MARIÆ ET IOSEPH";
$temporal['priorite'][$dd]="7";
$temporal['hebdomada'][$dd]="Infra octavam Nativitatis";
$temporal['tempus'][$dd]="Tempus Nativitatis";
$temporal['couleur'][$dd]="Blanc";
$temporal['1V'][$dd]=1;

$infra_oct_nativ=$noel_annee_precedente+7*$jour;
$dd=date("Ymd", $infra_oct_nativ);
$temporal['hebdomada'][$dd]="Infra Octavam Nativitatis";
$temporal['tempus'][$dd]="Tempus Nativitatis";
$temporal['couleur'][$dd]="Blanc";

$fin_oct_nativitatis=mktime(12,0,0,01,2,$m);
$dd=date("Ymd", $fin_oct_nativitatis);
$temporal['hebdomada'][$dd]="Hebdomada II post Nativitatem";
$temporal['tempus'][$dd]="Tempus Nativitatis";
$temporal['couleur'][$dd]="Blanc";
$temporal['hp'][$dd]=1;

$domIIpostnativitas=$sanctae_familiae+7*$jour;
$dd=date("Ymd", $domIIpostnativitas);
//print"<br>domIIpostnativitas : ".$dd;
$temporal['intitule'][$dd]="Dominica II post Nativitatem";
$temporal['priorite'][$dd]="7";
$temporal['hebdomada'][$dd]="Hebdomada III post Nativitatem";
$temporal['tempus'][$dd]="Tempus Nativitatis";
$temporal['couleur'][$dd]="Blanc";
$temporal['1V'][$dd]=1;
$temporal['hp'][$dd]=2;

$epiphania=mktime(12,0,0,1,6,$m);
$jour_epiphanie=date("w", $epiphania);
$temporal['code'][$epiphania]="IN_EPIPHANIA_DOMINI";
$baptisma=$epiphania+(7-$jour_epiphanie)*$jour;
$dd=date("Ymd", $baptisma);
$temporal['intitule'][$dd]="IN BAPTISMATE DOMINI";
$temporal['rang'][$dd]="Festum";
$temporal['priorite'][$dd]="5";
$temporal['1V'][$dd]=1;
//$temporal['hp'][$dd]=2;
//$temporal['hebdomada'][$dd]="Infra octavam Nativitatis";
$temporal['tempus'][$dd]="Tempus Nativitatis";
$temporal['couleur'][$dd]="Blanc";
$perannum=$baptisma+$jour;
$dd=date("Ymd", $perannum);
$temporal['tempus'][$dd]="Tempus per annum";
$temporal['hebdomada'][$dd]="Hebdomada I per annum";
$temporal['couleur'][$dd]="Vert";
$temporal['hp'][$dd]=1;


$temporal['psautier'][$dd]="perannum";

	for($f=2;$f<8;$f++) {
	$suppl=$perannum+($f-2)*$jour;
	$df=date("Ymd",$suppl);
	$temporal['code'][$df]="perannum_1-".$f;
	}
	
	
$palmis=$paques-$semaine;
$dd=date("Ymd", $palmis);
$temporal['intitule'][$dd]="DOMINICA IN PALMIS DE PASSIONE DOMINI";
$temporal['temporal'][$dd]="DOMINICA IN PALMIS DE PASSIONE DOMINI";
$temporal['code'][$dd]="DOMINICA_IN_PALMIS_DE_PASSIONE_DOMINI";
$temporal['hp'][$dd]=2;
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['hebdomada'][$dd]="Hebdomada Sancta";
$temporal['tempus'][$dd]="Tempus passionis";
$temporal['couleur'][$dd]="Rouge";
$hebviol=$palmis+$jour;
$dd=date("Ymd", $hebviol);
$temporal['intitule'][$dd]="Feria II hebdomadae sanctae";
$temporal['temporal'][$dd]="Feria II hebdomadae sanctae";
$temporal['priorite'][$dd]="2";
$temporal['couleur'][$dd]="Violet";
$temporal['code'][$dd]="HS_2";
$hebviol=$palmis+$jour+$jour;
$dd=date("Ymd", $hebviol);
$temporal['intitule'][$dd]="Feria III hebdomadae sanctae";
$temporal['temporal'][$dd]="Feria III hebdomadae sanctae";
$temporal['priorite'][$dd]="2";
$temporal['couleur'][$dd]="Violet";
$temporal['code'][$dd]="HS_3";

$hebviol=$palmis+$jour+$jour+$jour;
$dd=date("Ymd", $hebviol);
$temporal['intitule'][$dd]="Feria IV hebdomadae sanctae";
$temporal['temporal'][$dd]="Feria IV hebdomadae sanctae";
$temporal['priorite'][$dd]="2";
$temporal['couleur'][$dd]="Violet";
$temporal['code'][$dd]="HS_4";
/*
$hebviol=$palmis+$jour+$jour+$jour+$jour;
$dd=date("Ymd", $hebviol);
$temporal['intitule'][$dd]="Feria IV hebdomadae sanctae";
$temporal['temporal'][$dd]="Feria IV hebdomadae sanctae";
$temporal['priorite'][$dd]="2";
$temporal['couleur'][$dd]="Violet";
$temporal['code'][$dd]="HS_4";
*/
$in_cena=$palmis+4*$jour;
$dd=date("Ymd", $in_cena);
$temporal['intitule'][$dd]="IN CENA DOMINI";
$temporal['temporal'][$dd]="IN CENA DOMINI";
$temporal['code'][$dd]="HS_5_AD_MISSAM_CHRISMATIS";
$temporal['code2'][$dd]="HS_5_MISSA_VESPERTINA_IN_CENA_DOMINI";
$temporal['priorite'][$dd]="1";
$temporal['hebdomada'][$dd]="Sacrum Triduum Paschale";
$temporal['tempus'][$dd]="Tempus passionis";
$temporal['couleur'][$dd]="Blanc";

$in_passione=$in_cena+$jour;
$dd=date("Ymd", $in_passione);
$temporal['intitule'][$dd]="IN PASSIONE DOMINI";
$temporal['temporal'][$dd]="IN PASSIONE DOMINI";
$temporal['code'][$dd]="HS_6";
$temporal['priorite'][$dd]="1";
$temporal['couleur'][$dd]="Rouge";

$sabbato_sancto=$in_passione+$jour;
$dd=date("Ymd", $sabbato_sancto);
$temporal['intitule'][$dd]="Sabbato Sancto";
$temporal['code'][$dd]="DOMINICA_RESURRECTIONIS_IN_VIGILIAM";
$temporal['priorite'][$dd]="1";
$temporal['couleur'][$dd]="Violet";
/*
$Y= substr($dd, 0, 4); //print"<br>$Y";
$mois= substr($dd, 4, 2);//print"<br>$mois";
$day= substr($dd, 6, 2);//print"<br>$day";
$palmis=mktime(12,0,0,$mois,$day,$Y);
*/
$cinq_quadragesima=$palmis-$semaine;
$dd=date("Ymd", $cinq_quadragesima);
$temporal['intitule'][$dd]="Dominica V Quadragesimae";
$temporal['temporal'][$dd]="Dominica V Quadragesimae";
$temporal['hp'][$dd]=1;
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['hebdomada'][$dd]="Hebdomada V Quadragesimae";
$temporal['tempus'][$dd]="Tempus Quadragesimae";
$temporal['code'][$dd]="quadragesima_51";

for($f=2;$f<8;$f++) {
	$df=date("Ymd",$cinq_quadragesima+($f-1)*$jour);
	$temporal['code'][$df]="quadragesima_5".$f;
}


/*
$Y= substr($dd, 0, 4); //print"<br>$Y";
$mois= substr($dd, 4, 2);//print"<br>$mois";
$day= substr($dd, 6, 2);//print"<br>$day";
$cinq_quadragesima=mktime(12,0,0,$mois,$day,$Y);
*/
$quatre_quadragesima=$cinq_quadragesima-$semaine;
$dd=date("Ymd", $quatre_quadragesima);
$temporal['intitule'][$dd]="Dominica IV Quadragesimae";
$temporal['temporal'][$dd]="Dominica IV Quadragesimae";
$temporal['hp'][$dd]=4;
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['hebdomada'][$dd]="Hebdomada IV Quadragesimae";
$temporal['couleur'][$dd]="Rose";
$temporal['code'][$dd]="quadragesima_41";

for($f=2;$f<8;$f++) {
	$df=date("Ymd",$quatre_quadragesima+($f-1)*$jour);
	$temporal['code'][$df]="quadragesima_4".$f;
}


/*
$Y= substr($dd, 0, 4); //print"<br>$Y";
$mois= substr($dd, 4, 2);//print"<br>$mois";
$day= substr($dd, 6, 2);//print"<br>$day";
$quatre_quadragesima=mktime(12,0,0,$mois,$day,$Y);
*/
$coul_quadragesima=$quatre_quadragesima+$jour;
$dd=date("Ymd", $coul_quadragesima);
$temporal['couleur'][$dd]="Violet";

//$temporal['tempus'][$dd]="Tempus Quadragesimae";

$trois_quadragesima=$quatre_quadragesima-$semaine;
$dd=date("Ymd", $trois_quadragesima);
$temporal['intitule'][$dd]="Dominica III Quadragesimae";
$temporal['temporal'][$dd]="Dominica III Quadragesimae";
$temporal['hp'][$dd]=3;
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['hebdomada'][$dd]="Hebdomada III Quadragesimae";
$temporal['couleur'][$dd]="Violet";
$temporal['code'][$dd]="quadragesima_31";
//$temporal['tempus'][$dd]="Tempus Quadragesimae";

for($f=2;$f<8;$f++) {
	$df=date("Ymd",$trois_quadragesima+($f-1)*$jour);
	$temporal['code'][$df]="quadragesima_3".$f;
}


$deux_quadragesima=$trois_quadragesima-$semaine;
$dd=date("Ymd", $deux_quadragesima);
$temporal['intitule'][$dd]="Dominica II Quadragesimae";
$temporal['temporal'][$dd]="Dominica II Quadragesimae";
//Dominica I Quadragesimae
$temporal['hp'][$dd]=2;
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['hebdomada'][$dd]="Hebdomada II Quadragesimae";
$temporal['couleur'][$dd]="Violet";
$temporal['code'][$dd]="quadragesima_21";
//$temporal['code'][$dd]="quadragesima_21";


for($f=2;$f<8;$f++) {
	$df=date("Ymd",$deux_quadragesima+($f-1)*$jour);
	$temporal['code'][$df]="quadragesima_2".$f;
}
//$temporal['tempus'][$dd]="Tempus Quadragesimae";
$un_quadragesima=$deux_quadragesima-$semaine;
$dd=date("Ymd", $un_quadragesima);
$temporal['intitule'][$dd]="Dominica I Quadragesimae";
$temporal['temporal'][$dd]="Dominica I Quadragesimae";
$temporal['hp'][$dd]=1;
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['hebdomada'][$dd]="Hebdomada I Quadragesimae";
$temporal['couleur'][$dd]="Violet";
$temporal['code'][$dd]="quadragesima_11";
$dd=date("Ymd",$un_quadragesima+$jour);
//$f=1;
//$dd=date("Ymd",$un_quadragesima+$f*$jour);
//$temporal['code'][$dd]="quadragesima_1".$f;
for($f=2;$f<8;$f++) {
	$dd=date("Ymd",$un_quadragesima+($f-1)*$jour);
	$temporal['code'][$dd]="quadragesima_1".$f;
}



$cinerum=$un_quadragesima-4*$jour;
$dd=date("Ymd", $cinerum);
$temporal['intitule'][$dd]="Feria IV Cinerum";
$temporal['temporal'][$dd]="Feria IV Cinerum";
$temporal['priorite'][$dd]="2";
$temporal['hebdomada'][$dd]="Feria IV Cinerum";
$temporal['tempus'][$dd]="Tempus Quadragesimae";
$temporal['couleur'][$dd]="Violet";
$temporal['hp'][$dd]=4;
$temporal['code'][$dd]="quadragesima_04";
$post_cineres=$cinerum+$jour;
$dd=date("Ymd", $post_cineres);
$temporal['code'][$dd]="quadragesima_05";
$post_cineres6=$post_cineres+$jour;
$dd=date("Ymd", $post_cineres6);
$temporal['code'][$dd]="quadragesima_06";
$post_cineres7=$post_cineres6+$jour;
$dd=date("Ymd", $post_cineres7);
$temporal['code'][$dd]="quadragesima_07";

$dd=date("Ymd", $post_cineres);
$temporal['hebdomada'][$dd]="Dies post Cineres";
$temporal['couleur'][$dd]="Violet";


$pa=date("Ymd", $paques);
$dd=$pa;
$temporal['intitule'][$dd]="DOMINICA RESURRECTIONIS";
$temporal['temporal'][$dd]="DOMINICA RESURRECTIONIS";
$temporal['code'][$dd]="DOMINICA_RESURRECTIONIS_IN_DIE";
$temporal['priorite'][$dd]="1";
$temporal['1V'][$dd]=0;
$temporal['hebdomada'][$dd]="Infra octavam paschae";
$temporal['tempus'][$dd]="Tempus Paschale";
$temporal['couleur'][$dd]="Blanc";
$temporal['hp'][$dd]=1;


$octpasch=$paques+$jour;
$dd=date("Ymd", $octpasch);
$temporal['intitule'][$dd]="Feria II infra octavam Paschae";
$temporal['temporal'][$dd]="Feria II infra octavam Paschae";
$temporal['priorite'][$dd]="2";
$temporal['code'][$dd]="pascha_12";

$octpasch=$paques+$jour+$jour;
$dd=date("Ymd", $octpasch);
$temporal['intitule'][$dd]="Feria III infra octavam Paschae";
$temporal['temporal'][$dd]="Feria III infra octavam Paschae";
$temporal['priorite'][$dd]="2";
$temporal['code'][$dd]="pascha_13";

$octpasch=$paques+$jour+$jour+$jour;
$dd=date("Ymd", $octpasch);
$temporal['intitule'][$dd]="Feria IV infra octavam Paschae";
$temporal['temporal'][$dd]="Feria IV infra octavam Paschae";
$temporal['priorite'][$dd]="2";
$temporal['code'][$dd]="pascha_14";

$octpasch=$paques+$jour+$jour+$jour+$jour;
$dd=date("Ymd", $octpasch);
$temporal['intitule'][$dd]="Feria V infra octavam Paschae";
$temporal['temporal'][$dd]="Feria V infra octavam Paschae";
$temporal['priorite'][$dd]="2";
$temporal['code'][$dd]="pascha_15";

$octpasch=$paques+$jour+$jour+$jour+$jour+$jour;
$dd=date("Ymd", $octpasch);
$temporal['intitule'][$dd]="Feria VI infra octavam Paschae";
$temporal['temporal'][$dd]="Feria VI infra octavam Paschae";
$temporal['priorite'][$dd]="2";
$temporal['code'][$dd]="pascha_16";

$octpasch=$paques+$jour+$jour+$jour+$jour+$jour+$jour;
$dd=date("Ymd", $octpasch);
$temporal['intitule'][$dd]="Sabbato infra octavam Paschae";
$temporal['temporal'][$dd]="Sabbato infra octavam Paschae";
$temporal['priorite'][$dd]="2";
$temporal['code'][$dd]="pascha_17";



$deux_paques=$paques+$semaine;
$dd=date("Ymd", $deux_paques);
$temporal['intitule'][$dd]="Dominica II Paschae";
$temporal['temporal'][$dd]="Dominica II Paschae";
$temporal['hp'][$dd]=2;
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['code'][$dd]="pascha_21";
for($f=1;$f<8;$f++) {
	$suppl=$deux_paques+($f-1)*$jour;
	$df=date("Ymd",$suppl);
	$temporal['code'][$df]="pascha_2".$f;
	}

$l_deuxpaques=$deux_paques+60*60*24;
$dd=date("Ymd", $l_deuxpaques);
$temporal['hebdomada'][$dd]="Hebdomada II Paschae";

$trois_paques=$paques+2*$semaine;
$dd=date("Ymd", $trois_paques);
$temporal['intitule'][$dd]="Dominica III Paschae";
$temporal['temporal'][$dd]="Dominica III Paschae";
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['hebdomada'][$dd]="Hebdomada III Paschae";
$temporal['hp'][$dd]=3;
$temporal['code'][$dd]="pascha_31";

for($f=1;$f<8;$f++) {
	$suppl=$trois_paques+($f-1)*$jour;
	$df=date("Ymd",$suppl);
	$temporal['code'][$df]="pascha_3".$f;
	}


$quatre_paques=$paques+3*$semaine;
$dd=date("Ymd", $quatre_paques);
$temporal['intitule'][$dd]="Dominica IV Paschae";
$temporal['temporal'][$dd]="Dominica IV Paschae";
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['hebdomada'][$dd]="Hebdomada IV Paschae";
$temporal['hp'][$dd]=4;
$temporal['code'][$dd]="pascha_41";
for($f=1;$f<8;$f++) {
	$suppl=$quatre_paques+($f-1)*$jour;
	$df=date("Ymd",$suppl);
	$temporal['code'][$df]="pascha_4".$f;
	}



$cinq_paques=$paques+4*$semaine;
$dd=date("Ymd", $cinq_paques);
$temporal['intitule'][$dd]="Dominica V Paschae";
$temporal['temporal'][$dd]="Dominica V Paschae";
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['hebdomada'][$dd]="Hebdomada V Paschae";
$temporal['hp'][$dd]=1;
$temporal['code'][$dd]="pascha_51";
for($f=1;$f<8;$f++) {
	$suppl=$cinq_paques+($f-1)*$jour;
	$df=date("Ymd",$suppl);
	$temporal['code'][$df]="pascha_5".$f;
	}


$six_paques=$paques+5*$semaine;
$dd=date("Ymd", $six_paques);
$temporal['intitule'][$dd]="Dominica VI Paschae";
$temporal['temporal'][$dd]="Dominica VI Paschae";
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['hebdomada'][$dd]="Hebdomada VI Paschae";
$temporal['hp'][$dd]=2;
$temporal['code'][$dd]="pascha_61";
for($f=1;$f<8;$f++) {
	$suppl=$six_paques+($f-1)*$jour;
	$df=date("Ymd",$suppl);
	$temporal['code'][$df]="pascha_6".$f;
	}


$ascensione=$six_paques+4*$jour;
$dd=date("Ymd",$ascensione);
$temporal['intitule'][$dd]="IN ASCENSIONE DOMINI";
$temporal['temporal'][$dd]="IN ASCENSIONE DOMINI";
$temporal['code'][$dd]="IN_ASCENSIONE_DOMINI";
//$temporal['rang'][$dd]="Sollemnitas";
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;

$sept_paques=$paques+6*$semaine;
$dd=date("Ymd", $sept_paques);
//$septpa=$dd;
$temporal['intitule'][$dd]="Dominica VII Paschae";
$temporal['temporal'][$dd]="Dominica VII Paschae";
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['hebdomada'][$dd]="Hebdomada VII Paschae";
$temporal['hp'][$dd]=3;
$temporal['code'][$dd]="pascha_71";
for($f=1;$f<8;$f++) {
	$suppl=$sept_paques+($f-1)*$jour;
	$df=date("Ymd",$suppl);
	$temporal['code'][$df]="pascha_7".$f;
	}


$pentecostes=$paques+7*$semaine;

$sacritissimicordis=$pentecostes+2*$semaine+5*$jour;
$sacri=date("Ymd", $sacritissimicordis);
$temporal['couleur'][$sacri]="Blanc";
$temporal['intitule'][$sacri]="SACRATISSIMI CORDIS IESU";
$temporal['temporal'][$sacri]="SACRATISSIMI CORDIS IESU";
$temporal['code'][$sacri]="SACRATISSIMI_CORDIS_IESU";
$temporal['priorite'][$sacri]="5";
$temporal['1V'][$sacri]=1;
$temporal['rang'][$sacri]="Sollemnitas";
$cordismaria=$sacritissimicordis+$jour;
$cordi=date("Ymd", $cordismaria);
$temporal['intitule'][$cordi]="Immaculati Cordis B. Mariae Virginis";
$temporal['temporal'][$cordi]="Immaculati Cordis B. Mariae Virginis";
$temporal['code'][$cordi]="Immaculati_Cordis_B_Mariae Virginis";
$temporal['priorite'][$cordi]="10";
$temporal['rang'][$cordi]="Memoria";
$temporal['couleur'][$cordi]="Blanc";

$perannum=$cordismaria+$jour;
$perann=date("Ymd", $perannum);
$temporal['couleur'][$perann]="Vert";
//$temporal['hebdomada'][$penteco]="Hebdomada VII Paschae";

$noe=date("d-M-Y", $noel);


//print"<br>$noe";
$journoel=date("w",$noel);
if ($journoel==0) $journoel=7;

$quatre_dim_avent=$noel-$journoel*$jour;
$dd=date("Ymd", $quatre_dim_avent);
$temporal['intitule'][$dd]="Dominica IV Adventus";
$temporal['temporal'][$dd]="Dominica IV Adventus";
$temporal['hp'][$dd]=4;
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['hebdomada'][$dd]="Hebdomada IV Adventus";
$temporal['couleur'][$dd]="Violet";
for($f=1;$f<8;$f++) {
	$suppl=$quatre_dim_avent+($f-1)*$jour;
	$df=date("Ymd",$suppl);
	$temporal['code'][$df]="adventus_4".$f;
	}


$trois_dim_avent=$quatre_dim_avent-$semaine;
$dd=date("Ymd", $trois_dim_avent);
$temporal['intitule'][$dd]="Dominica III Adventus";
$temporal['temporal'][$dd]="Dominica III Adventus";
$temporal['hp'][$dd]=3;
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['couleur'][$dd]="Rose";
$temporal['hebdomada'][$dd]="Hebdomada III Adventus";
$coul_adventus=$trois_dim_avent+$jour;
$dd=date("Ymd", $coul_adventus);
$temporal['couleur'][$dd]="Violet";
$temporal['code'][$dd]="adventus_31";
for($f=1;$f<8;$f++) {
	$suppl=$trois_dim_avent+($f-1)*$jour;
	$df=date("Ymd",$suppl);
	$temporal['code'][$df]="adventus_3".$f;
	}

$deux_dim_avent=$trois_dim_avent-$semaine;
$dd=date("Ymd", $deux_dim_avent);
$temporal['intitule'][$dd]="Dominica II Adventus";
$temporal['temporal'][$dd]="Dominica II Adventus";
$temporal['hp'][$dd]=2;
$temporal['1V'][$dd]=1;
$temporal['priorite'][$dd]="2";
$temporal['hebdomada'][$dd]="Hebdomada II Adventus";
$temporal['code'][$dd]="adventus_21";
for($f=1;$f<8;$f++) {
	$suppl=$deux_dim_avent+($f-1)*$jour;
	$df=date("Ymd",$suppl);
	$temporal['code'][$df]="adventus_2".$f;
	}

$un_dim_avent=$deux_dim_avent-$semaine;
$dd=date("Ymd", $un_dim_avent);
$temporal['intitule'][$dd]="Dominica I Adventus";
$temporal['temporal'][$dd]="Dominica I Adventus";
$temporal['hp'][$dd]=1;
$temporal['1V'][$dd]=1;
$temporal['priorite'][$dd]="2";
$temporal['hebdomada'][$dd]="Hebdomada I Adventus";
$temporal['tempus'][$dd]="Tempus Adventus";
$temporal['couleur'][$dd]="Violet";
$temporal['code'][$dd]="adventus_11";
for($f=1;$f<8;$f++) {
	$suppl=$un_dim_avent+($f-1)*$jour;
	$df=date("Ymd",$suppl);
	$temporal['code'][$df]="adventus_1".$f;
	}

$dnisuchrisitiunivregis=$un_dim_avent-$semaine;

$entre_tempspascal_et_avent=$dnisuchrisitiunivregis-$sept_paques;
$nbsemaines_perannum=intval($entre_tempspascal_et_avent/$semaine);

//print"
//<br>DNICUR : $dnisuchrisitiunivregis
//<br>entre temps pascal et avent : $nbsemaines_perannum";
$reprise_perannum=34-$nbsemaines_perannum+1;

$entre_tempsnoel_et_careme=$un_quadragesima-$baptisma;
$nbsemaines_perannum=intval($entre_tempsnoel_et_careme/$semaine);
//print"<br>per annum jusqu'à : $nbsemaines_perannum";
//print"<br>reprise per annum : $reprise_perannum";

$dim_courant=$reprise_perannum;
$date=$pentecostes;

$hebdomada_reprise=$pentecostes+$jour;
$numero = $romains[$dim_courant];
$hp=(($dim_courant/4)-intval($dim_courant/4))*4;
if($hp==0) $hp=4;

//Pentecôte
$dd=date("Ymd", $pentecostes);
$temporal['intitule'][$dd]="Dominica Pentecostes";
$temporal['temporal'][$dd]="Dominica Pentecostes";
$temporal['code'][$dd]="Dominica_Pentecostes_in_die";
$temporal['priorite'][$dd]="2";
$temporal['1V'][$dd]=1;
$temporal['hp'][$dd]=$hp;
$temporal['tempus'][$dd]="Tempus Paschale";
$temporal['hebdomada'][$dd]="";
$temporal['couleur'][$dd]="Rouge";

//Semaine après la Pentecôte
$dd=date("Ymd", $hebdomada_reprise);
$temporal['hebdomada'][$dd]="Hebdomada $numero per annum";
$temporal['hp'][$dd]=$hp;
$perannum=$pentecostes+$jour;
$perann=date("Ymd", $perannum);
$temporal['couleur'][$perann]="Vert";
$temporal['tempus'][$perann]="Tempus per annum";
$temporal['code'][$dd]="perannum_".$dim_courant."-2";

for($f=2;$f<8;$f++) {
	$suppl=$hebdomada_reprise+($f-2)*$jour;
	$df=date("Ymd",$suppl);
	$temporal['code'][$df]="perannum_".$dim_courant."-".$f;
	}


//$temporal['hebdomada'][$dd]="";

while($dim_courant<34) {
	$date=$date+$semaine;
	$dim_courant++;
	
	$dd=date("Ymd", $date);
	
	$numero = $romains[$dim_courant];
	$temporal['code'][$dd]=$code;
	$temporal['intitule'][$dd]="Dominica $numero per annum";
		
	for($f=1;$f<8;$f++) {
	$suppl=$date+($f-1)*$jour;
	$df=date("Ymd",$suppl);
	$temporal['code'][$df]="perannum_".$dim_courant."-".$f;
	}
	
	
	
	$temporal['priorite'][$dd]="6";
	$temporal['1V'][$dd]=1;
	$temporal['temporal'][$dd]="Dominica $numero per annum";
	$temporal['hebdomada'][$dd]="Hebdomada $numero per annum";
	$hp=(($dim_courant/4)-intval($dim_courant/4))*4;
	if($hp==0) $hp=4;
	//if($temporal['hebdomada'][$dd]=="Hebdomada I per annum") $hp=1;

	//print"<br>$dim_courant per annum = psalt heb n°$hp";
	$temporal['hp'][$dd]=$hp;
	//print "<br>temporal[priorite][$dd]=".$temporal['priorite'][$dd];
}

$dnisuchrisitiunivregis=$un_dim_avent-$semaine;
$dd=date("Ymd", $dnisuchrisitiunivregis);
$temporal['intitule'][$dd]="D.N. IESU CHRISTI UNIVERSORUM REGIS";
$temporal['temporal'][$dd]="D.N. IESU CHRISTI UNIVERSORUM REGIS";
$temporal['code'][$dd]="D_N_IESU_CHRISTI_UNIVERSORUM_REGIS";
$temporal['priorite'][$dd]="3";
$temporal['1V'][$dd]=1;
$temporal['hebdomada'][$dd]="Hebdomada XXXIV per annum";
$temporal['tempus'][$dd]="Tempus per annum";
$temporal['couleur'][$dd]="Blanc";
$perannum=$dnisuchrisitiunivregis+$jour;
$perann=date("Ymd", $perannum);
$temporal['couleur'][$perann]="Vert";



$date=$baptisma;
$heb_courante=1;
while($heb_courante<$nbsemaines_perannum) {
	$date=$date+$semaine;
	$heb_courante++;
	$dd=date("Ymd", $date);
	$numero = $romains[$heb_courante];
			
	//$temporal['code'][$dd]="perannum_".$heb_courante."-1";
	for($f=1;$f<8;$f++) {
	$suppl=$date+($f-1)*$jour;
	$df=date("Ymd",$suppl);
	if (!$temporal['code'][$df]) $temporal['code'][$df]="perannum_".$heb_courante."-".$f;
	}


	
	$temporal['intitule'][$dd]="Dominica $numero per annum";
	$temporal['temporal'][$dd]="Dominica $numero per annum";
	$temporal['priorite'][$dd]="6";
	//$temporal['code'][$dd]=$code;
	$temporal['1V'][$dd]=1;
	$temporal['hebdomada'][$dd]="Hebdomada $numero per annum";
	$hp=(($heb_courante/4)-intval($heb_courante/4))*4;
	if($hp==0) $hp=4;
	
	$temporal['hp'][$dd]=$hp;
	
}


$trinitatis=$pentecostes+$semaine;
$trini=date("Ymd", $trinitatis);
$temporal['couleur'][$trini]="Blanc";
$temporal['intitule'][$trini]="SANCTISSIMAE TRINITATIS";
$temporal['temporal'][$trini]="SANCTISSIMAE TRINITATIS";
$temporal['code'][$trini]="SANCTISSIMAE_TRINITATIS";
$temporal['priorite'][$trini]="3";
$temporal['1V'][$trini]=1;
$temporal['rang'][$trini]="Sollemnitas";
$perannum=$trinitatis+$jour;
$perann=date("Ymd", $perannum);
$temporal['couleur'][$perann]="Vert";

$corporis=$trinitatis+4*$jour;
$corpo=date("Ymd", $corporis);
$temporal['couleur'][$corpo]="Blanc";
$temporal['intitule'][$corpo]="SS.MI CORPORIS ET SANGUINIS CHRISTI";
$temporal['temporal'][$corpo]="SS.MI CORPORIS ET SANGUINIS CHRISTI";
$temporal['code'][$corpo]="SS_MI_CORPORIS_ET_SANGUINIS_CHRISTI";
$temporal['rang'][$corpo]="Sollemnitas";
$temporal['priorite'][$corpo]="3";
$temporal['1V'][$corpo]=1;
$perannum=$trinitatis+$jour;
$perannum=$corporis+$jour;
$perann=date("Ymd", $perannum);
$temporal['couleur'][$perann]="Vert";

$date_courante=mktime(12,0,0,1,1,$m);
$dernier_jour=mktime(12,0,0,12,31,$m);
$lit=array("A","b","c","d","e","f","g");
$i=0;
//print_r($temporal);

//print_r($temporal);

$row = 1;
//print "<br> baseurl = $baseurl";
//if (get_titre()=="chant-gregorien") $handle = fopen("wp-content/plugins/liturgia/sources/sanctoral.csv", "r","1");
 //$handle = fopen("wp-content/plugins/liturgia/sanctoral_fr.csv", "r","1");
 $handle = fopen("wp-content/plugins/liturgia/sources/sanctoral.csv", "r","1");
//print"<table>";
while (($data = @fgetcsv($handle, 1000, ";")) !== FALSE) {
//print"<tr>";
    $num = count($data);
    //echo "<p> $num fields in line $row: <br /></p>\n";
    $row++;
    if($data[4]!="") {
    	$date_sanctoral=@mktime(12,0,0,$data[0],$data[3],$m);
    	$dds=date("Ymd", $date_sanctoral);
    	//$sanctoral['vita'][$dds]=$data[8];
    	$sanctoral['intitule'][$dds]=$data[4];
    	$sanctoral['rang'][$dds]=$data[5];
    	$sanctoral['couleur'][$dds]=$data[6];
    	$sanctoral['priorite'][$dds]=$data[7];
		}
}


$handle = fopen("wp-content/plugins/liturgia/sanctoral_EU.csv", "r","1");
//print"<table>";
while (($data = @fgetcsv($handle, 1000, ";")) !== FALSE) {
//print"<tr>";
    $num = count($data);
    //echo "<p> $num fields in line $row: <br /></p>\n";
    $row++;
    if($data[4]!="") {
    	$date_sanctoral=@mktime(12,0,0,$data[0],$data[3],$m);
    	$dds=date("Ymd", $date_sanctoral);
    	//$sanctoral['vita'][$dds]=$data[8];
    	$sanctoral['intitule'][$dds]=$data[4];
    	$sanctoral['rang'][$dds]=$data[5];
    	$sanctoral['couleur'][$dds]=$data[6];
    	$sanctoral['priorite'][$dds]=$data[7];
		}
	}
$handle = fopen("wp-content/plugins/liturgia/sanctoral_france.csv", "r","1");
//print"<table>";
while (($data = @fgetcsv($handle, 1000, ";")) !== FALSE) {
//print"<tr>";
    $num = count($data);
    //echo "<p> $num fields in line $row: <br /></p>\n";
    $row++;
    if($data[4]!="") {
    	$date_sanctoral=@mktime(12,0,0,$data[0],$data[3],$m);
    	$dds=date("Ymd", $date_sanctoral);
    	//$sanctoral['vita'][$dds]=$data[8];
    	$sanctoral['intitule'][$dds]=$data[4];
    	$sanctoral['rang'][$dds]=$data[5];
    	$sanctoral['couleur'][$dds]=$data[6];
    	$sanctoral['priorite'][$dds]=$data[7];
		}
	}
$handle = fopen("wp-content/plugins/liturgia/sanctoral_SE.csv", "r","1");
//print"<table>";
while (($data = @fgetcsv($handle, 1000, ";")) !== FALSE) {
//print"<tr>";
    $num = count($data);
    //echo "<p> $num fields in line $row: <br /></p>\n";
    $row++;
    if($data[4]!="") {
    	$date_sanctoral=@mktime(12,0,0,$data[0],$data[3],$m);
    	$dds=date("Ymd", $date_sanctoral);
    	//$sanctoral['vita'][$dds]=$data[8];
    	$sanctoral['intitule'][$dds]=$data[4];
    	$sanctoral['rang'][$dds]=$data[5];
    	$sanctoral['couleur'][$dds]=$data[6];
    	$sanctoral['priorite'][$dds]=$data[7];
		}
	}

$handle = fopen("wp-content/plugins/liturgia/selection-RE.csv", "r","1");
//print"<table>";
while (($data = @fgetcsv($handle, 1000, ";")) !== FALSE) {
//print"<tr>";
    $num = count($data);
    //echo "<p> $num fields in line $row: <br /></p>\n";
    $row++;
    if($data[4]!="") {
    	$date_sanctoral=@mktime(12,0,0,$data[0],$data[3],$m);
    	$dds=date("Ymd", $date_sanctoral);
    	//$sanctoral['vita'][$dds]=$data[8];
    	$selection['intitule'][$dds]=$data[4];
		}
	}

$sql="select * from jos_comliturgiahorarum_subscribers where email='$my->email'";
$r_subscr=@mysql_query($sql);
$o_subscr=@mysql_fetch_object($r_subscr);
//$sanctoral_france=1;

if($o_subscr->France==1) {
/// Propre spécifique

$row = 1;
$handle = fopen("calendrier/sanctoral_europe.csv", "r","1");
//print"<table>";
while (($data = @fgetcsv($handle, 1000, ";")) !== FALSE) {
//print"<tr>";
    $num = count($data);
    //echo "<p> $num fields in line $row: <br /></p>\n";
    $row++;
    

    if($data[4]!="") {
    	$date_sanctoral=@mktime(12,0,0,$data[0],$data[3],$m);
    	$dds=date("Ymd", $date_sanctoral);
    	$sanctoral['vita'][$dds]=$data[8];
    	$sanctoral['intitule'][$dds]=$data[4];
    	$sanctoral['rang'][$dds]=$data[5];
    	$sanctoral['couleur'][$dds]=$data[6];
    	$sanctoral['priorite'][$dds]=$data[7];
	}
  }





$row = 1;
$handle = fopen("calendrier/sanctoral_france.csv", "r","1");
//print"<table>";
while (($data = @fgetcsv($handle, 1000, ";")) !== FALSE) {
//print"<tr>";
    $num = count($data);
    //echo "<p> $num fields in line $row: <br /></p>\n";
    $row++;
    

    if($data[4]!="") {
    	$date_sanctoral=@mktime(12,0,0,$data[0],$data[3],$m);
    	$dds=date("Ymd", $date_sanctoral);
    	$sanctoral['vita'][$dds]=$data[8];
    	$sanctoral['intitule'][$dds]=$data[4];
    	$sanctoral['rang'][$dds]=$data[5];
    	$sanctoral['couleur'][$dds]=$data[6];
    	$sanctoral['priorite'][$dds]=$data[7];
		}
  }
}


    	/// S. JOSEPH
    	    if ($m=="2006") {
				$sanctoral['intitule']['20060320']=$sanctoral['intitule']['20060319'];
    		$sanctoral['rang']['20060320']=$sanctoral['rang']['20060319'];
    		$sanctoral['couleur']['20060320']=$sanctoral['couleur']['20060319'];
    		$sanctoral['priorite']['20060320']=$sanctoral['priorite']['20060319'];
    		$sanctoral['vita']['20060320']=$sanctoral['vita']['20060319'];
    		
    		$sanctoral['intitule']['20060319']="";
    		$sanctoral['rang']['20060319']="";
    		$sanctoral['couleur']['20060319']="";
    		$sanctoral['priorite']['20060319']="";
    		$sanctoral['vita']['20060319']="";
			}
			if ($m=="2008") {
				$sanctoral['intitule']['20080315']=$sanctoral['intitule']['20080319'];
    		$sanctoral['rang']['20080315']=$sanctoral['rang']['20080319'];
    		$sanctoral['couleur']['20080315']=$sanctoral['couleur']['20080319'];
    		$sanctoral['priorite']['20080315']=$sanctoral['priorite']['20080319'];
    		$sanctoral['vita']['20080315']=$sanctoral['vita']['20080319'];
    		
    		$sanctoral['intitule']['20080319']="";
    		$sanctoral['rang']['20080319']="";
    		$sanctoral['couleur']['20080319']="";
    		$sanctoral['priorite']['20080319']="";
    		$sanctoral['vita']['20080319']="";
			}

		/// ANNONCIATION

		//if (($data[4]=="IN ANNUNTIATIONE DOMINI")) {
    	    if ($m=="2005") {
			$sanctoral['intitule']['20050404']=$sanctoral['intitule']['20050325'];
    		$sanctoral['rang']['20050404']=$sanctoral['rang']['20050325'];
    		$sanctoral['couleur']['20050404']=$sanctoral['couleur']['20050325'];
    		$sanctoral['priorite']['20050404']=$sanctoral['priorite']['20050325'];
    		$sanctoral['intitule']['20050325']="";
    		$sanctoral['rang']['20050325']="";
    		$sanctoral['couleur']['20050325']="";
    		$sanctoral['priorite']['20050325']="";
			}
			if ($m=="2007") {
				$sanctoral['intitule']['20070326']=$sanctoral['intitule']['20070325'];
    		$sanctoral['rang']['20070326']=$sanctoral['rang']['20070325'];
    		$sanctoral['couleur']['20070326']=$sanctoral['couleur']['20070325'];
    		$sanctoral['priorite']['20070326']=$sanctoral['priorite']['20070325'];
    		$sanctoral['intitule']['20070325']="";
    		$sanctoral['rang']['20070325']="";
    		$sanctoral['couleur']['20070325']="";
    		$sanctoral['priorite']['20070325']="";
			}
			if ($m=="2008") {
			$sanctoral['intitule']['20080331']=$sanctoral['intitule']['20080325'];
    		$sanctoral['rang']['20080331']=$sanctoral['rang']['20080325'];
    		$sanctoral['couleur']['20080331']=$sanctoral['couleur']['20080325'];
    		$sanctoral['priorite']['20080331']=$sanctoral['priorite']['20080325'];
    		
			$sanctoral['intitule']['20080325']="";
    		$sanctoral['rang']['20080325']="";
    		$sanctoral['couleur']['20080325']="";
    		$sanctoral['priorite']['20080325']="";

			}
			if ($m=="2012") {
			$sanctoral['intitule']['20120326']=$sanctoral['intitule']['20120325'];;
    		$sanctoral['rang']['20120326']=$sanctoral['rang']['20120325'];
    		$sanctoral['couleur']['20120326']=$sanctoral['couleur']['20120325'];
    		$sanctoral['priorite']['20120326']=$sanctoral['priorite']['20120325'];
    		
    		$sanctoral['intitule']['20120325']="";
    		$sanctoral['rang']['20120325']="";
    		$sanctoral['couleur']['20120325']="";
    		$sanctoral['priorite']['20120325']="";
			}
			if ($m=="2013") {
			$sanctoral['intitule']['20130408']=$sanctoral['intitule']['20130325'];
    		$sanctoral['rang']['20130408']=$sanctoral['rang']['20130325'];
    		$sanctoral['couleur']['20130408']=$sanctoral['couleur']['20130325'];
    		$sanctoral['priorite']['20130408']=$sanctoral['priorite']['20130325'];
    		
    		$sanctoral['intitule']['20130325']="";
    		$sanctoral['rang']['20130325']="";
    		$sanctoral['couleur']['20130325']="";
    		$sanctoral['priorite']['20130325']="";
    		
    		
			}

// Conversion de Saint Paul en 2009
if($m=="2009")
$sanctoral['priorite']['20090125']=5;

 //print_r($sanctoral);   




	$m=$annee;
    $date_courante=mktime(12,0,0,1,1,$m);
	$dernier_jour=mktime(12,0,0,12,31,$m);

include_once("lune.php");	
	$traductions=simplexml_load_file("wp-content/plugins/liturgia/traductions.xml");
	//print_r($selection);
while($date_courante <= $dernier_jour) {

    $vita="";
    $tempo="";
    $pV="";
    $priorite="";
	//print "boucle infinie ? <br>";
	$couleurs="";
	$d=date("Ymd", $date_courante);
	$f=date("w", $date_courante);
	//$feria=$feriae[$f];
	$date=date("Ymd", $date_courante);
	$intitule = $temporal['intitule'][$date];
	//$tempo=$temporal['temporal'][$date];
	if ($temporal['tempus'][$date]!="") $tempus=$temporal['tempus'][$date];
	if ($temporal['hebdomada'][$date]!="") $hebdomada=$temporal['hebdomada'][$date];
	if ($temporal['couleur'][$date]!="") $couleur=$temporal['couleur'][$date];
	if ($temporal['hp'][$date]!="") $hp=$temporal['hp'][$date];
	$code=$temporal['code'][$date];
	$rang=$temporal['rang'][$date];
	$priorite=$temporal['priorite'][$date];
	$tempo=$temporal['temporal'][$date];
	//print"tempo : $tempo<br>";
	$pV=$temporal['1V'][$date];
	$mense=substr($date,4,2);
	$die=substr($date,6,2);
	//$temporal['rang'][$dd]="Solemnitas";
	if(($sanctoral['priorite'][$date]!="")&&($temporal['priorite'][$date]!="")) { // conflit temporal / sanctoral
		if ($sanctoral['priorite'][$date]<$temporal['priorite'][$date]) {
			$intitule =$sanctoral['intitule'][$date];
			if($sanctoral['couleur'][$date]!="") $couleurs=$sanctoral['couleur'][$date];
			//else $couleur=$sanctoral['couleur'][$date];
			$rang=$sanctoral['rang'][$date];
			$vita=$sanctoral['vita'][$date];
			$priorite=$sanctoral['priorite'][$date];
			//$codes=$mense."-".$die;
			if($priorite<=5) $pV=1;
		}
		
		else {
			$intitule =$temporal['intitule'][$date];
			$tempo=$temporal['temporal'][$date];
			$pV=$temporal['1V'][$date];
			$codes=$mense."-".$die;
			//$tempo=$temporal['temporal'][$date];
			//$couleur=$temporal['couleur'][$date];
		}
	}

	if(($sanctoral['intitule'][$date]!="")&&($temporal['intitule'][$date]=="")) {
			$intitule .=$sanctoral['intitule'][$date];
			if($sanctoral['couleur'][$date]!="") $couleurs=$sanctoral['couleur'][$date];
            $rang=$sanctoral['rang'][$date];
            $vita=$sanctoral['vita'][$date];
            $priorite=$sanctoral['priorite'][$date];
            if($priorite<=4) $pV=1;
            $propre=date("m",$date_courante).date("d",$date_courante);
			$codes=$mense."-".$die;
			//print"propre : $propre <br>";
	}
	if($couleurs) {
		$coul=$hexa[$couleurs];
		$couleur_template[$d]=$couleurs;
	}
	else {
		$coul=$hexa[$couleur];
		$couleur_template[$d]=$couleur;
	}

	//if ($ordo!="la") $tempus=get_traduction($tempus,$lang,$traductions);
	$calendarium['couleur_template'][$d]=$couleur_template[$d];
	$calendarium['sanctoral'][$d]=$sanctoral['intitule'][$d];
	$calendarium['tempus'][$d]=$tempus;
	//print"<td>$hebdomada</td>";
	//if ($ordo!="la") $hebdomada=get_traduction($hebdomada,$lang,$traductions);
	$calendarium['hebdomada'][$d]=$hebdomada;
	//print"<td>$intitule</td>";
	//if ($ordo!="la") $intitule=get_traduction($intitule,$lang,$traductions);
	$calendarium['intitule'][$d]=$intitule;
	//$reference=get_traduction($reference,$lang,$traductions);
	$calendarium['reference'][$d]=$intitule;
	//print"<td>$rang</td>";
	$calendarium['rang'][$d]=$rang;
	//print"<td>$hp</td>";
	$calendarium['hebdomada_psalterium'][$d]=$hp;
	//";
  $calendarium['vita'][$d]=$vita;
  //if ($ordo!="la") $tempo=get_traduction($tempo,$lang,$traductions);
  $calendarium['temporal'][$d]=$tempo;
  if(!$priorite) $priorite=13;
  $calendarium['priorite'][$d]=$priorite;
  $calendarium['1V'][$d]=$pV;
  $calendarium['code'][$d]=$code;
  $calendarium['codes'][$d]=$codes;
  
    
    //$calendarium['propre'][$d]=$propre;
	$filename="calendrier/".@date("Y-m-d",$date_courante).".xml";
	//print"<br>".$filename." ";
	$output="<calendarium>";
	$output.="<vita>".$vita."</vita>";
	$output.="<priorite>".$priorite."</priorite>";
	$output.="<pV>".$pV."</pV>";
	$output.="<couleur>".$couleur_template[$d]."</couleur>";
	$output.="<sanctoral><la>".$sanctoral['intitule'][$d]."</la><fr>".get_traduction($sanctoral,"fr",$traductions)."</fr></sanctoral>";
	$output.="<tempus><la>".$tempus."</la><fr>".get_traduction($tempus,"fr",$traductions)."</fr></tempus>";
	$output.="<hebdomada><la>".$hebdomada."</la><fr>".get_traduction($hebdomada,"fr",$traductions)."</fr></hebdomada>";
	$output.="<intitule><la>".$intitule."</la><fr>".get_traduction($intitule,"fr",$traductions)."</fr></intitule>";
	$output.="<rang><la>".$rang."</la><fr>".get_traduction($rang,"fr",$traductions)."</fr></rang>";
	$output.="<hebdomada_psalterium>".$hp."</hebdomada_psalterium>";
	list($MoonPhase, $MoonAge, $MoonDist, $MoonAng, $SunDist, $SunAng, $mpfrac) = Moon::phase(date("Y",$date_courante), date("m",$date_courante), date("d",$date_courante), 00, 00, 01);
	$output.="<phase_lunaire>".number_format($MoonPhase*100, 2, ',', '')."</phase_lunaire>";
	$output.="<age_lunaire>".floor($MoonAge)."</age_lunaire>";
	$output.="<selection>".$selection['intitule'][$d]."</selection>";
	$output.="</calendarium>";
	//print $output."<p>";
	$sxe = new SimpleXMLElement($output);
	$sxe->asXML("wp-content/plugins/liturgia/calendrier/".@date("Y-m-d",$date_courante).".xml");

	$mois[(date("n",$date_courante))].="
	<jour date=\"".@date("Ymd",$date_courante)."\">
	<intitule><la>".$intitule."</la><fr>".get_traduction($intitule,"fr",$traductions)."</fr></intitule>
	<couleur>".$couleur_template[$d]."</couleur>
	</jour>";
	
	//print_r($mois);
	
$codes="";
	$date_courante=$date_courante+$jour;
	$i++; if ($i==7) $i=0;
}

for($b=1;$b<13;$b++) {

	$content="<mois>";
	$content.=$mois[$b];
	$content.=$mois[$b];
	$content.="</mois>";
	$sxe = new SimpleXMLElement($content);
	$sxe->asXML("wp-content/plugins/liturgia/calendrier/".$annee."-".$b.".xml");
}
//print_r($calendarium);
return $calendarium;
}

?>
