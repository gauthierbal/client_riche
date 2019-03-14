<?php
$content = "<h1>$nomMur</h1>";
$content .= "<script> var id =".$_GET['wallId']."</script><div id='boite'><textarea rows='1' cols='50' placeholder='Exprimez-vous' id='texte'></textarea><input type='button' value='Publier' id='bouton'/></div><div id='new_message'></div><script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script><script type='text/javascript' src='js/boite.js'></script><script type='text/javascript' src='js/affiche.js'></script>";
require("gabarit.php");
?>
