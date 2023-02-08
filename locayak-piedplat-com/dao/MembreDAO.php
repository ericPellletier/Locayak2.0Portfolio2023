
<?php
require_once  "basededonee.php";
require_once  "BaseDeDonnee.php";

class MembreDAO
{
    public static function listeMembre()
    {
        $SQL_RECUPERER_MEMBRE = "SELECT * FROM `membre`";
        $requeteSelectKayak = getConnexion()->prepare($SQL_RECUPERER_MEMBRE);
        $requeteSelectKayak->execute();
        return $requeteSelectKayak->fetchAll();
    }

    public static function ajouterMembre($informationMembre)
    {
        //print_r($informationMembre['mail']);

        $MESSAGE_SQL_AJOUTER_MEMBRE = "INSERT INTO membre (nom, prenom, telephone, adresse, email, mdp) 
                                       VALUES (:nom,:prenom, :telephone, :adresse, :email, :mdp)";

        $requeteAjoutMembre = BaseDeDonnee::getConnexion() -> prepare($MESSAGE_SQL_AJOUTER_MEMBRE); 

        $requeteAjoutMembre->bindParam(':nom', $informationMembre['nom'], PDO::PARAM_STR);
        $requeteAjoutMembre->bindParam(':prenom', $informationMembre['prenom'], PDO::PARAM_STR);
        $requeteAjoutMembre->bindParam(':adresse', $informationMembre['adresse'], PDO::PARAM_STR);
        $requeteAjoutMembre->bindParam(':telephone', $informationMembre['telephone'], PDO::PARAM_STR);
        $requeteAjoutMembre->bindParam(':email', $informationMembre['mail'], PDO::PARAM_STR);
        $requeteAjoutMembre->bindParam(':mdp', $informationMembre['motDePasse'], PDO::PARAM_STR);
        return $requeteAjoutMembre-> execute();
    }

    public static function modifierPrenom($informationMembre,$id)
    {
        //print_r($informationMembre['mail']);

        $MESSAGE_SQL_AJOUTER_MEMBRE = "UPDATE membre SET prenom=:prenom WHERE id=:id";

        $requeteAjoutMembre = BaseDeDonnee::getConnexion() -> prepare($MESSAGE_SQL_AJOUTER_MEMBRE); 

        $requeteAjoutMembre->bindParam(':prenom', $informationMembre['prenom'], PDO::PARAM_STR);
        $requeteAjoutMembre->bindParam(':id',$id, PDO::PARAM_STR);
        return $requeteAjoutMembre-> execute();
    }

    public static function recupererMembre($email)
    {
        
        $SQL_RECHERCHER_EMAIL = "SELECT * FROM membre WHERE email LIKE CONCAT('%', :email, '%') OR id = :email";

        $rechercherInfo = BaseDeDonnee::getConnexion() -> prepare($SQL_RECHERCHER_EMAIL);

        $rechercherInfo->bindParam(':email', $email, PDO::PARAM_STR);
        $rechercherInfo->execute();

        $membreRecuperer = $rechercherInfo->fetch();

        return $membreRecuperer;
    }

    public static function validerIdentificationMembre($infoIdMembre)
    {
        $membreIdentifier = true;
        $mailMembre = $infoIdMembre['mail'];
        $mpdMembre = $infoIdMembre['motDePasse'];

        $membreRecuperer = MembreDAO::recupererMembre($mailMembre);

        if(empty($membreRecuperer))
        {
            $membreIdentifier = false;
            return $membreIdentifier;
        }   
        elseif(!empty($membreRecuperer))
        {
            $email = $membreRecuperer['email'];
            
            $REQUETE_RECHERCHE_MDP = "SELECT mdp FROM membre WHERE email = '$email'";
            $rechercherMDP = BaseDeDonnee::getConnexion() -> prepare($REQUETE_RECHERCHE_MDP);
             $rechercherMDP->execute();
    
            $mdpTrouver = $rechercherMDP->fetch();
            $mdpHache = $mdpTrouver['mdp'];

            if(!password_verify($mpdMembre, $mdpHache))
            {
               $membreIdentifier = false;
               return $membreIdentifier;
            }
            else
            {
                return $membreIdentifier;
            }
           
        }     
    }

    public static function validerEmailPasse($email, $passe1, $passe2)
    {
        $resultat = true;

        if($passe1 != $passe2)
        {
            $resultat = false;
            return $resultat;
        }

        $listeEmails = MembreDAO::recupererMembre($email);

        if(!empty($listeEmails))
        {
            $resultat = false;
            return $resultat;
        }
        return $resultat;
  
    }
}
