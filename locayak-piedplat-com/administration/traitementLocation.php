<?php
require_once "configuration.php";
require_once CHEMIN_DAO."LocationDAO.php";

$filtresKayak = array();
$filtresKayak['idClient'] = FILTER_SANITIZE_STRING;
$filtresKayak['idLocateur'] = FILTER_SANITIZE_STRING;
$filtresKayak['idKayak'] = FILTER_SANITIZE_NUMBER_INT;
$filtresKayak['dateTransac'] = FILTER_SANITIZE_STRING;
$filtresKayak['dateDebutLocation'] = FILTER_SANITIZE_STRING;
$filtresKayak['dateFinLocation'] = FILTER_SANITIZE_STRING;

$informationLocation= filter_input_array(INPUT_GET, $filtresKayak);

print_r($informationLocation);
$reussiteAjout = LocationDAO::ajouterLocation($informationLocation);
if($reussiteAjout){
   
    echo "Ajout Reussi";
    header("Location: ../membre/membre.php");
    die();

} else{
    echo "Erreur: ".$reussiteAjout;
}
?>