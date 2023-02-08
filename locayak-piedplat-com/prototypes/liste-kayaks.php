<?php

require_once "dao/kayakDAO.php";
$listeKayak = kayakDAO::listeKayak();


?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LoCayak</title>
        <link rel="stylesheet" href="css/stylesheet.css">
        <link rel="stylesheet" href="css/page-liste.css">
    </head>
    
    <body>
        <div class="header">
            <h1>LoCayak</h1>
            <ul id = "mesLiens">
                <li><a href="#">Acceuil</a></li>
                <li><a href="#">Location</a></li>
                <li><a href="#">Membre</a></li>
                <li><a href="#">A propos</a></li>
                <li><a href="#">Messagerie</a></li>
            </ul>
        </div>
        
        <div class="liste-kayak">

            <?php
            foreach ($listeKayak as $kayak) {

                $listeMembre = kayakDAO::listeMembre();
                $idMembre = $kayak["idMembre"];
                print_r($listeMembre);
            ?>
            
            <div class="kayak">
                    
                <h3 class="nom" href ="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['titreAnnonce']; ?><a title="" ></a></h3>
                
                <div class="image" ><img src="images/<?= $kayak['image'];?>" /></div>
                <div class="resume"><?= $kayak["descriptionAnnonce"];?></div>
                <div class="renseignement" href ="voir-membre.php?id=<?= $kayak['idMembre'] ?>"><?php ?></div>
                <div class="renseignement" href ="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['adresse']; ?></div>
                <div class="type" href="kayak.php?id=<?= $kayak['id'] ?>"><?= $kayak['type']; ?></div>
                <div><a href="voir-kayak.php?kayak=<?php echo $kayak['id']; ?>" title="">Cliquer pour plus de détail</a></div>
            </div>
        </div>
        <?php
        }
        ?>
    </body>
</html>

