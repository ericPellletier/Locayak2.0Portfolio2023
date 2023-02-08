<?php
require_once "../configuration.php";
require_once CHEMIN_DAO."KayakDAO.php";
require_once "../administration/header-admin.php";
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
    <form action="traitement-ajouter-kayak.php" method="post" enctype="multipart/form-data">
    <h3><?= _('Votre Kayak')?></h3>
    <h4><?= _('Entrez les information de votre Kayak')?></h4>
    <fieldset>
      <label for="titreAnnonce"></label>
      <input placeholder="<?= _('Titre de votre annonce')?>" id="titreAnnonce" name="titreAnnonce" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="descriptionAnnonce"></label>
      <textarea placeholder="<?= _('Description de votre annonce')?>" id="descriptionAnnonce" name="descriptionAnnonce" type="textarea" tabindex="1" required ></textarea>
    </fieldset>
    <fieldset>
      <label for="adresse"></label>
      <input placeholder="<?= _('Votre adresse')?>" id="adresse" name="adresse" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="idMembre"></label>
      <input id="idMembre" name="idMembre" type="hidden" value=<?= $_SESSION['idMembre'] ?> tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label for="type"><?= _('Taille du Kayak')?></label></br>
      <input type="radio" id="type" name="type" value="Petit"><?= _(' Petit')?><br>
      <input type="radio" id="type" name="type" value="Moyen"><?= _(' Moyen')?><br>
      <input type="radio" id="type" name="type" value="Grand"><?= _(' Grand')?>
    </fieldset>
    <fieldset>
      <label for="cout"></label>
      <input placeholder="<?= _('Coût de la location')?>" id="cout" name="cout" type="number" min="0" step="any" tabindex="3" required>
    </fieldset>
    <fieldset>
      <label for="illustration"><?= _('Illustration')?></label></br>
      <input type="file" id="illustration" name="illustration" required>
    </fieldset>
    
    </br>
    <fieldset>
      <p><?= _('Début des disponibilités: ')?><input type = "text" onblur="validerDate();" name="dateDebutDisponibiliter" id = "dateDebutDisponibiliter"></p>
      <p><?= _('Fin des disponibilités: ')?><input type = "text" onblur="validerDate();" name="dateFinDisponibiliter" id = "dateFinDisponibiliter"></p>
      </fieldset>
      </br>
    <fieldset>
        <?php
             if(isset($_SESSION["idMembre"]))
             {
                ?><button type="submit" id="envoyer-ajout"><?= _('Enregistrer le Kayak')?></button><?php
             }
        ?>
      
    </fieldset>
  </form>
  <?=
  include_once "../administration/footer-admin.php"; 
  ?>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</body> 
</html>