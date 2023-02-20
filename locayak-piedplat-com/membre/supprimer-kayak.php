<?php
require_once "../configuration.php";
require_once "../administration/header-admin.php";
require_once CHEMIN_DAO."KayakDAO.php";
require_once CHEMIN_DAO."MembreDAO.php";
//print_r($_GET);
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
if(isset($_SESSION['idMembre']))
{
  $membrePresent = $_SESSION['idMembre'];
}

//$email = ;
$kayak = KayakDAO::selectionnerKayak($id);
$membre = MembreDAO::recupererMembre($kayak['idMembre']);
//print_r($_GET);
print_r($kayak['idMembre']);
?>

<title><?= _('Annonce')?></title>

  <div class="kayak">
        
      <h1 class="info-titre" href ="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['titreAnnonce']; ?><a title="" ></a></h1>
      <img class= "image" src="images/<?= $kayak['image'];?>" />
      <h2 class="info-titre">VOULEZ-VOUS VRAIMENT SUPPRIMER CE KAYAK?</h2>
      <form action="ConfirmationAnnonce.php" method="post">
        <input type="hidden" name="idKayak" value=<?= $kayak['id'] ?>>

        <div class="choix-kayak" >
            <?php 
                if(isset($_SESSION['idMembre']))
                {
                  if($membrePresent == $kayak['idMembre'])
                  {
                    ?>
                        <a href="membre.php"  class="btn btn-secondary center"><?= _('RETOUR À LA PAGE MEMBRE')?></a>
                        <a href="traitement-supprimer-kayak.php"  class="btn btn-secondary center"><?= _('SUPPRESSION')?></a>
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
