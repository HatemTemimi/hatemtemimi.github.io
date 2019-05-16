
<?php



session_start();
require_once "../config.php";



  if(!empty($_SESSION['cin'])) {


     $c = config::getConnexion();
          $stmt = $c->prepare("DELETE FROM commentaires WHERE id= :id ");

          $id=$_GET['id'];
          $stmt->bindValue(':id', $id);

          $stmt->execute();

      header('Location: afficherCommentaires.php');
}

        ?>
