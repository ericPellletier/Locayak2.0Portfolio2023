<?php
require_once  "BaseDeDonnee.php";
class LocationDAO{
    public static function ajouterLocation($informationLocation)
    {
        $MESSAGE_SQL_AJOUTER_JEU = "INSERT INTO location (idClient,idLocateur,idKayak,dateTransac,dateDebutLocation,dateFinLocation) 
                                    VALUES (:idClient,:idLocateur,:idKayak,:dateTransac,:dateDebutLocation,:dateFinLocation)";
        $requeteAjoutKayak = BaseDeDonnee::getConnexion() -> prepare($MESSAGE_SQL_AJOUTER_JEU); 
        $requeteAjoutKayak->bindParam(':idClient', $informationLocation['idClient'], PDO::PARAM_STR);
        $requeteAjoutKayak->bindParam(':idLocateur', $informationLocation['idLocateur'], PDO::PARAM_STR);
        $requeteAjoutKayak->bindParam(':idKayak', $informationLocation['idKayak'], PDO::PARAM_STR);
        $requeteAjoutKayak->bindParam(':dateTransac', $informationLocation['dateTransac'], PDO::PARAM_STR);
        $requeteAjoutKayak->bindParam(':dateDebutLocation', $informationLocation['dateDebutLocation'], PDO::PARAM_STR);
        $requeteAjoutKayak->bindParam(':dateFinLocation', $informationLocation['dateFinLocation'], PDO::PARAM_STR);
        return $requeteAjoutKayak-> execute();
    }

    public static function listeTransaction()
    {
        $MESSAGE_SQL_RECUPERER = "SELECT * FROM `location`";
        $requeteSelectTransaction = BaseDeDonnee::getConnexion()->prepare($MESSAGE_SQL_RECUPERER);
        $requeteSelectTransaction->execute();
        return $requeteSelectTransaction->fetchAll();
    }
}