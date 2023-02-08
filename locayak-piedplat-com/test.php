<?php
require_once "dao/KayakDAO.php";
$listeKayak = KayakDAO::listeKayak();

?>
<?php
require_once "css/header.php";
?>


<body>

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