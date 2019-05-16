<?PHP

require_once "../entities/membre.php";
require_once "../core/membreC.php";


function isFieldUnique($email)
{
	$c = config::getConnexion();
	$sql = "SELECT * FROM membres WHERE email='$email'";
	$res =  $c->query($sql);
	$num_rows =  $res->fetchColumn();

	if($c && $num_rows > 0)
        {
            return false;
        }
	return true;
}



if (isset($_POST['cin']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['date_naissance']) and isset($_POST['sexe']) and isset($_POST['email']) and isset($_POST['mdp']) and isset($_POST['num_tel'])){


				$cin = $_POST['cin'];
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];

				/*$_POST['date_naissance'] = date('y-m-d');
				$date_naissance = $_POST['date_naissance'];*/


				$date_naissance = DateTime::createFromFormat('d/m/Y', $_POST['date_naissance'])->format('Y-m-d');



				//var_dump($date_naissance);

				$sexe = $_POST['sexe'];
				$email = $_POST['email'];
				$password = md5($_POST['mdp']);
				$num_tel = $_POST['num_tel'];


	$membre=new Membre($cin,$nom,$prenom,$date_naissance,$sexe,$email,$password,$num_tel);

              if(!isFieldUnique($email))
                    {
                        echo '<script>alert("adresse existe déjà")</script>';
                        return;

                    }

               else{
                
               $membreC=new MembreC();
				$membreC->ajouterMembre($membre);
				header('Location:CaptchaTest.php');

			}

}
else
{
	echo "Verifier les champs";
}




/**********************************************************************************************************/
/*
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$password = md5($_POST['password']);
$sexe = $_POST['sexe'];
$cin = $_POST['cin'];
$email = $_POST['email'];
$num_tel = $_POST['num_tel'];
$_POST['date_naissance'] = date('y-m-d');
$date_naissance = $_POST['date_naissance'];
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "espace_membres";

$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
	die('Connect error('. mysqli_connect_errno().')'.mysqli_connect_error());
} else {
	$SELECT = "SELECT cin FROM membres WHERE cin = ? Limit 1";
	$INSERT = "INSERT Into membres (cin,nom,email,mdp,date_naissance,sexe,num_tel,prenom) values (?,?,?,?,?,?,?,?)";

	$stmt = $conn->prepare($SELECT);
	$stmt->bind_param("i", $cin);
	$stmt->execute();
	$stmt->bind_result($cin);
	$stmt->store_result();
	$rnum = $stmt->num_rows;

	if ($rnum==0){
		$stmt->close();
		$stmt = $conn->prepare($INSERT);
		echo $date_naissance;
		$stmt->bind_param('isssssis',$cin,$nom,$email,$password,$date_naissance,$sexe,$num_tel,$prenom);
		$stmt->execute();
		echo "New entry registered";
		header('Location: CaptchaTest.php');
	} else {
		echo "Ce CIN est déjà utilisé.";
	}
	$stmt->close();
	$conn->close();
}

*/

?>
