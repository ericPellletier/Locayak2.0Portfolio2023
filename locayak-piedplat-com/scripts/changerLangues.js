const getCookie = (name) => {
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        let c = cookies[i].trim().split('=');
        if (c[0] === name) {
            return c[1];
        }
    }
    return "";
}

var btnChanger = document.getElementById("changerLangue");
let langue = getCookie("lang");
switch (langue) {
    case "FR":
        btnChanger.innerHTML = "EN";
        
        break;
    case "EN":
        btnChanger.innerHTML = "FR";
        
            break;
    default:
        break;
}
btnChanger.addEventListener("click", function(){
    if(langue== "EN"){
        document.cookie =  "lang=FR";
    }else if(langue== "FR"){
        document.cookie =  "lang=EN";
    }
    window.location.reload(true)
  });

