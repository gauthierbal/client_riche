$(document).ready(function(){
  $("#texte").click(function(){
    $("#texte").css("height", "60px");
  });
  $("#bouton").click(function(){
    if ($("#texte").val() != "" && $("#texte").val().length<255) {
      $("#texte").css("background-color", "lightGrey");//changement de css de la boite de dialogue
      $("#texte").css("height", "30px");//changement de css de la boite de dialogue
      $("#texte").attr("disabled", "disabled");//le texte devient bloqué
      $("#bouton").css("opacity", "0.5");//changement de css de la boite de dialogue
      $("#bouton").attr("disabled", "disabled");//le bouton devient bloqué
      var params = "param1="+$("#texte").val()+"&param2="+id; //parametre afin de créer une requête ajax
      $.ajax({
        type: 'POST',//type de la requete ajax
        url: 'ajax.php',//lien vers le php de la requete ajax
        data: params,//les données afin de pouvoir efffectuer la requete ajax
        success: ajaxOK//si tout est Ok on se dirige vers la fonction ajaxOK
      })
    }else {
      alert("Erreur")//Averti d'une erreur
    }
  });

  function ajaxOK(data){
    $("#texte").css("background-color", "white");//changement de css de la boite de dialogue
    $("#texte").removeAttr("disabled");//le texte est débloqué
    $("#texte").val('');//reset de la valeur du texte
    $("#bouton").css("opacity", "1");//changement de css de la boite de dialogue
    $("#bouton").removeAttr("disabled");//le bouton est débloqué
  }
});
