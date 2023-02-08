<?php 
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
header('Content-type: application/xml');


require_once "configuration.php";

require_once CHEMIN_DAO."MessageDAO.php";
require_once CHEMIN_DAO."MembreDAO.php";


$numeroLocation = $_GET['idLocation'];
loadChat($numeroLocation);

function loadChat($numeroLocation)
{

    $chat_array = MessageDAO::listeMessage();
    $arrayNumber = 0;
    
    foreach ($chat_array as $message) {
        if ($message["idLocation"] == $numeroLocation) {
            $membre = MembreDAO::recupererMembre($message["idUtilisateur"]);
            $liste_message[$arrayNumber] = array($membre["nom"], $message["message"],$message["idUtilisateur"]);
            $arrayNumber++;
        }
    }
    
    displayCommentaire($liste_message);

}




function displayCommentaire($liste_message)
{
?>
    <messages>
        <?php
        foreach ($liste_message as $message) {
        ?>
            <message>
                <nomutilisateur><?php echo $message[0]; ?></nomutilisateur>
                <lemessage><?php echo $message[1]; ?></lemessage>
                <idUtilisateur><?php echo $message[2]; ?></idUtilisateur>
            </message>

        <?php
        }
        ?>
        
    </messages>
<?php

}
?>