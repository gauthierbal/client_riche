$(document).ready(function(){
  var last_max = 0;
  var temps = 2000;
  setInterval(updateMessage ,temps);

  function updateMessage(){
    var params = "param1="+id;//parametre pour la requete ajax
    $.ajax({
      type: 'POST',
      url: 'affichage_message.php',//lien vers le php de la requete ajax
      data: params,
      success: ajaxOK
    })
  }

  function ajaxOK(donnee){
    var data = $.parseJSON(donnee);
    var max = data.length;
    var max_id = data[max-1].id;
    if (last_max != max_id) {
      $("#new_message").html("");
      for (var i = 0; i < max; i++) {
        $("#new_message").prepend("<div class='message' id='message"+ data[i].id +"'><p class='expediteur'>Message de <a href='index.php?wallId="+ data[i].id_expediteur +"'>"+ data[i].uti_nom +"</a> :</p><p class='contenu'>"+ data[i].fac_texte +"</p><p class='date'>Posté le: "+ data[i].fac_date +"</p></div>");
      }
      last_max = max_id;
    }
    temps = 2000;
  }
});
