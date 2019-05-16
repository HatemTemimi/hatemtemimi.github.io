<?php

require_once "../config.php";

session_start();

if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'] )) {
	$tailleMax = 2097152; //limite de 2 megaoctet pour le file
	$extensionValides = array('jpg','jpeg', 'gif', 'png' );
	
	if($_FILES['avatar']['size'] <= $tailleMax) {
		$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'), 1));

		if(in_array($extensionUpload,$extensionValides)) {
			$chemin="membres/avatars/".$_SESSION['cin'].".".$extensionUpload;

			$resultat=move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
			if($resultat) {
				$bdd = config::getConnexion();
				$updateavatar=$bdd->prepare('UPDATE membres SET avatar = :avatar WHERE cin = :cin');

				$updateavatar->execute(array(
				'avatar' => $_SESSION['cin'].".".$extensionUpload,
				'cin' => $_SESSION['cin']
				));

			header('Location: profile.php?cin='.$_SESSION['cin']);
			}
			else {
			echo "Fail to upload.";

			}
		}
		else {
		echo "Format invalide.";

		}
	
	} else {
	 echo "Taille trop volumineux";
	}

} else {
	header('Location: profile.php?cin='.$_SESSION['cin']);

}

?>