<?PHP

session_start();

include "../core/membreC.php";


if ( isset($_POST['mdp']) AND  isset($_POST['amdp'])){

			$Membre = new MembreC();

			$mdp=md5($_POST['mdp']);

			//$date_naissance=$_POST['date_naissance'];			
				
			//$num_tel=$_POST['num_tel'];

			$cin=$_SESSION['cin'];
			$mdpa=md5($_POST['amdp']);
			$mdps=$Membre->selectMdp($cin);
		$mdpsf=$mdps->fetch();
			
			
				
if ($mdpsf['0'] == $mdpa ){	
				



$Membre->modifierMdp($mdp,$cin);	
header('Location: product.php');

}
else {
	echo '<script>alert("Ancienne mot de passe est incorrete.");</script>';
	
}

}
else
{
	echo "Verifier les champs";
}

/******************************************************MODIFIER TEL***********************************************/

if ( isset($_POST['num_tel']) ){

			$num_tel=$_POST['num_tel'];

			//$date_naissance=$_POST['date_naissance'];			
				
			//$num_tel=$_POST['num_tel'];

			$cin=$_SESSION['cin'];
				
				
				
$Membre = new MembreC();
$Membre->modifierNum($num_tel,$cin);	
header('Location: product.php');

}
else
{
	echo "Verifier les champs";
}

?>


