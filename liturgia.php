<?php
/*
Plugin Name: Liturgia
Plugin URI: http://www.societaslaudis.org
Description: Liturgie latine et multilingue
Author: FXP
Version: 1.0
Author URI: http://www.societaslaudis.org
*/
/*
// Hook for adding admin menus
add_action('admin_menu', 'liturgia_menu');
//add_action("admin_menu", "liturgia_menu");
function liturgia_menu(){
	add_menu_page( 'Liturgia', 'Liturgia', 'manage_options', 'liturgia', 'admin_liturgia');
	// "Programme Options", "Programmes RE", "manage_options", "options-programmes-re", "programmes_re_options"
}
global $wpdb;
if ($_GET['action']=="majtrad") {
	//print"<br><br><br><br><br><br><br><br>Mise à jour des traductions....";
	
	$trad=$_POST['trad'];
	$suppr=$_POST['suppr'];
	$ref=$_POST['ref'];
	$id=$_POST['id'];
	$valide=$_POST['valide'];
	$lang=$_POST['lang'];
	for($inc=0;$maj=$trad[$inc];$inc++){
		if($valide[$inc]=="valide") { // On met à jour le XML concerné
			$maj=nl2br($maj); // On met un saut de ligne html
			$misaj=explode("<br />",$maj);
			
			$xml=@simplexml_load_file("..".$ref[$inc]);
			if(!$xml) $xml=simplexml_load_string("<liturgia></liturgia>");
			$ii=0;
			if (count($misaj)>=count($xml->ligne)) $max=count($misaj);
			if (count($misaj)<=count($xml->ligne)) $max=count($xml->ligne);
			while($ii<$max) {
				if($misaj[$ii]!=""){
					//if($misaj[$ii])
					if(strpos("{liturgie_titre}",$misaj[$ii])) {
						$xml->ligne[$ii]->style="liturgie_titre";
						$misaj[$ii]=str_replace ( "{liturgie_titre}" , "" , $misaj[$ii] );
					}
					if(strpos("{liturgie_italique}",$misaj[$ii])) {
						$xml->ligne[$ii]->style="liturgie_italique";
						$misaj[$ii]=str_replace ( "{liturgie_italique}" , "" , $misaj[$ii] );
					}
					if(strpos("{liturgie_sous_titre}",$misaj[$ii])) {
						$xml->ligne[$ii]->style="liturgie_sous_titre";
						$misaj[$ii]=str_replace ( "{liturgie_sous_titre}" , "" , $misaj[$ii] );
					}
					if(strpos("{rubrique}",$misaj[$ii])) {
						$xml->ligne[$ii]->style="rubrique";
						$misaj[$ii]=str_replace ( "{rubrique}" , "" , $misaj[$ii] );
					}
					if(strpos("{liturgie_italique}",$misaj[$ii])) $xml->style="liturgie_italique";
					if($lang[$inc]=="fr") $xml->ligne[$ii]->fr=$misaj[$ii];
					if($lang[$inc]=="la") $xml->ligne[$ii]->la=$misaj[$ii];
					if($lang[$inc]=="en") $xml->ligne[$ii]->en=$misaj[$ii];
					if($lang[$inc]=="ar") $xml->ligne[$ii]->ar=$misaj[$ii];
					@$xml->ligne[$ii]->addAttribute('id', $ii);			
				}
				if($misaj[$ii]==""){	
					unset($xml->ligne[$ii]);	
				}
				$ii++;
			}
			
		if($xml->asxml("..".$ref[$inc])){
			$q="update liturgia_ed set statut='val' where id=".$id[$inc];
			if($wpdb->query($q)!=0) $output.="<br>Maj effectuée ".$id[$inc];
			$updxml=simplexml_load_file("../wp-content/plugins/liturgia/sources/update.xml");
			$updxml->maj="true";
			$updxml->addChild("file",$ref[$inc]);
			$updxml->asxml("../wp-content/plugins/liturgia/sources/update.xml");
			//chgrp("..".$ref[$inc], "ftp");
			chmod("..".$ref[$inc], 0664); // On donne une permission d'écriture au groupe (pour modif possible à la main).
		}
		else $output.="<br>Echec maj ".$id[$inc];
		}
		if($suppr[$inc]=="suppr") { // On marque l'entrée en supprimmé / statut
			$q="update liturgia_ed set statut='suppr' where id=".$id[$inc];
			if($wpdb->query($q)!=0) $output.="<br>Maj effectuée ".$id[$inc];
			else $output.="<br>Echec maj ".$id[$inc];
		}
	}
}


function admin_liturgia() {
	global $wpdb;
	require "../wp-content/plugins/liturgia/diffClass.php";
	$q="select * from liturgia_ed where statut='new'";
	$posts=$wpdb->get_results($q);
	print"<form method=\"POST\" action=\"$PHP_SELF?page=liturgia&action=majtrad\" ><table>";
	$inc=0;
	foreach ($posts as $post) {
		$pxml=@simplexml_load_file(get_bloginfo('wpurl').$post->ref_texte);
		print"<tr><td>";
		if ($pxml) foreach($pxml->ligne as $ligne) {
			print $ligne->la."<br />";
			
		}
		$sens="";
		if ($post->lang==ar) {
				$orig= $line->ar;
				$sens="style=\"direction:rtl; font:20px arial,sans-serif; width:400px; height:300px;\"";
			}
		print"</td><td $sens>";
		$new=explode("<br />",nl2br($post->nouveau_texte));
		$n=0;$i=0;
		if ($pxml) foreach($pxml->ligne as $ligne) {
			
			if ($post->lang=="fr") $orig= $ligne->fr;
			if ($post->lang=="la") $orig= $ligne->la;
			if ($post->lang=="en") $orig= $ligne->en;
			
			
			print Diff::compare($orig, $new[$i]);
			//print"<br>".$new[$i];
			$i++;
		}
		print "</td><td width=400px><textarea width=300px; $sens name=\"trad[$inc]\">".$post->nouveau_texte."</textarea></td>";
		print"<td><input type=\"checkbox\" name=\"valide[$inc]\" value=\"valide\" />Valider";
		print"<td><input type=\"checkbox\" name=\"suppr[$inc]\" value=\"suppr\" />Suppr";
		print"</tr>";
		print"<input type=\"hidden\" name=\"lang[$inc]\" value=\"$post->lang\">";
		print"<input type=\"hidden\" name=\"id[$inc]\" value=\"$post->id\">";
		print"<input type=\"hidden\" name=\"ref[$inc]\" value=\"$post->ref_texte\">";
		$inc++;
	}
	print"</table>
	<input type=\"submit\" value=\"OK\"> </form>";
	//print "Admin liturgia";
}
*/
add_action('wp_head','liturgia_head');
//add_action('loop_start','affiche_liturgia');

include_once ("calendarium.php");
include_once ("fonctions.php");

//include_once ("tableau.php");
include_once ("martyrologe.php");
//include_once ("invitatoire.php");
//include_once ("osb_vigiles.php");
include_once ("lectures.php");
include_once ("laudes.php");
include_once ("messe.php");
include_once ("tierce.php");

include_once ("sexte.php");
include_once ("none.php");

include_once ("vepres.php");
include_once ("complies.php");

//include_once ("../../../wp-includes/pluggable.php");

//$user= wp_get_current_user();

if($_GET['task']=="edit") edit_content();
if($_GET['task']=="maj") maj_content($_POST['miseajour'],$user->ID);
if($_GET['task']=="creation") creation_xml($_GET['comment'],$_GET['lang']);
if($_GET['task']=="enregistreXML") enregistre_XML($_GET['comment'],$_POST['lang']);
function affiche_liturgia()
{
	$lang=$_GET['lang'];
	$date=$_GET['date'];
	$option=$_GET['option'];
	
	print affichage();
}

function liturgia_head() {
$date=$_GET['date'];
if (!$_GET['date']) $date=date("Ymd",time());
$lang=$_GET['lang'];
if(!$lang) $lang=fr;

$an=substr($date,0,4);
$mois=substr($date,4,2);
$jour=substr($date,6,2);
$date_ts=mktime(12,0,0,$mois,$jour,$an);
//print"<br>an=".$an." mois=".$mois;

$file="http://92.243.24.163/wp-content/plugins/liturgia/calendrier/".date("Y-m-d",$date_ts).".xml";
$xml = @simplexml_load_file($file);
$req="//ordo[@id='RE']";
if($xml){ // TCH ajout - pour eviter erreure dans les logs
$r=$xml->xpath($req);
//print_r($r[0]);
$couleur=$r[0]->couleur;
  $tempus=$r[0]->tempus; 
  $hebdomada=$r[0]->hebdomada;
  $intitule=$r[0]->intitule;
  $GLOBALS['liturgia']=$xml;
  $GLOBALS['tempus']=$r[0]->tempus->fr;
  $GLOBALS['hebdomada']=$r[0]->hebdomada->fr;
  $GLOBALS['intitule']=$r[0]->intitule->fr;
  $GLOBALS['rang']=$r[0]->rang->fr;
  $GLOBALS['lune']=$r[0]->age_lunaire;
  $GLOBALS['selection']=$r[0]->selection;
  $GLOBALS['nb_promos']=$r[0]->nb_promos;
  $GLOBALS['date']=date("Ymd",$date_ts);
  $GLOBALS['date_ts']=$date_ts;
  $GLOBALS['lang']=$lang;
}
print"<link rel=\"stylesheet\" type=\"text/css\" href=\"".get_bloginfo('wpurl')."/wp-content/plugins/wpliturgia/style/liturgia.css\" />\r\n";
print"<link rel=\"stylesheet\" type=\"text/css\" href=\"".get_bloginfo('wpurl')."/wp-content/plugins/wpliturgia/style/liturgie-".$couleur.".css\" />\r\n";


print" <script>
function affichage_popup(nom_de_la_page, nom_interne_de_la_fenetre) {
	window.open (nom_de_la_page, nom_interne_de_la_fenetre, config='height=300, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no')
}
</script>";

}


?>