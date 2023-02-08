<?php
  include_once "configuration.php";
  include_once "header.php";
?>
<body>

<section>
        <div class="zone-bienvenue">
          <p><?= _('Bonjour,')?>
          <?= _('Ce site de location de kayak est un projet web transactionnel dont les créateurs sont :')?>
          <?= _('Éric Pelletier')?>
          <?= _('Romain Dubard')?>
          <?= _('Carlos Descamps')?>
          <?= _("Nous sommes des étudiants de 3ème année d'informatique du CEGEP de Matane.")?>
          <?= _('Notre intention est de proposer dans ce projet un site de location de kayak fonctionnel.')?>
          <?= _("Merci d'avoir porté attention à cette page et bonne navigation sur Locayak !")?></p>
        </div>
      </section>
     
  <?php
    include_once "footer.php";
  ?>

 </body>
</html>