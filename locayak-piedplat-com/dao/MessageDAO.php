<?php
require_once  "BaseDeDonnee.php";
class MessageDAO{

    public static function ajouterMessage($informationMessage)
    {
          
        $MESSAGE_SQL_AJOUTER_MESSAGE = "INSERT INTO chat (idUtilisateur,idDestinataire,message,idLocation,date) 
                                        VALUES (:idUtilisateur,:idDestinataire,:message,:idLocation,:date)";
        $requeteAjoutMessage = BaseDeDonnee::getConnexion() -> prepare($MESSAGE_SQL_AJOUTER_MESSAGE); 

        $requeteAjoutMessage->bindParam(':idUtilisateur', $informationMessage['idUtilisateur'], PDO::PARAM_INT);
        $requeteAjoutMessage->bindParam(':idDestinataire', $informationMessage['idDestinataire'], PDO::PARAM_INT);
        $requeteAjoutMessage->bindParam(':message', $informationMessage['message'], PDO::PARAM_STR);
        $requeteAjoutMessage->bindParam(':date', $informationMessage['date'], PDO::PARAM_STR);
        $requeteAjoutMessage->bindParam(':idLocation', $informationMessage['idLocation'], PDO::PARAM_INT);
        return $requeteAjoutMessage-> execute();
    }
    public static function listeMessage()
    {
        $MESSAGE_SQL_LISTE_CHAT = "SELECT id, idUtilisateur ,idDestinataire ,message,date,idLocation  FROM `chat`";
        $requeteListeMessage = BaseDeDonnee::getConnexion()->prepare($MESSAGE_SQL_LISTE_CHAT);
        $requeteListeMessage->execute();
        return $requeteListeMessage->fetchAll();
    }
    
}