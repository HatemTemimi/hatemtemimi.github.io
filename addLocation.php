<?PHP
require '../core/GestionPanier/paniers.class.c.php';
$panier= new panier();
$json = array('error' => true );
if (isset($_GET['id'])) {

  $id=$_GET['id'];
  $name=$_GET['name'];
  $price=(float)$_GET['price'];

   $test=$panier->addlocation($id,$name,$price);

   if($test == true)
   {
     $json['count']= $panier->count();
     $json['message']= 'bien ajouter';
   }
    if($test == false){
     $json['message']= 'deja existe';
   }

}
else {
  $json['message'] = 'Error AddLocation';
}

echo json_encode($json);
?>
