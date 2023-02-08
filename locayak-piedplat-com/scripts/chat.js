document.getElementById('formulaireEnvoie').onsubmit = function() {
    envoyerMessage();
    return false;
};


        function envoyerMessage(){
            var idUtilisateur = document.getElementById('idUtilisateur');
            var idDestinataire = document.getElementById('idLocateur');
            var message = document.getElementById('messageInput');
            var idLocation = document.getElementById('idLocation');
            var date = new Date();
            console.log("test");
            
            if(message.value != ""){
                var ajax = new Ajax();
                ajax.connect('../membre/traitement-ajouter-message.php', 'GET', 'idUtilisateur='+idUtilisateur.value+'&idDestinataire='+idDestinataire.value+'&message='+message.value+'&idLocation='+idLocation.value+'&date='+date);
                reloadMessage(idLocation.value);
                message.value ="";
            }
        }
        async function reloadMessage(idLocation){
            await new Promise(r => setTimeout(r, 900));
            afficherNouveauxMessage(idLocation);
        }
		function afficherNouvelleApres(reponse)
		{
            
            if(reponse.responseXML != undefined){
                var xml = reponse.responseXML;
                noeudNomUtilisateur = xml.getElementsByTagName('nomutilisateur');
                noeudMessage = xml.getElementsByTagName('lemessage');
                noeudIdUtilisateur = xml.getElementsByTagName('idUtilisateur');
                var arrUtil = Array.prototype.slice.call(noeudNomUtilisateur)
                var arrMessage = Array.prototype.slice.call(noeudMessage)
                var arrIdUtilisateur = Array.prototype.slice.call(noeudIdUtilisateur)
                var addToHTML ="";
                for (let i = 0; i < arrUtil.length; i++) {
                    if(arrIdUtilisateur[i].textContent ==idUtilisateur.value ){
                        addToHTML += "<div class='bubble me'>";
                    }else{
                    addToHTML += "<div class='bubble you'>";
                    }
                    // addToHTML += "<div class='bubble you'>"
                    const nomUtil = arrUtil[i];
                    const message = arrMessage[i];
                    addToHTML+= nomUtil.textContent + "</br>";
                    addToHTML+= message.textContent;
                    addToHTML += "</div> </br></br>";
                }
                boiteDeChat = document.getElementById("chat");
                boiteDeChat.innerHTML = addToHTML;
            }
			//listeParagraphe = boiteNouvelle.getElementsByTagName('p');
			//paragraphe = listeParagraphe[0];*/
			//alert(listeParagraphe + " de taille " + listeParagraphe.length);
			//paragraphe = document.querySelector('#nouvelle-' + numero + ' p');			
			//paragraphe.innerHTML = article;
		}
		function afficherNouveauxMessage(numero)
		{			
			var ajax = new Ajax();
			ajax.connect('../membre/traitement-recuperer-message.php', 'GET', 'idLocation='+numero,afficherNouvelleApres);		
		}