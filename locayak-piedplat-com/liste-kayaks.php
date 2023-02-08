<?php

require_once "dao/KayakDAO.php";
$listeKayak = KayakDAO::listeKayak();

require_once "header.php";
?>
       

        
        <div class="liste-kayak">

            <?php
            foreach ($listeKayak as $kayak) {
                //membreDAO::listeMembre();
                //$idMembre = $kayak["idMembre"];
                //print_r($listeMembre);
            ?>
            
            <div class="kayak">
                    
                <h3 class="nom" href ="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['titreAnnonce']; ?><a title="" ></a></h3>
                
                <img class="image" src="images/<?= $kayak['image'];?>" />
                <div class="resume"><?= $kayak["descriptionAnnonce"];?></div>
                <div class="renseignement" href ="voir-membre.php?id=<?= $kayak['idMembre'] ?>"><?php ?></div>
                <div class="renseignement" href ="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['adresse']; ?></div>
                <div class="type" href="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['type']; ?></div>
                <div><a href="Annonce.php?id=<?php echo $kayak['id']; ?>" title=""><?= _('Cliquer pour plus de détail')?></a></div>
            </div>
        </div>
        <?php
        }
        include_once "footer.php";
     
        ?>


    </body>


</html>



