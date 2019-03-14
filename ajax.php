<?php
  session_start();
  try {
    try {
      require "log.php";//récupération des codes de connexion
      $connect = new PDO('pgsql:host=localhost; port=5432; dbname=client_riche;', $user, $pass);//connxeion à la base de donnée
    } catch (PDOException $e) {
      die('Erreur connexion '. $e);
    }
    if (isset($_POST['param1'])) {//vérification d'un message dans le bloc de texte
      $message = $_POST['param1']; //récupération du message
      $date = date('Y-m-d H:i:s'); //récupération de la date
      $from = $_SESSION['id'];
      $to = $_POST['param2'];
      $req = $connect->prepare("INSERT INTO fac_message(fac_texte, fac_date, id_expediteur, id_destinataire) VALUES (:message, :dateMes, :exped, :dest)"); //préparation de la commande sql pour insérer les données dans la BDD
      $req->bindParam('message', $message); //premier paramètre de la commande sql
      $req->bindParam('dateMes', $date);//deuxième paramètre de la commande sql
      $req->bindParam('exped', $from);
      $req->bindParam('dest', $to);
      $req->execute();//commande executée
    }
  } catch (PDOException $e) {
    die('Erreur'. $e);
  }
?>
