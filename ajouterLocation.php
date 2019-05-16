<?php
include "../core/GestionPanier/paniers.class.c.php";
include "../entities/location.php";
include "../core/locationC.php";
$panier= new panier();
if(isset($_SESSION['cin']))
{
    
  $totalPrix=0;
  $totalQTE=0;
//var_dump($_POST["p"]["qte"]);
  $id=(int)$_SESSION['cin'];
  foreach($_SESSION["location"] as $keys => $values)
{
  $totalPrix=(float)$values["item_price"]*(int)$_POST["p"]["qte"][$values["item_id"]]+$totalPrix;

  $totalQTE=(int)$_POST["p"]["qte"][$values["item_id"]]+$totalQTE;
}

if ((date("Y-m-d") <= $_POST["p"]["datedeb"][$values["item_id"]]) and ($_POST["p"]["datefin"][$values["item_id"]]>$_POST["p"]["datedeb"][$values["item_id"]]) and ($_POST["p"]["qte"][$values["item_id"]]>=100) )
  {
$location1=new Locc($totalQTE,$totalPrix,$id);
$location1C= new locationC();
$location1C->ajouterCommandeLocation($location1);
 $idl=$location1C->afficherCommandeLEnCours($location1);

  foreach($_SESSION["location"] as $keys => $values)
{
  $location1= new location($id,$values["item_name"],$values["item_price"],$_POST["p"]["qte"][$values["item_id"]],$_POST["p"]["datedeb"][$values["item_id"]],$_POST["p"]["datefin"][$values["item_id"]]);



$location1C->ajouterlocationProc($location1,$idl);
}

$_SESSION["location"]=array();
$_SESSION["location"]=array();
  unset($_SESSION["location"]);
header('location:LocationValide.php');

}

else{
  ?>
  <script>alert("Verifier less cordonnneeess !!!");</script>
  
   <?php				
}

}
else {
  $_SESSION["page"]=array();
  $_SESSION["page"]="addLouer.php";
  header('location:signin.php');
}
//header('location:LocationValide.php');

 ?>
