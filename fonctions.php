<?php

function mod_ordo($do,$calendarium) {
	$bb.="<h3>Ordo</h3>";
	$datelatin=date_latin($do);
	$bb.="<b>Liturgie pour :</b> $datelatin";
	$bb.="<br><b>Temps liturgique :</b> ".$calendarium['tempus'][$do];
	$bb.="<br><b>Semaine :</b> ".$calendarium['hebdomada'][$do];
	if($calendarium['intitule'][$do]) $bb.="<br><b>".$calendarium['intitule'][$do]."</b>";
	if($calendarium['rang'][$do]) $bb.="<br><b >Rang : </b>".$calendarium['rang'][$do];
	$bb.="<br><b>Couleur des ornements :</b> ".$calendarium['couleur_template'][$do];
	$bb.="<br><b>Semaine du psautier :</b> ".$calendarium['hebdomada_psalterium'][$do];
	$bb.="<br>";
//$bb.= "<i>".$calendarium['vita'][$do]."</i>";
$bb=utf($bb);
print"</table>";
print $bb;
}




function ordo($ordo,$ref,$lang) {
    
	return $output;
}

function datets($jour) {
if(!$jour) $jour=$_GET['jour'];
if(!$jour) $jour=$_GET['date'];
if(!$jour) $jour=date("Ymd",time());
$anno=substr($jour,0,4);
$mense=substr($jour,4,2);
$die=substr($jour,6,2);
$date_ts=mktime(12,0,0,$mense,$die,$anno);

//print"<br>Jour=".$jour;
$jours_l = array("Dominica,", "Feria secunda,","Feria tertia,","Feria quarta,","Feria quinta,","Feria sexta,", "Sabbato,");
//print"<br> Jour de la semaine : ".$jours_l[date('w',$date_ts)];
$date['ts']=$date_ts;
$date['AAAAMMJJ']=$jour;
return $date;
}
function date2dateTS($date) { // format AAAAMMJJ
	$anno=substr($date,0,4);
	$mense=substr($date,4,2);
	$die=substr($date,6,2);
	$dts=mktime(12,0,0,$mense,$die,$anno);
	//print "<br>".$dts;
	return $dts;
	
}
function date_latin($j) {
	if($j==null) $j=time();
 $mois= array("Ianuarii","Februarii","Martii","Aprilis","Maii","Iunii","Iulii","Augustii","Septembris","Octobris","Novembris","Decembris");
 $jours = array("Dominica,", "Feria secunda,","Feria tertia,","Feria quarta,","Feria quinta,","Feria sexta,", "Sabbato,");
 $date= $jours[@date("w",$j)]." ".@date("j",$j)." ".$mois[@date("n",$j)-1]." ".@date("Y",$j);
 return $date;
}

function affiche_tableau($tableau,$office) {
	if($office=="laudes") {
		$t="
		<table>
		<th>Psautier</th>
		<th>Temporal</th>
		<th>Propre</th>
		<th>Special</th>";
		$t.="
		<tr>
		<td>".$tableau['matin']['psalterium']."</td>
		<td>".$tableau['matin']['ferie']."</td>
		<td>".$tableau['matin']['propre']."</td>
		<td>".$tableau['matin']['special']."</td>";
		$t.="</table>";
	}
	return $t;

}

function get_traduction($atraduire,$lang) {

$traductions=$GLOBALS['traductions'];
//print_r($traductions);
$lang=$GLOBALS['lang'];
if(!$lang) $lang="fr";
$path="//item[@ref='".$atraduire."']//".$lang;
//$path="//item[@ref='Tempus Quadragesimae']/fr";
//print"<br>".$path." ";
$traduit=@$traductions->xpath($path);
//print $traduit[0];
if(!$traduit[0]) return $atraduire;
else return $traduit[0];
}

function get_date($date,$calendarium) {
if(!$date) $date=$_GET['date'];
if(!$date) $date=date("Ymd",time());
$anno=substr($date,0,4);
$mense=substr($date,4,2);
$die=substr($date,6,2);
$date_ts=mktime(12,0,0,$mense,$die,$anno);
$output=strftime("%A %#d %B %Y",$date_ts);

$output.="<br>".$calendarium['intitule'][$date];
/*//print_r($calendarium);
*/	
	
	return $output;
	
}

function rougis_verset($string) {
$string1=str_replace("V/.", "<font color=red>V/.</font>",$string);
$string2= str_replace("R/.", "<font color=red>R/.</font>",$string1);
$string3= str_replace("", "<font color=red></font>",$string2);
$string4= str_replace("*", "<font color=red>*</font>",$string3);
$string5= str_replace("]", "<font color=red>]</font>",$string4);
$string6= str_replace("[", "<font color=red>[</font>",$string5);
$string7= str_replace("†", "<font color=red>†</font>",$string6);
$string8= str_replace("—", "<font color=red>—</font>",$string7);

return $string8;
}

function lectio($ref) {
//$prefixe="http://gregorien.radio-esperance.fr/";
	$row = -1;
	$fp = @fopen ($prefixe."calendrier/liturgia/$ref.csv","r","1");
	while ($data = @fgetcsv ($fp, 1000, ";")) {
	$row++;
	  $latin=nl2br($data[0]);
		if ($lang=="fr") $verna=nl2br($data[1]);
		if ($lang=="en") $verna=nl2br($data[2]);
		if ($lang=="ar") $verna=nl2br($data[3]);
		
		if($row==0){		
		$lectio.="
		<tr><td id=\"colgauche\">$latin</td><td id=\"coldroite\">$verna</td>";
			}
			   
		elseif($row==1) {
		$lectio.="
		<tr><td id=\"colgauche\"><center><font color=red>$latin</font></center></td><td id=\"coldroite\"><center><font color=red>$verna</font></center></td>";
		}
		elseif($row==2) {
		$lectio.="
		<tr><td id=\"colgauche\"><center><font color=red><i>$latin</i></font></center></td><td id=\"coldroite\"><center><font color=red><i>$verna</i></font></center></td>";
		}
		else {
		$lectio.="
		<tr><td id=\"colgauche\">$latin</td><td id=\"coldroite\">$verna</td>";	
		}
	}	
 
	@fclose ($fp);
	return $lectio;
}

function modificationes($messe,$lang) {
           $option=$_GET['option'];
$row = 0;
$ref=no_accent($ref);
$ref="sources/".$ref.".csv";
$fp = fopen ($ref,"r","1");
	while ($data = @fgetcsv ($fp, 1000, ";")) {
	    $id=$data[0];
	    //$messe[$id];
	    if($lang=="fr")$verna=$data[4];
	    if($lang=="en")$verna=$data[5];
	    if($lang=="ar")$verna=$data[6];
		}    
	   
	    $modificationes.="
		<div class=\"gauche\">$latin".affiche_editeur($ref,"lat")."</div>
		<div class=\"droite\">$verna".affiche_editeur($ref,$lang)."</div>";	
		$row++;	

	@fclose ($fp);
	return $modificationes;
}


function recitatif  ($ref,$lang) {
  $option=$_GET['option'];
$row = 0;
$ref=no_accent($ref);
$ref="sources/".$ref.".csv";
$fp = @fopen ($ref,"r","1");
	while ($data = @fgetcsv ($fp, 1000, ";")) {
	    $latin=$data[0];
	    if($lang=="fr")$verna=$data[1];
	    if($lang=="en")$verna=$data[2];
	    if($lang=="ar")$verna=$data[3];
	    
	   
	    $recitatif.="
		<div class=\"gauche\">$latin".affiche_editeur($ref,"lat")."</div>
		<div class=\"droite\">$verna".affiche_editeur($ref,$lang)."</div>";	
		$row++;	
	}
	@fclose ($fp);
	return $recitatif;
}


function ordinaire_messe($ordinaire,$ref,$lang) {
       $ordi.="
		<div class=\"gauche\">".nl2br($ordinaire[$ref]['lat'])."</div>
		<div class=\"droite\">".nl2br($ordinaire[$ref]['verna'])."</div>";
		return $ordi;
}



function lectiobrevis($ref,$lang) {

$option=$_GET['option'];
$ref=no_accent($ref);
$refL="/wp-content/plugins/liturgia/sources/".$ref.".xml" ;
$xml = @simplexml_load_file("http://92.243.24.163/".$refL);// or die("Error: Cannot create object : $refL");
if((!$xml)&&($_GET['edition']=="on")) {
	//<a href="javascript:affichage_popup('?option=edit&affiche=1&task=edit&lang=la&ref=sources/ps3.xml','affichage_popup');"><b>éditer</b></a>
	if($_GET['edition']=="on")$lectio="
	<div class=\"gauche\"><a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">".$ref."</a></div>
	<div class=\"droite\"></div>
	";
	return $lectio;
}


if($_GET['edition']=="on") {
	$lectio="<div class=\"gauche\">".affiche_editeur($refL,"la")."</div>
	<div class=\"droite\">".affiche_editeur($refL,$lang)."</div>";
}
			 	
foreach(@$xml->children() as $ligne){
	$o=$ligne->xpath('@id');
	$la=$ligne->xpath('la');
	$ver=$ligne->xpath($lang);
	
	if($o[0]==0) {
		$lectio.= "<div class=\"gauche\"><b><center><font color=red>".$la[0]."</font></b></center></div><div class=\"droite\"><b><center><font color=red>".$ver[0]."</font></b></center></div>";
	}
	else {
		$lectio.= "<div class=\"gauche\">".$la[0]."</div><div class=\"droite\">".$ver[0]."</div>";
	}
}

	return $lectio;
}

function preces($ref,$lang) {
	$option=$_GET['option']; 
	$ref=no_accent($ref);
	$preces.="<div class=\"gauche\"><font color=red><center>Preces  </center></font></div>";
	$preces.="<div class=\"droite\"><font color=red><center>Prières litaniques. </center></font></div>";
	
	$preces.=affiche_texte($ref, $lang);
		
	return $preces;

}

function antienne($ref,$lang,$num="") {
$option=$_GET['option'];
$ref=no_accent($ref);
//$prefixe="http://gregorien.radio-esperance.fr/";

$refL="/wp-content/plugins/liturgia/sources/propres/office/".$ref.".xml";
$xml = @simplexml_load_file("http://92.243.24.163/".$refL); // or die("Erreur : ".$refL);
if(!$xml) {
	//<a href="javascript:affichage_popup('?option=edit&affiche=1&task=edit&lang=la&ref=sources/ps3.xml','affichage_popup');"><b>éditer</b></a>
	if($_GET['edition']=="on")$antienne="
	<div class=\"gauche\"><a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">".$ref."</a></div>
	<div class=\"droite\"></div>
	";
	return $antienne;
}
//print"<br>OPEN : "."sources/".$ref.".csv";
$la=$xml->xpath('//ligne//la');
$expr="//ligne//".$lang;
$ver=$xml->xpath($expr);
$antienne="
	<div class=\"gauche\">".affiche_editeur($refL,"la")."</div>
	<div class=\"droite\">".affiche_editeur($refL,$lang)."</div>
	";	
	$antienne.="
		<div class=\"gauche\">".mp3Player($mp3)."</div>
		<div class=\"droite\">&nbsp;</div>";
	$antienne.="<div class=\"gauche\"><font color=red>Ant. ".$num." </font>".$la['0']."</div>";
	$antienne.="<div class=\"droite\"><font color=red>Ant. ".$num."</font> ".$ver['0']."</div>";
	return $antienne;
}

function reponsbref($ref,$lang) {
$option=$_GET['option'];
//$prefixe="http://gregorien.radio-esperance.fr/";
$row = 0;
$ref=no_accent($ref);
$refL="/wp-content/plugins/liturgia/sources/propres/office/".$ref.".xml";
$xml = @simplexml_load_file("http://92.243.24.163".$refL) ; //or die ("erreur : "."wp-content/plugins/liturgia/".$ref);
if(!$xml){
	if($_GET['edition']=="on") {

	$reponsbref="<div class=\"gauche\"><a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">".$ref."</a></div>";
	$reponsbref.="<div class=\"droite\"> </div>";
	}
	return $reponsbref;
}

//print"<br>OPEN : "."sources/".$ref.".csv";
//print_r($xml);
$la=@$xml->xpath('//ligne/la');
$expr="//ligne/".$lang;
$ver=@$xml->xpath($expr);

$reponsbref="
   	<div class=\"gauche\"><font color=red><center><b>Responsorium Breve</b></font></div>
	<div class=\"droite\"><font color=red><center><b>".get_traduction("Responsorium Breve",$lang)."</b></center></font></div>
	<div class=\"gauche\">".affiche_editeur($refL,"la")."</div>
	<div class=\"droite\">".affiche_editeur($refL,$lang)."</div>
	";
	$reponsbref.="
		<div class=\"gauche\">".mp3Player($mp3)."</div>
		<div class=\"droite\">&nbsp;</div>";
	for($v=0;$la[$v];$v++) {
		$reponsbref.="<div class=\"gauche\">".nl2br($la[$v])."</div>";
		$reponsbref.="<div class=\"droite\">".nl2br($ver[$v])."</div>";
	}
	return rougis_verset($reponsbref);
}

function verset($ref,$lang) {
$option=$_GET['option'];
//$prefixe="http://gregorien.radio-esperance.fr/";
$row = 0;
$ref=no_accent($ref);
$refL="/wp-content/plugins/liturgia/sources/propres/office/".$ref.".xml";
$xml = @simplexml_load_file("http://92.243.24.163".$refL) ; //or die ("erreur : "."wp-content/plugins/liturgia/".$ref);
if((!$xml)&&($_GET['edition']=="on")) {
	$verset="<div class=\"gauche\"><a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">".$ref."</a></div>";
	$verset.="<div class=\"droite\"></div>";
	return $verset;
}
//print"<br>OPEN : "."sources/".$ref.".csv";
//print_r($xml);
$la=@$xml->xpath('//ligne/la');
$expr="//ligne/".$lang;
$ver=@$xml->xpath($expr);

$verset="
	<div class=\"gauche\">".affiche_editeur($ref,"la")."</div>
	<div class=\"droite\">".affiche_editeur($ref,$lang)."</div>
	";
	$verset.="
		<div class=\"gauche\">".mp3Player($mp3)."</div>
		<div class=\"droite\">&nbsp;</div>";
	for($v=0;$la[$v];$v++) {
		$verset.="<div class=\"gauche\">".nl2br($la[$v])."</div>";
		$verset.="<div class=\"droite\">".nl2br($ver[$v])."</div>";
	}
	return $verset;
}



function hymne($ref,$lang,$mp3="") {
$row = 0;
//$prefixe="http://gregorien.radio-esperance.fr/";
$refL="/wp-content/plugins/liturgia/sources/".$ref.".xml";
//print"<br>";
//print_r($_SERVER);
//print "<br>".$refL;
$xml = simplexml_load_file("http://92.243.24.163/".$refL) or die("Error: Cannot create object : $refL");

//print"<br>OPEN : "."sources/".$ref.".csv";

$hymne="
	<div class=\"gauche\">".affiche_editeur($refL,"la")."</div>
	<div class=\"droite\">".affiche_editeur($refL,$lang)."</div>
	";
	$hymne.="
		<div class=\"gauche\">".mp3Player($mp3)."</div>
		<div class=\"droite\">&nbsp;</div>";
	
	
	foreach(@$xml->children() as $ligne){
	$o=@$ligne->xpath('@id');
	$la=@$ligne->xpath('la');
	$ver=@$ligne->xpath($lang);
//	print"<br>".$o[0];
	if($o[0]==0) {
	$hymne.= "<div class=\"gauche\"><b><center><font color=red>".$la[0]."</font></b></center></div><div class=\"droite\"><b><center><font color=red>".$ver[0]."</font></b></center></div>";
	}
	elseif($la[0]==null) $hymne.= "<div class=\"gauche\">&nbsp;</div><div class=\"droite\">&nbsp;</div>";
	
	else	$hymne.= "<div class=\"gauche\"><center>".$la[0]."</center></div><div class=\"droite\"><center>".$ver[0]."</center></div>";
	}

	return $hymne;
}


function antienne_messe($ref,$lang) {
$option=$_GET['option'];
if(!$lang) $lang=$GLOBALS['lang'];
if(!$lang) $lang="fr";
$ref=trim($ref);
$refL="wp-content/plugins/liturgia/sources/propres/messe/".$ref.".xml";
//print"<br>";
//print_r($_SERVER);
//print "<br>".$refL;
if($_GET['debug']==1) $antiennemesse.="
<div class=\"gauche\">".$ref."</div>
<div class=\"droite\">".$ref."</div>
";
$xml = @simplexml_load_file("http://92.243.24.163/".$refL); // or die("Error: Cannot create object : $refL");
if(!$xml) {
	//print" - Référence : ".$ref." -> <a href=\"javascript:affichage_popup('?task=creation&lang=$lang&comment=".$refL."','affichage_popup');\">Création</a>";
	if ($_GET['edition']=="on") $antiennemesse="
	<div class=\"gauche\"><a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">".$ref."</a></div>
	<div class=\"droite\"> </div>";
	return $antiennemesse;
}

//print"<br>OPEN : "."sources/".$ref.".csv";
$antiennemesse.="</center>";
$antiennemesse.="
	<div class=\"gauche\">".affiche_editeur($refL,"la")."</div>
	<div class=\"droite\">".affiche_editeur($refL,$lang)."</div>
	";
/*	
$antiennemesse.="
		<div class=\"gauche\">".mp3Player($mp3)."</div>
		<div class=\"droite\">&nbsp;</div>";
*/	
$o=0;
foreach(@$xml->children() as $ligne){
	//$o=@$ligne->xpath('@id');
	$la=@$ligne->xpath('la');
	$ver=@$ligne->xpath($lang); 
	if($o==0)$antiennemesse.= "
	<div class=\"gauche liturgie_titre\">".$la[0]."</div>
	<div class=\"droite liturgie_titre\">".$ver[0]."</div>";
	elseif ($o==1) $antiennemesse.="	<div class=\"gauche liturgie_italique\">".$la[0]."</div>	<div class=\"droite liturgie_italique\">".$ver[0]."</div>";
	else $antiennemesse.="	<div class=\"gauche\">".$la[0]."</div>	<div class=\"droite\">".$ver[0]."</div>";
	$o++;
}
return $antiennemesse;
}

function affiche_editeur($ref,$lang) {
	/* Verification
		1 - des droits de l'utilisateur
		2 - de l'éditabilité du contenu concerné.
	*/
	if($_GET['edition']=="on") $verif=true;
	/*
	$q=$_GET['q'];
	$auth=true;
if($GLOBALS['user']->roles[2]=="authenticated user") $auth=true;
	if(!$auth) return;
	*/
	//if ($_GET['option']=="edit") $verif=true;
	// code à compléter.
	if ($verif) { // contenu éditable et droits de l'utilisateur OK.
		$editeur=" &nbsp; <A HREF=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?option=edit&affiche=1&task=edit&lang=$lang&ref=/$ref','affichage_popup');\"><b>éditer</b></A>";
	}	
	return $editeur;	
}

/*
function affiche_editeur_propre($id,$ref,$lang) {
	/* Verification
		1 - des droits de l'utilisateur
		2 - de l'éditabilité du contenu concerné.
	*/
/*
	$q=$_GET['q'];
	$auth=false;
if($GLOBALS['user']->roles[2]=="authenticated user") $auth=true;
	if(!$auth) return;
	
	if ($_GET['option']=="edit") $verif=(true);
	// code à compéter.
	if ($verif) { // conteu éditable et droits de l'utilisateur OK.
		$editeur=" &nbsp; <A HREF=\"javascript:affichage_popup('?q=$q&task=edit_propre&id=$id&lang=$lang&ref=$ref','affichage_popup');\">éditer</A>";
	}
	
	return $editeur;
	
}
*/


function edit_content() {
	$auth=true;
	if(!$auth) return;
	
	$ref=$_GET['ref'];
	$lang=$_GET['lang'];
	$sens="";
	if ($lang=="ar") $sens="style=\"direction:rtl; font:20px arial,sans-serif;\"";
	$q=$_GET['q'];
	$edit_content.="
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
	</head>
	<body>
	<form method='post' action='?q=$q&task=maj&ref=$ref&lang=$lang'>
	<textarea $sens name='miseajour' cols=\"45\" rows=\"12\">";
	$xml = simplexml_load_file(get_bloginfo('wpurl').$ref) or die("erreur : $ref");
	$re=explode("/",$ref);
	$r=$re[count($re)-1];
	$r = str_replace(".xml", null, $r);

	$content=$xml->xpath($lang);
	if(!$content) {
	
	foreach ($xml->children() as $item) { 
		$el=$item->xpath($lang);
		$edit_content.=trim($el[0])."\r";
		}
	}

	$edit_content.=trim($content[0])."\r";	
	$edit_content.="</textarea>
	<input type=\"hidden\" name=\"lang\" value=\"".$lang."\">
	<INPUT type=\"submit\" value=\"Envoyer\">
	</form>
	</body>
	</html>
	";
	print $edit_content;
	exit();
}

function edit_content_propre() {
	$auth=false;
if($GLOBALS['user']->roles[2]=="authenticated user") $auth=true;
	if(!$auth) return;
	
	$ref=$_GET['ref'];
	$lang=$_GET['lang'];
	$id=$_GET['id'];
	$q=$_GET['q'];
	$refL="sources/".no_accent($ref);
	$edit_content_propre.="
	<form method='post' action='?q=$q&task=maj_propre&id=$id&ref=$ref&lang=$lang'>
	<textarea name='miseajour' cols=\"45\" rows=\"12\">";
	$fp = fopen ("$refL","r","1");  //or die ("<br>Erreur ouverture fichier : ".$refL);
	while ($data = @fgetcsv ($fp, 1000, ";")) {
	    $i=$data[0];
	    $edit[$i]['lat']=$data[1];
	    $edit[$i]['mode']=$data[2];
	    $edit[$i]['mp3']=$data[3];
	    $edit[$i]['fr']=$data[4];
	    $edit[$i]['en']=$data[5];
	    $edit[$i]['ar']=$data[6];
	    $row++;
	}
	
	@fclose ($fp);	
	$edit_content_propre.=$edit[$id][$lang]."</textarea>
	<INPUT type=\"submit\" value=\"Envoyer\" ONCLICK=\"window.close()\">
	</form>
	";
	print $edit_content_propre;
	exit();
}

function maj_content($miseajour,$userid) {
	global $wpdb;
	$ref=$_GET['ref'];
	$lang=$_GET['lang'];
	if($lang=="la") $miseajour=creation_accents($miseajour);
	$datets=time();
	  $miseajour=addslashes($miseajour);
	$q="insert into liturgia_ed(user,ref_texte,lang,nouveau_texte,date_ts) values('$userid','$ref','$lang','$miseajour','$datets') ";  
  	$wpdb->query($q);
	  print"<html><head>
	  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" /></head><body><br>Mise à jour effectuée. Votre proposition sera validée prochainement.</body></html>";
	  exit();
}


function intitule(){
	 /*	
	if($GLOBALS['rang']!="") print $GLOBALS['intitule'].", ".$GLOBALS['rang'].".";
	else print $GLOBALS['hebdomada'];
	*/
	//print $GLOBALS['hebdomada'];
	//$date=$_GET['date'];
	$date_ts=$GLOBALS['date_ts'];
	$die=array("Dominica","Feria II","Feria III","Feria IV","Feria V","Feria VI","Sabbato");
	$lang=$GLOBALS['lang'];
	$xml = $GLOBALS['liturgia'];
	$req="//ordo[@id='RE']";
	$r=$xml->xpath($req);
	//print_r($r[0]);
	$hebdomada=$r[0]->hebdomada->la;
	
	$int="
	<div class=\"gauche\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".$hebdomada."</div>
	<div class=\"droite\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".ucfirst(get_traduction($hebdomada,$lang))."</div>
	";
	$int.="
	<div class=\"gauche\" style=\"font-size: 1.1em;font-weight: 300;text-align:center;\">".$die[date('w',$date_ts)]."</div>
	<div class=\"droite\" style=\"font-size: 1.1em;font-weight: 300;text-align:center;\">".ucfirst(get_traduction($die[date('w',$date_ts)],$lang))."</div>
	";
	$intitule_la=$r[0]->intitule->la;
	if($lang=="fr") $intitule_ver=$r[0]->intitule->fr;
	if($lang=="en") $intitule_ver=$r[0]->intitule->en;
	if($lang=="ar") $intitule_ver=$r[0]->intitule->ar;
	if($intitule_la!="") {
		$int.="
		<div class=\"gauche\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".$intitule_la."</div>
		<div class=\"droite\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".$intitule_ver."</div>
		";
		$rang=$r[0]->rang->la;
		$rang_ver=get_traduction($rang, $lang);
		if($rang) $int.="
		<div class=\"gauche\" style=\"font-size: 1.1em;font-weight: 300;text-align:center; font-style:italic\">".$rang."</div>
		<div class=\"droite\" style=\"font-size: 1.1em;font-weight: 300;text-align:center; font-style:italic\">".$rang_ver."</div>
		";
	}
	return $int;
}

function intitule_soir(){
	 /*	
	if($GLOBALS['rang']!="") print $GLOBALS['intitule'].", ".$GLOBALS['rang'].".";
	else print $GLOBALS['hebdomada'];
	*/
	//print $GLOBALS['hebdomada'];
	//$date=$_GET['date'];
	$date_ts=$GLOBALS['date_ts'];
	$die=array("Dominica","Feria II","Feria III","Feria IV","Feria V","Feria VI","Sabbato");
	$lang=$GLOBALS['lang'];
	$xml = $GLOBALS['liturgia'];
	$req="//ordo[@id='RE']";
	$r=$xml->xpath($req);
	//print_r($r[0]);
	$hebdomada=$r[0]->hebdomada->la;
	
	$int="
	<div class=\"gauche\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".$hebdomada."</div>
	<div class=\"droite\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".ucfirst(get_traduction($hebdomada,$lang))."</div>
	";
	$int.="
	<div class=\"gauche\" style=\"font-size: 1.1em;font-weight: 300;text-align:center;\">".$die[date('w',$date_ts)]."</div>
	<div class=\"droite\" style=\"font-size: 1.1em;font-weight: 300;text-align:center;\">".ucfirst(get_traduction($die[date('w',$date_ts)],$lang))."</div>
	";
	$intitule_la=$r[0]->intitule_soir->la;
	if($lang=="fr") $intitule_ver=$r[0]->intitule->fr;
	if($lang=="en") $intitule_ver=$r[0]->intitule->en;
	if($lang=="ar") $intitule_ver=$r[0]->intitule->ar;
	if($intitule_la!="") {
		$int.="
		<div class=\"gauche\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".$intitule_la."</div>
		<div class=\"droite\" style=\"font-size: 1.1em;font-weight: 900;text-align:center;\">".get_traduction($intitule_la, $lang)."</div>
		";
		$rang=$r[0]->rang_soir->la;
		$rang_ver=get_traduction($rang, $lang);
		if($rang) $int.="
		<div class=\"gauche\" style=\"font-size: 1.1em;font-weight: 300;text-align:center; font-style:italic\">".$rang."</div>
		<div class=\"droite\" style=\"font-size: 1.1em;font-weight: 300;text-align:center; font-style:italic\">".$rang_ver."</div>
		";
	}
	return $int;
}

function lecture_messe($ref,$lang) {
	if(!$lang) $lang=$GLOBALS['lang'];
	if(!$lang) $lang="fr";
     $refL="wp-content/plugins/liturgia/sources/propres/messe/lectures/".$ref.".xml";
	 //print"<br>refL = ".$refL;
     $xml = @simplexml_load_file("http://92.243.24.163/".$refL);// or die("<br>Error: Cannot create object : <a href=\"$refL\">$refL</a>");
	 //$ref="LEC_".no_accent($ref);
	 
     if(!$xml) {
	 	$LM ="
	 	<div class=\"gauche\" style=\"font-style:oblique;\">";
	 	if($_GET['edition']=="on") $LM.="<a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=/".$refL."','affichage_popup');\">".$ref."</a>";
	 	$LM.="</div>
	 	<div class=\"droite\">&nbsp;</div>
	   <div class=\"gauche\">Verbum Domini. R/. Deo gratias.</div>";
	   if ($lang=="fr") $LM.="<div class=\"droite\">Parole du Seigneur. R/. Rendons grâces à Dieu.</div>";
	   if ($lang=="en") $LM.="<div class=\"droite\">Word of the Lord. R/. Thanks be to God.</div>";
    return $LM;
	 	//print" - Référence : ".$refL." -> <a href=\"javascript:affichage_popup('?task=creation&lang=$lang&comment=".$refL."','affichage_popup');\">Création</a>";
	 }
	 
	
//print"<br>OPEN : ".$refL;
	$LM.="
	<div class=\"gauche\">".affiche_editeur($refL,"la")."</div>
	<div class=\"droite\">".affiche_editeur($refL,$lang)."</div>
	";
		
foreach(@$xml->children() as $ligne){
		$o=@$ligne->xpath('@id');
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
	//	print"<br>".$o[0];
		if($o[0]==0) {
		$LM.= "
		<div class=\"gauche liturgie_italique\">".$la[0]."</div>
		<div class=\"droite liturgie_italique\"><i>".$ver[0]."</i></div>";
		}
		else	{
		$LM.= "
		<div class=\"gauche\">".$la[0]."</div>
		<div class=\"droite\">".$ver[0]."</div>";
		}
	}

     $LM .="
	   <div class=\"gauche\">Verbum Domini. R/. Deo gratias.</div>";
	   if ($lang=="fr") $LM.="<div class=\"droite\">Parole du Seigneur. R/. Rendons grâces à Dieu.</div>";
	   if ($lang=="en") $LM.="<div class=\"droite\">Word of the Lord. R/. Thanks be to God.</div>";
    return $LM;
}


function lecture_vigiles($ref,$lang,$ordre) {
$option=$_GET['option'];
$prefixe="http://gregorien.radio-esperance.fr/";
$row = 0;
$ref=no_accent($ref);
$refL="sources/propres/OSB_Vigiles/".$ref.".xml";

     $refL="/wp-content/plugins/liturgia/sources/propres/OSB_Vigiles/".$ref.".xml";
	 //print"<br>refL = ".$refL;
     $xml = @simplexml_load_file("http://92.243.24.163/".$refL);// or die("<br>Error: Cannot create object : <a href=\"$refL\">$refL</a>");
	 //$ref="LEC_".no_accent($ref);
	 
     if(!$xml) {
	 	$lecture_vigiles ="<div class=\"gauche\" style=\"font-style:oblique;\"><a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">$ref</a></div><div class=\"droite\">&nbsp;</div>";   
    return $lecture_vigiles;
	 }
	 
	$lecture_vigiles.="
	<div class=\"gauche\">Lectio $ordre ".affiche_editeur($refL,"la")."</div>
	<div class=\"droite\">Lecture $ordre ".affiche_editeur($refL,$lang)."</div>
	";
		
foreach(@$xml->children() as $ligne){
		$o=@$ligne->xpath('@id');
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
		if($o[0]==0) {
		$lecture_vigiles.= "
		<div class=\"gauche\"><i>".$la[0]."</i></div>
		<div class=\"droite\"><i>".$ver[0]."</i></div>";
		}
		else	{
		$lecture_vigiles.= "
		<div class=\"gauche\">".$la[0]."</div>
		<div class=\"droite\">".$ver[0]."</div>";
		}
	}

	return $lecture_vigiles;
}

function lecture_OL($ref,$lang,$ordre) {
$option=$_GET['option'];
$prefixe="http://gregorien.radio-esperance.fr/";
$row = 0;
$ref=no_accent($ref);
$refL="sources/propres/office/".$ref.".xml";

     $refL="/wp-content/plugins/liturgia/sources/propres/office/".$ref.".xml";
	 //print"<br>refL = ".$refL;
     $xml = @simplexml_load_file("http://92.243.24.163/".$refL);// or die("<br>Error: Cannot create object : <a href=\"$refL\">$refL</a>");
	 //$ref="LEC_".no_accent($ref);
	 
     if(!$xml) {
	 	$lecture_OL ="<div class=\"gauche\" style=\"font-style:oblique;\"><a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">$ref</a></div><div class=\"droite\">&nbsp;</div>";   
    return $lecture_OL;
	 }
	 
	$lecture_OL.="
	<div class=\"gauche\">Lectio $ordre ".affiche_editeur($refL,"la")."</div>
	<div class=\"droite\">Lecture $ordre ".affiche_editeur($refL,$lang)."</div>
	";
		
foreach(@$xml->children() as $ligne){
		$o=@$ligne->xpath('@id');
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
	//	print"<br>".$o[0];
		if($o[0]==0) {
		$lecture_OL.= "
		<div class=\"gauche\"><i>".$la[0]."</i></div>
		<div class=\"droite\"><i>".$ver[0]."</i></div>";
		}
		else	{
		$lecture_OL.= "
		<div class=\"gauche\">".$la[0]."</div>
		<div class=\"droite\">".$ver[0]."</div>";
		}
	}

	return $lecture_OL;
}



function creation_accents($texte) {
	//print"OK";
	$voyelles_sans_accent = array("+","'a", "'i", "'o", "'u", "a'e", "'y", "'A", "'I", "'O", "'U", "A'E","'Y");
	$voyelles_avec_accent = array("†","á", "í", "ó", "ú", "ǽ", "ý", "Á", "Í", "Ó", "Ú", "Ǽ","Ý");
	$texte_final = str_replace($voyelles_sans_accent, $voyelles_avec_accent, $texte);
	return $texte_final;
}

function repons_vigiles($ref,$lang,$ordre) {
$option=$_GET['option'];
$prefixe="http://gregorien.radio-esperance.fr/";
$row = 0;
$ref=no_accent($ref);
$refL="sources/propres/OSB_Vigiles/".$ref.".xml";
$xml = @simplexml_load_file("http://92.243.24.163/".$refL);// or die("<br>Error: Cannot create object : <a href=\"$refL\">$refL</a>");
	 
	  $repons_vigiles="
		<div class=\"gauche\" align=\"center\" ><font color=red>Responsorium $ordre</font> ".affiche_editeur($refL,'lat')."</div>
		<div class=\"droite\" align=\"center\"><font color=red>Répons $ordre</font> ".affiche_editeur($refL,$lang)."</div>";
    if(!$xml) {
	 	$repons_vigiles ="<div class=\"gauche\" style=\"font-style:oblique;\"><a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">$ref</a></div><div class=\"droite\">&nbsp;</div>";   
    return $repons_vigiles;
	 }   
foreach(@$xml->children() as $ligne){
		$o=@$ligne->xpath('@id');
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
		$repons_vigiles.= "
		<div class=\"gauche\">".$la[0]."</div>
		<div class=\"droite\">".$ver[0]."</div>";
		}	 
	return $repons_vigiles;
}



function repons($ref,$lang,$ordre) {
$option=$_GET['option'];
$row = 0;
$ref=no_accent($ref);
$refL="sources/propres/office/".$ref.".xml";
$xml = @simplexml_load_file("http://92.243.24.163/".$refL);// or die("<br>Error: Cannot create object : <a href=\"$refL\">$refL</a>");
	 
	  $repons="
		<div class=\"gauche\" align=\"center\" ><font color=red>Responsorium $ordre</font> ".affiche_editeur($refL,'lat')."</div>
		<div class=\"droite\" align=\"center\"><font color=red>Répons $ordre</font> ".affiche_editeur($refL,$lang)."</div>";
    if(!$xml) {
	 	$repons_vigiles ="<div class=\"gauche\" style=\"font-style:oblique;\"><a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">$ref</a></div><div class=\"droite\">&nbsp;</div>";   
    return $repons;
	 }   
foreach(@$xml->children() as $ligne){
		$o=@$ligne->xpath('@id');
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
		$repons_vigiles.= "
		<div class=\"gauche\">".$la[0]."</div>
		<div class=\"droite\">".$ver[0]."</div>";
		}	 
	return $repons;
}


function evangile_vigiles($ref,$lang) {
$prefixe="http://gregorien.radio-esperance.fr/";
     $refL="/wp-content/plugins/liturgia/sources/propres/messe/lectures/EV_".$ref.".csv";
     $fp = fopen ($prefixe.$refL,"r","1");
     $row=0;
	while ($data = @fgetcsv ($fp, 1000, ";")) {
	if (($row==0)&&($data[0]!="")) {
		$latin=$data[0];		
			if($lang=="fr") $verna=$data[1];
			if($lang=="en") $verna=$data[2];
			if($lang=="ar") $verna=$data[3];
			$data[0]="";
	}
	else {
	    $latin=$data[0];
	    if ($lang=="fr") $verna=$data[1];
	    if ($lang=="en") $verna=$data[2];
	    if ($lang=="ar") $verna="<div align=\"right\">$data[3]</div>";
	  }
	    $LM .="
	   <div class=\"gauche\">$latin</div>
	   <div class=\"droite\">$verna</div>";
  	 $row++;
    }
     $LM .="
	   <div class=\"gauche\">R/. Amen.</div>";
	   if ($lang=="fr") $LM.="<div class=\"droite\">R/. Amen.</div>";
    return $LM;
}

function evangile($ref,$lang) {
	if(!$lang) $lang=$GLOBALS['lang'];
	if(!$lang) $lang="fr";
	print"<div class=\"gauche\" style=\"color:red;font-weight: 900;text-align:center;\">Evangelium</div>
	<div class=\"droite\" style=\"color:red;font-weight: 900;text-align:center;\">".get_traduction("Evangelium",$lang)."</div>
	";
     $refL="wp-content/plugins/liturgia/sources/propres/messe/lectures/".$ref.".xml";
	 //print"<br>refL = ".$refL;
     $xml = @simplexml_load_file("http://92.243.24.163/".$refL);// or die("<br>Error: Cannot create object : <a href=\"$refL\">$refL</a>");
	 //$ref="LEC_".no_accent($ref);
	 
if(!$xml) {
	 	$LM ="
	 	<div class=\"gauche\" style=\"font-style:oblique;\">";
	 	if($_GET['edition']=="on") $LM.="<a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=/".$refL."','affichage_popup');\">".$ref."</a>";
	 	$LM.="</div>
	 	<div class=\"droite\">&nbsp;</div>
	   <div class=\"gauche\">Verbum Domini. R/. Deo gratias.</div>";
	   if ($lang=="fr") $LM.="<div class=\"droite\">Parole du Seigneur. R/. Rendons grâces à Dieu.</div>";
	   if ($lang=="en") $LM.="<div class=\"droite\">Word of the Lord. R/. Thanks be to God.</div>";
    return $LM;
	 	//print" - Référence : ".$refL." -> <a href=\"javascript:affichage_popup('?task=creation&lang=$lang&comment=".$refL."','affichage_popup');\">Création</a>";
	 }
	 
	
//print"<br>OPEN : ".$refL;
	$LM.="
	<div class=\"gauche\">".affiche_editeur($refL,"la")."</div>
	<div class=\"droite\">".affiche_editeur($refL,$lang)."</div>
	";
		
foreach(@$xml->children() as $ligne){
		$o=@$ligne->xpath('@id');
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
	//	print"<br>".$o[0];
		if($o[0]==0) {
		$LM.= "
		<div class=\"gauche liturgie_italique\">".$la[0]."</div>
		<div class=\"droite liturgie_italique\"><i>".$ver[0]."</i></div>";
		}
		else	{
		$LM.= "
		<div class=\"gauche\">".$la[0]."</div>
		<div class=\"droite\">".$ver[0]."</div>";
		}
	}

     $LM .="
	   <div class=\"gauche\">Verbum Domini. R/. Laus tibi, Christe.</div>";
	   if ($lang=="fr") $LM.="<div class=\"droite\">Parole du Seigneur. R/. Louange à Toi, ô Christ.</div>";
	   if ($lang=="en") $LM.="<div class=\"droite\">Word of the Lord. R/. Praise be to thee, Christ.</div>";
    return $LM;
}

function paroles($ref) {
  $s=explode("_",$ref);
  $type=$s[0];
  if($type=="IN") $output = antienne_messe($ref,$lang);
  if($type=="OF") $output = antienne_messe($ref,$lang);
  if($type=="CO") $output = antienne_messe($ref,$lang);
  if($type=="GR") $output = antienne_messe($ref,$lang);
  if($type=="AL") $output = antienne_messe($ref,$lang);
  if($type=="TR") $output = antienne_messe($ref,$lang);
  if($type=="SEQ") $output = antienne_messe($ref,$lang);
  if($type=="HY") $output = hymne($ref);
  if ($output) return $output;
  else return "Ce texte n'est pas disponible pour le moment. Pour nous à aider à rendre disponible ce texte, vous pouvez vous inscire sur le site web. D'avance merci.";
}


function psaume($ref,$lang) {
$row = 0;
//$prefixe="http://gregorien.radio-esperance.fr/";
$refL="/wp-content/plugins/liturgia/sources/".$ref.".xml";

$xml = @simplexml_load_file("http://92.243.24.163/".$refL); //or die("Error: Cannot create object : $refL");
if(!$xml) {
	//<a href="javascript:affichage_popup('?option=edit&affiche=1&task=edit&lang=la&ref=sources/ps3.xml','affichage_popup');"><b>éditer</b></a>
	if($_GET['edition']=="on")$psaume="
	<div class=\"gauche\"><a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">".$ref."</a></div>
	<div class=\"droite\"></div>
	";
	return $psaume;
}
//print"<br>OPEN : "."sources/".$ref.".csv";

$psaume="
	<div class=\"gauche\">".affiche_editeur($refL,"la")."</div>
	<div class=\"droite\">".affiche_editeur($refL,$lang)."</div>
	";
	$psaume.="
		<div class=\"gauche\">".mp3Player($mp3)."</div>
		<div class=\"droite\">&nbsp;</div>";
	
	
	foreach($xml->children() as $ligne){
	$o=$ligne->xpath('@id');
	$la=$ligne->xpath('la');
	$ver=$ligne->xpath($lang);
//	print"<br>".$o[0];
	if($o[0]==0) {
	$psaume.= "<div class=\"gauche\"><b><center><font color=red>".$la[0]."</font></b></center></div><div class=\"droite\"><b><center><font color=red>".$ver[0]."</font></b></center></div>";
	}
	elseif 	($o[0]==1) {
	$psaume.= "<div class=\"gauche\"><center><font color=red>".$la[0]."</font></center></div><div class=\"droite\"><center><font color=red>".$ver[0]."</font></center></div>";
	}
	
	elseif 	($o[0]==2) {
	$psaume.= "<div class=\"gauche\"><center><i>".$la[0]."</i></center></div><div class=\"droite\"><center><i>".$ver[0]."</i></center></div>";
	}
	
	elseif 	($o[0]==3) {
	$psaume.= "<div class=\"gauche\"><center><font color=red><b>".$la[0]."</b></font></div><div class=\"droite\"><center><font color=red><b>".$ver[0]."</b></font></div>";
	}
	elseif ($la!=" ") {
	$psaume.= "<div class=\"gauche\">".$la[0]."</div><div class=\"droite\">".$ver[0]."</div>";
	}
}

	
	  
		


/*
$fp = fopen ($refL,"r","1");
$psaume="
	<div class=\"gauche\">".affiche_editeur($refL,"lat")."</div>
	<div class=\"droite\">".affiche_editeur($refL,$lang)."</div>
	";

	while ($data = @fgetcsv ($fp, 1000, ";")) {
	    if ($row==0) {
			$latin="<b><center><font color=red>$data[0]</font></b></center>";
			 if($lang=="fr") $verna="<b><center><font color=red>$data[1]</b></font></center>";
			if($lang=="en") $verna="<b><center><font color=red>$data[2]</b></font></center>";
			if($lang=="ar") $verna="<b><center><font color=red>$data[3]</b></font></center>";
			$data[0]="";
	    }
	    elseif (($row==1)&&($data[0]!="")) {
	        $latin="<center><font color=red>$data[0]</font></center>";
	        if($lang=="fr") $verna="<center><font color=red>$data[1]</font></center>";
		if($lang=="en") $verna="<center><font color=red>$data[2]</font></center>";
		if($lang=="ar") $verna="<center><font color=red>$data[3]</font></center>";
	        $data[0]!="";
	    }
	    elseif (($row==2)&&($data[0]!="")) {
	        $latin="<center><i>$data[0]</i></center>";
	        if($lang=="fr") $verna="<center><i>$data[1]</i></center>";
		if($lang=="en") $verna="<center><i>$data[2]</i></center>";
		if($lang=="ar") $verna="<center><i>$data[3]</i></center>";
	        $data[0]="";
	    }
	    elseif (($row==3)&&($data[0]!="")) {
	        $latin="<center><font color=red><b>$data[0]</b></font></center>";
	        if ($lang=="fr") $verna="<center><font color=red><b>$data[1]</b></font></center>";
		if ($lang=="en") $verna="<center><font color=red><b>$data[2]</b></font></center>";
		if ($lang=="ar") $verna="<center><font color=red><b>$data[3]</b></font></center>";
	        $data[0]="";
	    }
	    else {
	    $latin=$data[0];
	    if ($lang=="fr") $verna=$data[1];
	    if ($lang=="en") $verna=$data[2];
	    if ($lang=="ar") $verna="<div align=\"right\">$data[3]</div>";
	    }
   
  //if($latin!="")	
  $psaume .="
	<div class=\"gauche\">$latin</div>
	<div class=\"droite\">$verna</div>";
  	$row++;
	}
	if($ref!="AT41") $psaume.=doxologie($lang);

	@fclose ($fp);
	//print $psaume;
	*/
	if($ref!="AT41") $psaume.=doxologie($lang);
	$psaume=rougis_verset($psaume);
	$psaume=utf($psaume);
	return $psaume;
}
function doxologie($lang) {
	$xml = @simplexml_load_file("http://92.243.24.163/wp-content/plugins/liturgia/sources/ps_doxologie.xml");// or die("Error: Cannot create object : $refL");
	foreach(@$xml->children() as $ligne){
		$la=$ligne->xpath('la');
		$ver=$ligne->xpath($lang);
		$doxologie.= "<div class=\"gauche\">".$la[0]."</div><div class=\"droite\">".$ver[0]."</div>";
	
	}
	return $doxologie;
}
/*
function initium($mp3,$lang) {
	$initium.="
	<div class=\"gauche\">".mp3Player($mp3)."&nbsp;</div>
	<div class=\"droite\">&nbsp;</div>";
	$fp = fopen ("sources/initium.csv","r","1");
	while ($data = @fgetcsv ($fp, 1000, ";")) {
		$latin=$data[0];
		if ($lang=="fr") $verna=$data[1];
		if ($lang=="en") $verna=$data[2];
		if ($lang=="ar") $verna="<div align=\"right\">$data[3]</div>";
		
		if($latin!="") $initium.="
		<div class=\"gauche\">$latin</div>
		<div class=\"droite\">$verna</div>";
  	}
	@fclose ($fp);
	
	return $initium;
}
*/
function utf($string) {
$string1=str_replace("é", "&eacute;",$string);
$string2= str_replace("è", "&egrave;",$string1);
$string3= str_replace("ê", "&ecirc;",$string2);
$string4= str_replace("ú", "&uacute;",$string3);
$string5= str_replace("ù", "&ugrave;",$string4);
$string6= str_replace("û", "&ucirc;",$string5);
$string7= str_replace("í", "&iacute;",$string6);
$string8= str_replace("î", "&icirc;",$string7);
$string9= str_replace("ï", "&iuml;",$string8);
$string10= str_replace("á", "&aacute;",$string9);
$string11= str_replace("à", "&agrave;",$string10);
$string12= str_replace("â", "&acirc;",$string11);
$string13= str_replace("æ", "&aelig;",$string12);
$string14= str_replace("ó", "&oacute;",$string13);
$string15= str_replace("ô", "&ocirc;",$string14);
$string16= str_replace("", "&oelig;",$string15);
$string17= str_replace(" ", "&nbsp;",$string16);
$string18= str_replace("", "&#146;",$string17);
$string19= str_replace("«", "&#171;",$string18);
$string20= str_replace("»", "&#187;",$string19);
$string21= str_replace("ç", "&ccedil;",$string20);
$string22= str_replace("ë", "&euml;",$string21);
$string23= str_replace("-", "-",$string22);
$string24= str_replace("ý", "&yacute;",$string23);
$string25= str_replace("°", "e",$string24);
//$string26= str_replace("Æ", "&Aelig;",$string25);
$string26= str_replace("", "&#8224;",$string25);
$string27= str_replace("É", "&Eacute;",$string26);
$string28= str_replace("", "&#151;",$string27);
$string29= str_replace("œ", "&#x153;",$string28);
return $string29;

}

function toUTF8($string){
$from = mb_detect_encoding($string);
if ($from != 'UTF-8') {
$string = mb_convert_encoding($string, 'UTF-8', $from);
}
}

function pater($lang) {
	$row=0;	
	$xml=simplexml_load_file("http://92.243.24.163/wp-content/plugins/liturgia/sources/PATER.xml"); 
	$la=$xml->xpath('//ligne//la');
	$expr="//ligne//".$lang;
	$ver=$xml->xpath($expr);
	$pater="
		<div class=\"gauche\">".mp3Player($mp3)."</div>
		<div class=\"droite\">&nbsp;</div>";
	$v=0;
	while($la[$v]) {
		$pater.="<div class=\"gauche\">".$la[$v]."</div>";
		$pater.="<div class=\"droite\">".$ver[$v]."</div>";
		$v++;
	}
	return $pater;	
}
function renvoi ($mp3,$lang) {
	$fp = fopen ("sources/renvoi.csv","r","1");
	$r=0;
	while ($data = @fgetcsv ($fp, 1000, ";")) {
		$latin=$data[0];
		if ($lang=="fr") $verna="$data[1]";
		if ($lang=="en") $verna=$data[2];
		if ($lang=="ar") $verna="<div align=\"right\">$data[3]</div>";
		if($r==9) $renvoi.="
	<div class=\"gauche\">".mp3Player($mp3)."</div>";
	$renvoi.="<div class=\"droite\">&nbsp;</div>";
		if($latin!="") $renvoi.="
		<div class=\"gauche\">$latin</div>
		<div class=\"droite\">$verna</div>";
  	$r++;
	}
	@fclose ($fp);
	
	return $renvoi;
}

function ajoutexml($liturgia,$xml) {
//print"<br><b>AJOUTEXML :</b>";
//print"<table>";
if($result=@$xml->xpath('/liturgia/ant_invit/@id')) $liturgia['ant_invit']['id']=$result[0];
//print "<tr><td>ant_invit : </td><td>".$liturgia['ant_invit']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/HYMNUS_lectures/@id')) $liturgia['HYMNUS_lectures']['id']=$result[0];
//print "<tr><td>HYMNUS_lectures : </td><td>".$liturgia['HYMNUS_lectures']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/HYMNUS_lec_jour/@id')) $liturgia['HYMNUS_lec_jour']['id']=$result[0];
//print "<tr><td>HYMNUS_lec_jour : </td><td>".$liturgia['HYMNUS_lec_jour']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant01/@id')) $liturgia['ant01']['id']=$result[0];
//print "<tr><td>ant01 : </td><td>".$liturgia['ant01']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ps01/@id')) $liturgia['ps01']['id']=$result[0];
//print "<tr><td>ps01 : </td><td>".$liturgia['ps01']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant02/@id')) $liturgia['ant02']['id']=$result[0];
//print "<tr><td>ant02 : </td><td>".$liturgia['ant02']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ps02/@id')) $liturgia['ps02']['id']=$result[0];
//print "<tr><td>ant02 : </td><td>".$liturgia['ps02']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant03/@id')) $liturgia['ant03']['id']=$result[0];
//print "<tr><td>ant03 : </td><td>".$liturgia['ant03']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/VERS/@id')) $liturgia['VERS']['id']=$result[0];
//print "<tr><td>VERS : </td><td>".$liturgia['VERS']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/HYMNUS_laudes/@id')) $liturgia['HYMNUS_laudes']['id']=$result[0];
//print "<tr><td>HYMNUS_laudes : </td><td>".$liturgia['HYMNUS_laudes']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant1/@id')) $liturgia['ant1']['id']=$result[0];
//print "<tr><td>ant1 : </td><td>".$liturgia['ant1']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ps1/@id')) $liturgia['ps1']['id']=$result[0];
//print "<tr><td>ps1 : </td><td>".$liturgia['ps1']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant2/@id')) $liturgia['ant2']['id']=$result[0];
//print "<tr><td>ant2 : </td><td>".$liturgia['ant2']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant1/@id')) $liturgia['ant1']['id']=$result[0];
//print "<tr><td>ant1 : </td><td>".$liturgia['ant1']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ps2/@id')) $liturgia['ps2']['id']=$result[0];
//print "<tr><td>ps2 : </td><td>".$liturgia['ps2']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant3/@id')) $liturgia['ant3']['id']=$result[0];
//print "<tr><td>ant3 : </td><td>".$liturgia['ant3']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ps3/@id')) $liturgia['ps3']['id']=$result[0];
//print "<tr><td>ps3 : </td><td>".$liturgia['ps3']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant3/@id')) $liturgia['ant3']['id']=$result[0];
//print "<tr><td>ant3 : </td><td>".$liturgia['ant3']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/LB_matin/@id')) $liturgia['LB_matin']['id']=$result[0];
//print "<tr><td>LB_matin : </td><td>".$liturgia['LB_matin']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/RB_matin/@id')) $liturgia['RB_matin']['id']=$result[0];
//print "<tr><td>ant3 : </td><td>".$liturgia['ant3']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/benedictus/@id')) $liturgia['benedictus']['id']=$result[0];
//print "<tr><td>benedictus : </td><td>".$liturgia['benedictus']['id']."</td></tr>";
if($result=@$xml->xpath('/liturgia/benedictus_A/@id')) $liturgia['benedictus_A']['id']=$result[0];
if($result=@$xml->xpath('/liturgia/benedictus_B/@id')) $liturgia['benedictus_B']['id']=$result[0];
if($result=@$xml->xpath('/liturgia/benedictus_C/@id')) $liturgia['benedictus_C']['id']=$result[0];

if($result=@$xml->xpath('/liturgia/preces_matin/@id')) $liturgia['preces_matin']['id']=$result[0];
//print "<tr><td>preces_matin : </td><td>".$liturgia['preces_matin']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/oratio_laudes/@id')) $liturgia['oratio_laudes']['id']=$result[0];
//print "<tr><td>oratio_laudes : </td><td>".$liturgia['oratio_laudes']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/HYMNUS_tertiam/@id')) $liturgia['HYMNUS_tertiam']['id']=$result[0];
//print "<tr><td>HYMNUS_tertiam : </td><td>".$liturgia['HYMNUS_tertiam']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/HYMNUS_sextam/@id')) $liturgia['HYMNUS_sextam']['id']=$result[0];
//print "<tr><td>HYMNUS_sextam : </td><td>".$liturgia['HYMNUS_sextam']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/HYMNUS_nonam/@id')) $liturgia['HYMNUS_nonam']['id']=$result[0];
//print "<tr><td>HYMNUS_nonam : </td><td>".$liturgia['HYMNUS_nonam']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant4/@id')) $liturgia['ant4']['id']=$result[0];
//print "<tr><td>ant4 : </td><td>".$liturgia['ant4']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ps4/@id')) $liturgia['ps4']['id']=$result[0];
//print "<tr><td>ps4 : </td><td>".$liturgia['ps4']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant5/@id')) $liturgia['ant5']['id']=$result[0];
//print "<tr><td>ant5 : </td><td>".$liturgia['ant5']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ps5/@id')) $liturgia['ps5']['id']=$result[0];
//print "<tr><td>ps5 : </td><td>".$liturgia['ps5']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant6/@id')) $liturgia['ant6']['id']=$result[0];
//print "<tr><tdant6 : </td><td>".$liturgia['ant6']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ps6/@id')) $liturgia['ps6']['id']=$result[0];
//print "<tr><td>ps5 : </td><td>".$liturgia['ps5']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/LB_3/@id')) $liturgia['LB_3']['id']=$result[0];
//print "<tr><td>LB_3 : </td><td>".$liturgia['LB_3']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/RB_3/@id')) $liturgia['RB_3']['id']=$result[0];
//print "<tr><td>RB_3 : </td><td>".$liturgia['RB_3']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/oratio_3/@id')) $liturgia['oratio_3']['id']=$result[0];
//print "<tr><td>oratio_3 : </td><td>".$liturgia['oratio_3']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/LB_6/@id')) $liturgia['LB_6']['id']=$result[0];
//print "<tr><td>LB_6 : </td><td>".$liturgia['LB_6']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/RB_6/@id')) $liturgia['RB_6']['id']=$result[0];
//print "<tr><td>RB_6 : </td><td>".$liturgia['RB_6']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/oratio_6/@id')) $liturgia['oratio_6']['id']=$result[0];
//print "<tr><td>oratio_6 : </td><td>".$liturgia['oratio_6']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/LB_9/@id')) $liturgia['LB_9']['id']=$result[0];
//print "<tr><td>LB_9 : </td><td>".$liturgia['LB_9']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/RB_9/@id')) $liturgia['RB_9']['id']=$result[0];
//print "<tr><td>RB_9 : </td><td>".$liturgia['RB_9']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/oratio_9/@id')) $liturgia['oratio_9']['id']=$result[0];
//print "<tr><td>oratio_9 : </td><td>".$liturgia['oratio_9']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/HYMNUS_vesperas/@id')) $liturgia['HYMNUS_vesperas']['id']=$result[0];
//print "<tr><td>HYMNUS_vesperas : </td><td>".$liturgia['HYMNUS_vesperas']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant7/@id')) $liturgia['ant7']['id']=$result[0];
//print "<tr><td>ant7 : </td><td>".$liturgia['ant7']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ps7/@id')) $liturgia['ps7']['id']=$result[0];
//print "<tr><td>ps7 : </td><td>".$liturgia['ps7']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant8/@id')) $liturgia['ant8']['id']=$result[0];
//print "<tr><td>ant8 : </td><td>".$liturgia['ant8']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ps8/@id')) $liturgia['ps8']['id']=$result[0];
//print "<tr><td>ps8 : </td><td>".$liturgia['ps8']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant9/@id')) $liturgia['ant9']['id']=$result[0];
//print "<tr><td>ant9 : </td><td>".$liturgia['ant9']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ps9/@id')) $liturgia['ps9']['id']=$result[0];
//print "<tr><td>ps9 : </td><td>".$liturgia['ps9']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/LB_soir/@id')) $liturgia['LB_soir']['id']=$result[0];
//print "<tr><td>LB_soir: </td><td>".$liturgia['LB_soir']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/RB_soir/@id')) $liturgia['RB_soir']['id']=$result[0];
//print "<tr><td>RB_soir: </td><td>".$liturgia['RB_soir']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/magnificat/@id')) $liturgia['magnificat']['id']=$result[0];
//print "<tr><td>magnificat: </td><td>".$liturgia['magnificat']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/oratio_vesperas/@id')) $liturgia['oratio_vesperas']['id']=$result[0];
//print "<tr><td>oratio_vesperas: </td><td>".$liturgia['oratio_vesperas']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/preces_soir/@id')) $liturgia['preces_soir']['id']=$result[0];
//print "<tr><td>preces_soir: </td><td>".$liturgia['preces_soir']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/HYMNUS_completorium/@id')) $liturgia['HYMNUS_completorium']['id']=$result[0];
//print "<tr><td>HYMNUS_completorium: </td><td>".$liturgia['HYMNUS_completorium']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant10/@id')) $liturgia['ant10']['id']=$result[0];
//print "<tr><td>ant10: </td><td>".$liturgia['ant10']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ps10/@id')) $liturgia['ps10']['id']=$result[0];
//print "<tr><td>ps10: </td><td>".$liturgia['ps10']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ant11/@id')) $liturgia['ant11']['id']=$result[0];
//print "<tr><td>ant11: </td><td>".$liturgia['ant11']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/ps11/@id')) $liturgia['ps11']['id']=$result[0];

if($result=@$xml->xpath('/liturgia/LB_completorium/@id')) $liturgia['LB_completorium']['id']=$result[0];
//print "<tr><td>LB_complies: </td><td>".$liturgia['LB_complies']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/RB_completorium/@id')) $liturgia['RB_completorium']['id']=$result[0];
//print "<tr><td>RB_complies: </td><td>".$liturgia['RB_complies']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/oratio_completorium/@id')) $liturgia['oratio_completorium']['id']=$result[0];
//print "<tr><td>oratio_completorium: </td><td>".$liturgia['oratio_completorium']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/RB_osb_vigiles/@id')) $liturgia['RB_osb_vigiles']['id']=$result[0];
//print "<tr><td>RB_osb_vigiles: </td><td>".$liturgia['RB_osb_vigiles']['id']."</td></tr>";

if($result=@$xml->xpath('/liturgia/commun/@id')) $liturgia['commun']['id']=$result[0];

//print"</table>";
return $liturgia;
}



function no_accent($str_accent) {
   $pattern = Array("/ /","/Æ/","/é/", "/è/", "/ê/", "/ç/", "/æ/","/à/", "/á/", "/í/", "/ï/", "/ù/", "/ó/","/ú/","/,/","/__/","/:/");
   // notez bien les / avant et après les caractères
   $rep_pat = Array("_","A","e", "e", "e", "c", "ae","a", "a", "i", "i", "u", "o", "u","_","_",null,null);
   $str_noacc = preg_replace($pattern, $rep_pat, $str_accent);
   $str_noacc=trim($str_noacc,"_");
   $str_noacc = preg_replace($pattern, $rep_pat, $str_noacc);
   $str_noacc = str_replace("*", null, $str_noacc);
   $str_noacc = str_replace("?", null, $str_noacc);
   $str_noacc=trim($str_noacc);
   $str_noacc=str_replace("__", "_", $str_noacc);
   return $str_noacc;
}
function outputCSV($list,$file) {
	//$fichiercsv="sites/all/modules/liturgia/".$file;
	$fp = fopen($file, 'c+') ; 
	//if (!$fp) 
	foreach ($list as $fields) {
	fputcsv($fp, $fields, ';');
	}
	fclose($fp);
	return $outputCSV;
}

function ref_player($office,$piece,$date,$tableau) {
	$dj="matin"; if ($office=="vepres") $dj="soir";
	$anno=substr($date,0,4);
	$mense=substr($date,4,2);
	$die=substr($date,6,2);
	
	$tempus=$tableau[$dj]['temps'];
	switch ($tempus) {
		case "Tempus Adventus":
		$ref_player="HG/TO_Noel/4-Avent";
		if (($mense=="12")&&($die<17)) {
			$ref_player.="/1- Adv jusque 16dec";	
		}
		if (($mense=="12")&&($die>16)) {
			$ref_player.="/2- Adv a partir 17dec";
		}
		break;
		
		case "Tempus Nativitatis":
		$ref_player="HG/TO_Noel";	
		break;

		case "Tempus per annum":
		$ref_player="HG/TO_Noel";	
		break;

		case "Tempus Quadragesimae":
		$ref_player="HG/Careme_Temps-pascal/1-Careme";	
		break;

		case "Tempus Paschale":
		$ref_player="HG/Careme_Temps-pascal/2-Temps pascal";	
		break;	
	}	
	
	
	
	return $ref_player;
}
function mp3Playerjs($ref) {
	$playerjs=<<<END

END;
return $playerjs;
}
function mp3Player ($ref) {
	if($ref=="") return null;
$player= <<< END
<embed src="$ref" width="50" height="40" autostart="false" loop="false"></embed>
</object>
END;

return $player;	
}



function affiche_nav($date,$office) {
    /*
    //INITIALISATION
  $jour=datets("");
  $date=$jour['AAAAMMJJ'];
  $lang=$_GET['lang'];
  $option=$_GET['option'];
  $task=$_GET['task'];
	$q=$_GET['q'];
		
	
  if(!$task) $task="affiche";
  if(!$lang) $lang=fr;
    
    
    $offices=array("p","Martyrologe","invitatoire","Lectures","laudes","tierce","sexte","none","vepres","complies","s");

    for($o=0;$offices[$o];$o++) {	 
      if ($office==$offices[$o]) {
	$officeactuel=$o;
	break;
      }
    }
  
$suivant = $offices[$officeactuel+1]; $precedent = $offices[$officeactuel-1];

$anno=substr($date,0,4);
$mense=substr($date,4,2);
$die=substr($date,6,2);
$day=mktime(12,0,0,$mense,$die,$anno);
//print"<br> day = ".$day;
if($day==-1) $day=time();
//$dts=mktime(12,0,0,$mense,$die,$anno);
$dtsmoinsun=$day-60*60*24;
$dtsplusun=$day+60*60*24;
$hier=date("Ymd",$dtsmoinsun);
$demain=date("Ymd",$dtsplusun);

$dsuiv=$day+60*60*24;
$dprec=$day-60*60*24;

$date_suiv=$do;
$date_prec= $do;
if ($suivant=="s") {
	$suivant = "invitatoire";
	$date_suiv=date("Ymd",$dsuiv);
}

if ($precedent=="p") {
	$precedent = "complies";
	$date_prec= date("Ymd",$dprec);
}
$nav.="<center> <a href=?affiche=1&lang=fr&option=$option&date=$date&office=$office&task=$task&edition=".$_GET['edition'].">Français</a> - <a href=?affiche=1&lang=en&option=$option&date=$date&office=$office&task=$task>English</a> - <a href=?affiche=1&lang=ar&option=$option&date=$date&office=$office&task=$task>عربي</a></center>";

$auth=false;
if($GLOBALS['user']->roles[2]=="authenticated user") $auth=true;

//if ($auth) 
global $current_user;
get_currentuserinfo();
if($current_user->user_login) {
$nav.="<p><center> 
<a href=?affiche=1&lang=$lang&option=edit&date=$date&office=$office&mois_courant=$mense>Editer</a>"; /* | 
<a href=?affiche=1&lang=$lang&option=correction_ordo&date=$date&office=$office&mois_courant=$mense>Correction de l'ordo</a>

}
print"</center>";

$nav.="<center><a href=\"?affiche=1&date=$hier&office=$office&mois_courant=$mense&an=$anno&lang=$lang&edition=".$_GET['edition']."\"><<</a>|";
$nav.="<a href=\"?affiche=1&date=$date_prec&office=$precedent&mois_courant=$mense_prec&an=$anno_prec&lang=$lang&option=$option&task=$task&edition=".$_GET['edition']."\"><</a>|";
$nav.="<a href=\"?affiche=1&date=$date&office=Martyrologe&mois_courant=$mense&an=$anno&lang=$lang&option=$option&task=$task&edition=".$_GET['edition']."\">Martyrologe</a>|";
//$nav.="<a href=\"?affiche=1&date=$date&office=invitatoire&mois_courant=$mense&an=$anno&lang=$lang&option=$option&task=$task\">Invitatoire</a>|";
//$nav.="<a href=\"?affiche=1&date=$date&office=osb_vigiles&mois_courant=$mense&an=$anno&lang=$lang&option=$option&task=$task\">Vigiles (OSB) </a>|";
//$nav.="<a href=\"?affiche=1&date=$date&office=lectures&mois_courant=$mense&an=$anno&lang=$lang&option=$option&task=$task\">Lectures</a>|";
$nav.="<a href=\"?affiche=1&date=$date&office=laudes&mois_courant=$mense&an=$anno&lang=$lang&option=$option&task=$task&edition=".$_GET['edition']."\">Laudes</a>|";
//$nav.="<a href=\"?affiche=1&date=$date&office=tierce&mois_courant=$mense&an=$anno&lang=$lang&option=$option&task=$task&edition=".$_GET['edition']."\">Tierce</a>|";
$nav.="<a href=\"?affiche=1&date=$date&office=messe&mois_courant=$mense&an=$anno&lang=$lang&option=$option&task=$task&edition=".$_GET['edition']."\">Messe</a>|";
//$nav.="<a href=\"?affiche=1&date=$date&office=sexte&mois_courant=$mense&an=$anno&lang=$lang&option=$option&task=$task\">Sexte</a>|";
//$nav.="<a href=\"?affiche=1&date=$date&office=none&mois_courant=$mense&an=$anno&lang=$lang&option=$option&task=$task\">None</a>|";
//$nav.="<a href=\"?affiche=1&date=$date&office=vepres&mois_courant=$mense&an=$anno&lang=$lang&option=$option&task=$task\">Vêpres</a>|";
//$nav.="<a href=\"?affiche=1&date=$date&office=complies&mois_courant=$mense&an=$anno&lang=$lang&option=$option&task=$task\">Complies</a>|";
$nav.="<a href=\"?affiche=1&date=$date_suiv&office=$suivant&mois_courant=$mense_suiv&an=$anno_suiv&lang=$lang&option=$option&task=$task&edition=".$_GET['edition']."\">></a>|";
$nav.="<a href=\"?affiche=1&date=$demain&office=$office&mois_courant=$mense&an=$anno&lang=$lang&option=$option&task=$task&edition=".$_GET['edition']."\"> >></a></center>";
return $nav;
*/
}

function oraison($latin,$verna,$lang,$ref,$id) {
    
	$oraison.="
	<div class=\"gauche\"><font color=red><center>Oratio.".affiche_editeur($ref,"lat")."</center></font></div>";
	     
	if($lang=="fr") {$oraison.="<div class=\"droite\"><font color=red><center>Oraison.".affiche_editeur($ref,$lang)."</center></font>".affiche_editeur($ref,$lang)."</div>";
	} 
	  
	if ((substr($latin,-14))==" Per Dóminum.") {
		$latin=str_replace(" Per Dóminum.", " Per Dóminum nostrum Iesum Christum, Fílium tuum, qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.",$latin);
		if ($lang=="fr") $verna.=" Par notre Seigneur Jésus-Christ, Ton Fils, qui vit et règne avec Toi dans l'unité du Saint-Esprit, Dieu, pour tous les siècles des siècles.";
	}
     
	if ((substr($latin,-11))==" Qui tecum.") {
	        $latin=str_replace(" Qui tecum.", " Qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.",$latin);
	    	if ($lang=="fr") $verna.=" Lui qui vit et règne avec Toi dans l'unité du Saint-Esprit, Dieu, pour tous les siècles des siècles.";
	}

	if ((substr($latin,-11))==" Qui vivis.") {
	        $latin=str_replace(" Qui vivis.", " Qui vivis et regnas cum Deo Patre in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.",$latin);
	    	if ($lang=="fr") $verna.=" Toi qui vis et règnes avec Dieu le Père dans l'unité du Saint-Esprit, Dieu, pour tous les siècles des siècles.";
	}
	    
	$oraison.="<div class=\"gauche\">".$latin."</div>";
	$oraison.="<div class=\"droite\">$verna </div>";

  return $oraison;
}

function oratio($ref,$lang) {

$option=$_GET['option'];
$ref=no_accent($ref);
$refL="wp-content/plugins/liturgia/sources/propres/xml/".$ref.".xml";
$xml = @simplexml_load_file("http://92.243.24.163/".$refL); // or die("Erreur : ".$refL);
if((!$xml)&&($_GET['edition']=="on")) {
	if($_GET['edition']=="on")$oratio="
	<div class=\"gauche\"><a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">".$ref."</a></div>
	<div class=\"droite\"></div>
	";
	return $oratio;
}

$la=@$xml->xpath('//ligne//la');
$ver=@$xml->xpath('//ligne//'.$lang); 
$oratio="
	<div class=\"gauche\">".affiche_editeur($refL,"la")."</div>
	<div class=\"droite\">".affiche_editeur($refL,$lang)."</div>
	";	
	$oratio.="
		<div class=\"gauche\">".mp3Player($mp3)."</div>
		<div class=\"droite\">&nbsp;</div>";
	
	if ((substr($la[0],-14))==" Per Dóminum.") {
		$la[0]=str_replace(" Per Dóminum.", " Per Christum Dóminum nostrum.",$la[0]);
		$ver[0].=get_traduction(" Per Christum Dóminum nostrum.", $lang);
	}
	if ((substr($la[0],-14))==" Per Christum.") {
		$la[0]=str_replace(" Per Christum.", " Per Christum Dóminum nostrum.",$la[0]);
		$ver[0].=get_traduction(" Per Christum Dóminum nostrum.", $lang);
	}
    
	if ((substr($la[0],-11))==" Qui vivit.") {
	    $la[0]=str_replace(" Qui tecum.", " Qui vivit et regnat in sæcula sæculórum.",$la[0]);
	    $ver[0].=get_traduction(" Qui vivit et regnat in sæcula sæculórum.", $lang);
	}
	 
	if ((substr($la[0],-11))==" Qui tecum.") {
	    $la[0]=str_replace(" Qui tecum.", " Qui vivit et regnat in sæcula sæculórum.",$la[0]);
	    $ver[0].=get_traduction(" Qui vivit et regnat in sæcula sæculórum.", $lang);
	}

	if ((substr($la[0],-11))==" Qui vivis.") {
	    $la[0]=str_replace(" Qui vivis.", " Qui vivis et regnas in sæcula sæculórum.",$la[0]);
	    $ver[0].=get_traduction(" Qui vivis et regnas in sæcula sæculórum.", $lang);
	}

	$oratio.="<div class=\"gauche\">".$la['0']."</div>";
	$oratio.="<div class=\"droite\">".$ver['0']."</div>";
	
	return $oratio;

}

function collecte($ref,$lang) {
	if(!$lang) $lang=$GLOBALS['lang'];
	if(!$lang) $lang="fr";
	$refL="wp-content/plugins/liturgia/sources/propres/xml/".$ref.".xml";    
	$oraison.="
	<div class=\"gauche\"><font color=red><center>Oratio ".affiche_editeur($refL,"la")."</center></font></div>";
	 
	if($lang=="fr") {
		$oraison.="<div class=\"droite\"><font color=red><center>Oraison ".affiche_editeur($refL,$lang)."</center></font></div>";
	} 
	  
	
	//print $refL;
	$xml = @simplexml_load_file("http://92.243.24.163/".$refL);// or die("Erreur : ".$refL);
	//print"<br>OPEN : "."sources/".$ref.".csv";
	if((!$xml)&&($_GET['edition']=="on")) {
	if($_GET['edition']=="on")$oraison="
	<div class=\"gauche\"><a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">".$ref."</a></div>
	<div class=\"droite\"></div>
	";
	return $oratio;
	}
	
	$la=@$xml->xpath('//ligne//la');
	$ver=@$xml->xpath('//ligne//'.$lang); 
	
	  
	if ((substr($la[0],-14))==" Per Dóminum.") {
		$la[0]=str_replace(" Per Dóminum.", " Per Dóminum nostrum Iesum Christum, Fílium tuum, qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.",$la[0]);
		$ver[0].=get_traduction(" Per Dóminum nostrum Iesum Christum, Fílium tuum, qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.", $lang);
	}
     
	if ((substr($la[0],-11))==" Qui tecum.") {
	    $la[0]=str_replace(" Qui tecum.", " Qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.",$la[0]);
	    $ver[0].=get_traduction(" Qui tecum vivit et regnat in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.", $lang);
	}

	if ((substr($la[0],-11))==" Qui vivis.") {
	    $la[0]=str_replace(" Qui vivis.", " Qui vivis et regnas cum Deo Patre in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.",$la[0]);
	    $ver[0].=get_traduction(" Qui vivis et regnas cum Deo Patre in unitáte Spíritus Sancti, Deus, per ómnia sæcula sæculórum.", $lang);
	}
	    
	$oraison.="<div class=\"gauche\">".$la['0']."</div>";
	$oraison.="<div class=\"droite\">".$ver['0']."</div>";  

  return $oraison;
}

function affiche_infotitre($ref) {
    //if(!$ref) return;
    //print"<br>INFOTITRE";
   
     $result=titre_dans_base_zenon($ref);
      
      
     $i=0;
     $inf="<table><tr>
     <th>Choeur</th>
     <th>Titre</th>
     <th>Direction</th>
     <th>Contexte liturgique</th>
     <th>Album</th>
      <th>Label</th>
      <th>Réf. du label</th>      
     </tr>
     ";
     while($result[titre][$i]) {
     $pic=$result[titre][$i]->PICTURE;
     $pic = str_replace("\\","/",$pic); 
     
     $inf.="<tr><td>{$result[titre][$i]->NAME}</td>
     <td>{$result[titre][$i]->TITLE}</td>
     <td>{$result[titre][$i]->ROTA_PERFORMER1}</td>
     <td>{$result[titre][$i]->S1}</td>
     <td>{$result[sacem][$i]->NUTZUNG}</td>
     <td>{$result[sacem][$i]->KOMPO}</td>  
     <td>{$result[sacem][$i]->LCM}</td>    
     </tr>
     ";   
      $i++;
     }
     $inf.="</table>";
     print $inf;
     exit();
}

function creation_xml($ref,$lang) {
$url=get_bloginfo('wpurl');
	print"
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"fr\" lang=\"fr\" dir=\"ltr\">
  <head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
 
	</head>";
	print"<form method=POST action='?task=enregistreXML&comment=".$ref."'>";
	print"<br> : $ref";
	print"<textarea name='enregistre' cols=\"45\" rows=\"12\">";
	print"</textarea>";
	print"<input name=\"lang\" type=\"hidden\" value=\"".$lang."\">";
	print"<input type=submit value=OK>";
	print"</form>";
	exit();
}


function enregistre_xml($ref,$lang) {
	global $wpdb;
	$enregistre=$_POST['enregistre'];
	//creation_accents
	if($lang=="la") $enregistre=creation_accents($enregistre);
	$q="insert into liturgia_ed(user,ref_texte,lang,nouveau_texte,date_ts) values('$userid','$ref','$lang','$enregistre','$datets') ";  
  	print"<br>".$wpdb->query($q);
exit();
}


function mod_calendarium($mois="",$an="") {
//print "calendrier";
$ok=false;
$date=$_GET['date'];
$lang=$_GET['lang'];
$office=$_GET['office'];
$anno=substr($date,0,4);
$mois=substr($date,4,2);
$die=substr($date,6,2);

if(!$lang) $lang="fr";
//$mois=str
if(!$mois) $mois=$_GET['mois'];
if(!$mois) $mois=date("m",time());

if (!$an) $an=$_GET['an'];
if(!$an) $an=date("Y",time());

if(!date) {
$date=date("Ymd", @mktime(0, 0, 0, $mois, 1,$an));
}

if (!$date) {
   $date=date("Ymd",time());
}

$date_ts=mktime(12,0,0,$mois,1,$an);

$file="http://92.243.24.163/wp-content/plugins/liturgia/calendrier/".date("Y-n",$date_ts).".xml";
$xml = @simplexml_load_file($file);

if ($lang=="la") {
$men= array("Ianuarii","Februarii","Martii","Aprilis","Maii","Iunii","Iulii","Augustii","Septembris","Octobris","Novembris","Decembris");
$do="Do.";
$f2="F.2";
$f3="F.3";
$f4="F.4";
$f5="F.5";
$f6="F.6";
$sa="Sa.";
//$calendarium="";
}
if ($lang=="fr") {
$men= array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
$do="Dim";
$f2="Lun";
$f3="Mar";
$f4="Mer";
$f5="Jeu";
$f6="Ven";
$sa="Sam";
//$calendarium="";
}

//print_r($men);

if($mois=="13") {
	$mois=1;
	$an++;
}
if($mois=="0") {
	$mois=12;
	$an--;
}

$s=0;$i=1;$sem=array();
while(date("m",$date_ts)==$mois) {
	$jour=date("w",$date_ts);

	$sem[$s][$jour]=$i;
	if ($jour==6) { $jour=0; $s++;}
 	//print"[$s|$jour]=$i";
	$i++;
	$date_ts=$date_ts+60*60*24;

}

$coul['Rouge']="#ff0000";
$coul['Vert']="#1b6f1f";
$coul['Blanc']="#ffeda6";
$coul['Violet']="#6b0d24";
$coul['Rose']="#d1a8a8";
$coul['Noir']="#000000";

	$an_plus=$an;
	$an_moins=$an;
    $mois_moins=$mois-1;
    $mois_plus=$mois+1;
	if($mois_plus==13) {$mois_plus=1; $an_plus=$an+1; }
	if($mois_moins==0) {$mois_moins=12; $an_moins=$an-1; }
	
$calendarium="<div align=center>
<table style=\"text-align: center; font-size:15px; margin:2px;\" border=\"0\" cellpadding=\"0\" cellspacing=\"3\">
<tr><td style=\"color: black;\"><a href=\"?mois=$mois_moins&an=$an_moins&office=$office\">&lt;&lt;</a></td>
      <td style=\"text-align: center;\" colspan=\"5\" rowspan=\"1\"><a href=\"?mois=$mois&an=$an&office=$office\">".$men[$mois-1]." $an</a></td>
      <td style=\"color: black;\"><a href=\"?mois=$mois_plus&&an=$an_plus&office=$office\">&gt;&gt;</a></td></tr>
  <tbody><tr >
  <td style=\"color: #777;\"><b>$do</b></td>
  <td style=\"color: #777;\">$f2</td>
  <td style=\"color: #777;\">$f3</td>
  <td style=\"color: #777;\">$f4</td>
  <td style=\"color: #777;\">$f5</td>
  <td style=\"color: #777;\">$f6</td>
  <td style=\"color: #777;\">$sa</td>
  </tr>";

	for ($u=0;$u<6;$u++) { // boucle semaines
		
    $calendarium.="<tr>";
    $f=$sem[$u][0];
    $jour_ts=@mktime(12,0,0,$mois,$f,$an);
   
	$url="/".$GLOBALS['wp']->request;
   
    $jour=@date("Ymd",$jour_ts);
	$req="//ordo[@id='RE']//jour[@date='".$jour."']";
	
	if($xml){ // TCH ajout - pr eviter affichage erreure dans les log
	$result=$xml->xpath($req);
    $iff=(string) $result[0]->couleur;
	//print"<br>"; print_r($result[0]->intitule);
	$titre=(string) $result[0]->intitule->fr;
	if($lang=="la") $titre=(string) $result[0]->intitule->la;
	}
	$coloris=$coul[$iff];
	//print"<br>".$jour." ".$req." ".$iff." "; //print_r($result);
	 $couleur_fonte=$coul['Noir'];
    if (($coloris==$coul['Noir'])OR($coloris==$coul['Violet'])OR($coloris==$coul['Vert'])) $couleur_fonte="#ffffff";	
//	print"<br>".$couleur_fonte;
	if($f!="")    {
		$calendarium.="
		<td style=\" background-color: $coloris;  font-weight:700; text-align: center;  text-decoration: none; ";
	  if($jour==$date) $calendarium.=" border: solid 3px;";
	  $calendarium.=" \">
		<a style=\"color: #000000; text-decoration: none;\"  href=\"?date=$jour&mois=$mois&an=$an&office=$office\" title=\"$titre\">
		<font color=\"$couleur_fonte\">$f</font></a></td>";
		}
	else $calendarium.="<td style=\" color: #000000; text-align: center; text-decoration: none;  \"></td>";
	
	for($n=1;$n<7;$n++) { // boucle jours
	$f=$sem[$u][$n];
    $jour_ts=@mktime(12,0,0,$mois,$f,$an);
    $jour=@date("Ymd",$jour_ts);
	$req="//ordo[@id='RE']//jour[@date='".$jour."']";
	$result=$xml->xpath($req);
    $iff=(string) $result[0]->couleur;
	$titre=(string) $result[0]->intitule->fr;
	if($lang=="la") $titre=(string) $result[0]->intitule->la;
	//print"<br>".$jour." ".$req." ".$iff." "; //print_r($result);
	///
	//print_r($result);
			///
    $coloris=$coul[$iff];
    $couleur_fonte=$coul['Noir'];
    if (($coloris==$coul['Noir'])OR($coloris==$coul['Violet'])OR($coloris==$coul['Vert'])) $couleur_fonte="#ffffff";
	//print"<br>".$couleur_fonte;
    //$titre=$calend['intitule'][$jour];
	  if($f!="") {
	  $calendarium.="
	  <td style=\" background-color: $coloris; text-align: center; text-decoration: none;";
	  if($jour==$date) $calendarium.=" border: solid 3px;";
	  
	  $calendarium.=" \">
	  <a style=\"color: #000000; text-decoration: none;\" href=\"?date=$jour&mois=$mois&an=$an&office=$office\" title=\"".$titre."\">
	  <font color=\"$couleur_fonte\">$f</font></a></td>
	  ";
      }
	else {
	$calendarium.="<td style=\" text-align: center;  text-decoration: none;\"></td>";
	   }

	} // fin boucle jours
} // fin boucle semaines


    $calendarium.="   
  </tbody>
</table>
</div>
";

return $calendarium;

}



function affichage() {
 global $current_user;
get_currentuserinfo();

// Calcul du jour;
//if($_SERVER[SERVER_ADDR]!="192.168.193.231") return;

$lang=$_GET['lang'];
if(!$lang) $lang="fr";
$option=$_GET['option'];
$q=$_GET['q'];
$date_ts=$GLOBALS['date_ts'];
//if($_GET['task']=="edit_propre") edit_content_propre();
//if($_GET['task']=="maj_propre") maj_content_propre($_POST['miseajour']);
//if($_GET['task']=="infopiece") affiche_infotitre($_GET['ref']);
setlocale(LC_TIME, "fr_FR.UTF-8");
date_default_timezone_set ( "Europe/Paris" );
//if ((int)date("H",time())>=17) print "vesperas";

if(!$office) $office=$_GET['office'];
if(!$office) 	$office =$GLOBALS['office'];
if(!$office) {
	$GLOBALS['office']="laudes"; $office="laudes";
	if((int)date("H",time())>=8) {$GLOBALS['office']="tierce"; $office="tierce"; };
	if((int)date("H",time())>=9) {$GLOBALS['office']="messe"; $office="messe"; };
	if((int)date("H",time())>=12) {$GLOBALS['office']="sexte";$office="sexte";}
	if((int)date("H",time())>=14) {$GLOBALS['office']="none";$office="none";}
	if((int)date("H",time())>=16) {$GLOBALS['office']="vepres";$office="vepres";}
	if((int)date("H",time())>=20) {$GLOBALS['office']="complies";$office="complies";}
	//$office="messe";
}

$date=$GLOBALS['date'];
if(!$date) $date=$_GET['date'];
if (!$date) {
     $date=date("Ymd",time());
}

$traductions=simplexml_load_file(get_bloginfo('wpurl')."/wp-content/plugins/wpliturgia/traductions.xml");
$GLOBALS['traductions']=$traductions;
$xml=$GLOBALS['liturgia'];
$ordo=$_GET['ordo'];
if(!$ordo) $ordo="RE";
$datemoins_ts=$date_ts-(60*60*24);
$datemoins=date("Ymd",$datemoins_ts);
$dateplus_ts=$date_ts+(60*60*24);
$dateplus=date("Ymd",$dateplus_ts);
$ed=$_GET['edition'];
if(!$ed) $ed="off";
if($ed=="off") $switch="on";
if($ed=="on") $switch="off";
print"Avertissement : les textes de l'office sont en cours de reconstruction. Des erreurs importantes peuvent s'afficher. Elles sont en cours de correction. Merci.";
//print"<div id=\"mode\"><span id=\"label\">Mode édition : </span><span><a href=\"?date=$date&edition=$switch&office=$office&lang=".$_GET['lang']."\"><img src=\"".get_bloginfo('wpurl')."/wp-content/plugins/liturgia/img/".$ed.".png\"></a></span></div>";

	print"<menu class=\"editio\">
		<span id=\"modeedition\">Mode édition : <a href=\"?date=$date&edition=$switch&office=$office&lang=".$_GET['lang']."\">
		<img src=\"".get_bloginfo('wpurl')."/wp-content/plugins/wpliturgia/img/".$ed.".png\"></a></span> 
		</menu>
	<menu id=\"lang\">
	Lingua : <span "; 
	if ($lang=="fr") print"id=\"selected\">fr</span>";
	else print"><a href=\"?lang=fr&office=".$_GET['office']."&date=".$_GET['date']."\">fr</a></span>";
	print"<span align=\"right\"";
	if ($lang=="en") print"id=\"selected\">en</span>";
	else print"><a href=\"?lang=en&office=".$_GET['office']."&date=".$_GET['date']."\">en</a></span>";
	print"<span align=\"right\"";
	if ($lang=="ar") print"id=\"selected\">ar</span>";
	else print"><a href=\"?lang=ar&office=".$_GET['office']."&date=".$_GET['date']."\">ar</a></span>";
	print"</menu>";
global $current_user;
      get_currentuserinfo();
      //print_r($current_user);
if ((string)$current_user->user_login=="admin"){
	print"<br><a href=\"?lang=fr&office=journee\">Journée entière</a>";
}
print"

<p><div id=\"nav\"><a href=\"?date=$datemoins&office=$office&edition=".$_GET['edition']."\"><<</a> 
<a href=\"?date=$date&office=Martyrologe&edition=".$_GET['edition']."&lang=".$_GET['lang']."&date=".$_GET['date']."\">Martyrologe</a> -
<a href=\"?date=$date&office=lectures&edition=".$_GET['edition']."&lang=".$_GET['lang']."&date=".$_GET['date']."\">Office de lecture</a> - 
<a href=\"?date=$date&office=laudes&edition=".$_GET['edition']."&lang=".$_GET['lang']."&date=".$_GET['date']."\">Laudes</a> - 
<a href=\"?date=$date&office=tierce&&edition=".$_GET['edition']."&lang=".$_GET['lang']."&date=".$_GET['date']."\">Tierce</a> -  
<a href=\"?date=$date&office=messe&&edition=".$_GET['edition']."&lang=".$_GET['lang']."&date=".$_GET['date']."\">Messe</a> - 
<a href=\"?date=$date&office=sexte&&edition=".$_GET['edition']."&lang=".$_GET['lang']."&date=".$_GET['date']."\">Sexte</a> - 
<a href=\"?date=$date&office=none&&edition=".$_GET['edition']."&lang=".$_GET['lang']."&date=".$_GET['date']."\">None</a> - ";

//if (get_bloginfo('wpurl')=="http://localhost/societaslaudis") 
print"
<a href=\"?date=$date&edition=".$_GET['edition']."&office=vepres&lang=".$_GET['lang']."&date=".$_GET['date']."\">Vêpres</a> ";
print"- 
<a href=\"?date=$date&edition=".$_GET['edition']."&office=complies&lang=".$_GET['lang']."&date=".$_GET['date']."\">Complies</a> 
<a href=\"?date=$dateplus&edition=".$_GET['edition']."&office=$office&lang=".$_GET['lang']."\">>></a></div>";

if($office=="journee") journee();
if ($office=="Martyrologe") martyrologe($xml);  //affiche_nav($date,$office);}
if ($office=="invitatoire") { $contenu.= invitatoire($date,$ordo); print"</table>"; affiche_nav($date,$office); }
//if ($office=="osb_vigiles") {$contenu.= osb_vigiles($date,$ordo); affiche_nav($date,$office);}

if ($office=="lectures") { $contenu.= lecture($date,$ordo);  affiche_nav($date,$office);}

if ($office=="laudes") {  $contenu.= laudes($date,$ordo); affiche_nav($date,$office); }

if ($office=="tierce") {$contenu.= tierce($date,$ordo);  affiche_nav($date,$office);}

if ($office=="messe") messe($date,$ordo);  //affiche_nav($date,$office);}

if ($office=="sexte") {$contenu.= sexte($date,$ordo);  affiche_nav($date,$office);}
if ($office=="none") {$contenu.= none($date,$ordo);  affiche_nav($date,$office);}

if ($office=="vepres") {$contenu.= vepres($date,$ordo); affiche_nav($date,$office);}

if ($office=="complies") {$contenu.= complies($date,$ordo); affiche_nav($date,$office);}

//print_r($GLOBALS['intitule']);

return $output;
}

function affiche_texte($ref,$lang="fr") {
$option=$_GET['option'];

$refL="/wp-content/plugins/liturgia/sources/".$ref.".xml";
	 //print"<br>refL = ".$refL;
     $xml = @simplexml_load_file("http://92.243.24.163/".$refL);// or die("<br>Error: Cannot create object : <a href=\"$refL\">$refL</a>");
	 //$ref="LEC_".no_accent($ref);
	 
if(!$xml) {
	if($_GET['edition']=="on") 	$aff ="<div class=\"gauche\" style=\"font-style:oblique;\"><a href=\"javascript:affichage_popup('http://92.243.24.163/chant-gregorien/liturgia/?task=creation&lang=la&comment=".$refL."','affichage_popup');\">".$ref."</a></div><div class=\"droite\">&nbsp;</div>";   
    return $aff;
}
	if($_GET['edition']=="on")$aff="<div class=\"gauche\">".affiche_editeur($refL,"la")."</div>
			<div class=\"droite\">".affiche_editeur($refL,$lang)."</div>"; 		
foreach(@$xml->children() as $ligne){
		$la=@$ligne->xpath('la');
		$ver=@$ligne->xpath($lang);
	//	print"<br>".$o[0];
	
		if($ligne->style) {
			$aff.= "
			<div class=\"gauche ".$ligne->style."\">".$la[0]."</div>
			<div class=\"droite ".$ligne->style."\">".$ver[0]."</div>";
		}
		else	{
			$aff.= "
			<div class=\"gauche\">".$la[0]."</div>
			<div class=\"droite\">".$ver[0]."</div>";
		}
	
	}
$aff=rougis_verset($aff);
return $aff;	
}

?>
