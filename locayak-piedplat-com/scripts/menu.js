
var leMenu = document.getElementById("mesLiens");
leMenu.classList.add('menuCacher');
function ouvrirLeMenu() {
    if (leMenu.classList.contains("menuAfficher")) {
        leMenu.classList.remove('menuAfficher');
        leMenu.classList.add('menuCacher');
    } else {
        leMenu.classList.remove('menuCacher');
        leMenu.classList.add('menuAfficher');
    }
  }