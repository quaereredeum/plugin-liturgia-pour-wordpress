<?php
	//$Id$
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="sites/all/modules/liturgia/style/liturgia.css" />
		<link rel="stylesheet" type="text/css" href="sites/all/modules/liturgia/style/liturgia_bg_$couleur.css" />
		    <script>
		     	function affichage_popup(nom_de_la_page, nom_interne_de_la_fenetre)
                {
                window.open (nom_de_la_page, nom_interne_de_la_fenetre, config='height=300, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no')
                }
                </script>				
	</head>
	<body>
		<div id="global">		
			<?php liturgie ?>
		</div>
	</body>
</html>
<?php

?>