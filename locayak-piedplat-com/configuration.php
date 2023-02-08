<?php
// Permet d'avoir un lien permanant avec les different chemin du projet 
session_start();
define("CHEMIN_DAO",$_SERVER['DOCUMENT_ROOT']."/dao/");
if($_COOKIE["lang"] == ""){
    setcookie("lang", "EN", time()+30*24*60*60);
    echo $_COOKIE["lang"];
  }
//TRADUCTION


$localeEn = "en_CA.utf8"; //$locale="en_CA;
$localeFr = "fr_CA.utf8"; //$locale="fr_CA;

$racine = "var/www/locayak-piedplat-com/poc/traduction/locales";
$domaine = "messages";
$langue;
switch ($_COOKIE["lang"]) {
    case 'FR':
        $langue = $localeFr;
        break;
    case 'EN':
        $langue = $localeEn;
        break;
    default:
        # code...
        break;
}
    //include "gettext.inc";
//putenv('LC_ALL='.$localeEn);
putenv('LANG='.$langue);
//T_setlocale(LC_MESSAGES, $locale);
setlocale(LC_MESSAGES, $langue);

//setcookie('language', $_COOKIE['language']);

bindtextdomain($domaine,$racine);
textdomain($domaine);

?>