<?php
require_once "dao/kayakDAO.php";
require_once "header.php";
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
$kayak = kayakDAO::selectionnerKayak($id);
?>

<title>Annonce</title>

  <div class="kayak">
        
    <h1 class="nom" href ="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['titreAnnonce']; ?><a title="" ></a></h1>
    <div class="image" ><img src="images/<?= $kayak['image'];?>" /></div>
    <div class="description"><?= $kayak["descriptionAnnonce"];?></div>
    <div class="proprietaire" href =>Propriétaire : Jean Michel</div>
    <div class="cote" href=>Cote propriétaire : *****</div>
    <div class="prix" href =>Prix/jours : 150 CA$/jours</div>
    <div class="vacant" href=>Vacant ? OUI </div>
    <div class="region" href=>Région : Matanie</div>
    <div class="renseignement" href ="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['adresse']; ?></div>
    <div class="reservation" href=>
    <input type="date" name="reservationDebut">
    <input type="date" name="reservationFin">
    <button onclick= >Reservation</button>
    </div>
  </div>
<div>
<?php
    include_once "footer.php";
?>
</div>
 </body>
</html>
