<?php
require_once "../configuration.php";
require_once "../administration/header-admin.php";
require_once CHEMIN_DAO."KayakDAO.php";
require_once CHEMIN_DAO."MembreDAO.php";
//Remplacer pour l'id recuperer de la session
$email = $_SESSION['membreEmail'];
$id = $_SESSION["idMembre"];

$listeKayak = KayakDAO::listeKayakPourMembre($id);
$membre = MembreDAO::recupererMembre($email);

$nomComplet =$membre['nom']." ".$membre['prenom'];

?>

<link rel="stylesheet" href="../css/membre.css?<?php echo time(); ?>">

<section>
  <div id="zone-membre-global">
    <div id="zone-membre-info">
      <img src="../images/DefaultProfile.png" alt="Votre image de profile" id="image-profile">
      <div id="zone-membre-text">
        <p class="nom"><?= $nomComplet;?></p>
        <p><?= _('Description : ')?><?= $membre['description'];?></p>
        <p><?= _('Région: ')?><?= $membre['adresse'];?></p>
        <p><?= _('Ma note : ')?><?= $membre['cote'];?><?= _('/10')?> </p>
        <a href="ajouter-kayak.php" class="btn btn-secondary"><?= _('Ajouter un kayak')?></a>
        <a href="liste-transaction.php" class="btn btn-secondary"><?= _('Voir mes transactions')?></a>
        <a href="modifier-membre.php" class="btn btn-secondary"><?= _('Modifier votre utilisateur')?></a>
      </div>
    </div>
    <p class="nom"><?= _('Mes kayaks')?></p>
    <div class="mes-kayak">
    
    <?php
            foreach ($listeKayak as $kayak) {
                //membreDAO::listeMembre();
                //$idMembre = $kayak["idMembre"];
                //print_r($listeMembre);
            ?>
    
    <div class="card-page-membre" style="width: 22rem;">
        <img class="card-img-top-membre" src="../images/<?= $kayak['image'];?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $kayak['titreAnnonce']; ?></h5>
            <p class="card-text"><?= $kayak["descriptionAnnonce"];?></p>
            <a href="../Annonce.php?id=<?php echo $kayak['id']; ?>" class="btn btn-primary2-membre"><?= _('détail')?></a>
        </div>
    </div>
<?php
        }
        ?>
  </div>
  </div>

</section>
</br>

<?php
       include_once "../administration/footer-admin.php";
 ?>

</body>
</html>