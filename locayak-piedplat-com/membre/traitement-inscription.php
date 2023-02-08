<?php

require_once "configuration.php";

require_once CHEMIN_DAO."MembreDAO.php";

$filtresMembre = array();

$filtresMembre['nom'] = FILTER_SANITIZE_STRING;
$filtresMembre['prenom'] = FILTER_SANITIZE_STRING;
$filtresMembre['telephone'] = FILTER_SANITIZE_STRING;
$filtresMembre['motDePasse'] = FILTER_SANITIZE_STRING;
$filtresMembre['adresse'] = FILTER_SANITIZE_STRING;
$filtresMembre['mail'] = FILTER_VALIDATE_EMAIL;

$informationMembre = filter_input_array(INPUT_POST, $filtresMembre);

$motPasse1 = $_POST['motDePasse'];
$motPasse2 = $_POST['confirmationMDP'];
//print_r($motPasse1);
//print_r($motPasse2);

$validePasseEmail = MembreDAO::validerEmailPasse($informationMembre["mail"], $motPasse1, $motPasse2);

if($validePasseEmail)
{  
    $mdpHache = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);
    //print_r($mdpHache);

    $informationMembre['motDePasse'] = $mdpHache;

    //print_r(" voici la variable hâchée: ".$informationMembre['passe']);
    $reussiteAjoutMembre = MembreDAO::ajouterMembre($informationMembre);

    if($reussiteAjoutMembre)
    {
        echo('<script> location.replace("formulaire-authentification.php"); </script>');
        //header('Location: formulaire-authentification.php');
        echo "BIENVENUE PARMI NOUS' OUBLIER PAS D'INCRIRE VOS KAYAKS SI VOUS VOULEZ EN LOUER!";
    }
    else
    {
        echo "Erreur: il a eu un problème... -> ".$reussiteAjoutMembre;
    }
    
}
else
{
    echo('<script> location.replace("inscription.php"); </script>');
    //header('Location: inscription.php');
    echo 'Il y a un problème avec le mot de passe ou avec le Pseudo, veuiller recommencer svp.';
}

?>

