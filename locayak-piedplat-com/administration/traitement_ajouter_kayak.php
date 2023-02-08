<?php
require_once "../configuration.php";
require_once CHEMIN_DAO."KayakDAO.php";


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
$filtresKayak['illustration'] = FILTER_SANITIZE_STRING;
$filtresKayak['dateDebutDisponibiliter'] = FILTER_SANITIZE_STRING;
$filtresKayak['dateFinDisponibiliter'] = FILTER_SANITIZE_STRING;

$filtresKayak['idMembre'] = "0";

$kayak= filter_input_array(INPUT_POST, $filtresKayak);
print_r($_POST);
echo "<script>console.log('" . json_encode($kayak) . "');</script>";
$illustration =$_FILES['illustration']['name'];

$reussiteAjout = KayakDAO::ajouterKayak($kayak,$illustration);

if($reussiteAjout){
    echo "Ajout Reussi";
    ?><a href='liste-kayak-admin.php'>Retour</a><?php
} else{
    echo "Erreur: ".$reussiteAjout;
}
?>