<?php
if (isset($_POST['param1'])) {
  require("model.php");
  $connect = dbConnect();
  $id = $_POST['param1'];
  $affiche = $connect->prepare('SELECT F.id, U.uti_nom, F.fac_texte, F.fac_date, F.id_expediteur FROM fac_message as F INNER JOIN utilisateur as U ON F.id_expediteur=U.uti_id WHERE id_destinataire = :id_dest ORDER BY fac_date');
  $affiche->bindParam('id_dest', $id);//ajoute le parametre manquant à la requete precedente
  $affiche->execute();//execute la requete
  $affiche_result = $affiche->fetchAll(PDO::FETCH_ASSOC);//transforme la requete en array
  $contenu_json = json_encode($affiche_result);
  echo $contenu_json;
}
?>
