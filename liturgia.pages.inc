<?php
	function affiche_liturgie() {
	// Calcul du jour;
	
	$date=$_GET['date'];
	$lang=$_GET['lang'];
	$option=$_GET['option'];
	$q=$_GET['q'];
	
	if($_GET['task']=="edit") edit_content();
	if($_GET['task']=="maj") maj_content($_POST['miseajour']);
	if($_GET['task']=="edit_propre") edit_content_propre();
	if($_GET['task']=="maj_propre") maj_content_propre($_POST['miseajour']);
	if($_GET['task']=="infopiece") affiche_infotitre($_GET['ref']); 
	
	if(!$office) $office=$_GET['office'];
	
	if (!$date) {
	    $aujourdhui=time();
	    $date=date("Ymd",$aujourdhui);
	}
	$calendarium=calendarium($date);
	
	$tableau=tableau($calendarium,$date);
	
	
	
	if ($office=="invitatoire") { $contenu.= invitatoire($date,$calendarium,$reference,$tableau); print"</table>"; affiche_nav($date,$office); }
	if ($office=="lectures") { $contenu.= lectures($date,$tableau,$calendarium,$office);  affiche_nav($date,$office);}
	if ($office=="laudes") {  $contenu.= laudes($date,$tableau,$calendarium,$office); affiche_nav($date,$office); }
	if ($office=="tierce") {$contenu.= tierce($date,$tableau,$calendarium);  affiche_nav($date,$office);}
	if ($office=="messe") {$contenu.= messe($date,$tableau,$calendarium);  affiche_nav($date,$office);}
	if ($office=="sexte") {$contenu.= sexte($date,$tableau,$calendarium);  affiche_nav($date,$office);}
	if ($office=="none") {$contenu.= none($date,$tableau,$calendarium);  affiche_nav($date,$office);}
	if ($office=="vepres") {$contenu.= vepres($date,$tableau,$calendarium); affiche_nav($date,$office);}
	if ($office=="complies") {$contenu.= complies($date,$tableau,$calendarium); affiche_nav($date,$office);}
	if ($office=="osb_vigiles") {$contenu.= osb_vigiles($date,$tableau,$calendarium); affiche_nav($date,$office);}
	
	$couleur=$calendarium['couleur_template'][$date];
				
	$ordo=$_COOKIE["pref"];

	if(($_GET['task']!="paroles")&&(($_GET['office']!="messe")&&($_GET['office']!="osb_vigiles"))) {
	$output.="
			<fieldset><center>
			 
			<form id=\"monForm\" action=\"?q=$q&task=setpref\" method=\"post\">
			<label>Ordo :</label>
			<SELECT name=\"livre\">
			<OPTION VALUE=\"LH\" "; if ($ordo=="LH") $output.="selected"; $output.=">Liturgia Horarum, editio typica altera, 1985, © Libreria editrice vaticana.</OPTION>
			<OPTION VALUE=\"HG\""; if ($ordo=="HG") $output.="selected"; $output.=">Les Heures Grégoriennes, 2008, © Communauté Saint Martin.</OPTION>
			<OPTION VALUE=\"AR\""; if ($ordo=="AR") $output.="selected"; $output.=">Antiphonale romanum, 2009, © Abbaye Saint Pierre de Solesmes.</OPTION>
			</SELECT>
			<input type=\"submit\" value=\"OK\">
			</form>
			</center>
			</fieldset>
	";
	}
	if($_GET['task']!="paroles") $output.=affiche_date($jour,$calendarium);
	if($_GET['task']=="paroles") $output.=paroles($_GET['ref']);
	if($_GET['task']!="paroles")$output.=affiche_nav($date,$office);
	
	//$output.=laudes($date,$tableau,$calendarium,"laudes");
	$output.=$contenu;

	//print $output;
	//return $output;
	return theme($output);
	}
?>