<?php
require_once "configuration.php";

require_once CHEMIN_DAO."kayakDAO.php";


$repertoireIllustration = $_SERVER['DOCUMENT_ROOT'] . "/DevoirTransactionnel/images/";
$fichierDestination = $repertoireIllustration . $_FILES['illustration']['name'];

$fichierSource = $_FILES['illustration']['tmp_name'];


move_uploaded_file($fichierSource,$fichierDestination);

$filtresKayak = array();

$filtresKayak['titreAnnonce'] = FILTER_SANITIZE_STRING;
$filtresKayak['descriptionAnnonce'] = FILTER_SANITIZE_STRING;
$filtresKayak['adresse'] = FILTER_SANITIZE_STRING;
$filtresKayak['type'] = FILTER_SANITIZE_STRING;
$filtresKayak['cout'] = FILTER_SANITIZE_NUMBER_INT;
$filtresKayak['illustration'] = FILTER_SANITIZE_NUMBER_INT;
$filtresKayak['idMembre'] = "0";

$kayak= filter_input_array(INPUT_POST, $filtresKayak);

$illustration =$_FILES['illustration']['name'];

$reussiteAjout = kayakDAO::ajouterKayak($kayak,$illustration);

if($reussiteAjout){
    echo "Ajout Reussi";
    echo "</br><a href='liste-kayaks_admin.php'>Retour</a>";
} else{
    echo "Erreur: ".$reussiteAjout;
}
?>