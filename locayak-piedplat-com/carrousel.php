<?php
    require_once "configuration.php";
    require_once CHEMIN_DAO."KayakDAO.php";
    $imageId = filter_var($_GET['imageId'], FILTER_SANITIZE_STRING);
    $imageRecu = KayakDAO::recupererImagePourIdsuivant($imageId);
    $image = $imageRecu['image'];
    $idImage = $imageRecu['id'];
    //$array = [$imageRecu];
    
    //echo $image;
    echo json_encode(["id"=> $idImage,"image"=> $image]);
    //print_r($imageRecu);

    
    