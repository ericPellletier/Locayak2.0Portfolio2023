<?php
require_once "../configuration.php";
require_once CHEMIN_DAO."MembreDAO.php";
require_once "../administration/header-admin.php";
$email = $_SESSION['membreEmail'];
$membre = MembreDAO::recupererMembre($email);
?>
<title><?= _('Modifier votre prénom')?></title>
<body>
<div class="container">
    <form action="traitement-modifier-utilisateur.php" method="post" enctype="multipart/form-data">
    <h4><?= _('Changer vos informations')?></h4>
    <fieldset>
      <label for="prenom"></label>
      <input placeholder="<?= _('prenom')?>" id="prenom" name="prenom" type="text" tabindex="1" value="<?=$membre["prenom"]?>"required autofocus>
    </fieldset>
    
    <button type="submit" id="envoyer-ajout"><?= _('Modifier votre nom')?></button>
  </form>
</br>
</body> 
</html>