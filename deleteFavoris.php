

<?php
include_once '../core/favorisC.php';
include_once '../Entities/favoris.php';


  if(!empty($_GET['id'])) {


    $favorisc = new favorisC();
    $favorisc->supprimerFavoris($_GET['id']);

      header('Location:addfavoris.php');
}

        ?>
