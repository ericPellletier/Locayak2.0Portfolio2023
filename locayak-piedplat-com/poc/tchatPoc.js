var chatBox = document.getElementById("chat");


document.getElementById('formulaireEnvoie').onsubmit = function() {
    chatBox.innerHTML+= "<div class='bubble me'>Romain: Salut preuve de concept</div>";
    recevoirFauxMessage();
    return false;
};
async function recevoirFauxMessage(){
    await new Promise(r => setTimeout(r, 1000));
    chatBox.innerHTML+= "<div class='bubble you'>Bob: Salut Romain</div>";

}