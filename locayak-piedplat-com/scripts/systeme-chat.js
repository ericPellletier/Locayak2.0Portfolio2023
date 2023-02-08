
document.getElementById('envoie').onsubmit = function() {
    envoyerMessage();
    return false;
};

function envoyerMessage(){
    var champPseudo = document.getElementById('pseudo');
    var champCommentaire = document.getElementById('commentaire');
    if(champPseudo.value != "" && champCommentaire.value != "" ){
        var ajax = new Ajax();
        ajax.connect('../admnistration/envoie-message.php', 'GET', 'idLocation='+champIdLocation.value+'&message='+champMessage.value+'&date='+champDate.value);
        reloadFilm(champidFilm.value);
        champPseudo.value ="";
        champCommentaire.value="";
    }
}