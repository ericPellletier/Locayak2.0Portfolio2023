<?php
require_once "../configuration.php";
include_once "../administration/header-admin.php";
?>

<title><?= _('Inscription')?></title>
<div class="formulaireInscription">
<form action="traitement-inscription.php" method="post">
  <label for="nom"><?= _('Nom*:')?></label><br>
  <input type="text" id="nom" name="nom" placeholder="<?= _('Nom')?>" required ><br>
  
  <label for="prenom"><?= _('Prénom*:')?></label><br>
  <input type="text" id="prenom" name="prenom" placeholder="<?= _('Prénom')?>" required ><br><br>
  
  <label for="mail"><?= _('E-mail*:')?></label><br>
  <input type="email" id="mail" name="mail" placeholder="<?= _('exemple@gmail.com')?>" required ><br><br>
  
  <label for="motDePasse"><?= _('Mot de passe*:')?></label><br>
  <input type="password" id="motDePasse" name="motDePasse" placeholder="<?= _('mot de passe')?>" required><br><br>
  
  <label for="confirmationMDP"><?= _('Confirmez mot de passe*:')?></label><br>
  <input type="password" id="confirmationMDP" name="confirmationMDP" placeholder="<?= _('mot de passe')?>" required><br><br>

  <label for="telephone"><?= _('Numéro de téléphone:')?></label><br>
  <input type="tel" id="telephone" name="telephone" placeholder="<?= _('1 123 456-7898')?>"><br>

  <label for="adresse"><?= _('Adresse*:')?></label><br>
  <input type="text" id="adresse" name="adresse" placeholder="<?= _('adresse')?>" required ><br><br>

  <input type="submit" value="<?= _('Inscription')?>">
</form> 
</div>

<?php
    include_once "../administration/header-admin.php";
?>
</body>
</html>