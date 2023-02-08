<?php
require_once "../dao/kayakDAO.php";
require_once "header-admin.php";

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
$kayak = kayakDAO::selectionnerKayak($id);
?>

<title>Modifier votre Kayak</title>
<body>
<div class="container">
    <form action="traitement_modifier_kayak.php" method="post" enctype="multipart/form-data">
    <h3>Votre Kayak</h3>
    <h4>Entre les information de votre Kayak</h4>
    <fieldset>
      <input placeholder="ID" id="id" name="id" type="hidden" tabindex="1" value= "<?=$kayak["id"]?>">
    </fieldset>
    <fieldset>
      <label for="titre">Titre de votre annonce</label>
      <input placeholder="Titre" id="titreAnnonce" name="titreAnnonce" type="text" tabindex="1" value= "<?=$kayak["titreAnnonce"]?>" required autofocus>
    </fieldset>
    <fieldset>
      <label for="descriptionAnnonce">Description de voter annonce</label>
      <input placeholder="DescriptionAnnonce" id="descriptionAnnonce" name="descriptionAnnonce" type="text" tabindex="1" value= "<?=$kayak["descriptionAnnonce"]?>"required >
    </fieldset>
    <fieldset>
      <label for="adresse">Votre adresse</label>
      <input placeholder="Adresse" id="adresse" name="adresse" type="text" tabindex="1" value= "<?=$kayak["adresse"]?>" required autofocus>
    </fieldset>
    <fieldset>
        <label for="type">Taille du Kayak</label></br>
        <?php 
        if($kayak['type'] == "Grand"){
          echo '<input checked type="radio" id="type" name="type" value="Grand"> Grand <br>';
        }else{
          echo '<input type="radio" id="type" name="type" value="Grand"> Grand<br>';
        }
        if($kayak['type'] == "Moyen"){
          echo '<input checked type="radio" id="type"  name="type" value="Moyen"> Moyen<br>';
        }else{
          echo '<input type="radio" id="type"  name="type" value="Moyen"> Moyen<br>';
        }
        if($kayak['type'] == "Petit"){
          echo '<input checked type="radio" id="type"  name="type" value="Petit"> Petit';
        }else{
          echo '<input type="radio" id="type"  name="type" value="Petit"> Petit';
        }
        ?>
      </fieldset>
    <fieldset>
      <label for="cout">Cout de la location</label>
      <input placeholder="Cout" id="cout" name="cout" type="number" min="0" step="any" tabindex="3"value= "<?=$kayak["cout"]?>" required>
    </fieldset>
    <fieldset>
      <label for="illustration">Illustration</label></br>
      <input type="file" id="illustration" name="illustration">
    </fieldset>
    <fieldset>
      <button type="submit" id="envoyer-ajout">Terminer</button>
    </fieldset>
  </form>
</body>

</html>