<?PHP
require '../core/GestionPanier/paniers.class.c.php';
$panier= new panier();
$json = array('error' => true );
if (isset($_GET['id'])) {
  $id=$_GET['id'];


   $test=$panier->delete($id);

   if($test == true)
   {
     $json['count']= $panier->count();
     $json['message']= 'bien Supprimer';
   }
    if($test == false){
     $json['message']= 'pas pu supprimer error deletePanier';
   }

}else {
  $json['message'] = 'Error AddPanier';
}

echo json_encode($json);


?>
