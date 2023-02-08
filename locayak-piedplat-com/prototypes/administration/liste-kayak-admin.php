<?php
require_once "../dao/kayakDAO.php";
$listeKayak = kayakDAO::listeKayak();
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
                
                <p class="descriptionAnnonce">description annonce</p>
                
                <div class="renseignementLieu" href ="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['adresse']; ?></div>
                
                <div class="renseignementPropriétaire">renseignement propriétaire</div>

                <div class="type" href="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['type']; ?></div>
                
                <a href="modifierKayak.php?id=<?=$kayak['id']?>">Modifier</a>
            
                <button class="boutonSupprimer"
                    type="button">
                    Supprimer
                </button>

            </div>
        </div>
        <?php
        }
        ?>
    </body>
</html>