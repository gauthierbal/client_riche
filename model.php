<?php
function dbConnect(){
  try {
    require "log.php";//récupération des codes de connexion
    $connect = new PDO('pgsql:host=localhost; port=5432; dbname=client_riche;', $user, $pass);//connxeion à la base de donnée
  } catch (PDOException $e) {
    die('Erreur connexion '. $e);
  }
  return $connect;
}

function connectCheck($user, $mdp){
  $connect = dbConnect();
  $req = $connect->prepare("SELECT uti_id, uti_nom, uti_mdp FROM utilisateur where uti_nom=:nom and uti_mdp= :mdp;");
  $req->bindParam('nom', $user);
  $req->bindParam('mdp', $mdp);
  $req->execute();//execute la commande
  $resultat = $req->fetch(PDO::FETCH_ASSOC);//transforme la requete en array
  return $resultat;
}

function listUsers(){
  $connect = dbConnect();
  $req = $connect->prepare("SELECT uti_nom FROM utilisateur");//requete qui selectionne les nom des utilisateurs dans la base
  $req->execute();//execute la requete
  $result = $req->fetchAll(PDO::FETCH_ASSOC);//rend la requete en array
  return $result;
}

function titreUti($id){
  $connect = dbConnect();
  $req=$connect->prepare('SELECT uti_nom FROM utilisateur WHERE uti_id=:id ;');
  $req->bindParam('id', $id);
  $req->execute();
  $resultat = $req->fetch(PDO::FETCH_ASSOC);
  return $resultat['uti_nom'];
}
?>
