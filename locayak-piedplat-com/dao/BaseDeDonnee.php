<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class BaseDeDonnee{
public static function getConnexion(){
    $usager = 'sqlpied';
    $motdepasse = '$pied123';
    $hote = 'localhost';
    $base = 'kayak_site';
    
    $dsn = 'mysql:dbname='.$base.';host=' . $hote;
    $connexion = new PDO($dsn,$usager,$motdepasse);
    return $connexion;
}
}

?>