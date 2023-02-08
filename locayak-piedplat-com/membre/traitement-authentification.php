<?php
require_once "configuration.php";
require_once CHEMIN_DAO."MembreDAO.php";
$filtreIdMembre = array();

$filtreIdMembre['mail'] = FILTER_VALIDATE_EMAIL;
$filtreIdMembre['motDePasse'] = FILTER_SANITIZE_STRING;

$infoIdMembre = filter_input_array(INPUT_POST, $filtreIdMembre);

$validationIdMembre = MembreDAO::validerIdentificationMembre($infoIdMembre);

if(!$validationIdMembre)
{
    echo "Votre identhification n'a pas réussi";
}

if($validationIdMembre)
{
    $sessionMail = $infoIdMembre['mail'];
    
    $membreRecuperer = MembreDAO::recupererMembre($sessionMail);
    
    $_SESSION['membreEmail'] = $membreRecuperer['email'];
    $_SESSION['idMembre'] = $membreRecuperer['id'];
 
    echo('<script> location.replace("membre.php"); </script>');
    //echo(header('Location: membre.php'));
   // header('Location: membre.php');
    //echo "BIENVENUE PARMI NOUS' OUBLIER PAS D'INCRIRE VOS KAYAKS SI VOUS VOULEZ EN LOUER!";
}

