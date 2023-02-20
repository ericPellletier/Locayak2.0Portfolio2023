<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= _('Acceuil')?></title>
  <script></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css?<?php echo time(); ?>" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/menu.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="css/acceuil.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="css/page-liste.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="css/stylesheet.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="css/page-annonce.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="css/stylesheet-chatbox.css?<?php echo time(); ?>">
</head>

<body>
    <div class="header">
        <h1><a class="logo" href="index.php"><?= _('LoCayak')?></a></h1>
      <button  name=”Salut” value=””Salut”” id="changerLangue">EN</button>

      </div>
    <a  class="hamburger" href="javascript:void(0);" class="icon" onclick="ouvrirLeMenu()">
      <i class="fa fa-bars"></i>
    </a>


    <ul id = "mesLiens">
      <li><a href="index.php"><?= _('ACCUEIL') ?></a></li>
      <li><a href="liste-kayaks-v-deux.php"><?= _('EN LOCATION')?></a></li>
      <?php
          if(isset($_SESSION["idMembre"]))
          { 
            ?>
            <li><a href='membre/membre.php'><?= _('MON COMPTE')?></a></li>
            <li><a href='membre/traitement-deconnexion.php'><?= _('DÉCONNEXION')?></a></li>
            <?php
          }
          else
          {
            ?>
            <li><a href='membre/formulaire-authentification.php'><?= _('IDENTIFIEZ VOUS')?></a></li>
            <li><a href=''><?= _('AUCUNE INSCRIPTION AUTORISÉ DÉSOLÉ')?></a></li>
            <?php
          }
      ?>
      <li><a href="Projet.php"><?= _('À PROPOS')?></a></li>
      <li><a href="#"><?= _('MESSAGERIE') ?></a></li>
    </ul> 
  <script src="scripts/menu.js"></script>
  <script src="scripts/changerLangues.js"></script>
  
</body>
