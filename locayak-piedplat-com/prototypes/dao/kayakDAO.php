<?php
require_once  "BaseDeDonnee.php";
class kayakDAO{
    public static function listeKayak()
    {
        $MESSAGE_SQL_RECUPERER = "SELECT * FROM `kayak`";
        $requeteSelectKayak = BaseDeDonnee::getConnexion()->prepare($MESSAGE_SQL_RECUPERER);
        $requeteSelectKayak->execute();
        return $requeteSelectKayak->fetchAll();
    }
    public static function selectionnerKayak($id)
    {
        $MESSAGE_SQL_SELECTIONER = "SELECT * FROM `kayak` WHERE id = :id";
        $requeteSelectKayak = BaseDeDonnee::getConnexion()->prepare($MESSAGE_SQL_SELECTIONER);
        $requeteSelectKayak->bindParam(':id', $id, PDO::PARAM_STR);
        $requeteSelectKayak->execute();
        return $requeteSelectKayak->fetch();
    }

    public static function ajouterKayak($informationKayak,$image)
    {
          
        $MESSAGE_SQL_AJOUTER_JEU = "INSERT INTO kayak (titreAnnonce,descriptionAnnonce,type,adresse,cout,idMembre,image) VALUES (:titreAnnonce,:descriptionAnnonce,:type, :adresse,:cout,:idMembre,'$image')";
        $requeteAjoutKayak = BaseDeDonnee::getConnexion() -> prepare($MESSAGE_SQL_AJOUTER_JEU); 

        $requeteAjoutKayak->bindParam(':titreAnnonce', $informationKayak['titreAnnonce'], PDO::PARAM_STR);
        $requeteAjoutKayak->bindParam(':descriptionAnnonce', $informationKayak['descriptionAnnonce'], PDO::PARAM_STR);
        $requeteAjoutKayak->bindParam(':type', $informationKayak['type'], PDO::PARAM_STR);
        $requeteAjoutKayak->bindParam(':adresse', $informationKayak['adresse'], PDO::PARAM_STR);
        $requeteAjoutKayak->bindParam(':cout', $informationKayak['cout'], PDO::PARAM_STR);
        $requeteAjoutKayak->bindParam(':idMembre', 0, PDO::PARAM_STR);
        return $requeteAjoutKayak-> execute();
    }

    public static function supprimerKayak($idKayak){
        $MESSAGE_SQL_SUPPRIMER_KAYAK = "DELETE FROM kayak WHERE id=:id";
        $requeteSuppKayak = BaseDeDonnee::getConnexion()-> prepare($MESSAGE_SQL_SUPPRIMER_KAYAK); 
        $requeteSuppKayak-> bindParam('id',$idKayak,PDO::PARAM_INT);
        return $requeteSuppKayak-> execute();
    }

    public static function modifierKayak($kayak){
        $image = "SELECT image FROM `kayak` WHERE id=:id";
        $requeteImage= BaseDeDonnee::getConnexion()->prepare($image);
        $requeteImage->bindParam(':id', $kayak['id'], PDO::PARAM_INT);
        $requeteImage->execute();
        $imageEmplacement = $requeteImage -> fetch();

        //Suprime l'ancienne version de l'image si une image est deja presente
        if(!empty($_FILES['illustration']['name'])) {
            if(!empty($imageEmplacement['image'])){
                unlink("../image/".$imageEmplacement['image']."");
            }
            $repertoireIllustration = $_SERVER['DOCUMENT_ROOT'] . "/DevoirTransactionnel/illustration/";
            $fichierDestination = $repertoireIllustration . $_FILES['illustration']['name'];
            $fichierSource = $_FILES['illustration']['tmp_name'];
            if(move_uploaded_file($fichierSource,$fichierDestination))
            {
                echo"Image modifier \n";
            }
            $illustration =$_FILES['illustration']['name'];
            $MESSAGE_SQL_MODIFIER_KAYAK = "UPDATE kayak SET titreAnnonce=:titreAnnonce,descriptionAnnonce=:descriptionAnnonce,type=:type,adresse=:adresse,idMembre=:idMembre,cout=:cout,image='$illustration' WHERE id=:id";
        }else{
            $MESSAGE_SQL_MODIFIER_KAYAK = "UPDATE kayak SET titreAnnonce=:titreAnnonce,descriptionAnnonce=:descriptionAnnonce,type=:type,adresse=:adresse,idMembre=:idMembre,cout=:cout WHERE id=:id";
        }
        $requeteModifierKayak = BaseDeDonnee::getConnexion()-> prepare($MESSAGE_SQL_MODIFIER_KAYAK); 
        $requeteModifierKayak->bindParam(':id', $kayak['id'], PDO::PARAM_STR);
        $requeteModifierKayak->bindParam(':titreAnnonce', $kayak['titreAnnonce'], PDO::PARAM_STR);
        $requeteModifierKayak->bindParam(':descriptionAnnonce', $kayak['descriptionAnnonce'], PDO::PARAM_STR);
        $requeteModifierKayak->bindParam(':type', $kayak['type'], PDO::PARAM_STR);
        $requeteModifierKayak->bindParam(':adresse', $kayak['adresse'], PDO::PARAM_STR);
        $requeteModifierKayak->bindParam(':idMembre', $kayak['idMembre'], PDO::PARAM_STR);
        $requeteModifierKayak->bindParam(':cout', $kayak['cout'], PDO::PARAM_STR);
        return $requeteModifierKayak-> execute();
    }
}