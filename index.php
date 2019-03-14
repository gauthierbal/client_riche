<?php
require("model.php");
session_start();
if (isset($_GET['disconnect'])) {
  session_destroy();
  header('Location: index.php');//redirige vers la page accueil
  exit();
}
if (isset($_SESSION["username"])) {
  require("connectedView.php");
}else{
  require("disconnectedView.php");
}
if (isset($_GET['wallId']) && isset($_SESSION["username"])){
  $nomMur = titreUti($_GET['wallId']);
  require("wallView.php");
}else{
  if (isset($_SESSION["username"])) {
    //vers auccueil du site
    $listUsers = listUsers();
    require("homeView.php");
  }else{
    //vers connexion
    require("connectView.php");
    if (isset($_POST["user_name"], $_POST["password"])) {
      $resultat = connectCheck($_POST["user_name"], $_POST["password"]);
      if ($resultat != null) {
        $_SESSION["username"] = $_POST["user_name"];//crée une variable de session avec le nom d'utilisateur
        $_SESSION["id"] = $resultat["uti_id"];//crée une varialbe de seesion avec l'id de l'utilisateur
        header('Location: index.php');//redirige vers la page accueil
        exit();
      }
    }
  }
}
?>
