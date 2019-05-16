<?php
include "../config.php";
var_dump($_POST['cin']);
var_dump ($_POST['rating']);

if (isset($_POST['cin']) and isset($_POST['rating'])){
$sql="update livreur set note=:rating where cin=:cinn";

		$db = config::getConnexion();
try{
        $req=$db->prepare($sql);
    var_dump($_POST['rating']);
    $req->bindValue(':cinn',$_POST['cin']);
    $req->bindValue(':rating',$_POST['rating']);
    $s=$req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
header ('location: livraison.php');
}
else {
    echo "erreur";
}

?>
