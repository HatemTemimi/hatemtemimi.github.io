<?PHP

include "../core/membreC.php";
include "../core/favorisC.php";
//include_once '../FrontOffice/afficherCommentaires.php';

session_start();

$favorisC=new favorisC();
$favorisC->supprimerFavorisClient($_SESSION['cin']);


$favorisC->supprimerCommClient($_SESSION['prenom']);

$membreC=new MembreC();
if (isset($_SESSION["cin"])){
	$membreC->supprimerMembre($_SESSION["cin"]);

session_destroy();
	header('Location: index.php');
}

?>
