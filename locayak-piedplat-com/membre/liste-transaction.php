<?php
require_once "../configuration.php";
require_once "../administration/header-admin.php";
require_once CHEMIN_DAO."KayakDAO.php";
require_once CHEMIN_DAO."MembreDAO.php";
require_once CHEMIN_DAO."LocationDAO.php";
//Remplacer pour l'id recuperer de la session
$email = $_SESSION['membreEmail'];
$id = $_SESSION["idMembre"];

$listeKayak = KayakDAO::listeKayak();
$listeTransaction = LocationDAO::listeTransaction();
$membre = MembreDAO::recupererMembre($email);

$nomComplet =$membre['nom']." ".$membre['prenom'];

?>

<link rel="stylesheet" href="../css/membre.css?<?php echo time(); ?>">

<section>
  <div id="zone-membre-global">
    <div id="zone-membre-info">
        <a href="membre.php" class="btn btn-secondary"><?= _('Retour à Mon Profil')?></a>
      </div>
    </div>
    <p class="nom"><?= _('Mes Kayaks')?></p>
    <div class="mes-kayak">
    
    <?php
            foreach ($listeTransaction as $transaction)
             {

            if($id == $transaction[1] ||$id == $transaction[2])
            
            {
              $kayak = KayakDAO::selectionnerKayak($transaction[3]);
              // print_r($transaction["dateDebutLocation"]);?>
              <div class="card-page-membre" style="width: 22rem;">
              <h5 class="card-title"><?=$kayak['titreAnnonce']; ?></h5>
              <img class="card-img-top-membre" src="../images/<?= $kayak['image'];?>" alt="Card image cap">
              <div class="card-body">
              <p><?= _('Coût de la transaction est de')?> <?= $kayak['cout'];?> <?= _('$')?> </p>
              <a href="" class=""><?= _('Détails de la Transaction')?></a> </br>
              <a href="chat-membre.php?idLocateur=<?=$transaction[2];?>&kayak=<?=$kayak['id'];?>&idLocation=<?=$transaction[0];?>" class=""><?= _('Aller au Chat')?></a>
            </div>
          </div>
              
             <?php
            }
        }
        ?>
  </div>
  </div>

</section>
</br>

<?php
       include_once "../footer.php";
 ?>

</body>
</html>