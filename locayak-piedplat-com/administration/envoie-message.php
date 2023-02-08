<?php
require_once "configuration.php";
require_once CHEMIN_DAO."chatDAO.php";

$filtresMessage = array();
$filtresMessage['idLocation'] = FILTER_SANITIZE_STRING;
$filtresMessage['date'] = FILTER_SANITIZE_STRING;
$filtresMessage['message'] = FILTER_SANITIZE_STRING;


$message = filter_input_array(INPUT_GET, $filtresMessage);
$reussiteAjout = ajouterCommentaire($message);

if ($reussiteAjout) {
    return $message["idDestinataire"];
    //header("Location: ../film.php?id=" . $com["idFilm"]);
} else {
    echo "Erreur: " . $reussiteAjout;
}
