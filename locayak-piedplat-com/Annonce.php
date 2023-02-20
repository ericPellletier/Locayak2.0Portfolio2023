<?php
require_once "configuration.php";
require_once CHEMIN_DAO."KayakDAO.php";
require_once CHEMIN_DAO."MembreDAO.php";
require_once "header.php";
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
if(isset($_SESSION['idMembre']))
{
  $membrePresent = $_SESSION['idMembre'];
  /*print_r($membrePresent);
  print_r("::______::");
  print_r($_SESSION['membreEmail']);
  print_r("::______::");
  */
}

//$email = ;
$kayak = KayakDAO::selectionnerKayak($id);
$membre = MembreDAO::recupererMembre($kayak['idMembre']);
//print_r($_GET);
//print_r($kayak['idMembre']);
?>

<title><?= _('Annonce')?></title>

  <div class="kayak">
        
      <h1 class="info-titre" href ="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['titreAnnonce']; ?><a title="" ></a></h1>
      <img id="monImage" class= "image" src="images/<?= $kayak['image'];?>" />
      <div class="info-kayak"><?= $kayak["descriptionAnnonce"];?></div>
      <div class="info-kayak" href =><?= _('Propriétaire : ')?><?php echo $membre['prenom'] ?> <?php echo $membre['nom'] ?></div>
      <div class="info-kayak" href=><?= _('Cote propriétaire : ')?><?php echo $membre['cote'] ?><?= _('/10')?></div>
      <div class="info-kayak" href =><?= _('Prix/jours : ')?><?php echo $kayak['cout'] ?><?= _('$/jours')?></div>
      <div class="info-kayak" href=><?= _('Vacant ?')?> <?= _('OUI')?></div>
      <div class="info-kayak" href=><?= _('Région :')?><?= _('Matanie')?></div>
      <div class="info-kayak" href ="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['adresse']; ?></div>
      <form action="ConfirmationAnnonce.php" method="post">
        <input type="hidden" name="idKayak" value=<?= $kayak['id'] ?>>

        <div class="choix-kayak" >
            <?php 
                if(isset($_SESSION['idMembre']))
                {
                  if($membrePresent == $kayak['idMembre'])
                  {
                    ?>
                        <a href="membre/modifier-kayak.php?id=<?php echo $kayak['id']; ?>"  class="btn btn-secondary center"><?= _('Modifier ce Kayak')?></a>
                        <a href="membre/supprimer-kayak.php?id=<?php echo $kayak['id']; ?>"  class="btn btn-secondary center"><?= _('Supprimer ce Kayak')?></a>
                      <?php 
                  }
                  else if($membrePresent != $membre['id'])
                  {
                    ?><button type="submit" id="envoyer-ajout" class="btn btn-secondary"><?= _('Louer ce Kayak')?></button><?php
                  }?>
            <?php
                }
            ?>
          </div>
      </form>
  </div>
//*balise popup
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="imgZoom" src="images/<?= $kayak['image'];?>">
  <div id="caption"></div>
</div>    

<script src="scripts/zoomImage.js"></script>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  
<?php
    include_once "footer.php";
?>
</div>
 </body>
</html>
