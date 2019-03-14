<?php
$content = "<h1>Fakebooc</h1><div class='nav'><h2>Aller voir le mur de :</h2><div id='listUsers'>";
foreach ($listUsers as $ligne => $valeur) {
  $id = $ligne+1;
  $content .= "<a href='index.php?wallId=". $id ."'> <input type='button' name='mur' value='" . $valeur['uti_nom'] . "' /> </a>";//affiche des boutons qui donnent accès aux différents mur d'utilisateurs
}
$content .= "</div></div>";
require("gabarit.php");
?>
