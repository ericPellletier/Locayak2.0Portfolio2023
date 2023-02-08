<?php
require_once "../dao/KayakDAO.php";
$listeKayak = KayakDAO::listeKayak();
require_once "header-admin.php";
?>
  
    <body>

        
            <a href="AjouterKayak.php">Ajouter</a>

            <?php
            foreach ($listeKayak as $kayak) {
            ?>
            
            <div class="kayak">
                    
                <a href=""><h3 class="nom" href ="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['titreAnnonce']; ?><a title="" ></a></h3></a>
                
                <div class="image" ><img src="../images/<?= $kayak['image'];?>" /></div>
                
                <p class="descriptionAnnonce"><?= _('description annonce')?></p>
                
                <div class="renseignementLieu" href ="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['adresse']; ?></div>
                
                <div class="renseignementPropriétaire"><?= _('renseignement propriétaire')?></div>

                <div class="type" href="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['type']; ?></div>
                
                <a href="modifierKayak.php?id=<?=$kayak['id']?>"><?= _('Modifier')?></a>
            
                <a href="traitement_supprimer_kayak.php?id=<?=$kayak['id']?>"><?= _('Supprimer')?></a>

            </div>
        </div>
        <?php
        }
        ?>
    </body>
</html>