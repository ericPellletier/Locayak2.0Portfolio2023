<?php
require_once "dao/kayakDAO.php";
$listeKayak = kayakDAO::listeKayak();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <title>Page liste kayak admin</title>
</head>

<body>
  
<?php include 'header.php'?>
  <div class="table">
    <?php
    foreach ($listeKayak as $kayak) {
    ?>
      <table class="tb">
        <colgroup>
          <col style="width: 140px">
          <col style="width: 642px">
        </colgroup>
        <tr>
          <th class="tb-text">Titre</th>
          <th class="tb-text"><a href="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['type']; ?></a></th>
        </tr>
        </tr>
      </table>
    <?php
    }
    ?>
  </div>
</body>

</html>