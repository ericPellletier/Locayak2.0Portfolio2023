<?php
require_once "configuration.php";
require_once CHEMIN_DAO."KayakDAO.php";
$id= filter_input(INPUT_GET, 'id' , FILTER_VALIDATE_INT);
$reussiteSupp = KayakDAO::supprimerKayak($id);

if($reussiteSupp){
    echo "Suppresion Reussi";
    echo "</br><a href='liste-kayak-admin.php'>Retour</a>";
} else{
    echo "Erreur: ".$reussiteSupp;
}
?>