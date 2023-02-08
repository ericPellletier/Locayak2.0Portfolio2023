<?php
require_once "configuration.php";
require_once CHEMIN_DAO."MessageDAO.php";


$filtresMessage = array();

$filtresMessage['idUtilisateur'] = FILTER_SANITIZE_STRING;
$filtresMessage['idDestinataire'] = FILTER_SANITIZE_STRING;
$filtresMessage['message'] = FILTER_SANITIZE_STRING;
$filtresMessage['date'] = FILTER_SANITIZE_STRING;
$filtresMessage['idLocation'] = FILTER_SANITIZE_STRING; 

$message= filter_input_array(INPUT_GET, $filtresMessage);

$reussiteAjout = MessageDAO::ajouterMessage($message);

?>