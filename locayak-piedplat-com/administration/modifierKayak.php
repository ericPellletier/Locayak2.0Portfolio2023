<?php
require_once "../dao/KayakDAO.php";
require_once "header-admin.php";

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
$kayak = KayakDAO::selectionnerKayak($id);
?>

<title><?= _('Modifier votre Kayak')?></title>
<body>
<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
<script src="../scripts/jquery-3.6.0.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="../scripts/dates.js?<?php echo time(); ?>"></script>
<div class="container">
    <form action="traitement_modifier_kayak.php" method="post" enctype="multipart/form-data">
    <h3><?= _('Votre Kayak')?></h3>
    <h4><?= _('Entre les information de votre Kayak')?></h4>
    <fieldset>
      <input placeholder="<?= _('ID')?>" id="id" name="id" type="hidden" tabindex="1" value= "<?=$kayak["id"]?>">
    </fieldset>
    <fieldset>
      <label for="titre"><?= _('Titre de votre annonce')?></label>
      <input placeholder="<?= _('Titre')?>" id="titreAnnonce" name="titreAnnonce" type="text" tabindex="1" value= "<?=$kayak["titreAnnonce"]?>" required autofocus>
    </fieldset>
    <fieldset>
      <label for="descriptionAnnonce"><?= _('Description de voter annonce')?></label>
      <input placeholder="<?= _('DescriptionAnnonce')?>" id="descriptionAnnonce" name="descriptionAnnonce" type="text" tabindex="1" value= "<?=$kayak["descriptionAnnonce"]?>"required >
    </fieldset>
    <fieldset>
      <label for="adresse"><?= _('Votre adresse')?></label>
      <input placeholder="<?= _('Adresse')?>" id="adresse" name="adresse" type="text" tabindex="1" value= "<?=$kayak["adresse"]?>" required autofocus>
    </fieldset>
    <fieldset>
        <label for="type"><?= _('Taille du Kayak')?></label></br>
        <?php 
        if($kayak['type'] == "Grand"){
          ?>
          <p><input checked type="radio" id="type" name="type" value="<?= _('Grand')?>"><?= _(' Grand')?></p>
          <?php
        }else{
          ?>
          <p><input type="radio" id="type" name="type" value="<?= _('Grand')?>"><?= _(' Grand')?></p>
          <?php
        }
        if($kayak['type'] == "Moyen"){
          ?>
          <p><input checked type="radio" id="type"  name="type" value="<?= _('Moyen')?>"><?= _(' Moyen')?></p>
          <?php
        }else{
          ?>
          <p><input type="radio" id="type"  name="type" value="<?= _('Moyen')?>"><?= _(' Moyen')?></p>
          <?php
        }
        if($kayak['type'] == "Petit"){
          ?>
          <p><input checked type="radio" id="type"  name="type" value="<?= _('Petit')?>"><?= _(' Petit')?></p>
          <?php
        }else{
          ?>
          <p><input type="radio" id="type"  name="type" value="<?= _('Petit')?>"><?= _(' Petit')?></p>
        <?php
        }
        ?>
      </fieldset>
    <fieldset>
      <label for="cout"><?= _('Cout de la location')?></label>
      <input placeholder="<?= _('Cout')?>" id="cout" name="cout" type="number" min="0" step="any" tabindex="3"value= "<?=$kayak["cout"]?>" required>
    </fieldset>
    <fieldset>
      <label for="illustration"><?= _('Illustration')?></label></br>
      <input type="file" id="illustration" name="illustration">
    </fieldset>
    <fieldset>
      <p><?= _('Debut des disponibilité: ')?><input type = "text" onblur="validerDate();" id = "dateDebutDisponibiliter"></p>
      <p><?= _('Fin des disponibilité: ')?><input type = "text" onblur="validerDate();" id = "dateFinDisponibiliter"></p>
      </fieldset>
      </br>
    <fieldset>
    <fieldset>
      <button type="submit" id="envoyer-ajout"><?= _('Terminer')?></button>
    </fieldset>
  </form>
</body>

</html>