<?php
require_once "../configuration.php";
require_once CHEMIN_DAO."KayakDAO.php";

$repertoireIllustration = $_SERVER['DOCUMENT_ROOT'] . "locayak-com/DevoirTransactionnel/images/";
//echo($repertoireIllustration);
$fichierDestination = $repertoireIllustration . $_FILES['illustration']['name'];
//print_r($fichierDestination);

$fichierSource = $_FILES['illustration']['tmp_name'];
//print_r($fichierSource);

move_uploaded_file($fichierSource,$fichierDestination);

$filtresKayak = array();

$filtresKayak['titreAnnonce'] = FILTER_SANITIZE_STRING;
$filtresKayak['descriptionAnnonce'] = FILTER_SANITIZE_STRING;
$filtresKayak['adresse'] = FILTER_SANITIZE_STRING;
$filtresKayak['type'] = FILTER_SANITIZE_STRING;
$filtresKayak['cout'] = FILTER_SANITIZE_STRING; 
$filtresKayak['illustration'] = FILTER_SANITIZE_STRING;
$filtresKayak['dateDebutDisponibiliter'] = FILTER_SANITIZE_STRING;
$filtresKayak['dateFinDisponibiliter'] = FILTER_SANITIZE_STRING;
$filtresKayak['idMembre'] = FILTER_SANITIZE_STRING;

$kayak= filter_input_array(INPUT_POST, $filtresKayak);
//print_r($kayak);
echo "<script>console.log('" . json_encode($kayak) . "');</script>";
$illustration =$_FILES['illustration']['name'];

$reussiteAjout = KayakDAO::ajouterKayak($kayak,$illustration);

if($reussiteAjout){
    //echo "Ajout Reussi";
    echo('<script> location.replace("membre.php"); </script>');
    //header('Location: membre.php');
} else
{
    echo('<script> location.replace("ajouter-kayak.php"); </script>');
    //header('Location: ajouter-kayak.php');
}
?>