<?php
require_once "../dao/KayakDAO.php";

    require_once "header-admin.php";
    $dateActuel= date("Y-m-d");
    $maxChoix = date('Y-m-d', strtotime('+2 month'));
    $maxChoixDebut = date('Y-m-d', strtotime('+1 month'));
    $finMin = date('Y-m-d', strtotime('+2 day'));

?>
<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
<script src="../scripts/jquery-3.6.0.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="../scripts/dates.js?<?php echo time(); ?>"></script>
<title><?= _('Ajouter votre Kayak')?></title>
<body>
<div class="container">
    <form action="traitement_ajouter_kayak.php" method="post" enctype="multipart/form-data">
    <h3><?= _('Votre Kayak')?></h3>
    <h4><?= _('Entre les information de votre Kayak')?></h4>
    <fieldset>
      <label for="titreAnnonce"><?= _('Titre de votre annonce')?></label>
      <input placeholder="<?= _('Titre')?>" id="titreAnnonce" name="titreAnnonce" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="descriptionAnnonce"><?= _('Description de voter annonce')?></label>
      <input placeholder="<?= _('DescriptionAnnonce')?>" id="descriptionAnnonce" name="descriptionAnnonce" type="text" tabindex="1" required >
    </fieldset>
    <fieldset>
      <label for="adresse"><?= _('Votre adresse')?></label>
      <input placeholder="<?= _('Adresse')?>" id="adresse" name="adresse" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="type"><?= _('Taille du Kayak')?></label></br>
      <p><input type="radio" id="type" name="type" value="Petit"><?= _(' Petit')?></p>
      <p><input type="radio" id="type" name="type" value="Moyen"><?= _(' Moyen')?></p>
      <p><input type="radio" id="type" name="type" value="Grand"><?= _(' Grand')?></p>
    </fieldset>
    <fieldset>
      <label for="cout"><?= _('Cout de la location')?></label>
      <input placeholder="<?= _('Cout')?>" id="cout" name="cout" type="number" min="0" step="any" tabindex="3" required>
    </fieldset>
    <fieldset>
      <label for="illustration"><?= _('Illustration')?></label></br>
      <input type="file" id="illustration" name="illustration" required>
    </fieldset>
    
    </br>
    <fieldset>
      <p><?= _('Debut des disponibilité: ')?><input type = "text" onblur="validerDate();" name="dateDebutDisponibiliter" id = "dateDebutDisponibiliter"></p>
      <p><?= _('Fin des disponibilité: ')?><input type = "text" onblur="validerDate();" name="dateFinDisponibiliter" id = "dateFinDisponibiliter"></p>
      </fieldset>
      </br>
    <fieldset>
      <button type="submit" id="envoyer-ajout"><?= _('Terminer')?></button>
    </fieldset>
    
  </form>
</br>
</body> 
</html>