<?php
foreach(glob("LEC_*.csv") as $lien) {
echo "<li><a href=$dir_nom/$lien >$lien</a></li>n";
///////////// ICI le code pour le traitement des fichiers d'office
if ((substr($lien,0,2)=="hy")||(substr($lien,0,2)=="HY")) hy2xml($lien);
print"<br>".$lien -> XML;
echo "</ul>";
}

?>