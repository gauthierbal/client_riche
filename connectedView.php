<?php
$title = "FakeBooc";
$content = "<div id='logo'><a href='index.php'><img src='ressources/logo.png' alt='Logo'/></a></div>";
$content .= "<div class='connect'><p>Vous êtes connecté  en tant que ".$_SESSION["username"]."</p><a href='index.php?disconnect=true'><p>Déconnexion</p></a></div>";
require("gabarit.php");
?>
