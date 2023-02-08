<?php
require_once "../configuration.php";
require_once "../administration/header-admin.php";
require_once CHEMIN_DAO."KayakDAO.php";
require_once CHEMIN_DAO."MembreDAO.php";
require_once CHEMIN_DAO."LocationDAO.php";
//Remplacer pour l'id recuperer de la session
$email = $_SESSION['membreEmail'];
$id = $_SESSION["idMembre"];
$idLocateur = $_GET['idLocateur'];
$idKayak = $_GET['kayak'];
$idLocation = $_GET['idLocation'];


$membre = MembreDAO::recupererMembre($email);

$nomComplet =$membre['nom']." ".$membre['prenom'];

?>

<link rel="stylesheet" href="../css/membre.css?<?php echo time(); ?>">
<div class="informationsBox">
</div>
<div class="chat" id="chat">
</div>

<div class="messageBox">
<form action="#" method="POST" id="formulaireEnvoie">
      <input type="text" class="idLocateur" id="idLocateur"  hidden value="<?=$idLocateur;?>">
      <input type="text" class="idUtilisateur" id="idUtilisateur" hidden value="<?=$id;?>">
      <input type="text" class="idLocation" id="idLocation" hidden value="<?=$idLocation;?>">
      <input type="text" class="messageInput" id="messageInput" >
      <input type="submit" value="<?=_('Envoyer')?>">
</form>
</div>


</br>
<script type="text/javascript" src="../lib/Ajax.js"></script>
<script type="text/javascript" src="../scripts/chat.js"></script>
<script>
    afficherNouveauxMessage(<?= $idLocation ?>);
    setInterval(function() {
      afficherNouveauxMessage(<?= $idLocation ?>);
    }, 900)
</script>
<?php
       include_once "../administration/footer-admin.php";
?>
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

</body>
</html>