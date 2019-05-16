<?php

session_start();



require_once "../config.php";



/*

include_once '../core/commentaireC.php';
include_once '../Entities/commentaire.php';


if(empty($_SESSION['cin'])) {

                header('Location: signin.php');

  }

  if(!empty($_SESSION['cin'])) {
    $commc = new commentaireC();
      
    $comm = new commentaire($_SESSION['prenom'],$_GET['commentaire']);



    $commc->ajouterCommentaire($comm);



}

    $list=$commc->listeCommentaires();

*/

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


 if(!empty($_SESSION['cin'])) {
 	
      if(isset($_GET['commentaire']) AND !empty($_GET['commentaire'])) {
        
         $pseudo = $_SESSION['prenom'];
         $commentaire = $_GET['commentaire'];
         	        	$bdd = config::getConnexion();

            $ins = $bdd->prepare('INSERT INTO commentaires (pseudo, commentaire) VALUES (?,?)');
            $ins->execute(array($pseudo,$commentaire));
            $c_msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
          
      } else {
         $c_msg = "Erreur: Tous les champs doivent être complétés";
      }

      header('Location: afficherCommentaires.php');
   }

/*

 $bdd = config::getConnexion();


					$commentaires = $bdd->prepare('SELECT pseudo, commentaire FROM commentaires ORDER BY id DESC');
					$commentaires->execute();
*/

?>

