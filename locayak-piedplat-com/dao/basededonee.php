<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function getConnexion()
{
    $usager = 'sqlpied';
    $motdepasse = '$pied123';
    $hote = 'localhost';
    $base = 'kayak_site';

    $dsn = 'mysql:dbname=' . $base . ';host=' . $hote;
    $connexion = new PDO($dsn, $usager, $motdepasse);
    // print_r($connexion);
    return $connexion;
}
?>